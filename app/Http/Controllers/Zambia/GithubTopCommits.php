<?php

namespace App\Http\Controllers\Zambia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GitHubUsers as Top_GitHub_Contributors_In_Zambia;
use Illuminate\Support\Facades\Http;

class GithubTopCommits extends Controller
{
    public function __construct()
    {
        set_time_limit(8000000);
    }

    

    public function fetch_all_GitHub_Users_In_Zambia()
    {


/*
|--------------------------------------------------------------------------
| Get All
|--------------------------------------------------------------------------
|
| Here we have the API which is being used to fetch 
| all Github users in Zambia from GitHub. The 
| API only fetches 1000 users due to GitHub.
|Limitations on fetching GitHub users
|
|
*/

    for ($i=1; $i < 10; $i++) {
        $users =  Http::get("api.github.com/search/users?q=location:zambia&since=1&per_page=100&page=$i");
        $users_results = $users->object();
        $response_headers = $users->headers();
        $total_users = $users_results->total_count;
        $names = $users_results->items;


        

        foreach ($names as $user_data) {
            $store_or_update = Top_GitHub_Contributors_In_Zambia::where('name', "=", $user_data->login)->first();
            if (is_null($store_or_update)) {
                $save_new_github_user = new Top_GitHub_Contributors_In_Zambia;
                $save_new_github_user->avatar = $user_data->avatar_url;
                $save_new_github_user->name = $user_data->login;
                $save_new_github_user->type = $user_data->type;
                $contributions_data = Http::get("github-contributions-api.deno.dev/$user_data->login");
                $contributions = explode(' ', $contributions_data);
                $save_new_github_user->contributions = $contributions[0];
                $save_new_github_user->country = "ZAMBIA";
                $save_new_github_user->save();
            } else {
                $store_or_update->avatar = $user_data->avatar_url;
                $store_or_update->name = $user_data->login;
                $store_or_update->type = $user_data->type;
                $store_or_update->contributions = Http::get("github-contributions-api.deno.dev/$user_data->login");
                $store_or_update->country = "ZAMBIA";
                $store_or_update->save();
            }
        }

             
            
        
    }

    return "Save or Updated Successfully";
}







/*
|--------------------------------------------------------------------------
| Fetch All From DB
|--------------------------------------------------------------------------
|
| Here we have the API which is being used to fetch 
| all indiviual GitHub Contributions for users
| in Zambia from the database sorted by  
| Contributions from High to low
|
|
*/

    
    public function retrieve_users()
    {
        /*

          This is the GitHub API to fetch all
          users stored in the database

          */
       $retrive_all = Top_GitHub_Contributors_In_Zambia::orderBy('contributions', 'DESC')->get();
       return view('welcome', compact('retrive_all'));
    }
}
