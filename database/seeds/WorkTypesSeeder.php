<?php

use Illuminate\Database\Seeder;

class WorkTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_types')->insert([
            'name' => 'Remote'
        ]);

        DB::table('work_types')->insert([
            'name' => 'On site'
        ]);
    }
}
