<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Message;
use App\Models\User;
use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Message::factory(10)->create();

        for($i=0; $i<30; $i++){
            $like = new Like();
            $like->user_id = User::all()->random(1)->first()->id; 
            $like->message_id = Message::all()->random(1)->first()->id; 
        }
        $like->save();
    }
}
