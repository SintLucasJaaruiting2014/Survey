<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('{all}', 'survey.controllers.frontend@show')->where('all', '.*');
Route::post('{all}', 'survey.controllers.frontend@store')->where('all', '.*');


// Route::get('test', function()
// {
// 	$programs = array(
// 		'Creatief vakman',
// 		'Restauratieschilder',
// 		'Mediavormgeving',
// 		'Ruimtelijke presentatie & communicatie',
// 		'Interieur & Exterieur',
// 		'Audiovisuele vormgeving & productie',
// 		'Fotografie',
// 		'Mediavormgeven interactief',
// 		'Game art',
// 		'Media- en gamedevelopment',
// 		'Media- en evenementenmanager',
// 		'Podium- en evenemententechnicus',
// 		'Digital Publisher',
// 		'Signmaker',
// 		'Printoperator',
// 		'Standbouwer'
// 	);

// 	foreach($programs as $program)
// 	{
// 		$model = new SintLucas\School\Program(array(
// 			'name' => $program
// 		));
// 		$model->save();
// 	}
// });