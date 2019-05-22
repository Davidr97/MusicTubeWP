<?php

use Illuminate\Database\Seeder;

class SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribe')->delete();

        $subscribers=array(
            ['id'=>1,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>3,'subscribed_to_id'=>1],
            ['id'=>2,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>3,'subscribed_to_id'=>2],
            ['id'=>3,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>3,'subscribed_to_id'=>4],
            ['id'=>4,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>3,'subscribed_to_id'=>5],
            ['id'=>5,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>3,'subscribed_to_id'=>6],
            ['id'=>7,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>1,'subscribed_to_id'=>7],
            ['id'=>8,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>1,'subscribed_to_id'=>2],
            ['id'=>9,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>1,'subscribed_to_id'=>3],
            ['id'=>10,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>1,'subscribed_to_id'=>4],
            ['id'=>11,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>1,'subscribed_to_id'=>5],
            ['id'=>12,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>1,'subscribed_to_id'=>6],
            ['id'=>13,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>2,'subscribed_to_id'=>1],
            ['id'=>14,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>2,'subscribed_to_id'=>3],
            ['id'=>15,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>2,'subscribed_to_id'=>4],
            ['id'=>16,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>2,'subscribed_to_id'=>8],
            ['id'=>17,'receive_notification' => 1 ,'premium' => 1,'created_at'=>new DateTime,'updated_at'=>new DateTime,'subscriber_id'=>2,'subscribed_to_id'=>9],
        );
        DB::table('subscribe')->insert($subscribers);
    }
}
