<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->index();
            $table->string('uri')->unique()->index();
            $table->string('permission_slug')->nullable();
            $table->string('component')->nullable();
            $table->timestamps();

            $table->foreign('permission_slug')
                ->references('slug')->on('permissions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
