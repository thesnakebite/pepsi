<?php

Route::group(['prefix' => 'promotions'], function () {
    Route::group(['prefix' => 'refrescos'], function () {
        Route::module('refrescoPrizes');
        Route::module('refrescoParticipants');
        Route::module('refrescos');
        
        Route::module('refrescoWintimes');
        Route::module('refrescoEmails');
        Route::get('dashboard',  'RefrescoDashboardController@show')->name('promotions.refrescos.dashboard')->middleware(['can:list']);
        Route::post('/refrescoEmails/{email}/test',  'RefrescoEmailController@test')->name('promotions.refrescos.email')->middleware(['can:edit']);
    });
});
