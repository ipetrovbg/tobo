<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDetailsToSomeEntities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('building', function (Blueprint $table) {
		    $table->text('details')->nullable();
		});
		Schema::table('floor', function (Blueprint $table) {
		    $table->text('details')->nullable();
		});
		Schema::table('apartment', function (Blueprint $table) {
		    $table->text('details')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('building', function (Blueprint $table) {
		    $table->dropColumn('details');
		});
		Schema::table('floor', function (Blueprint $table) {
		    $table->dropColumn('details');
		});
		Schema::table('apartment', function (Blueprint $table) {
		    $table->dropColumn('details');
		});
        
    }
}
