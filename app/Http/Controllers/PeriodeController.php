<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddPeriodeRequest;
use App\Models\Periode as Modeltarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Modeltarget::factory(10)->create();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('periodes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('periodes.destroyGroup'))
        ];
        $heads = [
            new Head('codeP', Head::TYPE_TEXT, trans('code')),
            new Head('filliereniveau', Head::TYPE_TEXT, trans('level')),
            new Head('nomP', Head::TYPE_TEXT, trans('words.name')),
            new Head('dateDebut', Head::TYPE_DATE, trans('words.date')),
            new Head('dateFin', Head::TYPE_DATE, trans('words.date')),
            new Head('description', Head::TYPE_TEXT, trans('description')), //! ??
        ];

        $collection = ModelTarget::query()
            ->join('filliereniveau', 'filliereniveau.id', 'periodes.filliereniveau')
            ->select('periodes.*', 'filliereniveau.name_fr as filliereniveau')
            ->get();

        return view('crud.periode.index', compact(['actions', 'heads', 'collection']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.Periode.create');
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddPeriodeRequest $request)
    {
        $validated = $request->validated();
// dd($validated);
        ModelTarget::query()->create($validated);

        $this->success(text: trans('messages.added_message'));
        return redirect(route('periodes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Modeltarget $id)
    {
        $model = ModelTarget::all()->find($id);
        return view('crud.Periode.edit', [
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
        /*
                $ids = $request['ids'] ?? [];
        foreach ($ids as $id) {
            $client = ModelTarget::query()->find((int)\Crypt::decrypt($id));
            $client?->delete();
        }
        $this->success(text: trans('messages.deleted_message'));
        return response()->json(['success' => true]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Modeltarget $periode)
    {
        //
    }

    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddPeriodeRequest $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();
        $model->update($validated);
        // $model->save();
        // dd($model);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('periodes.index'));
    }

    /***
     * Delete one record by id if exists
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $idd = ModelTarget::query()->findOrFail($id)->delete();
        // dd($idd);
        $this->success(trans('messages.deleted_message'));
        return redirect(route('periodes.index'));
    }
}
