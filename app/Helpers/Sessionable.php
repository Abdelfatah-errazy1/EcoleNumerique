<?php

namespace App\Helpers;

class Sessionable
{


    private $session_name = 'APP_SESSION.';


    public function __construct($dev_key)
    {
        $this->session_name .= $dev_key;
    }


    /**
     * Set controller session
     *
     * @param string|null $view
     * @param string|null $val
     */
    public function set($key, $val, $flash = false)
    {
        if (isset($val) || !empty($val)) {

            $sessionKey = $this->session_name . '.' . $key;
            if ($flash)
                session()->flash($sessionKey, $val);
            else
                session([$sessionKey => $val]);
        }
    }

    /***
     * Get controller session
     *
     * @param $key
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function get($key)
    {

        $sessionKey = $this->session_name . '.' . $key;

        return session($sessionKey);
    }


    /***
     * Check if controller has session
     *
     * Search by the key name
     *
     * @param $key
     * @return bool
     */
    public function has($key)
    {

        $sessionKey = $this->session_name . '.' . $key;
        return session()->has($sessionKey);
    }


    /***
     * Clear controller session by key name
     *
     * @param $key
     * @return void
     */
    public function destroy($key)
    {

        session()->forget($this->session_name . '.' . $key);
    }

    /***
     * Clear all controller sessions
     * @return void
     */
    public function clear()
    {
        session()->forget($this->session_name);
    }

}
