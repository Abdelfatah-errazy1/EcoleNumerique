<?php

namespace App\Models;

use App\Enums\AdminGender;
use App\Enums\AdminRole;
use App\Enums\AdminStatus;
use App\Helpers\ConnectedAdmin;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    public const  PK = 'id';

    protected $casts = [
        'status' => AdminStatus::class,
        'role' => AdminRole::class,
        'gender' => AdminGender::class,
    ];

    protected $dates = [
        'birthday', 'last_seen'
    ];


    public function fullName()
    {
        return ucfirst($this['first_name']) . ' ' . ucfirst($this['last_name']);
    }


    /**
     * Model boot
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        /**
         * Model event
         */
        static::created(function ($admin) {
            $admin->update([
                config('tables.admins.columns.created_by') => ConnectedAdmin::check() ? ConnectedAdmin::get()[config('tables.admins.columns.id')] : ''
            ]);
        });

    }

    /***
     * Make email is the password for all admins
     * @return void
     */
    public static function resetToDefaultPassword()
    {
        self::all()->map(function (Model $admin) {
            $admin->update([
                config('tables.admins.columns.password') => \Hash::make($admin[config('tables.admins.columns.email')])
            ]);
        });
    }

    /***
     * Get All admin exept connected admin
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function allExceptConnected(): \Illuminate\Database\Eloquent\Collection
    {
        return self::all()
            ->except(\App\Helpers\ConnectedAdmin::get()[config('tables.admins.columns.id')]);
    }


}
