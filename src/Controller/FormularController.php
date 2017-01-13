<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formular Controller
 *
 * @property \App\Model\Table\FormularTable $Formular
 */
class FormularController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $formular = $this->paginate($this->Formular);

        $this->set(compact('formular'));
        $this->set('_serialize', ['formular']);
    }

    /**
     * View method
     *
     * @param string|null $id Formular id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formular = $this->Formular->get($id, [
            'contain' => []
        ]);

        $this->set('formular', $formular);
        $this->set('_serialize', ['formular']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formular = $this->Formular->newEntity();
        if ($this->request->is('post')) {
            $formular = $this->Formular->patchEntity($formular, $this->request->data);
            if ($this->Formular->save($formular)) {
                $this->Flash->success(__('The formular has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formular could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formular'));
        $this->set('_serialize', ['formular']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formular id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formular = $this->Formular->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formular = $this->Formular->patchEntity($formular, $this->request->data);
            if ($this->Formular->save($formular)) {
                $this->Flash->success(__('The formular has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formular could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formular'));
        $this->set('_serialize', ['formular']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formular id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formular = $this->Formular->get($id);
        if ($this->Formular->delete($formular)) {
            $this->Flash->success(__('The formular has been deleted.'));
        } else {
            $this->Flash->error(__('The formular could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
