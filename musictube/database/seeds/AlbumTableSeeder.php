<?php

use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Album')->delete();

        $albums = array(
            ['id' => 1, 'name' => 'Ride the lightning', 'year_released' => 1984, 'cover_photo_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvNPEUd5vzr2uymZYlSnI4cg92Lv4WL3CjSSe0OxasZQIW_NdAhQ', 'artist_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Immortalized', 'year_released' => 2015, 'cover_photo_url' => 'https://upload.wikimedia.org/wikipedia/en/0/0b/Disturbed_immortalized_cover.jpg', 'artist_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'From Mars to Sirius', 'year_released' => 2016, 'cover_photo_url' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f6/From_Mars_to_Sirius.jpg/220px-From_Mars_to_Sirius.jpg', 'artist_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('Album')->insert($albums);
    }
}
