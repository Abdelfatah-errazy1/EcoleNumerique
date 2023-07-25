<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSecteur;
use App\Http\Requests\Admin\Secteurs\AddRequest;
use App\Models\Secteur;
use App\Models\Secteur as ModelTarget;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use League\Flysystem\FilesystemException;

class SecteurController extends Controller
{

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {
        $actions = [
            new Action(ucwords(trans('app.add')), Action::TYPE_NORMAL, url: route('admin.secteurs.create')),
            new Action(ucwords(trans('app.delete_all')), Action::TYPE_DELETE_ALL, url: route('admin.secteurs.destroyGroup'))
        ];
        $heads = [
            new Head(config('tables.secteurs.columns.name_fr'), showAs:trans('elements.name_fr')),
            new Head(config('tables.secteurs.columns.name_ar'), showAs:trans('elements.name_ar')),
            new Head(config('tables.secteurs.columns.description_fr'), showAs:trans('elements.description_fr')),
            new Head(config('tables.secteurs.columns.description_ar'), showAs:trans('elements.description_ar')),
        ];
        $collection = ModelTarget::all();

        return view('admin.secteurs.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.secteurs.create');
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $model = Secteur::query()->with('options')->findOrFail($id);
        $actions = [
//            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('admin.options.create', [
//                'id_secteur' => $model[ModelTarget::PK],
//                'back' => url()->current()
//            ])),
//            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('admin.options.destroyGroup'))
        ];
        $heads = [
            new Head(config('tables.secteurs.columns.name_fr'), Head::TYPE_TEXT),
            new Head(config('tables.secteurs.columns.name_ar'), Head::TYPE_TEXT),
            new Head(config('tables.secteurs.columns.description_fr'), Head::TYPE_TEXT),
            new Head(config('tables.secteurs.columns.description_ar'), Head::TYPE_TEXT),

        ];

        return view('admin.secteurs.edit', [
            'model' => $model,
            'actions' => $actions,
            'heads' => $heads
        ]);
    }

    /***
     * Delete multi records
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /***
     * Delete one record by id if exists
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('admin.secteurs.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddRequest $request)
    {
        $validated = $request->validated();

        $model = ModelTarget::query()->create($validated);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('admin.secteurs.show', $model[Secteur::PK]));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddRequest $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $model->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return back();
    }
}
