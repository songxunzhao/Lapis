<?php

use App\Models\PeriodUnit;
use Illuminate\Database\Seeder;

class PayPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('pay_plans')->insert([
            [
                'name' => 'Basic',
                'description' => 'Initial plan',
                'price' => 0,
                'period' => 0,
                'period_unit' => PeriodUnit::MONTH
            ],
            [
                'name' => 'Premium',
                'description' => 'Premium plan',
                'price' => 100,
                'period' => 1,
                'period_unit' => PeriodUnit::MONTH
            ]
        ]);
    }
}
