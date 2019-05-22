<?php

use Illuminate\Database\Seeder;

class TrackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Track')->delete();

        $tracks = array(
            ['id' => 1, 'name' => 'Ocean Planet', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Backbone', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'From the sky', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Unicorn', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'Where Dragons Dwell', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'The Heaviest Matter of the Universe', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Flying Whales', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'In the Wilderness', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'World to Come', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'name' => 'From Mars', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'name' => 'To Sirius', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'name' => 'Global Warming', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 3, 'uploaded_by' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 13, 'name' => 'Fight Fire with Fire', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 1, 'uploaded_by' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 14, 'name' => 'Ride the Lightning', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 1, 'uploaded_by' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 15, 'name' => 'For Whom the Bell Tolls', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 1, 'uploaded_by' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 16, 'name' => 'Fade to Black', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 1, 'uploaded_by' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 17, 'name' => 'Trapped Under Ice', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 1, 'uploaded_by' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 18, 'name' => 'Escape', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 1, 'uploaded_by' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 19, 'name' => 'Creeping Death', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 1, 'uploaded_by' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 20, 'name' => 'The Call of Ktulu', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 1, 'uploaded_by' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 21, 'name' => 'The Eye of the Storm', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 22, 'name' => 'Immortalized', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 23, 'name' => 'The Vengeful One', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 24, 'name' => 'Open Your Eyes', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 25, 'name' => 'The Light', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 26, 'name' => 'What Are You Waiting For', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 27, 'name' => 'You\'re Mine', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 28, 'name' => 'Who', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 29, 'name' => 'Save Our Last Goodbye', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 30, 'name' => 'Fire It Up', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 31, 'name' => 'The Sound of Silence', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 32, 'name' => 'Never Wrong', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 33, 'name' => 'Who Taught You How to Hate', 'lyrics' => '', 'description' => 'Produced by Urban Records © Publishing & copyright - Urban Records/All rights reserved Music By Yung ', 'album_id' => 2, 'uploaded_by' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('Track')->insert($tracks);
    }
}
