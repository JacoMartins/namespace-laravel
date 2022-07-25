<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Names extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('uuid')->primary()->unique()->default(DB::raw('gen_random_uuid()'))->change();
        });

        Schema::create('names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('registers');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at');

            $table->foreignUuid('who_posted')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('names');
    }
}
