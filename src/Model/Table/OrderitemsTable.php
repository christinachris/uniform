<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orderitems Model
 *
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\Orderitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orderitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Orderitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orderitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderitem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orderitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orderitem findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderitemsTable extends Table
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

        $this->setTable('orderitems');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
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
            ->integer('id')
            ->allowEmptyString('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('orderuniformname')
            ->requirePresence('orderuniformname', 'create')
            ->allowEmptyString('orderuniformname', false);

        $validator
            ->decimal('orderprice')
            ->requirePresence('orderprice', 'create')
            ->allowEmptyString('orderprice', false);

        $validator
            ->scalar('ordercolour')
            ->requirePresence('ordercolour', 'create')
            ->allowEmptyString('ordercolour', false);

        $validator
            ->scalar('ordersize')
            ->requirePresence('ordersize', 'create')
            ->allowEmptyString('ordersize', false);

        $validator
            ->integer('orderquantity')
            ->requirePresence('orderquantity', 'create')
            ->allowEmptyString('orderquantity', false);

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
        $rules->add($rules->existsIn(['order_id'], 'Orders'));

        return $rules;
    }
}
