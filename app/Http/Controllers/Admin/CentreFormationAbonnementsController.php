<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Abonnement;
use App\Models\Admin;
use App\Models\CentreFormation;

use App\Models\CentreFormationAbonnement;
use App\Models\Directeure;
use App\Models\Etablissement;
use App\Models\OfficeAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\NoReturn;

class CentreFormationAbonnementsController extends Controller
{

    public function index()
    {
        $data = [
            'center' => CentreFormation::query()->get(),
            'etablissement' => Etablissement::query()->get(),
            'abonements' => Abonnement::query()->get(),
        ];
        return view('admin.Abonnement.affectaion', compact('data'));
    }

    public function filterCenter(Request $request)
    {
        $validator = validator($request->all(), [
            'etablissementId' => 'required|exists:'.config('tables.etablissements.name').','.Etablissement::PK,
        ]);


        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()->toArray()
            ];
        }


        $cent = CentreFormation::query()
            ->where(config('tables.centreformations.columns.etablissement_FK'), $request['etablissementId'])
            ->get();


        return response()->json([
            'data' => $cent
        ]);

    }

    public function filterCabinetsAbonnementst(Request $request)
    {
        $validator = validator($request->all(), [
            'center_id' => 'required|exists:'.config('tables.centreformations.name').','. CentreFormation::PK
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()->toArray()
            ];
        }
        CentreFormationAbonnement::$useMutator = true;
        $data = CentreFormationAbonnement::centerAbonnement($request['center_id']) ;
        if(isset($data[0])){
            return response()->json([
                'data' => $data
        ]);
        }

        return response()->json([
            'data' => false
        ]);

    }

    public function find(Request $request)
    {
        $validator = validator($request->all(), [
            'id' => 'required|exists:'.config('tables.centreformationsabonnement.name').',' . CentreFormationAbonnement::PK,
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()->toArray()
            ];
        }

        return response()->json([
            'data' => CentreFormationAbonnement::query()->find($request['id'])
        ]);
    }


    public function update(Request $request)
    {

        $validator = validator($request->all(), [
            'id' => 'required|exists:'.config('tables.centreformationsabonnement.name').',' . CentreFormationAbonnement::PK,
            'abonnement' => 'nullable|exists:'.config('tables.abonnements.name').',' . Abonnement::PK,
            'dateDebut' => 'required|before:dateFin',
            'dateFin' => 'required|after:dateDebut',
            'etat' => 'required|' . Rule::in(['ABN', 'ABE', 'ABB'])
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()->toArray()
            ];
        }
        $validated = $validator->validated();
        $centAbon =  CentreFormationAbonnement::query()->find($validated['id']) ;

        if($validated['abonnement'] === null){

                $centAbon->update([
                    config('tables.centreformationsabonnement.columns.date_start') => Carbon::parse($validated['dateDebut'])->toDateString(),
                    config('tables.centreformationsabonnement.columns.date_end') => Carbon::parse($validated['dateFin'])->toDateString(),
                    config('tables.centreformationsabonnement.columns.state') => $validated['etat'],
                ]);
        }else{
                $centAbon->update([
                    config('tables.centreformationsabonnement.columns.abonnement_Fk') => $validated['abonnement'],
                    config('tables.centreformationsabonnement.columns.date_start') => Carbon::parse($validated['dateDebut'])->toDateString(),
                    config('tables.centreformationsabonnement.columns.date_end') => Carbon::parse($validated['dateFin'])->toDateString(),
                    config('tables.centreformationsabonnement.columns.state') => $validated['etat'],
                ]);

                $abn = Abonnement::query()->findOrFail($validated['abonnement']);
                OfficeAccount::query()
                    ->where(config('tables.office.columns.centreformabon_FK') , $centAbon[CentreFormationAbonnement::PK])
                    ->whereIn(config('tables.office.columns.role') , ['ENS','SC'])
                    ->delete();

            // TODO :  generate office for the type ens and sc

            if (isset($abn[config('tables.abonnements.columns.number_accounts_anseignants')]) && is_numeric($abn[config('tables.abonnements.columns.number_accounts_anseignants')])) {

                for ($i = 0; $i < $abn[config('tables.abonnements.columns.number_accounts_anseignants')] ; $i++) {
                    OfficeAccount::query()
                        ->create([
                            config('tables.office.columns.centreformabon_FK') => $centAbon[CentreFormationAbonnement::PK],
                            config('tables.office.columns.role') => 'ENS',
                            config('tables.office.columns.is_connected') => 'N',
                        ]);
                }
            }

            if (isset($abn[config('tables.abonnements.columns.number_accounts_scolarite')]) && is_numeric($abn[config('tables.abonnements.columns.number_accounts_scolarite')])) {

                for ($i = 0; $i < $abn[config('tables.abonnements.columns.number_accounts_scolarite')] ; $i++) {
                    OfficeAccount::query()
                        ->create([
                            config('tables.office.columns.centreformabon_FK') => $centAbon[CentreFormationAbonnement::PK],
                            config('tables.office.columns.role') => 'SC',
                            config('tables.office.columns.is_connected') => 'N',
                        ]);
                }
            }




        }



        return response()->json([
            'message' => 'updated'
        ]);


    }


    public function adds(Request $request)
    {


        // TODO : init the validation
        $validator = validator($request->all(), [
            'abonnement' => 'required|exists:'.config('tables.abonnements.name').',' . Abonnement::PK,
            'etab' => 'required|exists:'.config('tables.etablissements.name').',' . Etablissement::PK,
            'center' => 'required|exists:'.config('tables.centreformations.name').',' . CentreFormation::PK,
            'dateDebut' => 'required|before:dateFin',
            'dateFin' => 'required|after:dateDebut',
            'etat' => 'required|' . Rule::in(['ABN', 'ABE', 'ABB'])
        ]);

        // TODO : validate the data and check retune array of the errors id exists
        if ($validator->fails()) {
            return [
                'errors' => $validator->errors()->toArray()
            ];
        }

        // TODO : get the validated data
        $validated = $validator->validated();

        $center = CentreFormation::query()->findOrFail($validated['center']);
        $etablissement = Etablissement::query()->findOrFail($center[config('tables.centreformations.columns.etablissement_FK')]);
        $abonnement = Abonnement::query()->findOrFail($validated['abonnement']);
        $countAbonn = CentreFormationAbonnement::query()->where(config('tables.centreformationsabonnement.columns.abonnement_Fk'), $abonnement[Abonnement::PK])
            ->where(config('tables.centreformationsabonnement.columns.center_FK'), $center[CentreFormation::PK])->count() ;

        $directure = Directeure::query()->findOrFail($etablissement[config('tables.etablissements.columns.directeur_FK')]);

        // TODO : create the Centre Abonnements
        if ($countAbonn === 0) {

            // TODO : create  centre abonnements
            $centerAbonnements = CentreFormationAbonnement::query()
                ->create([
                    config('tables.centreformationsabonnement.columns.abonnement_Fk') => $abonnement[Abonnement::PK],
                    config('tables.centreformationsabonnement.columns.admin_FK') => auth()->guard('admin')->user()[Admin::PK],
                    config('tables.centreformationsabonnement.columns.center_FK') =>$center[CentreFormation::PK],
                    config('tables.centreformationsabonnement.columns.date_start') => Carbon::parse($validated['dateDebut'])->toDateString(),
                    config('tables.centreformationsabonnement.columns.date_end') => Carbon::parse($validated['dateFin'])->toDateString(),
                    config('tables.centreformationsabonnement.columns.state') => $validated['etat']
                ]);

            $typeDirecture =  OfficeAccount::query()
                ->where(config('tables.office.name').'.'.config('tables.office.columns.etablissement_FK')  ,$etablissement[Etablissement::PK] )
                ->where(config('tables.office.name').'.'.config('tables.office.columns.role') , 'DET')->count() ;

            if($typeDirecture === 0){
                // TODO :  generate office for the Director Establishment
                // AA65456@ait02
                OfficeAccount::query()
                    ->create([
                        config('tables.office.columns.centreformabon_FK') => $centerAbonnements[CentreFormationAbonnement::PK],
                        config('tables.office.columns.etablissement_FK') => $etablissement[Etablissement::PK],
                        config('tables.office.columns.status')=> 'A',
                        config('tables.office.columns.role') => 'DET',
                        config('tables.office.columns.login') => $directure[config('tables.directeure.columns.cin')],
                        config('tables.office.columns.password') => $directure[config('tables.directeure.columns.cin')].'@'.$directure[config('tables.directeure.columns.last_name')].$directure[config('tables.directeure.columns.first_name')].$etablissement[Etablissement::PK],
                        config('tables.office.columns.original_password') => 'Y',
                        config('tables.office.columns.is_connected')=> 'N'
                    ]);
            }

            // TODO :  generate office for the medecine type mp
            // AA65456@ait02
            OfficeAccount::query()
                ->create([
                    config('tables.office.columns.centreformabon_FK') => $centerAbonnements[CentreFormationAbonnement::PK],
                    config('tables.office.columns.etablissement_FK') => $etablissement[Etablissement::PK],
                    config('tables.office.columns.status') => 'A',
                    config('tables.office.columns.role') => 'DCF',
                    config('tables.office.columns.login') => $etablissement[config('tables.etablissements.columns.name_FR')],
                    config('tables.office.columns.password') => $etablissement[config('tables.etablissements.columns.name_FR')].'@'.$etablissement[Etablissement::PK].'@'. $center[CentreFormation::PK],
                    config('tables.office.columns.original_password') => 'Y',
                    config('tables.office.columns.is_connected') => 'N'
                ]);


            // TODO :  generate office for the type ens and sc

            if (isset($abonnement[config('tables.abonnements.columns.number_accounts_anseignants')]) && is_numeric($abonnement[config('tables.abonnements.columns.number_accounts_anseignants')])) {

                for ($i = 0; $i < $abonnement[config('tables.abonnements.columns.number_accounts_anseignants')] ; $i++) {
                    OfficeAccount::query()
                        ->create([
                           config('tables.office.columns.centreformabon_FK') => $centerAbonnements[CentreFormationAbonnement::PK],
                            config('tables.office.columns.role') => 'ENS',
                            config('tables.office.columns.is_connected') => 'N',
                        ]);
                }
            }

            if (isset($abonnement[config('tables.abonnements.columns.number_accounts_scolarite')]) && is_numeric($abonnement[config('tables.abonnements.columns.number_accounts_scolarite')])) {

                for ($i = 0; $i < $abonnement[config('tables.abonnements.columns.number_accounts_scolarite')] ; $i++) {
                    OfficeAccount::query()
                        ->create([
                           config('tables.office.columns.centreformabon_FK') => $centerAbonnements[CentreFormationAbonnement::PK],
                            config('tables.office.columns.role') => 'SC',
                            config('tables.office.columns.is_connected') => 'N',
                        ]);
                }
            }






            return response()->json([
                'message' => 'added'
            ]);
        }

        return response()->json([
            'message' => 'already exists'
        ]);
    }

}
