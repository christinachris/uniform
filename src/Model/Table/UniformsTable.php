<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uniforms Model
 *
 * @property \App\Model\Table\OrganisationsTable|\Cake\ORM\Association\BelongsTo $Organisations
 * @property \App\Model\Table\PicturesTable|\Cake\ORM\Association\HasMany $Pictures
 * @property \App\Model\Table\VariantsTable|\Cake\ORM\Association\HasMany $Variants
 *
 * @method \App\Model\Entity\Uniform get($primaryKey, $options = [])
 * @method \App\Model\Entity\Uniform newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Uniform[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Uniform|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uniform saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uniform patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Uniform[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Uniform findOrCreate($search, callable $callback = null, $options = [])
 */
class UniformsTable extends Table
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

        $this->setTable('uniforms');
        $this->setDisplayField('_id');
        $this->setPrimaryKey('_id');

        $this->belongsTo('Organisations', [
            'foreignKey' => 'organisation_id'
        ]);
        $this->hasMany('Pictures', [
            'foreignKey' => 'uniform_id'
        ]);
        $this->hasMany('Variants', [
            'foreignKey' => 'uniform_id'
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
            ->scalar('uniformname')
            ->maxLength('uniformname', 1000)
            ->requirePresence('uniformname', 'create')
            ->allowEmptyString('uniformname', false);

        $validator
            ->scalar('type')
            ->maxLength('type', 1000)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('uniformdescription')
            ->maxLength('uniformdescription', 1000)
            ->requirePresence('uniformdescription', 'create')
            ->allowEmptyString('uniformdescription', false);

        $validator
            ->scalar('gender')
            ->maxLength('gender', 1000)
            ->requirePresence('gender', 'create')
            ->allowEmptyString('gender', false);

        $validator
            ->scalar('heroimagepath')
            ->maxLength('heroimagepath', 300)
            ->allowEmptyFile('heroimagepath');

        $validator
            ->scalar('sizechartpath')
            ->allowEmptyString('sizechartpath');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

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
        $rules->add($rules->existsIn(['organisation_id'], 'Organisations'));

        return $rules;
    }
}
