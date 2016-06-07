<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Category Controller
 *
 * @property \App\Model\Table\CategoryTable $Category
 */
class CategoryController extends AppController
{

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];
        if ($user['id'] == '1') {
            return true;
        }

        if (in_array($action, ['index'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Category->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Category->patchEntity($category, $this->request->data);
            if ($this->Category->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['controller'=>'post','action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
        $this->set('head','Создать категорию');
        $this->render('edit');
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Category->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Category->patchEntity($category, $this->request->data);
            if ($this->Category->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['controller'=>'post','action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
        $this->set('head','Редактировать категорию');
        $this->render('edit');
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Category->get($id);
        if ($this->Category->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'post','action' => 'index']);
    }
}
