<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->text('answer')->nullable()->comment('answer from admin for commenter user');
            $table->foreignId('parent_id')->nullable()->constrained('comments');
            $table->foreignId('author_id')->constrained('users');
            $table->foreignId('responder_id')->nullable()->constrained('users');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->tinyInteger('answershow')->default(0)->comment('0 => dont show answer of admin, 1 => show answer of admin');
            $table->tinyInteger('seen')->default(0)->comment('0 => unseen and not seen with admins, 1 => seened with admin');
            $table->tinyInteger('approved')->default(0)->comment('0 => not approved  with admin , 1 => approved with admin');
            $table->tinyInteger('status')->default(0);
            $table->timestamp('answer_date')->nullable()->comment('admin answer date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
