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
        $newProfile->user_id = Auth::user()->id;



        $img_path = Storage::put('uploads', $data['photo']);
        $data['photo'] = $img_path;




        $newProfile->fill($data);
        $newProfile->save();

        $newProfile->typologies()->attach($data['typologies']);

        // Reindirizza all'URL della vista 'show' per visualizzare il progetto appena creato
        return redirect()->route('dashboard', $newProfile->id);
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

    public function edit(Profile $profile)
    {
        return view('doctor.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        return redirect()->route('doctor.index');
    }

    public function destroy(Profile $profile)
    {

        $this->authorize('delete', $profile);

        $profile->delete();

        return redirect()->route('dashboard')->with('success', 'Profilo eliminato con successo');
    }
}
