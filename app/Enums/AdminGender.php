<?php

namespace App\Enums;

enum AdminGender: string
{
    case MAN ='M';
    case WOMAN = 'W';

    public  function text()
    {
        return match ($this) {
            self::MAN => trans('app.man'),
            self::WOMAN => trans('app.woman'),
        };
    }


    public static function toArray(){
        return [
          self::MAN->value => self::MAN->text(),
          self::WOMAN->value => self::WOMAN->text(),
        ];
    }

}
