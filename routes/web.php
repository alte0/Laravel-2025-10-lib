<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Alte0\Calc\Controllers\CalculateController;

if (Config::get("calculate-lib.enabled", true)) {
    Route::group(
        [
            "prefix" => Config::get("calculate-lib.url_prefix", "calculate"),
            "as" => Config::get("calculate-lib.route_name_prefix", "calculate."),
            "middleware" => ["web"]
        ],
        function () {
            Route::get('/form', [CalculateController::class, 'form']);
        }
    );
}
