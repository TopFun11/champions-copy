<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormularVariables Controller
 *
 * @property \App\Model\Table\FormularVariablesTable $FormularVariables
 */
class FormularVariablesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Formular', 'Question']
        ];
        $formularVariables = $this->paginate($this->FormularVariables);

        $this->set(compact('formularVariables'));
        $this->set('_serialize', ['formularVariables']);
    }

    /**
     * View method
     *
     * @param string|null $id Formular Variable id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formularVariable = $this->FormularVariables->get($id, [
            'contain' => ['Formular', 'Question']
        ]);

        $this->set('formularVariable', $formularVariable);
        $this->set('_serialize', ['formularVariable']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formularVariable = $this->FormularVariables->newEntity();
        if ($this->request->is('post')) {
            $formularVariable = $this->FormularVariables->patchEntity($formularVariable, $this->request->data);
            if ($this->FormularVariables->save($formularVariable)) {
                $this->Flash->success(__('The formular variable has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formular variable could not be saved. Please, try again.'));
            }
        }
        $formular = $this->FormularVariables->Formular->find('list', ['limit' => 200]);
        $question = $this->FormularVariables->Question->find('list', ['limit' => 200]);
        $this->set(compact('formularVariable', 'formular', 'question'));
        $this->set('_serialize', ['formularVariable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formular Variable id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formularVariable = $this->FormularVariables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formularVariable = $this->FormularVariables->patchEntity($formularVariable, $this->request->data);
            if ($this->FormularVariables->save($formularVariable)) {
                $this->Flash->success(__('The formular variable has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formular variable could not be saved. Please, try again.'));
            }
        }
        $formular = $this->FormularVariables->Formular->find('list', ['limit' => 200]);
        $question = $this->FormularVariables->Question->find('list', ['limit' => 200]);
        $this->set(compact('formularVariable', 'formular', 'question'));
        $this->set('_serialize', ['formularVariable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formular Variable id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formularVariable = $this->FormularVariables->get($id);
        if ($this->FormularVariables->delete($formularVariable)) {
            $this->Flash->success(__('The formular variable has been deleted.'));
        } else {
            $this->Flash->error(__('The formular variable could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
