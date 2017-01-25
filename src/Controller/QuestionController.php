<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Question Controller
 *
 * @property \App\Model\Table\QuestionTable $Question
 */
class QuestionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $question = $this->paginate($this->Question);

        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Question->get($id, [
            'contain' => ['QuestionOption']
        ]);

        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Question->newEntity();
        if ($this->request->is('post')) {
          $question->exercise_id = 0;
            $question = $this->Question->patchEntity($question, $this->request->data);
            $result = $this->Question->save($question);
            if ($result) {
                $this->Flash->success(__('The question has been saved.'));

                if(!$this->request->is('ajax')) {
                  return $this->redirect(['action' => 'index']);
                }
                //Ajax stuff Here
                $this->set(compact('question', 'screener'));
                $this->set('_serialize', ['question']);
            } else {

                $this->Flash->error(__('The question could not be saved. Please, try again.' . $question));
            }
        }
        $screener = $this->Question->Screener->find('all', ['limit' => 200]);
        $exercise = $this->Question->Exercise->find('all', ['limit' => 200]);
        $this->set(compact('question', 'screener', 'exercise'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Question->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Question->patchEntity($question, $this->request->data);
            if ($this->Question->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Question->get($id);
        if ($this->Question->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
