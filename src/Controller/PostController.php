<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\CategoryTable;
use Cake\ORM\TableRegistry;
/**
 * Post Controller
 *
 * @property \App\Model\Table\PostTable $Post
 */
class PostController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->Auth->allow('category');
    }
    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the post belongs to the current user.
        $id = $this->request->params['pass'][0];
        $post = $this->Post->get($id);
        if ($post->user_id == $user['id']) {
            return true;
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Category', 'Users'],
            'order' => [
                'created' => 'desc'
            ]
        ];
        $post = $this->paginate($this->Post);
        $this->set(compact('post'));
        $this->set('_serialize', ['post']);

        $category = TableRegistry::get('category');
        $category = $category->find('all');
        $this->set('cats',$category);
    }

    public function category($id=null)
    {
        $this->paginate = [
            'contain' => ['Category', 'Users'],
            'order' => [
                'created' => 'desc'
            ]
        ];
        $post = $this->paginate($this->Post->find('all')->where(['category_id'=>$id]));
        $this->set(compact('post'));
        $this->set('_serialize', ['post']);

        $category = TableRegistry::get('category');
        $category = $category->find('all');
        $this->set('cats',$category);
        $this->render('index');

    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Post->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Post->patchEntity($post, $this->request->data);
            $post->user_id = $this->Auth->user('id');
            if ($this->Post->save($post)) {
                $this->Flash->success(__('Пост сохранен'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Неудалось сохранить. Попробуйте позже'));
            }
        }
        $category = $this->Post->Category->find('list', ['limit' => 200]);
        $this->set(compact('post', 'category', 'users'));
        $this->set('_serialize', ['post']);
        $this->set('head','Новый пост');
        $this->render('edit');
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Post->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Post->patchEntity($post, $this->request->data);
            $post->user_id = $this->Auth->user('id');
            if ($this->Post->save($post)) {
                $this->Flash->success(__('Пост сохранен'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Неудалось сохранить. Попробуйте позже'));
            }
        }
        $category = $this->Post->Category->find('list', ['limit' => 200]);
        $this->set(compact('post', 'category', 'users'));
        $this->set('_serialize', ['post']);
        $this->set('head','Редактирование');
        $this->render('edit');
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Post->get($id);
        if ($this->Post->delete($post)) {
            $this->Flash->success(__('Пост удален'));
        } else {
            $this->Flash->error(__('Ошибка.Попробуйте позже'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
