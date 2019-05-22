<?php

use Illuminate\Database\Seeder;

class TrackGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('track_genre')->delete();

        $tracks=array(
            ['id'=>1,'genre_id' => 1 ,'track_id' => 10,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>2,'genre_id' => 1 ,'track_id' => 11,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>3,'genre_id' => 1 ,'track_id' => 12,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>4,'genre_id' => 1 ,'track_id' => 13,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>5,'genre_id' => 1 ,'track_id' => 14,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>6,'genre_id' => 1 ,'track_id' => 15,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>7,'genre_id' => 1 ,'track_id' => 16,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>8,'genre_id' => 1 ,'track_id' => 17,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>9,'genre_id' => 2 ,'track_id' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>10,'genre_id' => 2 ,'track_id' => 2,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>11,'genre_id' => 2 ,'track_id' => 3,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>12,'genre_id' => 2 ,'track_id' => 4,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>13,'genre_id' => 2 ,'track_id' => 5,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>14,'genre_id' => 3 ,'track_id' => 6,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>15,'genre_id' => 3 ,'track_id' => 7,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>16,'genre_id' => 3 ,'track_id' => 8,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>17,'genre_id' => 3 ,'track_id' => 9,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>18,'genre_id' => 3 ,'track_id' => 18,'created_at'=>new DateTime,'updated_at'=>new DateTime],
            ['id'=>19,'genre_id' => 3 ,'track_id' => 19,'created_at'=>new DateTime,'updated_at'=>new DateTime]
        );
        DB::table('track_genre')->insert($tracks);
    }
}
