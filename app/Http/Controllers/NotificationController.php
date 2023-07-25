<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddNotificationRequest;
use App\Models\Country;
use App\Models\FichierJNotification;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Notification as ModelTarget;
use League\Flysystem\FilesystemException;

class NotificationController extends Controller
{

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('notifications.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('notifications.destroyGroup'))
        ];
        $heads = [
            // new Head('fichierJNotification', Head::TYPE_FILE, trans('words.fichierJNotification')),
            new Head('objet', Head::TYPE_TEXT, trans('words.objet')),
            new Head('dateCreation', Head::TYPE_DATE, trans('words.date')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),

            new Head('categorie', Head::TYPE_TEXT, trans('words.categorie')),

        ];

        $collection = ModelTarget::query()
            ->join('categoriesNotifications', 'categoriesNotifications.idCN', 'notifications.CategorieNotif')
            ->select('notifications.*', 'categoriesNotifications.titre as categorie')
            ->get();

        return view('crud.notifications.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.notifications.create');
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
        $fichiers = FichierJNotification::query()->where('notification','=',$id)->get();
        // dd($fichiers);
        return view('crud.notifications.edit', [
            'model' => $model,
            'fichiers' => $fichiers,
            'id' => $model->idN
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
        return redirect(route('notifications.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddNotificationRequest $request)
    {
        $validated = $request->validated();
        // $avatar = $request->validated()['fichierJNotification'] ?? null;
        // unset($validated['avatar']);

        $model = ModelTarget::query()->create($validated);
        // $model->update([
        //     'avatar' => $this->saveFile('notifications', file: $avatar)
        // ]);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('notifications.show',$model->idN));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddNotificationRequest $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();
        // unset($validated['avatar']);

        // $this->saveAndDeleteOld($request->validated()['avatar'] ?? null, 'notifications', $model, 'avatar');
        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('notifications.index'));
    }
}
