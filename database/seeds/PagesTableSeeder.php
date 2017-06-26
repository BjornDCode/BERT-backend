<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'user_id' => 1,
            'project_id' => 1,
            'title' => 'Front Page',
            'url' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('pages')->insert([
            'user_id' => 1,
            'project_id' => 1,
            'title' => 'About Page',
            'url' => 'http://google.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('pages')->insert([
            'user_id' => 1,
            'project_id' => 2,
            'title' => 'Front Page',
            'url' => 'http://facebook.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('pages')->insert([
            'user_id' => 2,
            'project_id' => 3,
            'title' => 'Front Page',
            'url' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('pages')->insert([
            'user_id' => 2,
            'project_id' => 3,
            'title' => 'Front Page',
            'url' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
