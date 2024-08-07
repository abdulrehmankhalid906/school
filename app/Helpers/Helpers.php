
<?php

use Illuminate\Support\Facades\Auth;

function check_user_permissions($permission)
{
    $user = Auth::user();

    //Checkigng if the user has permission true mean 'yes' false means 'no'
    // dd($user->can($permission)); 

    if ($user && $user->can($permission)) {
        return true;
    }

    return abort(403, "Oops ! You don't have access to this module.");
}