<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->char('phone_number',9);
            $table->date('data_start');
            $table->date('data_end');
            $table->char('contract_number',90);
            $table->char('pos',60);
            $table->char('pos',10);
            $table->char('typ',1);
            $table->char('weryfikacja',1);
            $table->date('data_weryfikacji');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
