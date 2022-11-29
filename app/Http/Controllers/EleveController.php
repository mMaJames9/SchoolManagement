<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleveStoreRequest;
use App\Http\Requests\EleveUpdateRequest;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Famille;
use App\Models\Parcours;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        abort_if(Gate::denies('eleve_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eleves = Eleve::all()->sortByDesc("created_at");
        $data = Eleve::all()->count();

        return view('admin.eleves.index', compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('eleve_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classes = Classe::all()->sortByDesc("created_at");;
        $sections = Classe::groupBy('nom_section')->pluck('nom_section', 'id');

        $familles = Famille::all();

        return view('admin.eleves.create', compact('classes', 'sections', 'familles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EleveStoreRequest $request)
    {

        // Enregister un élève
        $eleve = new Eleve;
        $eleve->matricule_eleve = $request['matricule_eleve'];
        $eleve->nom_eleve = $request['nom_eleve'];
        $eleve->prenom_eleve = $request['prenom_eleve'];
        $eleve->birthday_eleve = $request['birthday_eleve'];
        $eleve->lieu_naissance = $request['lieu_naissance'];
        $eleve->sexe_eleve = $request['sexe_eleve'];
        $eleve->annee_id = anneeId();

        if($request->filled('checkMaladie'))
        {
            $this->validate($request, [
                'maladie_hereditaire' => ['required', 'string', 'max:255'],
            ]);

            $eleve->maladie_hereditaire = $request['maladie_hereditaire'];
        }

        if($request->filled('checkChronique'))
        {
            $this->validate($request, [
                'maladie_chronique' => ['required', 'string', 'max:255'],
            ]);

            $eleve->maladie_chronique = $request['maladie_chronique'];
        }

        if($request->filled('checkAlergieAliment'))
        {
            $this->validate($request, [
                'alergie_aliment' => ['required', 'string', 'max:255'],
            ]);

            $eleve->alergie_aliment = $request['alergie_aliment'];
        }

        if($request->filled('checkAlergieMedicament'))
        {
            $this->validate($request, [
                'alergie_medicament' => ['required', 'string', 'max:255'],
            ]);

            $eleve->alergie_medicament = $request['alergie_medicament'];
        }

        if($request->filled('checkAlergieSubstance'))
        {
            $this->validate($request, [
                'alergie_substance' => ['required', 'string', 'max:255'],
            ]);

            $eleve->alergie_substance = $request['alergie_substance'];
        }

        if ($request->hasFile('photo_profil_eleve'))
        {
            $profilePath =  $request->photo_profil_eleve;
            $nameProfile = $profilePath->hashName();
            $profilePath->store('public/uploads/profiles/eleves');

            $eleve->photo_profil_eleve = $nameProfile;
        }

        if ($request->hasFile('carnet_vaccination'))
        {
            $vaccPath =  $request->carnet_vaccination;
            $nameCarnet = $vaccPath->hashName();
            $vaccPath->store('public/uploads/documents/carnets');

            $eleve->carnet_vaccination = $nameCarnet;
        }

        $eleve->acte_naissance = $request['acte_naissance'];

        if(empty($request->input('domicile_famille')))
        {
            $this->validate($request, [
                'famille_id' => ['required', 'integer'],
            ]);

            $eleve->famille_id = $request['famille_id'];
        }

        $eleve->classe_id = $request['classe_id'];


        // Enregistrer ses parents
        if ($request->filled('domicile_famille'))
        {
            $this->validate($request, [
                'domicile_famille' => ['required', 'string', 'max:255'],
            ]);

            $famille = new Famille;

            if ($request->filled('checkPere'))
            {
                $this->validate($request, [
                    'nom_pere' => ['required', 'string', 'max:255'],
                    'num_tel_pere' => ['required', 'string', 'max:255'],
                ]);

                $famille->nom_pere = $request['nom_pere'];
                $famille->num_tel_pere = $request['num_tel_pere'];
            }

            if ($request->filled('checkMere'))
            {
                $this->validate($request, [
                    'nom_mere' => ['required', 'string', 'max:255'],
                    'num_tel_mere' => ['required', 'string', 'max:255'],
                ]);

                $famille->nom_mere = $request['nom_mere'];
                $famille->num_tel_mere = $request['num_tel_mere'];
            }

            $famille->domicile_famille = $request['domicile_famille'];

            $famille->save();

            $famille->eleves()->save($eleve);


        }
        else
        {
            $eleve->save();
        }

        if($request->filled('checkRedouble'))
        {
            $this->validate($request, [
                'classe_redouble' => ['required', 'array'],
                'classe_redouble.*' => ['integer'],
            ]);

            $eleve->classes()->sync($request->input('classe_redouble', []));
        }


        // Enregister son école
        if ($request->filled('checkEcole') )
        {
            $this->validate($request, [
                'bulletin_precedent' => ['required', 'image', 'max:3072'],
                'nom_etablissement' => ['required', 'string', 'max:255'],
            ]);

            if($request->hasFile('bulletin_precedent'))
            {
                $ancBulletinPath =  $request->bulletin_precedent;
                $nameAncBull = $ancBulletinPath->hashName();
                $ancBulletinPath->store('public/uploads/documents/bulletins/anciens');
            }

            $parcours = new Parcours;
            $parcours->bulletin_precedent = $nameAncBull;
            $parcours->nom_etablissement = $request['nom_etablissement'];

            $eleve->parcours()->save($parcours);

        }

        $status = 'Création de l\'élève réussie.';

        return redirect()->route('eleves.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Eleve $eleve
     * @return \Illuminate\Http\Response
     */
    public function show(Eleve $eleve)
    {
        abort_if(Gate::denies('eleve_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classes = Classe::all()->sortByDesc("created_at");;
        $sections = Classe::groupBy('nom_section')->pluck('nom_section', 'id');

        $familles = Famille::all();
        $parcours = Parcours::all();

        $eleve->load('classes');

        return view('admin.eleves.show', compact('classes', 'sections', 'familles', 'eleve', 'parcours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Eleve $eleve
     * @return \Illuminate\Http\Response
     */
    public function edit(Eleve $eleve)
    {
        abort_if(Gate::denies('eleve_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classes = Classe::all()->sortByDesc("created_at");;
        $sections = Classe::groupBy('nom_section')->pluck('nom_section', 'id');

        $eleve->load('classes');

        return view('admin.eleves.edit', compact('classes', 'sections', 'eleve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Eleve $eleve
     * @return \Illuminate\Http\Response
     */
    public function update(EleveUpdateRequest $request, Eleve $eleve)
    {
        $eleve->matricule_eleve = $request['matricule_eleve'];
        $eleve->nom_eleve = $request['nom_eleve'];
        $eleve->prenom_eleve = $request['prenom_eleve'];
        $eleve->birthday_eleve = $request['birthday_eleve'];
        $eleve->lieu_naissance = $request['lieu_naissance'];
        $eleve->sexe_eleve = $request['sexe_eleve'];
        $eleve->annee_id = anneeId();

        if($request->filled('checkMaladie'))
        {
            $this->validate($request, [
                'maladie_hereditaire' => ['required', 'string', 'max:255'],
            ]);

            $eleve->maladie_hereditaire = $request['maladie_hereditaire'];
        }

        if($request->filled('checkChronique'))
        {
            $this->validate($request, [
                'maladie_chronique' => ['required', 'string', 'max:255'],
            ]);

            $eleve->maladie_chronique = $request['maladie_chronique'];
        }

        if($request->filled('checkAlergieAliment'))
        {
            $this->validate($request, [
                'alergie_aliment' => ['required', 'string', 'max:255'],
            ]);

            $eleve->alergie_aliment = $request['alergie_aliment'];
        }

        if($request->filled('checkAlergieMedicament'))
        {
            $this->validate($request, [
                'alergie_medicament' => ['required', 'string', 'max:255'],
            ]);

            $eleve->alergie_medicament = $request['alergie_medicament'];
        }

        if($request->filled('checkAlergieSubstance'))
        {
            $this->validate($request, [
                'alergie_substance' => ['required', 'string', 'max:255'],
            ]);

            $eleve->alergie_substance = $request['alergie_substance'];
        }

        if ($request->hasFile('photo_profil_eleve'))
        {
            $request->validate([
                'photo_profil_eleve' => ['required', 'image', 'max:3072'],
            ]);

            if ($oldProfilePath = $eleve->photo_profil_eleve)
            {
                unlink(public_path('storage/uploads/profiles/eleves/') . $oldProfilePath);
            }

            $profilePath =  $request->photo_profil_eleve;
            $nameProfile = $profilePath->hashName();
            $profilePath->store('public/uploads/profiles/eleves');

            $eleve->photo_profil_eleve = $nameProfile;
        }

        if ($request->hasFile('carnet_vaccination'))
        {
            $request->validate([
                'carnet_vaccination' => ['required', 'image', 'max:3072'],
            ]);

            if ($oldCarnetPath = $eleve->carnet_vaccination)
            {
                unlink(public_path('storage/uploads/documents/carnets/') . $oldCarnetPath);
            }

            $vaccPath =  $request->carnet_vaccination;
            $nameCarnet = $vaccPath->hashName();
            $vaccPath->store('public/uploads/documents/carnets');

            $eleve->carnet_vaccination = $nameCarnet;
        }

        $eleve->acte_naissance = $request['acte_naissance'];

        $eleve->classe_id = $request['classe_id'];

        $eleve->save();

        $status = 'Mise à jour de l\'élève réussie.';

        return redirect()->route('eleves.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('eleve_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eleve = Eleve::FindOrFail($id);

        // $ProfilePath = public_path("storage/uploads/profiles/eleves/{$eleve->photo_profil_eleve}");
        // $CarnetPath = public_path("storage/uploads/documents/carnets/{$eleve->carnet_vaccination}");

        // if(File::exists($ProfilePath))
        // {
        //     File::delete($ProfilePath);
        // }

        // if(File::exists($CarnetPath))
        // {
        //     File::delete($CarnetPath);
        // }

        $eleve->delete();

        $status = 'Suppression de l\'élève réussie.';

        return redirect()->route('eleves.index')->with([
            'status' => $status,
        ]);
    }
}
