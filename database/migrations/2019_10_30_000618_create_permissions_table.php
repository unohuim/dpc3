<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique()->index();
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique()->index();
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table->unsignedInteger('permission_id');

            $table->foreign('permission_id')
                ->references('id')->on('permissions')
                ->onDelete('cascade');

            $table->morphs('model');

            $table->primary(['permission_id', 'model_id', 'model_type']);
        });

        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->unsignedInteger('role_id');

            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');

            $table->morphs('model');

            $table->primary(['role_id', 'model_id', 'model_type']);
        });

        Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('role_id');

            $table->foreign('permission_id')
                ->references('id')->on('permissions')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

        app('cache')->forget('permission.cache');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_has_permissions');
        Schema::drop('model_has_roles');
        Schema::drop('model_has_permissions');

        Schema::drop('roles');
        Schema::drop('permissions');
    }
}