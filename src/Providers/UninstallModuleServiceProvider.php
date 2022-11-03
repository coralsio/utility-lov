<?php

namespace Corals\Modules\Utility\ListOfValue\Providers;

use Corals\Foundation\Providers\BaseUninstallModuleServiceProvider;
use Corals\Modules\Utility\ListOfValue\database\migrations\CreateListOfValuesTable;
use Corals\Modules\Utility\ListOfValue\database\seeds\UtilityListOfValueDatabaseSeeder;

class UninstallModuleServiceProvider extends BaseUninstallModuleServiceProvider
{
    protected $migrations = [
        CreateListOfValuesTable::class,
    ];

    protected function providerBooted()
    {
        $this->dropSchema();

        $utilityListOfValueDatabaseSeeder = new UtilityListOfValueDatabaseSeeder();

        $utilityListOfValueDatabaseSeeder->rollback();
    }
}
