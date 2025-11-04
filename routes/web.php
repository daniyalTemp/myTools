<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('init')->group(function () {
    Route::get('/', 'App\Http\Controllers\front\homePageController@index')->name('Home');


    Route::get('/init', 'App\Http\Controllers\front\homePageController@init')->name('Init');
    Route::post('/init', 'App\Http\Controllers\front\homePageController@saveInit')->name('Init.save');
    Route::get('/register', 'App\Http\Controllers\front\authController@register')->name('register');
    Route::post('/register', 'App\Http\Controllers\front\authController@doRegister')->name('doRegister');


    Route::post('/contactMe', 'App\Http\Controllers\front\homePageController@contactMe')->name('contactMe');
    Route::get('/blog/{id}', 'App\Http\Controllers\front\homePageController@showBlog')->name('showBlog');
    Route::get('/login', 'App\Http\Controllers\front\authController@login')->name('login');
    Route::post('/login', 'App\Http\Controllers\front\authController@doLogin')->name('doLogin');
    Route::get('/logout', 'App\Http\Controllers\front\authController@logOut')->name('logOut');


    Route::prefix('admin')->namespace('App\Http\Controllers\admin')->middleware(['auth'])->group(function () {
        Route::get('/', 'dashboardController@index')->name('dashboard.index');


        Route::prefix('projects')->group(function () {
            Route::get('/', 'projectController@index')->name('dashboard.projects');
            Route::get('/add', 'projectController@add')->name('dashboard.projects.new');
            Route::get('/edit/{id}', 'projectController@edit')->name('dashboard.projects.edit');
            Route::post('/save/{id}', 'projectController@save')->name('dashboard.projects.save');

            Route::prefix('type')->group(function () {
                Route::get('/', 'projectController@types')->name('dashboard.projects.types');
                Route::get('/add', 'projectController@addtype')->name('dashboard.projects.type.new');
                Route::get('/edit/{id}', 'projectController@edittype')->name('dashboard.projects.type.edit');
                Route::post('/save/{id}', 'projectController@savetype')->name('dashboard.projects.type.save');

            });
        });

        Route::prefix('resume')->group(function () {
            Route::get('/', 'resumeController@index')->name('dashboard.resumes');

            Route::get('/Education', 'resumeController@addEducation')->name('dashboard.resume.addEducation');
            Route::get('/editEducation/{id}', 'resumeController@editEducation')->name('dashboard.resume.editEducation');
            Route::post('/Education/{id}', 'resumeController@saveEducation')->name('dashboard.resume.saveEducation');


            Route::get('/experience', 'resumeController@addExperience')->name('dashboard.resume.addExperience');
            Route::get('/editExperience/{id}', 'resumeController@editExperience')->name('dashboard.resume.editExperience');
            Route::post('/experience/{id}', 'resumeController@saveExperience')->name('dashboard.resume.saveExperience');

            Route::get('/skill', 'resumeController@addSkill')->name('dashboard.resume.addSkill');
            Route::get('/editSkill/{id}', 'resumeController@editSkill')->name('dashboard.resume.editSkill');
            Route::post('/skill/{id}', 'resumeController@saveSkill')->name('dashboard.resume.saveSkill');


        });


        Route::prefix('blog')->group(function () {
            Route::get('/', 'blogController@index')->name('dashboard.blogs');
            Route::get('/add', 'blogController@add')->name('dashboard.blogs.add');
            Route::get('/edit/{id}', 'blogController@edit')->name('dashboard.blogs.edit');
            Route::post('/save/{id}', 'blogController@save')->name('dashboard.blogs.save');


            Route::prefix('type')->group(function () {
                Route::get('/', 'blogController@types')->name('dashboard.blogs.types');
                Route::get('/add', 'blogController@addtype')->name('dashboard.blogs.type.new');
                Route::get('/edit/{id}', 'blogController@edittype')->name('dashboard.blogs.type.edit');
                Route::post('/save/{id}', 'blogController@savetype')->name('dashboard.blogs.type.save');

            });
        });


        Route::prefix('contact')->group(function () {
            Route::get('/', 'contactController@index')->name('dashboard.contact');
            Route::get('/moveToComment/{id}', 'contactController@moveToComment')->name('dashboard.contact.moveToComment');
            Route::get('/seen/{id}', 'contactController@seen')->name('dashboard.contact.seen');
            Route::get('/showAll', 'contactController@showAll')->name('dashboard.contact.showAll');

        });


        Route::prefix('config')->group(function () {
            Route::get('/', 'configController@index')->name('dashboard.config');
            Route::get('/about', 'configController@editAbout')->name('dashboard.config.about');
            Route::post('/about', 'configController@saveAbout')->name('dashboard.config.about.save');

            Route::get('/contact', 'configController@editContact')->name('dashboard.config.contact');
            Route::post('/contact', 'configController@saveContact')->name('dashboard.config.contact.save');

            Route::get('/service', 'configController@newServices')->name('dashboard.config.services.new');
            Route::get('/serviceEdit/{id}', 'configController@editServices')->name('dashboard.config.services.edit');
//        Route::post('/service', 'configController@saveServices')->name('dashboard.config.services.save');
            Route::post('/service/{id}', 'configController@saveServices')->name('dashboard.config.services.save');


            Route::get('/client', 'configController@newClient')->name('dashboard.config.client.new');
            Route::get('/clientEdit/{id}', 'configController@editClient')->name('dashboard.config.client.edit');
//        Route::post('/service', 'configController@saveServices')->name('dashboard.config.services.save');
            Route::post('/client/{id}', 'configController@saveClient')->name('dashboard.config.client.save');


        });


    });



    Route::prefix('tools')->namespace('App\Http\Controllers\tools')->middleware(['auth'])->group(function () {
        Route::get('/', 'toolscontroller@index')->name('tools.index');
        Route::post('/encrypt', 'encryptioncontroller@encrypt')->name('tools.encrypt');
        Route::post('/decrypt', 'decryptioncontroller@decrypt')->name('tools.decrypt');




//        Route::prefix('projects')->group(function () {
//            Route::get('/', 'projectController@index')->name('dashboard.projects');
//            Route::get('/add', 'projectController@add')->name('dashboard.projects.new');
//            Route::get('/edit/{id}', 'projectController@edit')->name('dashboard.projects.edit');
//            Route::post('/save/{id}', 'projectController@save')->name('dashboard.projects.save');
//
//            Route::prefix('type')->group(function () {
//                Route::get('/', 'projectController@types')->name('dashboard.projects.types');
//                Route::get('/add', 'projectController@addtype')->name('dashboard.projects.type.new');
//                Route::get('/edit/{id}', 'projectController@edittype')->name('dashboard.projects.type.edit');
//                Route::post('/save/{id}', 'projectController@savetype')->name('dashboard.projects.type.save');
//
//            });
//        });




    });

});
