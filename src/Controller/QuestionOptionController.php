<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuestionOption Controller
 *
 * @property \App\Model\Table\QuestionOptionTable $QuestionOption
 */
class QuestionOptionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Question']
        ];
        $questionOption = $this->paginate($this->QuestionOption);

        $this->set(compact('questionOption'));
        $this->set('_serialize', ['questionOption']);
    }

    /**
     * View method
     *
     * @param string|null $id Question Option id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionOption = $this->QuestionOption->get($id, [
            'contain' => ['Question']
        ]);

        $this->set('questionOption', $questionOption);
        $this->set('_serialize', ['questionOption']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $questionOption = $this->QuestionOption->newEntity();
        if ($this->request->is('post')) {
            $questionOption = $this->QuestionOption->patchEntity($questionOption, $this->request->data);
            $count = $this->QuestionOption->find()->where(['formular_id' => $questionOption->screener_id])->all();
            $questionOption->orderNumber = count($count);
            if ($this->QuestionOption->save($questionOption)) {
                $this->Flash->success(__('The question option has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question option could not be saved. Please, try again.'));
            }
        }
        $question = $this->QuestionOption->Question->find('list', ['limit' => 200]);
        $this->set(compact('questionOption', 'question'));
        $this->set('_serialize', ['questionOption']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question Option id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $questionOption = $this->QuestionOption->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionOption = $this->QuestionOption->patchEntity($questionOption, $this->request->data);
            if ($this->QuestionOption->save($questionOption)) {
                $this->Flash->success(__('The question option has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question option could not be saved. Please, try again.'));
            }
        }
        $question = $this->QuestionOption->Question->find('list', ['limit' => 200]);
        $this->set(compact('questionOption', 'question'));
        $this->set('_serialize', ['questionOption']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question Option id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionOption = $this->QuestionOption->get($id);
        if ($this->QuestionOption->delete($questionOption)) {
            $this->Flash->success(__('The question option has been deleted.'));
        } else {
            $this->Flash->error(__('The question option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
