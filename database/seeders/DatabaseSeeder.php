<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

   /**
    * If you are here after following the instructions from the
    * 'README.md' file, you might already have run the `php artisan
    * db:seed` command; if you haven't, then do it! Once done with it,
    * comment out the line starting with the
    * word "User" and uncomment out the line starting with the word
    * "Post" and then run that command again. That's all you need to
    * fill the database with fake records.
   */
    public function run()
    {
        User::factory(10)->create();
        // Post::factory(20)->create();
    }
}
