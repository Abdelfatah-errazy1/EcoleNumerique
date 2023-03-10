<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        $data = Option::query()->get();


        return view('options.options' , compact('data'));
    }

    public function create()
    {

        return view('options.editOption');
    }


    public function delete($id)
    {
        $o = Option::query()->find($id);
        if (isset($o)) {
            $o->delete();
            $return = [1, 2];
        } else
            $return = [0];
        return back()->with('message', $return);
    }

    /**
     * supprimer multi enregistrements dans la grille
     **/
    public function deleteMulti(Request $request)
    {
        $ids = $request->get('ids');
        Option::query()->whereIn('id_option', $ids)->delete();
        session()->flash('message', [1, 2]);
    }

    /**
     * Affiche la page d'Edition avec les données d'une ligne selectione dans grille
     **/
    public function show($id)
    {

        $model = Option::query()->find($id);
        if (!isset($model)) {
            return redirect()->route('users')->with(['message' => [0]]);
        }
        return view('options.editOption', compact(['model']));
    }


    /**
     * Permet d'enregistré les données de la page Edition cas de modifier
     **/
    public function update($id, Request $request)
    {


        $res = $request->validate([

            'nom_option'  => 'required|max:100',
            'description_option'  => 'nullable|max:250'   ,

        ]);


        $o = Option::query()->find($id);
        if (isset($o)) {


            $o->update($res);

            return redirect()->route('options')->with(['message' => [1, 1]]);
        } else {
            return redirect()->route('options')->with(['message' => [0]]);
        }
    }


    /**
     * Permet d'enregistré les données de la page Edition cas de nouvel enregistrement
     **/
    public function store(Request $request)
    {
        $res = $request->validate([

            'nom_option'  => 'required|max:100',
            'description_option'  => 'nullable|max:250'   ,
        ]);

        $res['date_creation'] = now() ;
        Option::query()->create($res);

        return redirect()->route('options')->with(['message' => [1, 0]]);
    }


}
