<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organisations Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\HasMany $Customers
 * @property \App\Model\Table\UniformsTable|\Cake\ORM\Association\HasMany $Uniforms
 *
 * @method \App\Model\Entity\Organisation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Organisation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Organisation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organisation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organisation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organisation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Organisation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organisation findOrCreate($search, callable $callback = null, $options = [])
 */
class OrganisationsTable extends Table
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

        $this->setTable('organisations');
        $this->setDisplayField('_id');
        $this->setPrimaryKey('_id');

        $this->hasMany('Customers', [
            'foreignKey' => 'organisation_id'
        ]);
        $this->hasMany('Uniforms', [
            'foreignKey' => 'organisation_id'
        ]);
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
            ->integer('_id')
            ->allowEmptyString('_id', 'create');

        $validator
            ->scalar('organisationname')
            ->maxLength('organisationname', 1000)
            ->requirePresence('organisationname', 'create')
            ->allowEmptyString('organisationname', false);

        $validator
            ->scalar('logopath')
            ->requirePresence('logopath', 'create')
            ->allowEmptyString('logopath', false);

        $validator
            ->scalar('accesscode')
            ->requirePresence('accesscode', 'create')
            ->allowEmptyString('accesscode', false);

        $validator
            ->scalar('bypasscode')
            ->requirePresence('bypasscode', 'create')
            ->allowEmptyString('bypasscode', false);

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->allowEmptyString('active', false);

        return $validator;
    }
}
