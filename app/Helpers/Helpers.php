
<?php

use Illuminate\Support\Facades\Auth;

function check_user_permissions($permission)
{
    $user = Auth::user();

    //dd($user);

    if ($user && $user->can($permission)) {
        return true;
    }

    return abort(403, "Oops ! You don't have access to this module.");
}