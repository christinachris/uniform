<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Size Model
 *
 * @method \App\Model\Entity\Size get($primaryKey, $options = [])
 * @method \App\Model\Entity\Size newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Size[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Size|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Size saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Size patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Size[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Size findOrCreate($search, callable $callback = null, $options = [])
 */
class SizeTable extends Table
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

        $this->setTable('size');
        $this->setDisplayField('s_id');
        $this->setPrimaryKey('s_id');
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
            ->integer('s_id')
            ->allowEmptyString('s_id', 'create');

        $validator
            ->scalar('s_Size')
            ->maxLength('s_Size', 1000)
            ->requirePresence('s_Size', 'create')
            ->allowEmptyString('s_Size', false);

        return $validator;
    }
}
