<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverImageToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //The artisan migrate command calls up() function
        Schema::table('posts', function (Blueprint $table) {
            $table->string('cover_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //The artisan migrate:rollback command calls up() function
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
}
