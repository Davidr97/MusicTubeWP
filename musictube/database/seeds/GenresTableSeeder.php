<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Genre')->delete();

        $genres=array(
            ['id'=>1,'name'=>'Metal','created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>2,'name'=>'Rock','created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>3,'name'=>'Blues','created_at'=>new DateTime,'updated_at'=>new DateTime],
        );
        DB::table('Genre')->insert($genres);
    }
}
