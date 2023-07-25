<?php

namespace App\Helpers;

interface ConnectedBase
{
    /***
     * Get connected user
     * @return mixed
     */
    public static function get() : mixed;

    /***
     * check if user connected
     * @return mixed
     */
    public static function check() : bool;


    /***
     * Logout user
     * @return mixed
     */
    public static function logout();

    /***
     * Get gaurd intance
     * @return mixed
     */
    public static function guard(): mixed;





}
