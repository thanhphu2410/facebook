<?php

use App\Services\FriendHelper;
use Illuminate\Support\Facades\File;

if (! function_exists('fr_helper')) {
    function fr_helper($user_id = 0)
    {
        return new FriendHelper($user_id);
    }
}

if (! function_exists('store_file')) {
    function store_file($image, $folder)
    {
        return $image->store("uploads/$folder", 'public');
    }
}

if (! function_exists('delete_file')) {
    function delete_file($path)
    {
        File::delete(substr($path, 1)); // remove the first "/" of image path
    }
}
