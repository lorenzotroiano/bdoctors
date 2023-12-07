<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view("dashboard", compact("profiles"));
    }

    public function create()
    {

        // Controlla se l'utente autenticato ha già un profilo associato
        $userProfile = Profile::where('user_id', Auth::user()->id)->first();

        // Se l'utente ha già un profilo, reindirizzalo alla dashboard o a un'altra pagina
        if ($userProfile) {
            return redirect()->route('dashboard');
        }
        // $types = Type::all();
        $typologies = Typology::all();

        // Carica la vista 'create' e passa i tipi e le tecnologie alla vista
        return view('create', compact("typologies"));
    }

    // Salva un nuovo profile nel database
    public function store(Request $request)
    {

        // Recupera i dati dal form inviato
        $data = $request->validate(
            $this->getValidations(),
        );


        $newProfile = new Profile();
        $newProfile->user_id =  Auth::user()->id;



        $img_path = Storage::put('uploads', $data['photo']);
        $data['photo'] = $img_path;




        $newProfile->fill($data);
        $newProfile->save();

        $newProfile->typologies()->attach($data['typologies']);

        // Reindirizza all'URL della vista 'show' per visualizzare il progetto appena creato
        return redirect()->route('dashboard', $newProfile->id);
    }

        public function show(Profile $profile){
        $user = Auth::user();
        $typologies = Typology::all();
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('doctor.show', compact('profile', 'user', 'typologies'));
    }

    // VALIDATION
    public function getValidations()
    {
        return [
            "description" => "nullable|string",
            "address" => "required|string",
            "visible" => "required|boolean",
            "photo" => "image",
            "services" => "required|string",
            "typologies" => "required|array|exists:typologies,id",
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10000',
        ];
    }

    public function edit(Profile $profile){
        $user = Auth::user();
        if($user->id === $profile->user_id){
            $typologies = Typology::all();
        } else {
            abort(404);
        }
        return view('doctor.edit', compact('profile', 'typologies'));
    }

    public function update(Request $request, Profile $profile){
        $oldPhoto = $profile->photo;
        $data = $request->all();

        if ($request->hasFile('photo')) {
            Storage::delete($profile->photo);
            $data['photo'] =  Storage::put('uploads', $data['photo']);
        } else {
            $data['photo'] = $oldPhoto;
        }
        $profile->update($data);
        $profile->typologies()->sync($data['typologies']);
        return redirect()->route('dashboard');
    }
}
