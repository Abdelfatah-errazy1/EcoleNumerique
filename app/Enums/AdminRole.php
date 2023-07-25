<?php

namespace App\Enums;

enum AdminRole: string
{
    case ADMIN = 'A';
    case SUPER_ADMIN = 'SA';
    case LIMITED_ADMIN = 'LA';


    public function text()
    {
        return match ($this) {
            self::ADMIN => trans('admin'),
            self::SUPER_ADMIN => trans('superadmin'),
            self::LIMITED_ADMIN =>trans('limitedadmin'),
        };
    }

    public function class()
    {
        return match ($this) {
            self::ADMIN => 'success',
            self::SUPER_ADMIN => 'secondary',
            self::LIMITED_ADMIN =>'danger',
        };
    }


}
