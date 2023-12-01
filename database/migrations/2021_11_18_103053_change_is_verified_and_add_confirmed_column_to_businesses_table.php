<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIsVerifiedAndAddConfirmedColumnToBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->boolean('is_verified')->default(true)->change();
            $table->boolean('is_confirmed')->default(false)->after('is_verified');
            $table->timestamp('confirmed_at')->nullable()->after('activated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->boolean('is_verified')->default(false)->change();
            $table->dropColumn('is_confirmed');
            $table->dropColumn('confirmed_at');
        });
    }
}
