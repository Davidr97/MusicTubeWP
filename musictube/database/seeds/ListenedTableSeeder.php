<?php

use Illuminate\Database\Seeder;

class ListenedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Listened')->delete();

        $listened=array(
            ['id'=>1,'user_id' => 1 ,'track_id' => 10,'times'=>10,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>2,'user_id' => 1 ,'track_id' => 11,'times'=>11,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>3,'user_id' => 1 ,'track_id' => 12,'times'=>12,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>4,'user_id' => 1 ,'track_id' => 13,'times'=>13,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>5,'user_id' => 1 ,'track_id' => 14,'times'=>14,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>6,'user_id' => 1 ,'track_id' => 15,'times'=>15,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>7,'user_id' => 1 ,'track_id' => 16,'times'=>16,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>8,'user_id' => 1 ,'track_id' => 17,'times'=>17,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>9,'user_id' => 2 ,'track_id' => 1,'times'=>18,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>10,'user_id' => 2 ,'track_id' => 10,'times'=>19,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>11,'user_id' => 2 ,'track_id' => 11,'times'=>20,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>12,'user_id' => 2 ,'track_id' => 12,'times'=>21,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>13,'user_id' => 2 ,'track_id' => 13,'times'=>22,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>14,'user_id' => 3 ,'track_id' => 10,'times'=>23,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>15,'user_id' => 3 ,'track_id' => 11,'times'=>24,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>16,'user_id' => 3 ,'track_id' => 12,'times'=>25,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>17,'user_id' => 3 ,'track_id' => 13,'times'=>26,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>18,'user_id' => 3 ,'track_id' => 14,'times'=>27,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>19,'user_id' => 3 ,'track_id' => 15,'times'=>28,'created_at'=>new DateTime,'updated_at'=>new DateTime],
        );
        DB::table('Listened')->insert($listened);
    }
}
