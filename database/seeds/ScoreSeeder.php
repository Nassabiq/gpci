<?php

use App\Scoring;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scorings')->insert([
            'id' => 1,
            'score' => 'Bronze',
        ]);
        DB::table('scorings')->insert([
            'id' => 2,
            'score' => 'Silver',
        ]);
        DB::table('scorings')->insert([
            'id' => 3,
            'score' => 'Gold',
        ]);
    }
}
