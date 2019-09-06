<?php
namespace App\Controller;
ob_start();
use App\Controller\AppController;

/**
 * Uniforms Controller
 *
 * @property \App\Model\Table\UniformsTable $Uniforms
 *
 * @method \App\Model\Entity\Uniform[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UniformsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function isAuthorized($user = null) {

        if ($this->request->action === 'showuniform') {
            $postId=$this->request->params['pass'][0];
            if ($postId==$user['organisation_id']) {
                return true;
            }
            else{
                return false;
            }

        }
        elseif ($this->request->action === 'showuniformdetail'){
            $postId=$this->request->params['pass'][0];
            $oid=$this->Uniforms->get($postId, [
                'contain' => []
            ]);
            if ($oid['organisation_id']==$user['organisation_id']) {
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }


    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Organisations']
        ];
        $uniforms = $this->paginate($this->Uniforms);

        $this->set(compact('uniforms'));
    }

    /**
     * View method
     *
     * @param string|null $id Uniform id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $uniform = $this->Uniforms->get($id, [
            'contain' => ['Organisations', 'Quantities']
        ]);

        $this->set('uniform', $uniform);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uniform = $this->Uniforms->newEntity();
        if ($this->request->is('post')) {
            $uniform = $this->Uniforms->patchEntity($uniform, $this->request->getData());
            if ($this->Uniforms->save($uniform)) {
                $this->Flash->success(__('The uniform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uniform could not be saved. Please, try again.'));
        }
        $organisations = $this->Uniforms->Organisations->find('list', ['limit' => 200]);
        $this->set(compact('uniform', 'organisations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Uniform id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    /**
     * Delete method
     *
     * @param string|null $id Uniform id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uniform = $this->Uniforms->get($id);
        if ($this->Uniforms->delete($uniform)) {
            $this->Flash->success(__('The uniform has been deleted.'));
        } else {
            $this->Flash->error(__('The uniform could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function showuniform($oid=0){
        $this->loadModel('Organisations');
        $this->loadModel('Variants');


        $Uniform = $this -> Uniforms ->find()->where(['organisation_id'=>$oid]);

        $variant = $this->Variants->find('all');
        //var_dump($variant);






        $organisation = $this->Organisations->get($oid, [
            'contain' => []
        ]);

        $UniformType = $this ->Uniforms ->find('all')->distinct(['type'])->where(['organisation_id'=>$oid]);
        $gender= $this ->Uniforms ->find('all')->distinct(['gender'])->where(['organisation_id'=>$oid])->order(['gender']);

        if ($this->request->is('post')) {
            $types=[];
            $gerders=[];
            for($i=0;$i<sizeof($this->request->getData()['Types']);$i++){
                if($this->request->getData()['Types'][$i]!='0'){
                    array_push($types,$this->request->getData()['Types'][$i]);

                }
            }
            for($i=0;$i<sizeof($this->request->getData()['Genders']);$i++){
                if($this->request->getData()['Genders'][$i]!='0'){
                    array_push($gerders,$this->request->getData()['Genders'][$i]);

                }
            }


            if(!empty($types)&&!empty($gerders)){
                $Uniform = $this->Uniforms->find('all', ['conditions' =>['and' =>[['type in' => $types],['gender in '=>$gerders],['organisation_id'=>$oid]]]]);
            }
            elseif (!empty($types)&&empty($gerders)){
                $Uniform = $this->Uniforms->find('all', ['conditions' =>['and' =>[['type in' => $types],['organisation_id'=>$oid]]]]);
            }
            elseif(empty($types)&&!empty($gerders)){
                $Uniform = $this->Uniforms->find('all', ['conditions' =>['and' =>[['gender in '=>$gerders],['organisation_id'=>$oid]]]]);
            }
            else{
                $Uniform = $this -> Uniforms ->find()->where(['organisation_id'=>$oid]);
            }



        }


        $this->set('uniform', $Uniform);
        $this->set('organisation',$organisation);
        $this->set('UniformType',$UniformType);
        $this->set('gender',$gender);
        $this->set('variant',$variant);
        //$this->set('Variant',$Variant);


        // $this->set('organisations', $this->Organisation->find('all'));

    }

    public function showuniformdetail($id=0){
        $this->loadModel('Variants');
        $variant = $this->Variants->find('all');

        $this->loadModel('pictures');
        $picture = $this->pictures->find('all')->where(['uniform_id'=>$id]);

        $UniformDetail = $this -> Uniforms -> get($id);

        $variant=$this->Variants->find('all')->where(['uniform_id'=>$id]);


        $vDistinctSize=$this->Variants->find('list', ['keyField' => 'size', 'valueField' => 'size','conditions' => ['uniform_id'=>$id]])->distinct('size');
        $vDistinctColour=$this->Variants->find('list', ['keyField' => 'colour', 'valueField' => 'colour','conditions' => ['uniform_id'=>$id]])->distinct('colour');

        $this->set('uniform', $UniformDetail);
        $this->set('variant',$variant);
        $this->set('vDistinctSize',$vDistinctSize);
        $this->set('vDistinctColour',$vDistinctColour);
        $this->set('picture',$picture);

    }

}
