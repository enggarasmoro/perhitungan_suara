<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerhitunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tps')->unsigned();
            $table->integer('id_caleg')->unsigned();
            $table->integer('jumlah')->default(0);
            $table->integer('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->string('update_by')->nullable();
            $table->foreign('id_tps')->references('id')->on('tps')->onDelete('CASCADE');
            $table->foreign('id_caleg')->references('id')->on('caleg')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perhitungan');
    }
}
