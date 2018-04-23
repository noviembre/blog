<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([

           'name' => 'Manu',
           'email' => 'm@ya.com',
           'password' => bcrypt('password'),
            'admin'=> 1

       ]);

        App\Profile::create([
           'user_id' => $user->id,
            'avatar'=> 'uploads/avatars/avatar.jpg',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid consectetur consequuntur, ea eaque eius eos exercitationem inventore laboriosam laudantium magnam modi numquam quam quos rem rerum sequi veritatis voluptatem.',
            'facebook'=> 'facebook.com',
            'youtube' => 'youtube.com'


        ]);
    }
}
