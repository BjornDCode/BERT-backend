<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 1,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 2,
            'answer' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 3,
            'answer' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 4,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 5,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 1,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 2,
            'answer' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 3,
            'answer' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 4,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 5,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 1,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 2,
            'answer' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 3,
            'answer' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 4,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('responses')->insert([
            'test_id' => 3,
            'comparison_id' => 5,
            'answer' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
