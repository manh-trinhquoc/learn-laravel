<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Socialite;
use App\Models\User;

class SocialGitHubController extends Controller
{
    public function redirectToProvider()
    {
        // var_dump(config('services.github.client_id'));
        // var_dump(config('services.github.client_secret'));
        // var_dump(config('services.github.redirect'));
        // die(__FILE__);

        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        // var_dump($githubUser);
        // die(__FILE__);

        $existingUser = User::where('provider_id', $githubUser->getId())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();

            $newUser->first_name = $githubUser->name;
            $newUser->last_name = '';
            $newUser->title = '';
            $newUser->zip_code = '';
            $newUser->time_zone = '';
            $newUser->email = $githubUser->email;
            $newUser->provider_id = $githubUser->id;
            $newUser->handle_github = $githubUser->nickname;
            $newUser->password = bcrypt(uniqid());

            $newUser->save();

            Auth::login($newUser);
        }

        flash('Successfully authenticated using GitHub');

        return redirect()->route('home');
    }
}
