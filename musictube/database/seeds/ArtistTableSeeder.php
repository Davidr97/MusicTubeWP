<?php

use Illuminate\Database\Seeder;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Artist')->delete();

        $artists = array(
            ['id' => 1, 'name' => 'Gojira', 'country' => 'France', 'photo_url' => 'https://s3.amazonaws.com/bit-photos/large/8085609.jpeg', 'year_formed' => 2001, 'is_band' => 1, 'description' => '', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Disturbed', 'country' => 'USA', 'photo_url' => 'https://www.picclickimg.com/d/l400/pict/252590105001_/Disturbed-Immortalized-CD-Album-NEW.jpg', 'year_formed' => 1994, 'description' => '', 'is_band' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Metallica', 'country' => 'USA', 'photo_url' => 'https://images-na.ssl-images-amazon.com/images/I/51%2BW-4Jpk8L._SX425_.jpg', 'year_formed' => 1981, 'description' => '', 'is_band' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],

        );

        DB::table('Artist')->insert($artists);
    }
}
