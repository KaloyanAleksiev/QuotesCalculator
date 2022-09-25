<?php

namespace Database\Seeders;

use App\Models\Quote;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Uncomment this line if you need to use the seeder more than once or on prod env
        //DB::table('quotes')->truncate();

        $now = Carbon::now();
        Quote::insert([
            [
                'ship_from' => '10001',
                'deliver_to' => '85085',
                'transport' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'ship_from' => '40204',
                'deliver_to' => '06068',
                'transport' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
