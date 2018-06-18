<?php

use Illuminate\Database\Seeder;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime = date('Y-m-d H:i:s');
        DB::table('cats')->insert([
            [
                'id' => 1,
                'name' => 'Meo Ba Tu long dai',
                'date_of_birth' => date('Y-m-d'),
                'breed_id' => 1,
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            [
                'id' => 2,
                'name' => 'Meo Rung nepal',
                'date_of_birth' => date('Y-m-d'),
                'breed_id' => 2,
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ],
            [
                'id' => 3,
                'name' => 'Meo My long ngan',
                'date_of_birth' => date('Y-m-d'),
                'breed_id' => 3,
                'created_at' => $currentTime,
                'updated_at' => $currentTime
            ]
        ]);
    }
}
