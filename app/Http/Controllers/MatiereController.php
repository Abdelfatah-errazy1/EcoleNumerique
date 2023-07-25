<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddMatiereRequest;
use App\Models\Matiere as ModelTarget;
use App\Models\Matiere;
use App\Models\Module ;
use Illuminate\Http\Request;
use League\Flysystem\FilesystemException;

/**
 * Summary of ModuleController
 */
class MatiereController extends Controller
{

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index(Request $request)
    {

    //    Matiere::factory(10)->create();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('matieres.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('matieres.destroyGroup'))
        ];
        $heads = [
            // new Head('avatar', Head::TYPE_IMG, trans('words.avatar')),
            new Head('codeMa', Head::TYPE_TEXT, trans('words.code')),
            new Head('nomFr', Head::TYPE_TEXT, trans('words.nomFr')),
            new Head('nomAr', Head::TYPE_TEXT, trans('words.nomAr')),
            new Head('duree', Head::TYPE_TEXT, trans('words.duree')),
            new Head('coef', Head::TYPE_TEXT, trans('words.coef')),
            new Head('descriptionFr', Head::TYPE_TEXT, trans('words.descriptionFr')),
            new Head('descriptionAr', Head::TYPE_TEXT, trans('words.descriptionAr')),   
            new Head('module', Head::TYPE_TEXT, trans('words.module')),
            new Head('periode', Head::TYPE_TEXT, trans('words.periode')),

        ];
            $key = $request->get('idM') ?? null;
            $back = $request->get('back') ?? null;
    // dd(request());
            $collection = ModelTarget::jointureForeignKey($key);
    
    
    
            return view('crud.matieres.index', compact(['actions', 'heads', 'collection' , 'back']));
        }
    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.matieres.create');
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
        $parts = explode('h', $model->duree);
        $model['heure']=intval(isset($parts[0])?$parts[0]:0);
        $model['minute']=intval(isset($parts[1])?$parts[1]:0);


     
        $actions = [
            new Action(ucwords(trans('words.add')),Action::TYPE_NORMAL,url: route('chapitres.create')),
            new Action(ucwords(trans('words.delete_all')),Action::TYPE_DELETE_ALL,url:route('chapitres.destroyGroup')),
        ];
        $heads = [
            new Head('matiere',Head::TYPE_TEXT, trans('words.matiere')) ,
            new Head('numChap',Head::TYPE_TEXT, trans('words.numchap')) ,
            new Head('codeMa',Head::TYPE_TEXT, trans('words.codeMa')) ,
            new Head('nomFr',Head::TYPE_TEXT, trans('words.nomFr')) ,
            new Head('nomAr',Head::TYPE_TEXT, trans('words.nomAr')) ,
            new Head('duree',Head::TYPE_TEXT, trans('words.duree')) ,
            new Head('descriptionFr',Head::TYPE_TEXT, trans('words.descriptionFr')) ,
            new Head('descriptionAr',Head::TYPE_TEXT, trans('words.descriptionAr')) ,

        ];


        return view('crud.matieres.edit', [
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
        return redirect(route('matieres.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    /**
     * Summary of store
     * @param AddMatiereRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AddMatiereRequest $request)
    {
        
        $validated = $request->validated();
        $validated['duree']= $validated['heure']."h".$validated['minute'];
        unset($validated["heure"]);
        unset($validated["minute"]);
        $model = ModelTarget::query()->create($validated);
        // $model->update([
        //     'avatar' => $this->saveFile('matieres', file: $avatar)
        // ]);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('matieres.index'));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddMatiereRequest $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();
        $validated['duree']= $validated['heure']."h".$validated['minute'];
        unset($validated["heure"]);
        unset($validated["minute"]);
        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('matieres.index'));
    }
}
