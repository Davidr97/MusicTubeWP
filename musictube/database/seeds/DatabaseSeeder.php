<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ArtistTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(TrackTableSeeder::class);
        $this->call(ListenedTableSeeder::class);
        $this->call(TrackGenreTableSeeder::class);
        $this->call(TrackStatusTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
    }
}
