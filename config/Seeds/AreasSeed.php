<?php
use Migrations\AbstractSeed;

/**
 * Areas seed.
 */
class AreasSeed extends AbstractSeed
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
                'name' => 'Highest_Area',
                'level_id' => '0',
                'parent_id' => '0',
                'created_at' => '2024-02-16 16:06:21',
                'modified_at' => '2024-02-16 16:06:21',
            ],
            [
                'id' => '1',
                'name' => 'India',
                'level_id' => '1',
                'parent_id' => '0',
                'created_at' => '2024-02-15 05:23:19',
                'modified_at' => '2024-02-15 15:20:01',
            ],
            [
                'id' => '16',
                'name' => 'Australia',
                'level_id' => '1',
                'parent_id' => '0',
                'created_at' => '2024-02-15 15:17:01',
                'modified_at' => '2024-02-15 15:19:54',
            ],
            [
                'id' => '17',
                'name' => 'Delhi',
                'level_id' => '2',
                'parent_id' => '1',
                'created_at' => '2024-02-15 15:17:19',
                'modified_at' => '2024-02-15 15:19:50',
            ],
            [
                'id' => '18',
                'name' => 'Haryana',
                'level_id' => '2',
                'parent_id' => '1',
                'created_at' => '2024-02-15 15:17:32',
                'modified_at' => '2024-02-20 15:43:08',
            ],
            [
                'id' => '23',
                'name' => 'South Delhiiii',
                'level_id' => '3',
                'parent_id' => '17',
                'created_at' => '2024-02-16 10:10:02',
                'modified_at' => '2024-02-20 15:47:23',
            ],
            [
                'id' => '37',
                'name' => 'jor Bagh',
                'level_id' => '13',
                'parent_id' => '23',
                'created_at' => '2024-02-19 11:09:03',
                'modified_at' => '2024-02-22 11:47:30',
            ],
            [
                'id' => '51',
                'name' => 'Faridabad',
                'level_id' => '3',
                'parent_id' => '18',
                'created_at' => '2024-02-26 12:46:45',
                'modified_at' => '2024-02-26 12:46:45',
            ],
        ];

        $table = $this->table('areas');
        $table->insert($data)->save();
    }
}
