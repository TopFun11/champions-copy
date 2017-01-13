<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Day Controller
 *
 * @property \App\Model\Table\DayTable $Day
 */
class DayController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $day = $this->paginate($this->Day);

        $this->set(compact('day'));
        $this->set('_serialize', ['day']);
    }

    /**
     * View method
     *
     * @param string|null $id Day id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $day = $this->Day->get($id, [
            'contain' => []
        ]);

        $this->set('day', $day);
        $this->set('_serialize', ['day']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $day = $this->Day->newEntity();
        if ($this->request->is('post')) {
            $day = $this->Day->patchEntity($day, $this->request->data);
            if ($this->Day->save($day)) {
                $this->Flash->success(__('The day has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The day could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('day'));
        $this->set('_serialize', ['day']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Day id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $day = $this->Day->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $day = $this->Day->patchEntity($day, $this->request->data);
            if ($this->Day->save($day)) {
                $this->Flash->success(__('The day has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The day could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('day'));
        $this->set('_serialize', ['day']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Day id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $day = $this->Day->get($id);
        if ($this->Day->delete($day)) {
            $this->Flash->success(__('The day has been deleted.'));
        } else {
            $this->Flash->error(__('The day could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
