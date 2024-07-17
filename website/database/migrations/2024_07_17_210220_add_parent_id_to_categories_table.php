<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToCategoriesTable extends Migration
{
    public function up()
    {
        // Check if the column exists before adding it
        if (!Schema::hasColumn('categories', 'parent_id')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->bigInteger('parent_id')->unsigned()->nullable();
            });
        }
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
}
