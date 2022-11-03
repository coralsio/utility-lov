<?php

namespace Corals\Modules\Utility\ListOfValue\Providers;

use Corals\Foundation\Providers\BaseInstallModuleServiceProvider;
use Corals\Modules\Utility\ListOfValue\database\migrations\CreateListOfValuesTable;
use Corals\Modules\Utility\ListOfValue\database\seeds\UtilityListOfValueDatabaseSeeder;

class InstallModuleServiceProvider extends BaseInstallModuleServiceProvider
{
    protected $migrations = [
        CreateListOfValuesTable::class,
    ];

    protected function providerBooted()
    {
        $this->createSchema();

        $utilityListOfValueDatabaseSeeder = new UtilityListOfValueDatabaseSeeder();

        $utilityListOfValueDatabaseSeeder->run();
    }
}
