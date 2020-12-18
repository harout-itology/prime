<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::updateOrCreate(['id'=>1],['text'=>'No, and we already told you so!', 'frequency'=> 3]);
    }
}
