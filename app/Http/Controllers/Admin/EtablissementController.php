<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Etablissement\addEtablissementRequest;
use App\Models\Directeure;
use App\Models\Etablissement as ModelTarget;
use Illuminate\Http\Request;
use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use Illuminate\Support\Facades\DB;


class EtablissementController extends Controller
{
    //

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {
        $actions = [
            new Action(ucwords(trans('app.add')), Action::TYPE_NORMAL, url: route('admin.etablissements.create')),
            new Action(ucwords(trans('app.delete_all')), Action::TYPE_DELETE_ALL, url: route('admin.etablissements.destroyGroup'))
        ];
        $heads = [
            new Head(config('tables.etablissements.columns.logo'),  Head::TYPE_IMG, trans('app.logo')),
            new Head(config('tables.etablissements.columns.name_AR'), Head::TYPE_TEXT, trans('elements.name_ar')),
            new Head(config('tables.etablissements.columns.name_FR'), Head::TYPE_TEXT, trans('elements.name_fr')),
            new Head(config('tables.etablissements.columns.directeur_FK'),  Head::TYPE_TEXT, trans('elements.directeur')),
            new Head(config('tables.etablissements.columns.address'), Head::TYPE_TEXT, trans('elements.address')),
            new Head(config('tables.etablissements.columns.city'), Head::TYPE_TEXT, trans('elements.city')),
            new Head(config('tables.etablissements.columns.postal_code'), Head::TYPE_TEXT, trans('elements.postal_code')),
            new Head(config('tables.etablissements.columns.country'),  Head::TYPE_TEXT, trans('elements.country')),
            new Head(config('tables.etablissements.columns.email'),  Head::TYPE_TEXT, trans('elements.email')),
            new Head(config('tables.etablissements.columns.web_site'),  Head::TYPE_TEXT, trans('elements.web_site')),
            new Head(config('tables.etablissements.columns.phone'),  Head::TYPE_TEXT, trans('elements.phone')),
            new Head(config('tables.etablissements.columns.whatsapp'),  Head::TYPE_TEXT, 'whatsapp'),
            new Head(config('tables.etablissements.columns.description_FR'),  Head::TYPE_TEXT, trans('elements.description_fr')),
            new Head(config('tables.etablissements.columns.description_AR'),  Head::TYPE_TEXT, trans('elements.description_ar')),


        ];
        $collection = ModelTarget::query()
            ->join(config('tables.directeure.name') , config('tables.directeure.name').'.'.config('tables.directeure.columns.id') , config('tables.etablissements.columns.directeur_FK'))
            ->select('etablissements.*' , DB::raw('CONCAT(directeure.first_name," ",directeure.first_name," ",directeure.cin) as directeur_fk'))
            ->get();

        return view('Admin.etablissements.index', compact(['actions', 'heads', 'collection']));
    }

    // /***
    //  * Page create
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    //  */
    public function create()
    {
//        $json_data = file_get_contents(public_path('countries.json'));
//        $data = json_decode($json_data, true);

        $directeure = [Directeure::query()->select('*' , \DB::raw('CONCAT(directeure.first_name," ",directeure.first_name," ",directeure.cin) as fullname') )->get() , ['id', 'fullname']];
        return view('Admin.etablissements.create' , compact('directeure'));
    }

    // /***
    //  * Page edit
    //  * @param Request $request
    //  * @param $id
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    //  */
    public function show($id)
    {
//        $json_data = file_get_contents(public_path('countries.json'));
//        $data = json_decode($json_data, true);
        $model = ModelTarget::query()->findOrFail($id);
        $directeure = [Directeure::query()->select('*' , \DB::raw('CONCAT(directeure.first_name," ",directeure.first_name," ",directeure.cin) as fullname') )->get() , ['id', 'fullname']];

        return view('Admin.etablissements.edit', [
            'model' => $model,
            'directeure' => $directeure,
//            'data' => $data,
        ]);
    }

    // /***
    //  * Delete multi records
    //  * @param Request $request
    //  * @return \Illuminate\Http\JsonResponse
    //  */
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

    // /***
    //  * Delete one record by id if exists
    //  * @param Request $request
    //  * @param $id
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  */
    public function destroy($id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('admin.etablissements.index'));
    }

    // /***
    //  * Add a new record
    //  * @param Add $request
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  * @throws FilesystemException
    //  */
    public function store(addEtablissementRequest $request)
    {
        $validated = $request->validated();
        $logoURL = $request->validated()[config('tables.etablissements.columns.logo')] ?? null;

        unset($validated[config('tables.etablissements.columns.logo')]);
        $model = ModelTarget::query()->create($validated);
        $model->update([
            config('tables.etablissements.columns.logo') => $this->saveFile('etablissements', file: $logoURL)
        ]);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('admin.etablissements.index'));
    }


    // /***
    //  * Update record if exists
    //  * @param Add $request
    //  * @param $id
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  * @throws FilesystemException
    //  */
    public function update(addEtablissementRequest $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();

        unset($validated[config('tables.etablissements.columns.logo')]);
        $this->saveAndDeleteOld($request->validated()[config('tables.etablissements.columns.logo')] ?? null, 'etablissements', $model, config('tables.etablissements.columns.logo'));

        $model->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(route('admin.etablissements.index'));
    }
}
