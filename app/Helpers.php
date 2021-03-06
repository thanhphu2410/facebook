<?php

use App\Services\HasLiked;
use App\Services\FriendHelper;
use Illuminate\Support\Facades\File;

if (! function_exists('fr_helper')) {
    function fr_helper($user_id = 0)
    {
        return new FriendHelper($user_id);
    }
}

if (! function_exists('has_liked')) {
    function has_liked($post_id)
    {
        return (new HasLiked($post_id))->execute();
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
        $default_files = ['/images/avatar.png', '/images/over-photo.jpeg'];
        if (!in_array($path, $default_files)) {
            File::delete(substr($path, 1)); // remove the first "/" of the path then remove the file
        }
    }
}
