<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Exercise Controller
 *
 * @property \App\Model\Table\ExerciseTable $Exercise
 */
class ExerciseController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }

        $this->paginate = [
            'contain' => ['Sections']
        ];
        $exercise = $this->paginate($this->Exercise);

        $this->set(compact('exercise'));
        $this->set('_serialize', ['exercise']);
    }

    /**
     * View method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }

        $exercise = $this->Exercise->get($id, [
            'contain' => ['Sections', 'Recordset', 'Question']
        ]);

        $this->set('exercise', $exercise);
        $this->set('_serialize', ['exercise']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }

        $exercise = $this->Exercise->newEntity();
        if ($this->request->is('post')) {
            $exercise = $this->Exercise->patchEntity($exercise, $this->request->data);
            if ($this->Exercise->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                if(!$this->request->is('ajax')) {
                  return $this->redirect(['action' => 'index']);
                }
                $this->set(compact('exercise', 'sections'));
                $this->set('_serialize', ['exercise']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
        $sections = $this->Exercise->Sections->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'sections'));
        $this->set('_serialize', ['exercise']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }

        $exercise = $this->Exercise->get($id, [
            'contain' => ['Question' => ['QuestionOption']]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exercise = $this->Exercise->patchEntity($exercise, $this->request->data);
            if ($this->Exercise->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
        $sections = $this->Exercise->Sections->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'sections'));
        $this->set('_serialize', ['exercise']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('role') !=  "admin"){
            $this->Flash->Error("You are not authorised to view this section");
            return $this->redirect(["action" => "", "controller" => "pages"]);
        }

        $this->request->allowMethod(['post', 'delete']);
        $exercise = $this->Exercise->get($id);
        if ($this->Exercise->delete($exercise)) {
            $this->Flash->success(__('The exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
