<?php
namespace AreaManager\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AreaLevelsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        // Additional initialization goes here

        $this->setTable('area_levels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Areas', [
            'foreignKey' => 'level_id',
            'className' => 'AreaManager.Areas',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('name', 'Area Level Name is needed')
            ->add('name', [
                'length' => [
                    'rule' => ["minLength", 2],
                    'message' => 'Area Level name should be more than 1 character'
                ]
            ])
            ->maxLength('name', 255)
            ->regex('name', '/^[a-zA-Z0-9][\sa-zA-Z0-9]*[a-zA-Z0-9]$/')

            ->requirePresence('level', 'Area Level is needed')
            ->range('level', [0, 100])
            
            ->boolean('is_active')
        ;
        return $validator;
    }
}
