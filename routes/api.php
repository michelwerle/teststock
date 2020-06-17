<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.', 'middleware' => 'auth:api'], function () {
    Route::resource('produits', 'ProduitsController', ['except' => ['create', 'edit']]);
});
