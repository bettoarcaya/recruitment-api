<?php

use Illuminate\Database\Seeder;

class WorkCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_categories')->insert([
            'name' => 'Back-end developer',
        ]);

        DB::table('work_categories')->insert([
            'name' => 'Front-end developer',
        ]);

        DB::table('work_categories')->insert([
            'name' => 'Full-stack developer',
        ]);
    }
}
