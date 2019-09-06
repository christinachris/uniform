<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Variants Model
 *
 * @property \App\Model\Table\UniformsTable|\Cake\ORM\Association\BelongsTo $Uniforms
 *
 * @method \App\Model\Entity\Variant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Variant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Variant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Variant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Variant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Variant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Variant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Variant findOrCreate($search, callable $callback = null, $options = [])
 */
class VariantsTable extends Table
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

        $this->setTable('variants');
        $this->setDisplayField('_id');
        $this->setPrimaryKey('_id');

        $this->belongsTo('Uniforms', [
            'foreignKey' => 'uniform_id',
            'joinType' => 'INNER'
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
            ->allowEmptyString('_id', 'create')
            ->add('_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('colour')
            ->requirePresence('colour', 'create')
            ->allowEmptyString('colour', false);

        $validator
            ->scalar('size')
            ->requirePresence('size', 'create')
            ->allowEmptyString('size', false);

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->allowEmptyString('price', false);

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
        $rules->add($rules->isUnique(['_id']));
        $rules->add($rules->existsIn(['uniform_id'], 'Uniforms'));

        return $rules;
    }
}
