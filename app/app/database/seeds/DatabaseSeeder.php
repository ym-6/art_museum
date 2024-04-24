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
        $this->call(UsersSeeder::class);
        $this->call(PrefecturesSeeder::class);
        $this->call(ArtMuseumsSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(VisitHistoriesSeeder::class);
    }
}
