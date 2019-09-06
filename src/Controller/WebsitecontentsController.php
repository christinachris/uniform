<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Websitecontents Controller
 *
 * @property \App\Model\Table\WebsitecontentsTable $Websitecontents
 *
 * @method \App\Model\Entity\Websitecontent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WebsitecontentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $websitecontents = $this->paginate($this->Websitecontents);

        $this->set(compact('websitecontents'));
    }

    /**
     * View method
     *
     * @param string|null $id Websitecontent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $websitecontent = $this->Websitecontents->get($id, [
            'contain' => []
        ]);

        $this->set('websitecontent', $websitecontent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $websitecontent = $this->Websitecontents->newEntity();
        if ($this->request->is('post')) {
            $websitecontent = $this->Websitecontents->patchEntity($websitecontent, $this->request->getData());
            if ($this->Websitecontents->save($websitecontent)) {
                $this->Flash->success(__('The websitecontent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The websitecontent could not be saved. Please, try again.'));
        }
        $this->set(compact('websitecontent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Websitecontent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $websitecontent = $this->Websitecontents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $websitecontent = $this->Websitecontents->patchEntity($websitecontent, $this->request->getData());
            if ($this->Websitecontents->save($websitecontent)) {
                $this->Flash->success(__('The websitecontent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The websitecontent could not be saved. Please, try again.'));
        }
        $this->set(compact('websitecontent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Websitecontent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $websitecontent = $this->Websitecontents->get($id);
        if ($this->Websitecontents->delete($websitecontent)) {
            $this->Flash->success(__('The websitecontent has been deleted.'));
        } else {
            $this->Flash->error(__('The websitecontent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
