<?php

use Illuminate\Database\Seeder;
use App\Course;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $courses = factory(Course::class, 50)->create();
    }
}
