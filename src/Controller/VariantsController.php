<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Variants Controller
 *
 * @property \App\Model\Table\VariantsTable $Variants
 *
 * @method \App\Model\Entity\Variant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VariantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Uniforms']
        ];
        $variants = $this->paginate($this->Variants);

        $this->set(compact('variants'));
    }

    /**
     * View method
     *
     * @param string|null $id Variant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $variant = $this->Variants->get($id, [
            'contain' => ['Uniforms']
        ]);

        $this->set('variant', $variant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $variant = $this->Variants->newEntity();
        if ($this->request->is('post')) {
            $variant = $this->Variants->patchEntity($variant, $this->request->getData());
            if ($this->Variants->save($variant)) {
                $this->Flash->success(__('The variant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The variant could not be saved. Please, try again.'));
        }
        $uniforms = $this->Variants->Uniforms->find('list', ['limit' => 200]);
        $this->set(compact('variant', 'uniforms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Variant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $variant = $this->Variants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $variant = $this->Variants->patchEntity($variant, $this->request->getData());
            if ($this->Variants->save($variant)) {
                $this->Flash->success(__('The variant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The variant could not be saved. Please, try again.'));
        }
        $uniforms = $this->Variants->Uniforms->find('list', ['limit' => 200]);
        $this->set(compact('variant', 'uniforms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Variant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $variant = $this->Variants->get($id);
        if ($this->Variants->delete($variant)) {
            $this->Flash->success(__('The variant has been deleted.'));
        } else {
            $this->Flash->error(__('The variant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
