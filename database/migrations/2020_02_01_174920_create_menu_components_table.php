<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('route');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('icon')->default('fa-folder');
            $table->unsignedBigInteger('menu_category_id');
            $table->timestamps();

            $table->foreign('menu_category_id')->references('id')->on('menu_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_components');
    }
}
