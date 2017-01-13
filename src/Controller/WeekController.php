<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Week Controller
 *
 * @property \App\Model\Table\WeekTable $Week
 */
class WeekController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $week = $this->paginate($this->Week);

        $this->set(compact('week'));
        $this->set('_serialize', ['week']);
    }

    /**
     * View method
     *
     * @param string|null $id Week id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $week = $this->Week->get($id, [
            'contain' => []
        ]);

        $this->set('week', $week);
        $this->set('_serialize', ['week']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $week = $this->Week->newEntity();
        if ($this->request->is('post')) {
            $week = $this->Week->patchEntity($week, $this->request->data);
            if ($this->Week->save($week)) {
                $this->Flash->success(__('The week has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The week could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('week'));
        $this->set('_serialize', ['week']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Week id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $week = $this->Week->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $week = $this->Week->patchEntity($week, $this->request->data);
            if ($this->Week->save($week)) {
                $this->Flash->success(__('The week has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The week could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('week'));
        $this->set('_serialize', ['week']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Week id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $week = $this->Week->get($id);
        if ($this->Week->delete($week)) {
            $this->Flash->success(__('The week has been deleted.'));
        } else {
            $this->Flash->error(__('The week could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
