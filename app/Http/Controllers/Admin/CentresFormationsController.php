<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CentresFormation\AddCentresFormationsRequest;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use App\Models\centreFormation as ModelTarget;
//use App\Http\Requests\AddCF;
use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
class CentresFormationsController extends Controller
{
    //

    protected function index()
    {


        $actions = [
            new Action(ucwords(trans('app.add')), Action::TYPE_NORMAL, url: route('admin.centresFormations.create')),
            new Action(ucwords(trans('app.delete_all')), Action::TYPE_DELETE_ALL, url: route('admin.centresFormations.destroyGroup'))
        ];
        $heads = [
            new Head(config('tables.centreformations.columns.logo'),  Head::TYPE_IMG, trans('app.logo')),
            new Head(config('tables.centreformations.columns.etablissement_FK'), Head::TYPE_TEXT, trans('elements.etablissement')),

            new Head(config('tables.centreformations.columns.name_FR'), Head::TYPE_TEXT, trans('elements.name_fr')),
            new Head(config('tables.centreformations.columns.name_AR'), Head::TYPE_TEXT, trans('elements.name_ar')),
            new Head(config('tables.centreformations.columns.address'), Head::TYPE_TEXT, trans('elements.address')),
            new Head(config('tables.centreformations.columns.postal_code'), Head::TYPE_TEXT, trans('elements.postal_code')),
            new Head(config('tables.centreformations.columns.country'),  Head::TYPE_TEXT, trans('elements.country')),
            new Head(config('tables.centreformations.columns.city'),  Head::TYPE_TEXT, trans('elements.city')),
            new Head(config('tables.centreformations.columns.email'),  Head::TYPE_TEXT, trans('elements.email')),
            new Head(config('tables.centreformations.columns.web_site'),  Head::TYPE_TEXT, trans('elements.web_site')),
            new Head(config('tables.centreformations.columns.phone'),  Head::TYPE_TEXT, trans('elements.phone')),
            new Head(config('tables.centreformations.columns.whatsapp'),  Head::TYPE_TEXT, 'whatsapp'),
            new Head(config('tables.centreformations.columns.description_FR'),  Head::TYPE_TEXT, trans('elements.description_fr')),
            new Head(config('tables.centreformations.columns.description_AR'),  Head::TYPE_TEXT, trans('elements.description_ar')),


        ];
        // $collection = ModelTarget::all();
        $collection = ModelTarget::query()
            ->join(config('tables.etablissements.name'), config('tables.etablissements.name').'.'.config('tables.etablissements.columns.id'), config('tables.centreformations.columns.etablissement_FK'))
            ->select(config('tables.centreformations.name').'.*',  config('tables.etablissements.name').'.'.config('tables.etablissements.columns.name_FR').' as '.config('tables.centreformations.columns.etablissement_FK'))
            ->get();
        return view('Admin.centresFormations.index', compact(['actions', 'heads', 'collection']));
    }

    // /***
    //  * Page create
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    //  */
    public function create()
    {
        /*$json_data = file_get_contents(public_path('countries.json'));
        $data = json_decode($json_data, true);*/
        $etablissements = [Etablissement::query()->get() , [config('tables.centreformations.columns.id'),config('tables.centreformations.columns.name_FR') ]];

        return view('Admin.centresFormations.create' , compact('etablissements'));
    }

    // // /***
    // //  * Page edit
    // //  * @param Request $request
    // //  * @param $id
    // //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    // //  */

    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
//        $json_data = file_get_contents(public_path('assets/js/custom/crud/countries.js'));
//        $data = json_decode($json_data, true);
        $etablissements = [Etablissement::query()->get() , [config('tables.centreformations.columns.id'),config('tables.centreformations.columns.name_FR') ]];

        return view('Admin.centresFormations.edit', [
            'model' => $model,
            'etablissements' => $etablissements
//            'data'=> $data
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
        return redirect(route('admin.centresFormations.index'));
    }

    // /***
    //  * Add a new record
    //  * @param Add $request
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  * @throws FilesystemException
    //  */
    public function store(AddCentresFormationsRequest $request)
    {
        // dd('$request');
        $validated = $request->validated();
        $LogoURl = $request->validated()[config('tables.centreformations.columns.logo')];
        // dd($LogoURl);
        unset($validated[config('tables.centreformations.columns.logo')]);

        $model = ModelTarget::query()->create($validated);
        $model->update([
            config('tables.centreformations.columns.logo') => $this->saveFile('centresFormations', file: $LogoURl)
        ]);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('admin.centresFormations.index'));
    }


    // /***
    //  * Update record if exists
    //  * @param Add $request
    //  * @param $id
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  * @throws FilesystemException
    //  */
    public function update(AddCentresFormationsRequest $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();
        unset($validated[config('tables.centreformations.columns.logo')]);

        $this->saveAndDeleteOld($request->validated()[config('tables.centreformations.columns.logo')] ?? null, 'centresFormations', $model, config('tables.centreformations.columns.logo'));
        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('admin.centresFormations.index'));
    }
}
