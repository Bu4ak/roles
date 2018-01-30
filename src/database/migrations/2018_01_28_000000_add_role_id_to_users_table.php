<?php

use Bu4ak\Roles\Enum\RoleType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddRoleIdToUsersTable.
 */
class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table(
            'users',
            function ($table) {
                $table->unsignedTinyInteger('role_id')
                    ->after('id')
                    ->default(RoleType::USER);
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table(
            'users',
            function ($table) {
                $table->dropColumn('role_id');
            }
        );
    }
}
