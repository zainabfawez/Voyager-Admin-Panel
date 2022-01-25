<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCategoryIdToMyCategoryIdInCategoryKitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_kit', function (Blueprint $table) {
            $table->renameColumn('category_id', 'my_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_kit', function (Blueprint $table) {
            $table->renameColumn('my_category_id', 'category_id');
        });
    }
}
