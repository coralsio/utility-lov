<?php

namespace Tests\Feature;

use Corals\User\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UtilityListOfValueViewTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $user = User::query()->whereHas('roles', function ($query) {
            $query->where('name', 'superuser');
        })->first();
        Auth::loginUsingId($user->id);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_utility_list_of_value_view()
    {
        $response = $this->get('utilities/list-of-values');

        $response->assertStatus(200)->assertViewIs('utility-lov::index');
    }

    public function test_utility_list_of_value_create()
    {
        $response = $this->get('utilities/list-of-values/create');

        $response->assertStatus(200)->assertViewIs('utility-lov::create_edit');
    }

    public function test_utility_list_of_value_bulk_action()
    {
        $response = $this->post('utilities/list-of-values/bulk-action', [
            'action' => 'active',]);


        $response->assertSeeText('message');
    }
}
