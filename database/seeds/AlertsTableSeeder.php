<?php

use Illuminate\Database\Seeder;
use App\Alert;
use Illuminate\Support\Facades\DB;
class AlertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $alertQuantity = 100;

        factory(Alert::class, $alertQuantity)->create();
    }
}
