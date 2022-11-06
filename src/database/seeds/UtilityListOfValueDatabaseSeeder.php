<?php

namespace Corals\Modules\Utility\ListOfValue\database\seeds;

use Corals\User\Models\Permission;
use Illuminate\Database\Seeder;

class UtilityListOfValueDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UtilityListOfValuePermissionsDatabaseSeeder::class);
        $this->call(UtilityListOfValueMenuDatabaseSeeder::class);
    }

    public function rollback()
    {
        Permission::where('name', 'like', 'Utility::listOfValue%')->delete();
        Permission::where('name', 'Administrations::admin.utility_listOfValue')->delete();
    }
}
