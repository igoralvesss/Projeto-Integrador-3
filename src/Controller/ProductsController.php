<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()

    {
        $this->viewBuilder()->setLayout('lay_index');
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $this->viewBuilder()->setLayout('partes');
        $product = $this->Products->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('lay_add');
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('O produto foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o produto. Por favor, tente novamente.'));
        }
        $orders = $this->Products->Orders->find('list', ['limit' => 200]);
        $this->set(compact('product', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Orders'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('O produto foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o produto. Por favor, tente novamente.'));
        }
        $orders = $this->Products->Orders->find('list', ['limit' => 200]);
        $this->set(compact('product', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('O produto foi excluido.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir o produto. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     *  Cardapio method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function listarProdutos()
    {
        $this->viewBuilder()->setLayout('site');
        $products = $this->paginate($this->Products);

        // $sessao = $this->request->getSession();
        // $order = [];
        // $carrinho = [];
        // $total = [];
        
        // if (!is_null($sessao->read('order'))) {
        //     $order = $this->Products->Orders->get($sessao->read('order'), ['contain' => ['Products']]);
        //     if(isset($order->products)){
        //         $carrinho = $order->products;
        //        }
        //     if(isset($order->total)){
        //         $total = $order->total;
        //     } else {
        //         $total = '0';
        //     }
        // }

        $this->set(compact('products'));
    }

    public function listarPedidos()
    {
        $this->viewBuilder()->setLayout('site');
        $products = $this->paginate($this->Products);

        $sessao = $this->request->getSession();
        $order = null;
        $carrinho = [];
        $total = [];
        $name = null;
        
        if (!is_null($sessao->read('order'))) {
            $order = $this->Products->Orders->get($sessao->read('order'), ['contain' => ['Products']]);
    
            if(isset($order->products)){
                $carrinho = $order->products;
               }
            if(isset($order->total)){
                $total = $order->total;
            } else {
                $total = '0';
            }
            
        }



        $this->set(compact('order', 'carrinho', 'total', 'name'));
    }
}
