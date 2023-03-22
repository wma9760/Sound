<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AlbumdbController;
use App\Http\Controllers\dashboard\ArtistdbController;
use App\Http\Controllers\dashboard\SliderdbController;
use App\Http\Controllers\dashboard\SongsdbController;
use App\Http\Controllers\dashboard\ResetdbController;
use App\Http\Controllers\dashboard\LoginController;
use App\Http\Controllers\dashboard\UserdbController;
use App\Http\Controllers\dashboard\LaguagesdbController;
use App\Http\Controllers\dashboard\GeneredbController;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\AudiodbController;
use App\Http\Controllers\dashboard\VediodbController;
use App\Http\Controllers\dashboard\AudioAlbumController;
use App\Http\Controllers\dashboard\VedioAlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\VedioCommentController;

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



/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index',''])->name('home');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('rating/audio', [RatingsController::class, 'add'])->name('rating.audio');
Route::post('rating/vedio', [RatingsController::class, 'rate'])->name('rating.vedio');
Route::get('artist/view/{id?}/', [HomeController::class, 'view'])->name("artist.view");
Route::get('gnere/gnereview/{id?}/', [HomeController::class, 'gnereview'])->name("gnere.view");
Route::post('/comment/store', [CommentController::class,'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add');
Route::post('vedio/comment/store', [VedioCommentController::class,'store'])->name('vediocomment.add');
Route::post('vedio/reply/store', [VedioCommentController::class,'replyStore'])->name('vedioreply.add');
Route::get('search', [HomeController::class,'search'])->name('search');
Route::group(array('as'=>'home.','prefix'=>'home'),function(){
Route::get('/artist', [HomeController::class, 'artist'])->name("artist");
Route::get('/album', [HomeController::class, 'album'])->name("album");
Route::get('/gnere', [HomeController::class, 'gnere'])->name("gnere");
Route::get('/track', [HomeController::class, 'track'])->name("track");
Route::post('/language', [HomeController::class, 'language'])->name("langauage");
Route::get('addAudio/', [AudiodbController::class, 'create'])->name("addAudio");
Route::post('addAudio/', [AudiodbController::class, 'store'])->name("addAudio");
Route::get('addVedio/', [VediodbController::class, 'create'])->name("addVedio");
Route::post('addVedio/', [VediodbController::class, 'store'])->name("addVedio");
Route::get('playvedio/{id?}/', [HomeController::class, 'playvedio'])->name("playvedio");
Route::get('playaudio/{id?}/', [HomeController::class, 'playaudio'])->name("playaudio");
Route::get('albumviewaudio/{id?}/', [HomeController::class, 'albumviewaudio'])->name("albumviewaudio");
Route::get('albumviewvedio/{id?}/', [HomeController::class, 'albumviewvedio'])->name("albumviewvedio");
});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name("admin");
    // Route::get('/', [HomeController::class, 'adminHome'])->name('home');

    // Route::get('/', [SiteHomeController::class, 'index'])->name('home');

    // userdb
Route::group(array('as'=>'user.'),function(){
    Route::get('/userdb', [UserdbController::class, 'index'])->name("index");
    Route::get('/userdbcreate', [UserdbController::class, 'create'])->name("create");
    Route::post('/userdbcreate', [UserdbController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[UserdbController::class,'delete'])->name("delete");
    Route::get('userupdate/{id?}/',[UserdbController::class,'update'])->name("update");
    Route::post('userupdate/{id?}/',[UserdbController::class,'updatedb'])->name("update");
    Route::get('userprofile/{id?}/',[UserdbController::class,'user'])->name("userprofile");
    });

// Artistdb
Route::group(array('as'=>'artist.','prefix'=>'artist'),function(){
    Route::get('artistdb/', [ArtistdbController::class, 'index'])->name("index");
    Route::get('create/', [ArtistdbController::class, 'create'])->name("create");
    Route::post('create/', [ArtistdbController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[ArtistdbController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[ArtistdbController::class,'update'])->name("update");
    Route::post('update/{id?}/',[ArtistdbController::class,'updatedb'])->name("update");
    Route::get('artistprofile/{id?}/',[ArtistdbController::class,'artist'])->name("artistprofile");
        });

    //  Gnere
    Route::group(array('as'=>'gnere.','prefix'=>'gnere'),function(){
    Route::get('/', [GeneredbController::class, 'index'])->name("index");
    Route::get('create/', [GeneredbController::class, 'create'])->name("create");
    Route::post('create/', [GeneredbController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[GeneredbController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[GeneredbController::class,'update'])->name("update");
    Route::post('update/{id?}/',[GeneredbController::class,'updatedb'])->name("update");
        });

    //  Language
    Route::group(array('as'=>'language.','prefix'=>'language'),function(){
    Route::get('/', [LaguagesdbController::class, 'index'])->name("index");
    Route::get('create/', [LaguagesdbController::class, 'create'])->name("create");
    Route::post('create/', [LaguagesdbController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[LaguagesdbController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[LaguagesdbController::class,'update'])->name("update");
    Route::post('update/{id?}/',[LaguagesdbController::class,'updatedb'])->name("update");
        });

    //  Audioes
    Route::group(array('as'=>'audio.','prefix'=>'audio'),function(){
    Route::get('/', [AudiodbController::class, 'index'])->name("index");
    Route::get('/useraudio', [AudiodbController::class, 'useraudio'])->name("useraudio");
    Route::get('create/', [AudiodbController::class, 'create'])->name("create");
    Route::post('create/', [AudiodbController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[AudiodbController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[AudiodbController::class,'update'])->name("update");
    Route::post('update/{id?}/',[AudiodbController::class,'updatedb'])->name("update");
    Route::get('aprove/{id?}/',[AudiodbController::class,'aprove'])->name("aprove");
    });
    //  Vedio
    Route::group(array('as'=>'vedio.','prefix'=>'vedio'),function(){
    Route::get('/', [VediodbController::class, 'index'])->name("index");
    Route::get('/uservedio', [VediodbController::class, 'uservedio'])->name("uservedio");
    Route::get('create/', [VediodbController::class, 'create'])->name("create");
    Route::post('create/', [VediodbController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[VediodbController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[VediodbController::class,'update'])->name("update");
    Route::post('update/{id?}/',[VediodbController::class,'updatedb'])->name("update");
    Route::get('aprove/{id?}/',[VediodbController::class,'aprove'])->name("aprove");

    });
    //  Album
    Route::group(array('as'=>'album.','prefix'=>'album'),function(){
    Route::get('/', [AlbumdbController::class, 'index'])->name("index");
    Route::get('albumlist/{id?}/', [AlbumdbController::class, 'albumlist'])->name("albumlist");
    Route::get('play/{id?}/', [AlbumdbController::class, 'play'])->name("play");
    Route::get('create/', [AlbumdbController::class, 'create'])->name("create");
    Route::post('create/', [AlbumdbController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[AlbumdbController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[AlbumdbController::class,'update'])->name("update");
    Route::post('update/{id?}/',[AlbumdbController::class,'updatedb'])->name("update");

    });
    //  AudioAlbum
    Route::group(array('as'=>'audioalbum.','prefix'=>'audioalbum'),function(){
    Route::get('/', [AudioAlbumController::class, 'index'])->name("index");
    Route::get('create/', [AudioAlbumController::class, 'create'])->name("create");
    Route::post('create/', [AudioAlbumController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[AudioAlbumController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[AudioAlbumController::class,'update'])->name("update");
    Route::post('update/{id?}/',[AudioAlbumController::class,'updatedb'])->name("update");
    });
    //  VedioAbum
    Route::group(array('as'=>'vedioalbum.','prefix'=>'vedioalbum'),function(){
    Route::get('/', [VedioAlbumController::class, 'index'])->name("index");
    Route::get('create/', [VedioAlbumController::class, 'create'])->name("create");
    Route::post('create/', [VedioAlbumController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[VedioAlbumController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[VedioAlbumController::class,'update'])->name("update");
    Route::post('update/{id?}/',[VedioAlbumController::class,'updatedb'])->name("update");
    });
    //  Slider
    Route::group(array('as'=>'slider.','prefix'=>'slider'),function(){
    Route::get('/', [SliderdbController::class, 'index'])->name("index");
    Route::get('create/', [SliderdbController::class, 'create'])->name("create");
    Route::post('create/', [SliderdbController::class, 'store'])->name("create");
    Route::get('delete/{id?}/',[SliderdbController::class,'delete'])->name("delete");
    Route::get('update/{id?}/',[SliderdbController::class,'update'])->name("update");
    Route::post('update/{id?}/',[SliderdbController::class,'updatedb'])->name("update");
    });
    //
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:manager'])->group(function () {

//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
