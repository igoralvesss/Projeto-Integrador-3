<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Product;
use Cake\Database\Query;
use Cake\I18n\FrozenTime;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('lay_index');
        $this->paginate = [
            'contain' => ['Clients'],
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Clients', 'Products'],
        ]);

        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $dados = $this->request->getData();
            $dados['created_at'] = date('Y-m-d H:i:s');
            $order = $this->Orders->patchEntity($order, $dados);

            $order->products = [];
            $order->products[0] =  $this->Orders->Products->get($dados['produto']);
            $order->products[0]->_joinData = new \Cake\ORM\Entity;
            $order->products[0]->_joinData->quantity = $dados['quantity'];
            $order->products[0]->_joinData->price = $order->products[0]->price;
            $order->setDirty('products', true);

            $order->total = $order->products[0]->_joinData->quantity * $order->products[0]->_joinData->price;



            if ($this->Orders->save($order)) {
                $this->Flash->success(__('O pedido foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o pedido. Por favor, tente novamente.'));
        }
        $clients = $this->Orders->Clients->find('list', ['limit' => 200]);
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $this->set(compact('order', 'clients', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Products'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('O pedido foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o pedido. Por favor, tente novamente.'));
        }
        $clients = $this->Orders->Clients->find('list', ['limit' => 200]);
        $products = $this->Orders->Products->find('list', ['limit' => 200]);
        $this->set(compact('order', 'clients', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('O pedido foi excluido.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir o pedido. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addItem()
    {
        $sessao = $this->request->getSession();
        $dados = $this->request->getData();
        $produto = $this->Orders->Products->get($dados['id_product']);

        
        // debug($sessao->read('client'));
        // exit();
        if(is_null($sessao->read('client'))){
            return $this->redirect(['controller'=>'Clients', 'action'=>'login']);
        }

        if (is_null($sessao->read('order'))) {
            $order = $this->Orders->newEmptyEntity();
            $order->total = $produto->price * $dados['quantity'];
            $order->created_at = FrozenTime::now();
            $order->status = 'PENDENTE';
            $order->client = $this->Orders->Clients->get($sessao->read('client'));

            $order->products = [];
            $order->products[0] = $produto;
            $order->products[0]->_joinData = new \Cake\ORM\Entity;
            $order->products[0]->_joinData->quantity = $dados['quantity'];
            $order->products[0]->_joinData->price = $produto->price;
            $order->setDirty('products', true);

            $ins = $this->Orders->save($order);
            $this->Flash->success(__('Produto adicionado a lista de pedidos.'));

            $sessao->write('order', $ins->id_orders);
            // debug($ins);
            // exit();

        } else {
            $order = $this->Orders->get($sessao->read('order'), ['contain' => ['Products']]);

            $produto->_joinData = new \Cake\ORM\Entity;
            $produto->_joinData->quantity = $dados['quantity'];
            $produto->_joinData->price = $produto->price;

            $order->products[] = $produto;

            $order->setDirty('products', true);

            $order->total += $dados['quantity'] * $produto->price;

            $ins = $this->Orders->save($order);
            $this->Flash->success(__('Produto adicionado a lista de pedidos.'));
            
        }

        return $this->redirect(['controller' => 'Products', 'action' => 'listarPedidos']);
    }

    public function removeItem()
    {
        $this->request->allowMethod(['post','delete']);
        $sessao = $this->request->getSession();

        
        if (!is_null($sessao->read('order'))) {
            $dados = $this->request->getData();
            $order = $this->Orders->get($sessao->read('order'),['contain'=>['Products']]);
            
            foreach($order->products as $product){
                
                if($product->id_product == $dados['id_product']){
                    
                    $this->Orders->Products->unlink($order,[$product]);
                    $order->total -= $product->_joinData->quantity * $product->_joinData->price;
                }
                $this->Orders->save($order);

            }

            $produto = $this->Orders->Products->get($dados['id_product']);
            
            
            $this->Orders->Products->unlink($order, [$produto]);   
             
        }

        return $this->redirect(['controller'=>'Products','action' => 'listarPedidos']);
    }

    public function fecharPedido(){

        $sessao = $this->request->getSession();

        if (!is_null($sessao->read('order'))) {
            $order = $this->Orders->get($sessao->read('order'),['contain'=>['Products']]);
            // $order->created_at = FrozenTime::now();
            $sessao->delete('order');
            $this->Flash->success(__('Pedido realizado com sucesso.'));
            return $this->redirect(['controller'=>'Products','action' => 'listarPedidos']);
           
        }
    }

    public function aovivo(){
        $this->viewBuilder()->setLayout('lay_vivo');

        $this->paginate = [
            'contain' => ['Clients'],
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }
}
