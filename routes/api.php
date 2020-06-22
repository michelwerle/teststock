<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.', 'middleware' => 'auth:api'], function () {
    Route::get('produits/{id}/stats', 'ProduitsController@statistiques');
    Route::resource('produits', 'ProduitsController', ['except' => ['create', 'edit']]);

});
