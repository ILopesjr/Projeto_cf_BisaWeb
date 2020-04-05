<?php

use Illuminate\Database\Seeder;
use app\Movimentacao_Financeira;

class MovimentacaoFinanceiraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Movimentacao_Financeira::class, 10)->create();
    }
}
