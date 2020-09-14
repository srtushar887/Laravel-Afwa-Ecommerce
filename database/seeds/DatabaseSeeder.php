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
        // $this->call(UserSeeder::class);
//        factory(\App\top_category::class,20)->create();
//        factory(\App\middle_category::class,20)->create();
//        factory(\App\end_category::class,20)->create();
//        factory(\App\brand::class,20)->create();
//        factory(\App\size::class,20)->create();
//        factory(\App\color::class,20)->create();
        factory(\App\product::class,500)->create();
//        factory(\App\blog_category::class,10)->create();
//        factory(\App\blog::class,130)->create();
    }
}
