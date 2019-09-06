<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdersVariants Model
 *
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\VariantsTable|\Cake\ORM\Association\BelongsTo $Variants
 * @property \App\Model\Table\CartsTable|\Cake\ORM\Association\BelongsTo $Carts
 *
 * @method \App\Model\Entity\OrdersVariant get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdersVariant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrdersVariant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdersVariant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdersVariant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdersVariant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersVariant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersVariant findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersVariantsTable extends Table
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

        $this->setTable('orders_variants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id'
        ]);
        $this->belongsTo('Variants', [
            'foreignKey' => 'variant_id'
        ]);
        $this->belongsTo('Carts', [
            'foreignKey' => 'cart_id'
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
            ->decimal('orderprice')
            ->allowEmptyString('orderprice');

        $validator
            ->scalar('ordercolour')
            ->allowEmptyString('ordercolour');

        $validator
            ->scalar('ordersize')
            ->allowEmptyString('ordersize');

        $validator
            ->integer('orderquantity')
            ->allowEmptyString('orderquantity');

        $validator
            ->scalar('orderheroimagepath')
            ->allowEmptyFile('orderheroimagepath');

        $validator
            ->scalar('orderuniformname')
            ->allowEmptyString('orderuniformname');

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
        $rules->add($rules->existsIn(['variant_id'], 'Variants'));
        $rules->add($rules->existsIn(['cart_id'], 'Carts'));

        return $rules;
    }
}
