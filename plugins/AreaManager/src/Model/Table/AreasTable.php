<?php
namespace AreaManager\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AreasTable extends Table
{
    // public function initialize(array $config)
    // {
    //     parent::initialize($config);
    //     // Additional initialization goes here
    // }

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
