<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormularOperators Controller
 *
 * @property \App\Model\Table\FormularOperatorsTable $FormularOperators
 */
class FormularOperatorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Formular']
        ];
        $formularOperators = $this->paginate($this->FormularOperators);

        $this->set(compact('formularOperators'));
        $this->set('_serialize', ['formularOperators']);
    }

    /**
     * View method
     *
     * @param string|null $id Formular Operator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formularOperator = $this->FormularOperators->get($id, [
            'contain' => ['Formular']
        ]);

        $this->set('formularOperator', $formularOperator);
        $this->set('_serialize', ['formularOperator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formularOperator = $this->FormularOperators->newEntity();
        if ($this->request->is('post')) {
            $formularOperator = $this->FormularOperators->patchEntity($formularOperator, $this->request->data);
            if ($this->FormularOperators->save($formularOperator)) {
                $this->Flash->success(__('The formular operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formular operator could not be saved. Please, try again.'));
            }
        }
        $formular = $this->FormularOperators->Formular->find('list', ['limit' => 200]);
        $this->set(compact('formularOperator', 'formular'));
        $this->set('_serialize', ['formularOperator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formular Operator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formularOperator = $this->FormularOperators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formularOperator = $this->FormularOperators->patchEntity($formularOperator, $this->request->data);
            if ($this->FormularOperators->save($formularOperator)) {
                $this->Flash->success(__('The formular operator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formular operator could not be saved. Please, try again.'));
            }
        }
        $formular = $this->FormularOperators->Formular->find('list', ['limit' => 200]);
        $this->set(compact('formularOperator', 'formular'));
        $this->set('_serialize', ['formularOperator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formular Operator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formularOperator = $this->FormularOperators->get($id);
        if ($this->FormularOperators->delete($formularOperator)) {
            $this->Flash->success(__('The formular operator has been deleted.'));
        } else {
            $this->Flash->error(__('The formular operator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
