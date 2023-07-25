<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Chapitre;
use App\Models\TestModel;
use Illuminate\Http\Request;
use App\Helpers\Components\Head;
use App\Helpers\Components\Action;
use App\Http\Requests\addChapitre;
use App\Http\Requests\AdddetailsChapitresRequest;
use App\Models\DetailsChapitre as ModelTarget;

class DetailsChapitreController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index(Request $request)
    {

//        User::factory(1)->create();

$actions = [
    new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('detailsChapitres.create')),
    new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('detailsChapitres.destroyGroup'))
];
$heads = [
    new Head('chapitre', Head::TYPE_TEXT, trans('words.chapitre')),
    new Head('code', Head::TYPE_TEXT, trans('words.code')),
    new Head('titreFr', Head::TYPE_TEXT, trans('words.titreFr')),
    new Head('titreAr', Head::TYPE_TEXT, trans('words.titreAr')),
    new Head('descriptionFr', Head::TYPE_TEXT, trans('words.descriptionFr')),
    new Head('descriptionAr', Head::TYPE_TEXT, trans('words.descriptionAr')),

];

        $key = $request->get('idCh') ?? null;
        $back = $request->get('back') ?? null;

        $collection = ModelTarget::jointureForeignKey($key);




        return view('crud.detailschapitres.index', compact(['actions', 'heads', 'collection' , 'back']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.detailschapitres.create');
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
        
     
        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('detailsChapitres.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('detailsChapitres.destroyGroup'))
        ];
        $heads = [
            new Head('detailschapitres', Head::TYPE_TEXT, trans('words.detailschapitres')),
            new Head('code', Head::TYPE_TEXT, trans('words.code')),
            new Head('titreFr', Head::TYPE_TEXT, trans('words.titreFr')),
            new Head('titreAr', Head::TYPE_TEXT, trans('words.titreAr')),
            new Head('periode', Head::TYPE_TEXT, trans('words.periode')),
            new Head('descriptionFr', Head::TYPE_TEXT, trans('words.descriptionFr')),
            new Head('descriptionAr', Head::TYPE_TEXT, trans('words.descriptionAr')),

        ];

        return view('crud.detailsChapitres.edit', [
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
        return redirect(route('detailsChapitres.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
//    public function store(AddUserRequet $request)
    public function store(AdddetailsChapitresRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $model = ModelTarget::query()->create($validated);


        $this->success(text: trans('messages.added_message'));
        return redirect(route('detailsChapitres.index'));
    }

    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */

    public function update(AdddetailsChapitresRequest $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();

        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('detailsChapitres.index'));

    }

}
