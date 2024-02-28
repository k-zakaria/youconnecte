<?php

use Illuminate\Database\Seeder;
use App\Models\Like;
use App\Models\User;
use App\Models\Message;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $messages = Message::all();

        foreach ($messages as $message) {
            foreach ($users as $user) {
                if (rand(0, 1) == 1) {
                    $like = new Like();
                    $like->user_id = $user->id;
                    $like->message_id = $message->id;
                    $like->save();
                }
            }
        }
    }
}
