<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('source_type_id');
            $table->string('name');
            $table->timestamps();
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');
            $table->foreign('source_type_id')
                ->references('id')->on('source_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sources');
    }
}
