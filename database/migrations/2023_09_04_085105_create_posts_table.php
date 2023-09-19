<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('posts', function (Blueprint $table) {
            
           // $table->charset = 'utf8mb4';
           // $table->collation = 'utf8mb4_0900_ai_ci';

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('body');
          //  $table->softDeletes();  // deleted_at  // To create Soft delete column
            $table->timestamps();
        });

        DB::unprepared("CREATE PROCEDURE InsertPost(IN var_user_id bigint, IN var_title varchar(255), IN var_body varchar(255)) 
          BEGIN
            INSERT INTO posts(user_id, title, body) values(var_user_id, var_title, var_body);
          END;"
        );

         DB::unprepared("CREATE PROCEDURE GetPost(IN var_title varchar(255))
           BEGIN
              SELECT * FROM posts WHERE title = var_title;
           END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');

       // DB::unprepared('DROP PROCEDURE IF EXISTS InsertPost');
    
       DB::unprepared('DROP PROCEDURE IF EXISTS GetPost');
        $sql = "DROP PROCEDURE IF EXISTS InsertPost";
        DB::connection()->getPdo()->exec($sql);

    }
};
