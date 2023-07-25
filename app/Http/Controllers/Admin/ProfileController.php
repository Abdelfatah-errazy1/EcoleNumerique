<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ConnectedAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\SaveDetailsRequest;
use App\Models\Admin;
use Database\Factories\AdminFactory;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class ProfileController extends Controller
{
    /***
     * profile view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.profile');
    }


    public function saveDetails(SaveDetailsRequest $request)
    {

        $avatar_column_name = config('tables.admins.columns.photo');
        $validated = $request->validated();
        unset($validated[$avatar_column_name]);
        $this->saveAndDeleteOld($request->validated()[$avatar_column_name] ?? null, 'admins', ConnectedAdmin::get(), $avatar_column_name);
        ConnectedAdmin::get()->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return back();

    }

}
