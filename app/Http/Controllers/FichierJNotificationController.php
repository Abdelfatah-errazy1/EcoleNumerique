<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddFichierJNotificationRequest;
use App\Models\CategorieNotification;
use App\Models\CentreFormation;
use App\Models\Country;
use App\Models\Etablissement;
use App\Models\FichierJNotification;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\FichierJNotification as ModelTarget;
use League\Flysystem\FilesystemException;


class FichierJNotificationController extends Controller
{

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {

//        User::factory(1)->create();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('fichierJoinNotifications.create',1)),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('fichierJoinNotifications.destroyGroup'))
        ];
        $heads = [
            // new Head('fichierJNotification', Head::TYPE_FILE, trans('words.fichierJNotification')),
            new Head('titre', Head::TYPE_TEXT, trans('words.titre')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),

            new Head('notification', Head::TYPE_TEXT, trans('words.notification')),

        ];

        $collection = ModelTarget::query()->get();

        return view('crud.fichierJoinNotifications.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($id)
    {
        return view('crud.fichierJoinNotifications.create',compact('id'));
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
        return view('crud.fichierJoinNotifications.edit', [
            'model' => $model
        ]);
    }
    
    public function destroy(Request $request, $id)
    {
        $model=ModelTarget::query()->findOrFail($id);
        $file_path = public_path('storage/' . $model->pathFJN);
        File::delete($file_path);
        $model->delete();
        $this->success(trans('messages.deleted_message'));
        return back();
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
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddFichierJNotificationRequest $request,$id)
    {
        $validated = $request->validated();
        $validated['notification']=$id;
        // $doc = $request['fichierJNotification'];
        
        $file = $request->file('fichierJNotification');
        unset($validated['fichierJNotification']);
        $model = ModelTarget::query()->create($validated);
        
        
        $notification=Notification::find($id);
        $categorie=CategorieNotification::find($notification['categorieNotif']);
        $centre=CentreFormation::find($categorie['centreFormation']);
        $etablis=Etablissement::find($centre['etablissement_fk']);
        
        $fileName = str_replace(' ', '', $request['titre']);
        $fullPath = "/DigitSchool/".$etablis['id'].'/'.$centre["id"]."/Notifications/".$id.'/'.$model["id"].' '. $fileName;
        // dd($model);  
        $path = $file->store($fullPath, 'public');
        
        
        
        
        
        // Storage::disk('local')->put($fullPath, $doc);
        $model->update([
            'pathFJN' => $path
        ]);
        // dd($validated);       
        $this->success(text: trans('messages.added_message'));
        return redirect(route('notifications.show',$id));
    }
    /***
     * Delete one record by id if exists
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function downloadFile( $id)
    {
       
       
        $path=FichierJNotification::find($id)->pathFJN;
        if($path){
            return Storage::disk('public')->download($path);
        }
        return back();
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddFichierJNotificationRequest $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();

        $file = $request->file('fichierJNotification');
        unset($validated['fichierJNotification']);

        $model->update($validated);
        $notification=Notification::find($model->notification);
        dd($notification);       
        $categorie=CategorieNotification::find($notification['CategorieNotif']);
        $centre=CentreFormation::find($categorie['centreFormation']);
        $etablis=Etablissement::find($centre['etablissement']);
        
        $fileName = str_replace(' ', '', $request['titre']);
        $fullPath = "/DigitSchool/".$etablis['idEta'].'/'.$centre["idCF"]."/Notifications/".$id.'/'.$model["id"].' '. $fileName;
        $path = $file->store($fullPath, 'public');
        // $path = $file->storeAs('chemin/vers/le/dossier', $filename);
        $file_path = public_path('storage/' . $model->pathFJN);
        File::delete($file_path);

        $model->update([
            'pathFJN' => $path
        ]);

        // unset($validated['avatar']);

        // $this->saveAndDeleteOld($request->validated()['avatar'] ?? null, 'fichierJoinNotifications', $model, 'avatar');

        $this->success(text: trans('messages.updated_message'));

        return redirect(route('notifications.show',$model['notification']));    }


}
