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

Route::get('/', ['middleware' => 'guest', function () {
    return view('auth.login');
}]);

Auth::routes();

Route::post('/audits/{audit}', 'AuditController@update')->name('audits.update'); /* mise a jour des données d'un audits*/

Route::post('/tools/nmap', 'ToolController@register')->name('nmap.create'); /*Test : enregistrement des informations d'un scan nmap*/

Route::get('/home', 'HomeController@index')->name('home'); /*page d'accueil*/

Route::get('/audits/create', 'AuditController@create')->name('audits.create'); /*page de création d'un audit*/

Route::post('/audits/create', 'AuditController@store')->name('audits.store'); /*enregistrement de l'audit*/

Route::get('/audits', 'AuditController@index')->name('audits.index'); /*table d'information des audits*/

Route::get('/audits/{audit}/edit', 'AuditController@edit')->name('audits.edit'); /*page de mise a jour d'un audit*/

Route::post('/audits/{audit}/notes', 'NoteController@store'); /*Création de notes sur un audit*/

Route::get('/audits/{audit}', 'AuditController@show')->name('audits.show'); /*page d'information d'un audit*/

Route::get('/tools', 'ToolController@index')->name('tools.index'); /*Page d'index des outils*/

Route::get('/tools/nmap', 'ToolController@nmap')->name('tools.nmap'); /*page de scan nmap*/


