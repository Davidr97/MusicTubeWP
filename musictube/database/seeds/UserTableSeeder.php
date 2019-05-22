<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->delete();

        $users = array(
            ['id' => 1, 'name' => 'Branko', 'surname' => 'Furna', 'email' => 'branko@example.com', 'password' => Hash::make("Branko123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@angry.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Jovan', 'surname' => 'Kalaj', 'email' => 'jovan@example.com', 'password' => Hash::make("Jovan123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@happy.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'David', 'surname' => 'Risto', 'email' => 'david@example.com', 'password' => Hash::make("David123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@adorable.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Leo', 'surname' => 'DiCaprio', 'email' => 'leo@example.com', 'password' => Hash::make("David123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@smile.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'John', 'surname' => 'Doe', 'email' => 'john@example.com', 'password' => Hash::make("David123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@sad.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Travis', 'surname' => 'Johnson', 'email' => 'travis@example.com', 'password' => Hash::make("David123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@emotional.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Tony', 'surname' => 'Montana', 'email' => 'tony@example.com', 'password' => Hash::make("David123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@frustrated.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Derek', 'surname' => 'Banas', 'email' => 'derek@example.com', 'password' => Hash::make("David123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@amazed.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'Alexey', 'surname' => 'Voevoda', 'email' => 'alexey@example.com', 'password' => Hash::make("David123!"), 'avatar_url' => 'https://api.adorable.io/avatars/285/abott@confused.png', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('users')->insert($users);
    }
}
