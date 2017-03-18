<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDbStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
   {
     Schema::table('comments', function (Blueprint $table) {
       $table->dropIndex(['body']);
       $table->string('body')->unindex()->change();

     });
     Schema::table('comments', function (Blueprint $table) {
         $table->text('body')->change();
         $table->renameColumn('body', 'tags');
     });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('body');
    }
}
