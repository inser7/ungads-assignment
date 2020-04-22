<?php

use Illuminate\Database\Seeder;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal')->insert([
            'name' => 'Чайка',
            'type' => 'птица',
            'nick' => 'Валера',
            'picture_path' => '1',
        ]);
    }
}
