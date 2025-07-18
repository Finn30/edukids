<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->integer('completed_tasks')->default(0);
        });
    }

    public function down()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->dropColumn('completed_tasks');
        });
    }
};
