<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Websitecontents Model
 *
 * @method \App\Model\Entity\Websitecontent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Websitecontent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Websitecontent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Websitecontent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Websitecontent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Websitecontent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Websitecontent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Websitecontent findOrCreate($search, callable $callback = null, $options = [])
 */
class WebsitecontentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('websitecontents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('contentname')
            ->maxLength('contentname', 250)
            ->requirePresence('contentname', 'create')
            ->allowEmptyString('contentname', false);

        $validator
            ->scalar('contentvalue')
            ->maxLength('contentvalue', 5000)
            ->allowEmptyString('contentvalue');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
