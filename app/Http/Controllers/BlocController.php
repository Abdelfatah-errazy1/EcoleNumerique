<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddBlocRequest;
use App\Models\Bloc as ModelTarget;
use Illuminate\Http\Request;

class BlocController extends Controller
{
    public function index()
    {
        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('blocs.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('blocs.destroyGroup'))
        ];

        $heads = [
            new Head('codeB', Head::TYPE_TEXT, trans('words.codeBloc')),
            new Head('titre', Head::TYPE_TEXT, trans('words.titreBloc')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),
            new Head('batiment', Head::TYPE_TEXT, trans('words.batiment')),
        ];

        $collection = ModelTarget::query()
            ->join('batiments', 'batiments.id', 'blocs.batiment')
            ->select('blocs.*', 'batiments.titre as batiment')
            ->get();

        return view('crud.Bloc.index', compact(['actions', 'heads', 'collection']));
    }

    public function create()
    {
        return view('crud.Bloc.create');
    }


    public function store(AddBlocRequest $request)
    {
        $validated = $request->validated();

        ModelTarget::query()->create($validated);

        $this->success(title: "Bloc", text: trans("Created 👍"));
        return redirect(route('blocs.index'));
    }


    public function show(ModelTarget $id)
    {
        $model = ModelTarget::all()->find($id);
        return view('crud.Bloc.edit', compact("model"));
    }

    public function destroyGroup(Request $request)
    {
        $ids = $request['ids'] ?? [];
        foreach ($ids as $id) {
            $model = ModelTarget::query()->find((int)\Crypt::decrypt($id));
            $model?->delete();
        }
        $this->success(title: "Notification", text: trans("messages.deleted_message"));
        return response()->json(['success' => true]);
    }


    public function edit(ModelTarget $id)
    {
        $model = ModelTarget::all()->find($id);
        return view('crud.Notification.edit', compact("model"));
    }

    // /***
    //  * Update record if exists
    //  * @param Add $request
    //  * @param $id
    //  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    //  * @throws FilesystemException
    //  */
    public function update(AddBlocRequest $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();
        $model->update($validated);

        $this->success(title: trans("Bloc"), text: trans("messages.updated_message"));
        return redirect(route('blocs.index'));
    }


    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Bloc  $bloc
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Request $request, $id)
    {
        ModelTarget::query()->findOrFail($id)->delete();

        $this->success(title: "Bloc Deleted 😢", text: trans('messages.deleted_message',));
        return redirect(route('blocs.index'));
    }
}
