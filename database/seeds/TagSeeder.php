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
                'description' => 'Adobe Photoshop'
            ],
            [
                'name' => 'Maya',
                'description' => 'Maya'
            ]
        ]);
    }
}
