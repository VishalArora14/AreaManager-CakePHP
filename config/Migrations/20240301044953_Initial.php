<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('area_levels')
            ->addColumn('level', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('is_active', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('areas')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => false,
            ])
            ->addColumn('level_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('parent_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created_at', 'datetime', [
                'default' => 'current_timestamp()',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified_at', 'datetime', [
                'default' => 'current_timestamp()',
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'level_id',
                ]
            )
            ->addIndex(
                [
                    'parent_id',
                ]
            )
            ->create();

        $this->table('areas')
            ->addForeignKey(
                'level_id',
                'area_levels',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'parent_id',
                'areas',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('areas')
            ->dropForeignKey(
                'level_id'
            )
            ->dropForeignKey(
                'parent_id'
            )->save();

        $this->table('area_levels')->drop()->save();
        $this->table('areas')->drop()->save();
    }
}
