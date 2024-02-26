<?php
namespace AreaManager\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AreasTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        // Additional initialization goes here

        $this->setTable('Areas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        // Belongs To Association for Parent
        $this->belongsTo('ParentAreas', [
            'className' => 'AreaManager.Areas',
            'foreignKey' => 'parent_id',
        ]);

        // Has Many Association for Children
        $this->hasMany('ChildAreas', [
            'className' => 'AreaManager.Areas',
            'foreignKey' => 'parent_id',
        ]); 

        $this->belongsTo('AreaLevels', [
            'foreignKey' => 'level_id',
            'className' => 'AreaManager.AreaLevels',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('name', 'Area Name is needed')
            ->add('name', [
                'length' => [
                    'rule' => ["minLength", 2],
                    'message' => 'Area name should be more than 1 character'
                ]
            ])
            ->maxLength('name', 255)
            ->regex('name', '/^[a-zA-Z0-9][\sa-zA-Z0-9]*[a-zA-Z0-9]$/')
        ;
        return $validator;
    }
}
