<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Socialite;
use App\Models\User;
use App\Models\Github;

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
        $existingGithub = Github::where('user_id', $githubUser->getId())->first();
        $existingUser = null;
        if ($existingGithub) {
            $existingUser = User::where('id', $existingGithub->user_id)->first();
        }
        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();

            $newUser->first_name = $githubUser->name;
            $newUser->last_name = '';

            $newUser->email = $githubUser->email;
            $newUser->password = bcrypt(uniqid());
            $newUser->save();

            Github::create([
                'user_id' => $newUser->id,
                'provider_id' => $githubUser->id,
                'handle_github' => $githubUser->nickname,
            ]);

            Auth::login($newUser);
        }

        flash('Successfully authenticated using GitHub');

        return redirect()->route('home');
    }
}
