<?php

namespace Database\Seeders;

use App\System;
use Illuminate\Database\Seeder;

class SystemSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $system = new System();
        $system->fill([
            'title' => "Atletas",
            'online' => true,
            'paysera_password' => 'somepassword',
            'paysera_projectid' => '1234',
            'price_ads' => 123,
            'price_subscription' => 321
        ]);
        $system->save();
    }
}
