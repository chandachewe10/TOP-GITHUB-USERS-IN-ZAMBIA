<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Zambia\GithubTopCommits;
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



/*
|--------------------------------------------------------------------------
| Save or Update
|--------------------------------------------------------------------------
|
| This is the route which is responsible to save or update 
| Github users in Zambia in the database. This route
| updates 1000 users in the database at once.
|
*/
Route::get('/saveOrUpdate', [GithubTopCommits::class, 'fetch_all_GitHub_Users_In_Zambia'])->name('saveOrUpdate');





/*
|--------------------------------------------------------------------------
| Show Top 1000 Contributors
|--------------------------------------------------------------------------
|
| This is the route which is being used to show 
| the top 1000 Github Contributors in Zambia 
| The users are sorted by contributions.
|
*/

Route::get('/', [GithubTopCommits::class, 'retrieve_users']);  

