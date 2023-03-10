<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

        public function index()
        {
            $data = User::query()->get();
            return view('user.users' , compact('data'));
        }

        public function create()
        {

            return view('user.edituser');
        }


        public function delete($id)
        {
            $o = User::query()->find($id);
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
            User::query()->whereIn('id', $ids)->delete();
            session()->flash('message', [1, 2]);
        }

        /**
         * Affiche la page d'Edition avec les données d'une ligne selectione dans grille
         **/
        public function show($id)
        {

            $model = User::query()->find($id);
            if (!isset($model)) {
                return redirect()->route('users')->with(['message' => [0]]);
            }
            return view('user.edituser', compact(['model']));
        }


        /**
         * Permet d'enregistré les données de la page Edition cas de modifier
         **/
        public function update($id, Request $request)
        {


            $res = $request->validate([

                'nom' => 'required|max:50|string',
                'prenom' => 'required|max:50|string',
                'ville' => 'nullable|min:3',
                'codepostal' => 'nullable',
                'email' => 'required|email|unique:user',
                'webSite' => 'nullable|url',
                'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                'CIN' => 'nullable|unique:user',


            ]);


            $o = User::query()->find($id);
            if (isset($o)) {


                $o->update($res);

                return redirect()->route('users')->with(['message' => [1, 1]]);
            } else {
                return redirect()->route('users')->with(['message' => [0]]);
            }
        }


        /**
         * Permet d'enregistré les données de la page Edition cas de nouvel enregistrement
         **/
        public function store(Request $request)
        {
                 $res = $request->validate([
                    'nom' => 'required|max:50|string',
                    'prenom' => 'required|max:50|string',
                    'ville' => 'nullable|min:3',
                    'codepostal' => 'nullable',
                    'email' => 'required|email|unique:user',
                    'webSite' => 'nullable|url',
                    'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                    'CIN' => 'nullable|unique:user',
                 ]);
            User::query()->create($res);

            return redirect()->route('users')->with(['message' => [1, 0]]);
        }




}
