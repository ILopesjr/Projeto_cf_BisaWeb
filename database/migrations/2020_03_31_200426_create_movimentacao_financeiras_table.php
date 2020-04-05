<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Conta_Bancarias;

class CreateMovimentacaoFinanceirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('movimentacao_financeiras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_conta_bancaria')->constrained('conta_bancarias')->onDelete('cascade');
            $table->string("descricao");
            $table->float("valor");
            $table->tinyInteger("tipo_movimentacao");
            $table->timestamp("data_movimentacao",0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacao_financeiras');
    }
}
