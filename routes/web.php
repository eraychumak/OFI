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

Auth::routes();

Route::get("/", "QuestionnaireController@index");

Route::get("/questionnaires/create", "QuestionnaireController@create")->middleware("auth");
Route::post("/questionnaires/create", "QuestionnaireController@store")->middleware("auth");
Route::get("/questionnaires/{questionnaire}", "QuestionnaireController@show");
Route::get("/questionnaires/{questionnaire}/edit", "QuestionnaireController@edit")->middleware("auth");
Route::put("/questionnaires/{questionnaire}/update", "QuestionnaireController@update")->middleware("auth");
Route::delete("/questionnaires/{questionnaire}", "QuestionnaireController@destroy")->middleware("auth");

Route::post("/questionnaires/{questionnaire}/submit", "RespondentController@create");
Route::get("/questionnaires/{questionnaire}/responses", "RespondentController@index")->middleware("auth");

Route::get("/questionnaires/{questionnaire}/questions/create", "QuestionController@create")->middleware("auth");
Route::post("/questionnaires/{questionnaire}/questions/create", "QuestionController@store")->middleware("auth");
Route::get("/questionnaires/{questionnaire}/questions/{question}", "QuestionController@show")->middleware("auth");
Route::put("/questionnaires/{questionnaire}/questions/{question}", "QuestionController@update")->middleware("auth");
Route::delete("/questionnaires/{questionnaire}/questions/{question}", "QuestionController@destroy")->middleware("auth");
