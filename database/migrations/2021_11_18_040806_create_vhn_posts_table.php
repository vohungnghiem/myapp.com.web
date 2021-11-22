<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVhnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vhn_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_category');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('caption')->nullable();
            $table->string('image')->nullable();
            $table->text('link')->nullable();
            $table->text('content')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('sort')->nullable()->default(1);
            $table->integer('view')->nullable();
            $table->text('description')->nullable();
            $table->string('key')->nullable();
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('vhn_categories')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vhn_posts');
    }
}
