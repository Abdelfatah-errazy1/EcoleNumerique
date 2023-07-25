<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Directeur\AddDirecteruEtbRequest;
use App\Http\Requests\Admin\Directeur\EditDirecteruEtbRequest;
use App\Models\Directeure as ModelTarget;
use Illuminate\Http\Request;
use function back;
use function config;
use function redirect;
use function response;
use function route;
use function trans;
use function view;

class DirecteurEtbController extends Controller
{
    //

    protected function index()
    {



        $actions = [
            new Action(ucwords(trans('app.add')), Action::TYPE_NORMAL, url: route('admin.directeur.create')),
            new Action(ucwords(trans('app.delete_all')), Action::TYPE_DELETE_ALL, url: route('admin.directeur.destroyGroup'))
        ];
        $heads = [
            new Head(config('tables.directeure.columns.avatar'),  Head::TYPE_IMG, trans('elements.avatar')),
            new Head(config('tables.directeure.columns.cin'), Head::TYPE_TEXT, trans('elements.cin')),
            new Head(config('tables.directeure.columns.last_name'), Head::TYPE_TEXT, trans('elements.last_name')),
            new Head(config('tables.directeure.columns.first_name'), Head::TYPE_TEXT, trans('elements.first_name')),
            new Head(config('tables.directeure.columns.gender'), Head::TYPE_OPTIONS, trans('elements.gender'), [
                'H' => trans('elements.man'),
                'F' => trans('elements.woman'),
            ]),
            new Head(config('tables.directeure.columns.civility'), Head::TYPE_OPTIONS, trans('elements.civility'), [
                'C' => trans('elements.celibataire'),
                'M' =>  trans('elements.marie'),
                'D' =>  trans('elements.divorce'),
                'V' =>  trans('elements.veuf'),
             ]),
            new Head(config('tables.directeure.columns.date_of_birth'),  Head::TYPE_DATE, trans('elements.date_of_birth')),
            new Head(config('tables.directeure.columns.title_function'),  Head::TYPE_TEXT, trans('elements.title_function')),
            new Head(config('tables.directeure.columns.type'), Head::TYPE_TEXT, trans('elements.type')),
            new Head(config('tables.directeure.columns.observation'),  Head::TYPE_TEXT, trans('elements.observation')),
            new Head(config('tables.directeure.columns.phone'),  Head::TYPE_TEXT, trans('elements.phone')),
            new Head(config('tables.directeure.columns.gsm'),  Head::TYPE_TEXT, trans('elements.gsm')),
            new Head(config('tables.directeure.columns.fax'),  Head::TYPE_TEXT, trans('elements.fax')),
            new Head(config('tables.directeure.columns.address'), Head::TYPE_TEXT, trans('elements.address')),
            new Head(config('tables.directeure.columns.postal_code'), Head::TYPE_TEXT, trans('elements.postal_code')),
            new Head(config('tables.directeure.columns.city'),  Head::TYPE_TEXT, trans('elements.city')),
            new Head(config('tables.directeure.columns.country'),  Head::TYPE_TEXT, trans('elements.country')),
            new Head(config('tables.directeure.columns.email'),  Head::TYPE_TEXT, trans('elements.email')),
            new Head(config('tables.directeure.columns.web_site'),  Head::TYPE_TEXT, trans('elements.web_site')),

        ];

        // $collection = ModelTarget::all();
        $collection = ModelTarget::query()->get();
        return view('Admin.directeur.index', compact(['actions', 'heads', 'collection']));
    }

    // /***
    //  * Page create
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    //  */
     public function create()
     {


         return view('Admin.directeur.create');
    }

    // // /***
    // //  * Page edit
    // //  * @param Request $request
    // //  * @param $id
    // //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    // //  */

    public function show($id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        return view('Admin.directeur.edit', [
            'model' => $model
        ]);
    }
    // // /***
    // //  * Delete multi records
    // //  * @param Request $request
    // //  * @return \Illuminate\Http\JsonResponse
    // //  */
    public function destroyGroup(Request $request)
    {
        $ids = $request['ids'] ?? [];
        foreach ($ids as $id) {
            $model = ModelTarget::query()->find((int)\Crypt::decrypt($id));
            $model?->delete();
        }
        $this->success(text: trans('messages.deleted_message'));
        return response()->json(['success' => true]);
    }

    // // /***
    // //  * Delete one record by id if exists
    // //  * @param Request $request
    // //  * @param $id
    // //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    // //  */
    public function destroy($id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('admin.directeur.index'));
    }

    // /***
    //  * Add a new record
    //  * @param Add $request
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  * @throws FilesystemException
    //  */
    /**
     * @throws \League\Flysystem\FilesystemException
     */
    public function store(AddDirecteruEtbRequest $request)
    {


        $avatar = $request->validated()['avatar'];
        $validated = $request->validated();

        unset($validated['avatar']);


        $model = ModelTarget::query()->create($validated);

        $model->update([
            config('tables.directeure.columns.avatar') => $this->saveFile('directeur', file: $avatar)
        ]);
//        dd($model);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('admin.directeur.index'));
    }


    // /***
    //  * Update record if exists
    //  * @param Add $request
    //  * @param $id
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  * @throws FilesystemException
    //  */
    public function update(EditDirecteruEtbRequest $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        unset($validated['avatar']);


        $this->saveAndDeleteOld($request->validated()['avatar'] ?? null, 'directeur', $model, 'avatar');

        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('admin.directeur.index'));
    }
}
