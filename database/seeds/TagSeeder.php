<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tags')->insert([
            [
                'name' => 'Adobe Photoshop',
                'description' => 'Adobe Photoshop',
                'is_active' => true
            ],
            [
                'name' => 'Maya',
                'description' => 'Maya',
                'is_active' => true
            ]
        ]);
    }
}
