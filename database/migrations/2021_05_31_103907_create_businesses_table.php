<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_type_id');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('profile');
            $table->timestamp('verified_at')->nullable();
            $table->float('sms_credit', 8, 2)->nullable();
            $table->boolean('has_changed_logo')->default(false);
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamp('blocked_at')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('featured_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
