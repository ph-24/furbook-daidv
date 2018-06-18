<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime = date('Y-m-d H:i:s');
        DB::table('breeds')->insert([
            [
                'id' => 1,
                'name' => 'Meo Ba Tu',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            [
                'id' => 2,
                'name' => 'Meo Rung',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            [
                'id' => 3,
                'name' => 'Meo My',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            [
                'id' => 4,
                'name' => 'Giong Meo khac',
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
        ]);
    }
}
