<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Models\Salles as ModelTarget;
use League\Flysystem\FilesystemException;
use App\Http\Requests\addSalle;



class SallesController extends Controller
{


    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {

//        User::factory(1)->create();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('salles.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('salles.destroyGroup'))
        ];
        $heads = [

            new Head('codeS',Head::TYPE_TEXT,trans('words.codeSalle')),
            new Head('titre',Head::TYPE_TEXT,trans('words.titreSalle')),
            new Head('capacite',Head::TYPE_TEXT,trans('words.capSalle')),
            new Head('description',Head::TYPE_TEXT,trans('words.descriptionSa')),
            new Head('blocCode',Head::TYPE_TEXT,trans('words.BCSalle')),
            new Head('blocTitre',Head::TYPE_TEXT,trans('words.BTSalle')),
        new Head('typeSalleCode',Head::TYPE_TEXT,trans('words.TCSalle')),
        new Head('typeSalleTitre',Head::TYPE_TEXT,trans('words.TTSalle')),

        ];

        $collection = ModelTarget::query()
            ->join('blocs', 'blocs.id', 'salles.bloc')
            ->join('typeSalles', 'typeSalles.id', 'salles.typeSalle')
            ->select('salles.*',
                'blocs.codeB as blocCode',
                'blocs.titre as blocTitre',
                'typeSalles.codeTS as typeSalleCode',
                'typeSalles.titre as typeSalleTitre')
            ->get();

        return view('crud.salles.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.salles.create');
    }

    /***
    -----     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        return view('crud.salles.edit', [
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
        return redirect(route('salles.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(addSalle $request)
    {
        $validated = $request->validated();
//        dd($validated);

        $model = ModelTarget::query()->create($validated);

        $this->success(text: trans('messages.added_message'));
        return redirect(route('salles.index'));
    }

    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(addSalle $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();

        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('salles.index'));
    }


}
