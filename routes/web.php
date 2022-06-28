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

/*Route::get('/', function () {
    return view('site.home.home');
});*/

Route::group(['prefix' => 'dashboard','middleware'=>'auth'],function(){
    Route::resource('users','UsersController');
    Route::get('users/{id}/destroy',[
        'uses'=>'UsersController@destroy',
        'as'=>'dashboard.users.destroy'
    ]);

    Route::resource('categories','CategoriesController');
    Route::get('categories/{id}/destroy',
    ['uses'=>'CategoriesController@destroy',
    'as'=>'dashboard.categories.destroy']);

    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy',
        [
            'uses' => 'TagsController@destroy',
            'as' => 'dashboard.tags.destroy'
        ]
    );
    Route::resource('articles', 'ArticlesController');
    Route::get('articles/{id}/destroy',
        [
            'uses' => 'ArticlesController@destroy',
            'as' => 'dashboard.articles.destroy'
        ]
    );

    Route::get('images',
        [
            'uses' => 'ImagesController@index',
            'as' => 'images.index'
        ]
    );
    Route::post('images',[
        'uses' => 'ImagesController@store',
        'as' => 'images.store'
    ]);
    Route::get('images/generals',[
        'uses' => 'ImagesController@indexGenerals',
        'as' => 'images.indexGenerals'
    ]);  
    
    //Ruta categoriesWork
    Route::Resource('categoriesWork','Work\CategoriesWorkController');
    Route::get('categoriesWork/{id}/destroy',
        [
            'uses' => 'Work\CategoriesWorkController@destroy',
            'as' => 'categoriesWork.destroy'
        ]
        );

    Route::Resource('works','Work\WorksController');
    Route::get('works/{id}/destroy',
        [
            'uses' => 'Work\WorksController@destroy',
            'as' => 'works.destroy'
        ]
    );
    
 
    
   Route::put('tools/{id}',[
       'uses' => 'Work\TechnologiesController@updateTool',
       'as' => 'tools.update'
   ]);
   
    Route::Resource('techs','Work\TechnologiesController');
    Route::get('techs/{id}/index',
        [
            'uses' => 'Work\TechnologiesController@index',
            'as' => 'techs.search.index'
        ]
    );
    Route::get('techs/{id}/destroy',
        [
            'uses' => 'Work\TechnologiesController@destroy',
            'as' => 'techs.destroy'
        ]
    );
    Route::post('techs/storeTool',
        [
            'uses' => 'Work\TechnologiesController@storeTool',
            'as' => 'techs.storeTool'
        ]
    );
    Route::get('tools/{id}/destroy',
        [
            'uses' => 'Work\TechnologiesController@destroyTool',
            'as' => 'tools.destroy'
        ]
    );
    
    Route::get('techtool/list',[
        'uses' => 'Work\TechToolController@list',
        'as' => 'techtool.list'
    ]);
    
});


Route::get("/blog/categories/searchCategory/{slug}/",[
        "uses" => "HomeController@searchCategory",
        "as"  => "blog.search.category"
    ]);
    Route::get("/blog/tags/searchTag/{slug}/",[
        "uses" => "HomeController@searchTag",
        "as"  => "blog.search.tag"
    ]);
    
    Route::get("/portafolio/categories/{slug}/",[
        "uses" => "Work\WorksController@searchWorks",
        "as"  => "portafolio.search.work"
    ]);

Route::get('/dashboard',[function(){return view('dashboard.dashboard');}])
->middleware('auth');

Auth::routes();





Route::get('/',[function(){
    return view('site.home.home');}
])->name('home');

Route::get('/portafolio','Work\WorksController@show')->name('portfolio');
Route::get('portafolio/{slug}',[
    'uses'  => 'Work\WorksController@viewWork',
    'as'    => 'portafolio.work'
]);

Route::get('/blog',[
    "uses" => "HomeController@index",
    "as"   => "blog"
]);
Route::get('/blog/{slug}',[
    "uses"=>"ArticlesController@viewArticle",
    "as"=>"blog.article"
]);

//Route::AJAX('/send','HomeController@msg')->name('send');

Route::post('/send',[
    "uses"=>"HomeController@msg",
    "as"=>"index.send"
]);

Route::get('/logout', ['uses'=> 'Auth\LoginController@logout','as'=>'dashboard.logout'])->name('logout');
