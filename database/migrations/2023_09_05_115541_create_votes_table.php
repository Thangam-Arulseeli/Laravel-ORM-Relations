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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->string('voting');
            $table->unsignedBigInteger('user_id')->index(); // Indexed field // user_id is foreign key (ParentTable_id)
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');   // Specify the relation - Foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
};
