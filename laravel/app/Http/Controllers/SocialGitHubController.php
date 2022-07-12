<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Socialite;
use App\Models\User;

class SocialGitHubController extends Controller
{
    public function redirectToProvider()
19 {
20 return Socialite::driver('github')->redirect();
21 }
22
23 public function handleProviderCallback()
24 {
25
26 $user = Socialite::driver('github')->user();
27
28 $existingUser = User::where('provider_id', $user->getId())->first();
29
30 if ($existingUser) {
31
32 Auth::login($existingUser);
33
34 } else {
    $newUser = new User();
37
38 $newUser->email = $user->getEmail();
39 $newUser->provider_id = $user->getId();
40 $newUser->handle_github = $user->getNickname();
41 $newUser->password = bcrypt(uniqid());
42
43 $newUser->save();
44
45 Auth::login($newUser);
46
47 }
48
49 flash('Successfully authenticated using GitHub');
50
51 return redirect('/');
52
53 }
54
55 }
}
