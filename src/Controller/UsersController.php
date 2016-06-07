<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        // Add logout to the allowed actions list.
        $this->Auth->allow(['logout', 'add']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Введите корректный логин или пароль');
        }
        $this->set('head','Войти');
    }

    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect($this->Auth->redirectUrl());
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Вы зарегистрированы!'));
                return $this->redirect(['controller'=>'post','action' => 'index']);
            } else {
                $this->Flash->error(__('Ошибка.Попробуйте позже'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->set('head','Регистрация');
        $this->render('login');
    }

}
