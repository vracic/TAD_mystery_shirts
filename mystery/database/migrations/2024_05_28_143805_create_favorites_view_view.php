<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE VIEW favorites_view AS 
                        SELECT packages.id, packages.name_en, packages.type_en, count(user_id) as favorites_count 
                        FROM packages left join favorites on packages.id = favorites.package_id
                        GROUP BY packages.id, packages.name_en, packages.type_en
                        ORDER BY favorites_count desc');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS favorites_view');
    }
};
