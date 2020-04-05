<?php

use Illuminate\Database\Seeder;
use app\Conta_Bancaria;

class ContaBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Conta_Bancaria::class, 10)->create();
    }
}
