<?php

use App\Services\FriendHelper;

if (! function_exists('fr_helper')) {
    function fr_helper($user_id = 0)
    {
        return new FriendHelper($user_id);
    }
}
