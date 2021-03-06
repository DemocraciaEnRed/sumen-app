<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class SumenStart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description',550);
            $table->timestamps();
        });
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('objectives', function (Blueprint $table) {
            $table->boolean('completed')->default(false)->after('map_geometries');
        });
        Schema::table('goals', function (Blueprint $table) {
            $table->string('total_budget')->nullable()->after('source');
            $table->string('executed_budget')->nullable()->after('total_budget');
            $table->string('request_info_url',550)->nullable()->after('executed_budget');
        });
        Schema::create('goal_company', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_id')->constrained('goals')->onDelete('cascade');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
        });
        Schema::create('goal_district', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_id')->constrained('goals')->onDelete('cascade');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
        });
        Schema::create('goal_related_objective', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_id')->constrained('goals')->onDelete('cascade');
            $table->foreignId('objective_id')->constrained('objectives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goal_related_objective');
        Schema::dropIfExists('goal_company');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('districts');
        Schema::table('goals', function (Blueprint $table) {
            $table->dropColumn(['total_budget','executed_budget','request_info_url']);
        });
        Schema::table('objectives', function (Blueprint $table) {
            $table->dropColumn('completed');
        });
    }
}
