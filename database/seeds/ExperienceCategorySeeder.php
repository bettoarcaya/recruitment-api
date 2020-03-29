<?php

use Illuminate\Database\Seeder;

class ExperienceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experience_categories')->insert([
            'name' => 'Junior',
        ]);

        DB::table('experience_categories')->insert([
            'name' => 'Semi-senior',
        ]);

        DB::table('experience_categories')->insert([
            'name' => 'Senior',
        ]);
    }
}
