<?php

namespace App\Helpers;


use Illuminate\Database\Eloquent\Model;

class ConnectedAdmin implements ConnectedBase
{


    public static function get(): Model
    {
        return self::guard()->user();
    }

    public static function check(): bool
    {
        return self::guard()->check();
    }

    public static function logout()
    {
        return self::guard()->logout();
    }

    public static function guard(): mixed
    {
        return auth()->guard('admin');
    }
}
