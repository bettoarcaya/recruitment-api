<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backgrounds', function (Blueprint $table) {
            $table->dropColumn('academic_espec');
            $table->unsignedBigInteger('work_exp_catg');

            $table->foreign('work_exp_catg')
                  ->references('id')
                  ->on('experience_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backgrounds');
    }
}
