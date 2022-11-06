<?php

namespace Corals\Modules\Utility\ListOfValue\Policies;

use Corals\Foundation\Policies\BasePolicy;
use Corals\Modules\Utility\ListOfValue\Models\ListOfValue;
use Corals\User\Models\User;

class ListOfValuePolicy extends BasePolicy
{
    protected $administrationPermission = 'Administrations::admin.utility_listOfValue';

    /**
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        if ($user->can('Utility::listOfValue.view')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('Utility::listOfValue.create');
    }

    /**
     * @param User $user
     * @param ListOfValue $listOfValue
     * @return bool
     */
    public function update(User $user, ListOfValue $listOfValue)
    {
        if ($user->can('Utility::listOfValue.update')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @param ListOfValue $listOfValue
     * @return bool
     */
    public function destroy(User $user, ListOfValue $listOfValue)
    {
        if ($user->can('Utility::listOfValue.delete')) {
            return true;
        }

        return false;
    }
}
