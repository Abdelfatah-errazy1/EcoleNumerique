<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Controllers\Controller;
use App\Http\Controllers\M4_GestiondesAbonnements\Add;
use App\Http\Requests\Admin\Abonnement\AbonnementRequest;
use App\Models\Abonnement as ModelTarget;
use Illuminate\Http\Request;
use League\Flysystem\FilesystemException;
use function config;
use function redirect;
use function response;
use function route;
use function trans;
use function view;

class AbonnementController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {


        $actions = [
            new Action(ucwords(trans('app.add')), Action::TYPE_NORMAL, url: route('admin.abonnements.create')),
            new Action(ucwords(trans('app.delete_all')), Action::TYPE_DELETE_ALL, url: route('admin.abonnements.destroyGroup'))
        ];
        $heads = [

            new Head(config('tables.abonnements.columns.title'), Head::TYPE_TEXT, trans('elements.title')),
            new Head(config('tables.abonnements.columns.tarif_vente'), Head::TYPE_TEXT, trans('elements.tarif_vente')),
            new Head(config('tables.abonnements.columns.tarif_promo'), Head::TYPE_TEXT, trans('elements.tarif_promo')),
            new Head(config('tables.abonnements.columns.number_accounts_anseignants'), Head::TYPE_TEXT, trans('elements.number_accounts_enseignants')),
            new Head(config('tables.abonnements.columns.number_accounts_scolarite'), Head::TYPE_TEXT, trans('elements.number_accounts_scolarite')),
            new Head(config('tables.abonnements.columns.description'), Head::TYPE_TEXT, trans('elements.description')),

        ];
        $collection = ModelTarget::all();
        return view('Admin.Abonnement.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('Admin.Abonnement.create');
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        return view('Admin.Abonnement.edit', [
            'model' => $model
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
            $client = ModelTarget::query()->find((int)\Crypt::decrypt($id));
            $client?->delete();
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
    public function destroy($id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('admin.abonnements.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AbonnementRequest $request)
    {
        $validated = $request->validated();

        ModelTarget::query()
            ->create($validated);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('admin.abonnements.index'));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AbonnementRequest $request, $id)
    {
        $client = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();

        $client->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(route('admin.abonnements.index'));
    }
}
