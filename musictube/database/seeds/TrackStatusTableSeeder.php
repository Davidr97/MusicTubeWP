<?php

use Illuminate\Database\Seeder;

class TrackStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('track_status')->delete();

        $tracks=array(
            ['id'=>1,'user_id' => 1 ,'track_id' => 1,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>2,'user_id' => 1 ,'track_id' => 2,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>3,'user_id' => 1 ,'track_id' => 3,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>4,'user_id' => 1 ,'track_id' => 4,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>5,'user_id' => 1 ,'track_id' => 5,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>6,'user_id' => 1 ,'track_id' => 15,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>7,'user_id' => 1 ,'track_id' => 16,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>8,'user_id' => 1 ,'track_id' => 17,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>9,'user_id' => 2 ,'track_id' => 1,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>10,'user_id' => 2 ,'track_id' => 2,'type'=>0,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>11,'user_id' => 2 ,'track_id' => 3,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>12,'user_id' => 2 ,'track_id' => 4,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>13,'user_id' => 2 ,'track_id' => 5,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>14,'user_id' => 3 ,'track_id' => 1,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>15,'user_id' => 3 ,'track_id' => 2,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>16,'user_id' => 3 ,'track_id' => 3,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>17,'user_id' => 3 ,'track_id' => 4,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>18,'user_id' => 3 ,'track_id' => 5,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>19,'user_id' => 3 ,'track_id' => 19,'type'=>1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
        );
        DB::table('track_status')->insert($tracks);
    }
}
