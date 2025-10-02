<?php

Route::middleware('auth')->group(function ($route) {
	$route->get('hasil-usg', [\App\Http\Controllers\EfktpHasilUsgController::class, 'first']);
	$route->post('hasil-usg', [\App\Http\Controllers\EfktpHasilUsgController::class, 'create']);
});

