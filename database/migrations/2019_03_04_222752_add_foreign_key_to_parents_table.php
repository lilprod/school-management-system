<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parentts', function (Blueprint $table) {
            $table->unsignedInteger('enrollment_id', 10)->change();
            $table->index('enrollment_id');
            $table->foreign('enrollment_id')
                    ->references('id')
                    ->on('enrollments')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parentts', function (Blueprint $table) {
            $table->dropIndex(['enrollment_id']);
            $table->dropForeign(['enrollment_id']);
        });
    }
}
