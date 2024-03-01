<?php
use Migrations\AbstractSeed;

/**
 * AreaLevels seed.
 */
class AreaLevelsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '0',
                'level' => '0',
                'name' => 'Highest_Level',
                'is_active' => '1',
            ],
            [
                'id' => '1',
                'level' => '1',
                'name' => 'Country',
                'is_active' => '1',
            ],
            [
                'id' => '2',
                'level' => '2',
                'name' => 'State',
                'is_active' => '1',
            ],
            [
                'id' => '3',
                'level' => '3',
                'name' => 'District',
                'is_active' => '1',
            ],
            [
                'id' => '13',
                'level' => '4',
                'name' => 'Sub District',
                'is_active' => '1',
            ],
            [
                'id' => '24',
                'level' => '5',
                'name' => 'colony',
                'is_active' => '0',
            ],
        ];

        $table = $this->table('area_levels');
        $table->insert($data)->save();
    }
}
