<?php 

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Team;


class UserProfileComposer
{
    
    public function compose(View $view)
    {
        $view->with('user', Auth::User());
        $view->with('teams', Team::all());
    }
}