<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Controllers\Controller;
use App\Models\Abonnement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $admins = [
            'admins' => \App\Models\Admin::allExceptConnected() ,
            'actions' => [
                new Action(ucwords(trans('app.add')), Action::TYPE_NORMAL, url: route('admin.admins.create')),
                new Action(ucwords(trans('app.delete_all')), Action::TYPE_DELETE_ALL, url: route('admin.admins.destroyGroup'))
            ]

        ];

      return view('admin.dashboard' ,
      [
          'admins' => $admins ,
      ]

      );
    }
}
