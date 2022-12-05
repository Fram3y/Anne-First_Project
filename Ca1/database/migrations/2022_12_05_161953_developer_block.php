<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->id();
        $table->unsignedBigInter('developer_id');
        $table->unsignedBigInter('block_id');

        $table->foreign('developer_id')->references('id')->on('developers')->onUpdate('cascade')->onDelete('restrict');
        $table->foreign('block_id')->references('id')->on('blocks')->onUpdate('cascade')->onDelete('restrict');

        $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
