<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('cruises');
});

// Route::get('/data/data', function () {
//   return response()->json([
//       "cruise_lines" => [
//      [
//       "cruise_line_id"=> 1,
//       "cruise_line_name"=> "Trogdor Cruises",
//       "cruise_ship_name"=> "Burninator"
//      ],
//     [
//       "cruise_line_id"=> 5,
//       "cruise_line_name"=> "Moon Kingdom Cruises",
//       "cruise_ship_name"=> "Saturn"
//     ],
//     [
//       "cruise_line_id"=> 8,
//       "cruise_line_name"=> "Revelexiclus Cruises",
//       "cruise_ship_name"=> "PHPers"
//     ]
//   ]]);
// });