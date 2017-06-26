<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComparisonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('comparisons')->insert([
            'test_id' => 3,
            'from' => 'Modern',
            'to' => 'Old School',
            'scale' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comparisons')->insert([
            'test_id' => 3,
            'from' => 'Unappealing',
            'to' => 'Appealing',
            'scale' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comparisons')->insert([
            'test_id' => 3,
            'from' => 'Simple',
            'to' => 'Cluttered',
            'scale' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comparisons')->insert([
            'test_id' => 3,
            'from' => 'Boring',
            'to' => 'Exciting',
            'scale' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comparisons')->insert([
            'test_id' => 3,
            'from' => 'Dark',
            'to' => 'Light',
            'scale' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
