<?php
//listOfValue
Breadcrumbs::register('utility_listOfValues', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(trans('utility_lov::module.listOfValue.title_singular'), url(config('utility_list_of_value.models.listOfValue.resource_url')));
});

Breadcrumbs::register('utility_listOfValue_create_edit', function ($breadcrumbs) {
    $breadcrumbs->parent('utility_listOfValues');
    $breadcrumbs->push(view()->shared('title_singular'));
});
