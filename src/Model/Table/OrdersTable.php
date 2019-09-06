<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property |\Cake\ORM\Association\HasMany $Orderitems
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id'
        ]);
        $this->hasMany('Orderitems', [
            'foreignKey' => 'order_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'order_id'
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
            ->scalar('recipientname')
            ->requirePresence('recipientname', 'create')
            ->allowEmptyString('recipientname', false);

        $validator
            ->dateTime('orderdate')
            ->requirePresence('orderdate', 'create')
            ->allowEmptyDateTime('orderdate', false);

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->scalar('state')
            ->requirePresence('state', 'create')
            ->allowEmptyString('state', false);

        $validator
            ->scalar('postcode')
            ->requirePresence('postcode', 'create')
            ->allowEmptyString('postcode', false);

        $validator
            ->scalar('paidstatus')
            ->requirePresence('paidstatus', 'create')
            ->allowEmptyString('paidstatus', false);
            
        $validator->scalar('paypal')
            ->requirePresence('paypal','create')
            ->allowEmptyString('paypal', true);

        $validator
            ->decimal('totalprice')
            ->requirePresence('totalprice', 'create')
            ->allowEmptyString('totalprice', false);

        $validator
            ->scalar('comments')
            ->allowEmptyString('comments');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->allowEmptyString('phone', false);

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));

        return $rules;
    }
}
