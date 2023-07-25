<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Chapitre;
use App\Models\TestModel;
use Illuminate\Http\Request;
use App\Helpers\Components\Head;
use App\Helpers\Components\Action;
use App\Http\Requests\addChapitre;
use App\Models\Chapitre as ModelTarget;

class ChapitreController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index(Request $request)
    {

//        User::factory(1)->create();

        $actions = [
            new Action(ucwords(trans('words.add')),Action::TYPE_NORMAL,url: route('chapitres.create')),
            new Action(ucwords(trans('words.delete_all')),Action::TYPE_DELETE_ALL,url:route('chapitres.destroyGroup')),
        ];
        $heads = [
            new Head('numChap',Head::TYPE_TEXT, trans('words.numchap')) ,
            new Head('codeMa',Head::TYPE_TEXT, trans('words.matiere')) ,
            new Head('nomFr',Head::TYPE_TEXT, trans('words.nomFr')) ,
            new Head('nomAr',Head::TYPE_TEXT, trans('words.nomAr')) ,
            new Head('duree',Head::TYPE_TEXT, trans('words.duree')) ,
            new Head('descriptionFr',Head::TYPE_TEXT, trans('words.descriptionFr')) ,
            new Head('descriptionAr',Head::TYPE_TEXT, trans('words.descriptionAr')) ,

        ];

        $key = $request->get('idMat') ?? null;
        $back = $request->get('back') ?? null;

        $collection = ModelTarget::jointureForeignKey($key);




        return view('crud.chapitre.index', compact(['actions', 'heads', 'collection' , 'back']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.chapitre.create');
    }

    /***
    -----     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $model = Chapitre::query()->findOrFail($id);
        $time = explode(':',$model['duree']);

        $model->setAttribute('dureeH', $time[0]);
        $model->setAttribute('dureeM', $time[1]);
     
        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('detailsChapitres.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('detailsChapitres.destroyGroup'))
        ];
        $heads = [
            new Head('chapitre', Head::TYPE_TEXT, trans('words.chapitre')),
            new Head('code', Head::TYPE_TEXT, trans('words.code')),
            new Head('titreFr', Head::TYPE_TEXT, trans('words.titreFr')),
            new Head('titreAr', Head::TYPE_TEXT, trans('words.titreAr')),
            new Head('periode', Head::TYPE_TEXT, trans('words.periode')),
            new Head('descriptionFr', Head::TYPE_TEXT, trans('words.descriptionFr')),
            new Head('descriptionAr', Head::TYPE_TEXT, trans('words.descriptionAr')),

        ];

        return view('crud.chapitre.edit', [
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
            $model = Chapitre::query()->find((int)\Crypt::decrypt($id));
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
        Chapitre::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('chapitres.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
//    public function store(AddUserRequet $request)
    public function store(addChapitre $request)
    {
        $validated = $request->validated();
        $duree = $validated['dureeH'].':'.$validated['dureeM'];

        unset($validated['dureeH']);
        unset($validated['dureeM']);

        $validated = array_merge($validated, ['duree' => $duree]);
        $model = Chapitre::query()->create($validated);


        $this->success(text: trans('messages.added_message'));
        return redirect(route('chapitres.index'));
    }

    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */

    public function update(addChapitre $request, $id)
    {
        $model = Chapitre::query()->findOrFail($id);

        $validated = $request->validated();
        $duree = $validated['dureeH'].':'.$validated['dureeM'];

        unset($validated['dureeH']);
        unset($validated['dureeM']);

        $validated = array_merge($validated, ['duree' => $duree]);

        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('chapitres.index'));

    }

}
