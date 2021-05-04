<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserRivalController;
use App\Http\Controllers\TeamRivalController;
use App\Models\User;
use App\Models\Team;

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

Route::get('/', function () {
    return view('admin.layout');
});

Route::get('/teams/teams', function () {
    return view('admin.teams.teams', [
        'teams' => Team::all(),
    ]);
});

Route::get('/teams/fix-a-match', function () {
    return view('admin.teams.fix', [
        'teams' => Team::all(),
        'team1' => '',
        'team2' => '',
        'matchDate' => '',
        'matchTime' => '',
    ]);
});

Route::get('/teams/matches', function () {
    return view('admin.teams.matches', [
        'teams' => Team::all(),
    ]);
});

Route::post('/teams/fix', [TeamRivalController::class, 'store']);
  
Route::resource('/users', UserController::class);

Route::resource('/teams', TeamController::class);
Route::resource('/teams/add', TeamController::class);
Route::resource('/profile/set-team', UserController::class);


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/home/rivals', function () {
        return view('user.profile.rivals.layout');
    });

    Route::get('/home/rivals/invite', function () {
        return view('user.profile.rivals.invite', [
            'users' => User::all(),
            'activeUser' => request()->user(),
        ]);
    });

    Route::get('/home/rivals/sent-invites', function () {
        return view('user.profile.rivals.sentInvites');
    });
    
    Route::get('/home/rivals/pending-invites', function () {
        return view('user.profile.rivals.pendingInvites');
    });

    // User invitation routes    
    Route::get('/home/rivals/invite/{id}', [UserRivalController::class, 'store']);
    Route::get('/home/rivals/accept/{id}', [UserRivalController::class, 'update']);   
    Route::get('/home/rivals/cancel/{id}', [UserRivalController::class, 'destroy']);

    Route::get('/home/rivals/search-user', function () {
        // $username = request()->input('search-user');
        // $user = Auth::user();
        // if ($user->name !== $username) {
        //     $users = User::where('name', $username)->get();
        //     return view('user.profile.rivals.invite', [
        //         'users' => $users,
        //     ]);
        // } else {
        //     return redirect('/home/rivals/invite');
        // }

        
    });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

