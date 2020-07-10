<?php

declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('lay_index');
        $clients = $this->paginate($this->Clients);

        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('client'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('O cliente foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O cliente não pode ser salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('O cliente foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O cliente não pode ser salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('O cliente foi excluido.'));
        } else {
            $this->Flash->error(__('O cliente não pode ser excluído. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $this->viewBuilder()->setLayout('site');
        $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('O cadastro foi salvo.'));

                return $this->redirect(['controller' => 'Products', 'action' => 'listarProdutos']);
            }
            $this->Flash->error(__('Não foi possível realizar o cadastro. Por favor, tente novamente.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function login()
    {
        $this->viewBuilder()->setLayout('site');

        $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            $sessao = $this->request->getSession();
            $dados = $this->request->getData();


            $client = $this->Clients->find('all')->where(['email' => $dados['email']])->first();

            // debug($client);
            // exit();
            if (!is_null($client)) {

                if ((new DefaultPasswordHasher())->check($dados['password'], $client->password)) {
                    // debug($client->id_clients);
                    // exit();
                    $sessao->write('client', $client->id_clients);
                    // debug($sessao->write('client', $client->id));
                    // exit();
                    $this->Flash->success(__('Logado com sucesso!'));
                    return $this->redirect(['controller' => 'Products', 'action' => 'listarProdutos']);
                } else {
                    $this->Flash->error(__('E-mail ou senha inválidos.'));
                }
            } else {
                $this->Flash->error(__('E-mail ou senha inválidos.'));
            };
        }

        $this->set(compact(['client']));
    }

    /**
     * Logout method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function logout()
    {

        $sessao = $this->request->getSession();
        if(!is_null($sessao->read('client'))){
            $sessao->delete('client');
            $sessao->delete('client');
        } else {
            $this->Flash->error(__('Você não está conectado para efetuar logout!'));
        }
        
        $this->Flash->success(__('Você desconectou-se da sua conta!'));
        return $this->redirect(['controller' => 'Pages', 'action' => 'inicio']);
    }
}
