<?php

Route::middleware('auth')->group(function ($route) {
	$route->post('hasil-usg', [\App\Http\Controllers\EfktpHasilUsgController::class, 'create']);
});

