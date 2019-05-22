<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

Route::get('/edit_basic_information/{id}', ['as'=>'edit_basic_information','uses'=>'ChangeBasicInfoController@editBasicInformation']);

Route::post('/update_basic_information', ['as'=>'update_basic_information','uses'=>'ChangeBasicInfoController@updateBasicInformation']);


Route::get('/tracks','UploadController@index')->name('tracks');

Route::get('/add_track','UploadController@add_track')->name('add_track');

Route::post('/add_track','UploadController@add_track_post')->name('add_track');

Route::get('/edit_track/{id}','UploadController@edit_track')->name('edit_track');

Route::post('/edit_track','UploadController@edit_track_post')->name('update_track');

Route::get('/delete_track/{id}','UploadController@delete_track')->name('delete_track');

Route::post('/upload', 'UploadController@upload')->name('upload');

Route::post('/delete_upload','UploadController@delete_uploaded')->name('delete_upload');




Auth::routes();

Route::get('/', 'StatisticsController@viewStatistics');
Route::get('/home', 'HomeController@index')->name('home');


Route::resource("/genre", "GenreController");
Route::resource("/artist", "ArtistController");
Route::resource("/album", "AlbumController");
Route::post("/search", "PlayerController@search");
Route::get('audio/{id}', 'PlayerController@getAudio');
Route::get('play/song/{id}', 'PlayerController@loadSong');
Route::post('/like_song', 'PlayerController@likeSong');
Route::post('/dislike_song', 'PlayerController@dislikeSong');

Route::post("/post_comment", "CommentController@postComment");
Route::get("/delete_comment/{id}", "CommentController@deleteComment");
Route::post("/like_comment", "CommentController@likeComment");
Route::post("/dislike_comment", "CommentController@dislikeComment");

Route::get('/statistics/mostListened', 'StatisticsController@mostListenedTracks');
Route::get('/statistics/mostLiked', 'StatisticsController@mostLikedTracks');
Route::get('/statistics/mostDisliked', 'StatisticsController@mostDislikedTracks');
Route::get('/statistics/mostRecent', 'StatisticsController@mostRecentTracks');

Route::get('/statistics', 'StatisticsController@viewStatistics');
Route::get('/history', 'PlayerController@history');
Route::get('/trending', 'PlayerController@trending');

Route::get('/subscriptions', 'SubscriptionController@index');
Route::get('subscriptions/{id}', 'SubscriptionController@viewTracks');
Route::get('subscribeTo/{id}', 'SubscriptionController@subscribe');






