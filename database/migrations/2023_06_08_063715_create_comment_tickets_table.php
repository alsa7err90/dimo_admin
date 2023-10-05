<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('comment');
            $table->string('file')->nullable();
            $table->text('name');
            $table->text('avatar')->default('default.png');
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
        Schema::dropIfExists('comment_tickets');
    }
};
