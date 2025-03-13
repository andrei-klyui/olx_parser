<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| Because these are all assigned the "api" middleware group, traditional auth does not apply.
| For the same endpoints to work off of web auth, add similar endpoints to the web routes configuration file.
*/

use App\Http\Controllers\Api\SubscriptionController;
use Illuminate\Support\Facades\Route;

// parse route
Route::post('/subscribe', [SubscriptionController::class, 'subscribe']);
