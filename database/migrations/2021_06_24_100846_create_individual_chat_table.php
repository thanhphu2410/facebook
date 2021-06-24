<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_chat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from')->constrained()->onDelete('cascade')->on('users');
            $table->foreignId('to')->constrained()->onDelete('cascade')->on('users');
            $table->longText('last_mess')->nullable()->default(null);
            $table->integer('status')->default(0)->comment('0 => sent, 1 => seen');
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
        Schema::dropIfExists('individual_chat');
    }
}
