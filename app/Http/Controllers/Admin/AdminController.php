<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminStatus;
use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\AddAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Admin::factory()->create(10);
        $actions = [
            new Action(ucwords(trans('app.add')), Action::TYPE_NORMAL, url: route('admin.admins.create')),
            new Action(ucwords(trans('app.delete_all')), Action::TYPE_DELETE_ALL, url: route('admin.admins.destroyGroup'))
        ];
        $admins = \App\Models\Admin::allExceptConnected();

        return view('admin.admins.index', compact('actions', 'admins'));
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $model = Admin::query()->findOrFail($id);

        return view('admin.admins.edit', [
            'model' => $model
        ]);
    }

    /***
     * Delete one record by id if exists
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Admin::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return back();
    }

    /***
     * Delete multi records
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyGroup(Request $request)
    {

        $ids = $request['ids'] ?? [];
        if (is_array($ids)) {
            foreach ($ids as $id) {
                $model = Admin::query()->find($id);
                $model?->delete();
            }
            $this->success(text: trans('messages.deleted_message'));
        } else {
            $this->success(text: trans('messages.try_again_message'));
        }
        return response()->json(['reload' => true]);
    }

    /***
     * @param AddAdminRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \League\Flysystem\FilesystemException
     */
    public function store(AddAdminRequest $request)
    {
        $avatar_column_name = config('tables.admins.columns.photo');
        $validated = $request->validated();
        $path = $this->saveFile('admins', $request->validated()[$avatar_column_name]);
        $validated[$avatar_column_name] = $path;
        $admin = Admin::query()->create($validated);

        $this->success(text: trans('messages.added_message'));
        return redirect(route('admin.admins.show', $admin[config('tables.admins.columns.id')]));
    }


    public function updateStatus($id, Request $request)
    {
        if ($request->has('status') && AdminStatus::tryFrom($request->get('status') !== null)) {
            Admin::query()->findOrFail($id)->update([
                config('tables.admins.columns.status') => $request->get('status')
            ]);
            $this->success(text: trans('pages/admin/admins.status_updated'));
        } else {
            $this->error(text: trans('pages/admin/admins.status_updating_error'));
        }
        return redirect(route('admin.admins.index'));
    }


}
