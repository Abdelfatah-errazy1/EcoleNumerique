<?php

namespace App\Http\Controllers\Office\Auth;

use App\Helpers\Sessionable;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\OfficeAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{


    public $session;


    public function __construct()
    {
        $this->session = new Sessionable('mrx');
    }


    public function checkToken($token)
    {

        $office = OfficeAccount::query()
            ->where(config('tables.office.columns.token'), $token)
            ->first();

        if (isset($office)) {
            $from = Carbon::parse($office[config('tables.office.columns.token_create_at')]);

            if (now()->diffInMinutes($from) > config('configs.reset_password_expiration_link')) {
                abort('404');
            } else {
                $this->session->set('office_id', $office[config('tables.office.columns.id')]);
                return view('office.auth.new_password');
            }

        }
        return redirect(route('office.login.view'));

    }

    public function changePassword(Request $request)
    {


        $office = OfficeAccount::query()->findOrFail($this->session->get('office_id'));

        if (isset($office)) {
            $from = Carbon::parse($office[config('tables.office.columns.token_created_at')]);


            if (now()->diffInMinutes($from) > config('configs.reset_password_expiration_link')) {
                abort('404');
            } else {
                $res = $request->validate([
                    'password' => 'required|same:confirm-password',
                    'confirm-password' => 'required||same:confirm-password',
                ]);
                $office->update([
                    'password' => \Hash::make($res['password']),
                ]);
                \Auth::guard('office')->login($office);
                return redirect(route('office.dashboard'));
            }

        }
    }
}
