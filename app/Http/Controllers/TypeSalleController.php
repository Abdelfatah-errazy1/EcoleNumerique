<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddTypeSalleRequest;
use Illuminate\Http\Request;
use App\Models\typeSalle as ModelTarget;
use League\Flysystem\FilesystemException;

class TypeSalleController extends Controller
{

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

//        User::factory(1)->create();


        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('TypesSalles.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('TypesSalles.destroyGroup'))
        ];
        $heads = [
            new Head('codeTS', Head::TYPE_TEXT, trans('words.codeTS')),
            new Head('titre', Head::TYPE_TEXT, trans('words.titre')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),
            new Head('centreFormation', Head::TYPE_TEXT, trans('words.centreFormation')),



        ];

        $collection = ModelTarget::query()
            ->join('centreformations', 'centreformations.id', 'typeSalles.centreFormation')
            ->select('typeSalles.*', 'centreformations.name_FR as centreFormation')
            ->get();



        return view('crud.TypeSalle.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.TypeSalle.create');
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
        return view('crud.TypeSalle.edit', [
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
        return redirect(route('TypesSalles.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddTypeSalleRequest $request)
    {
        $validated = $request->validated();

        $model = ModelTarget::query()->create($validated);

        $this->success(text: trans('messages.added_message'));
        return redirect(route('TypesSalles.index'));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddTypeSalleRequest $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

         $validated = $request->validated();


         $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('TypesSalles.index'));
    }
}
