<?php

namespace App\Enums;

enum AdminStatus: int
{
    case INACTIVE = 0;
    case ACTIVE = 1;
    case BLOCKED = 2;


    public function text()
    {
        return match ($this) {
            self::ACTIVE =>trans('active'),
            self::INACTIVE => trans('inactive'),
            self::BLOCKED =>trans('blocked'),
        };
    }

    public function class()
    {
        return match ($this) {
            self::ACTIVE =>   'success',
            self::INACTIVE => 'warning',
            self::BLOCKED =>  'danger',
        };
    }

    public static function toArray(){
        return [
            self::INACTIVE->value => self::INACTIVE->text(),
            self::ACTIVE->value => self::ACTIVE->text(),
            self::BLOCKED->value => self::BLOCKED->text(),
        ];
    }


}
