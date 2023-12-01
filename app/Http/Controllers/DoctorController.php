<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return view("dashboard", compact("profiles"));
    }

    public function create()
    {

        // $types = Type::all();
        // $technologies = Technology::all();

        // Carica la vista 'create' e passa i tipi e le tecnologie alla vista
        return view('create');
    }

    // Salva un nuovo profile nel database
    public function store(Request $request)
    {
        // Recupera i dati dal form inviato
        $data = $request->all();


        $newProfile = new Profile();
        $newProfile->user_id =  Auth::user()->id;


        //per l'immagine
        // $img_path = Storage::put('uploads', $data['immagine']);
        // $data['immagine'] = $img_path;



        $newProfile->fill($data);
        $newProfile->save();

        // Reindirizza all'URL della vista 'show' per visualizzare il progetto appena creato
        return redirect()->route('dashboard', $newProfile->id);
    }
}
