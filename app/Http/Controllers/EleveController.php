<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleveStoreRequest;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Famille;
use App\Models\Parcours;
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
        if ($request->hasFile('photo_profil_eleve'))
        {
            $profilePath =  $request->bulletin_precedent;
            $nameProfile = $profilePath->hashName();
            $picPath = public_path('storage/uploads/profiles/eleves');
            $profilePath->move($picPath, $nameProfile);
        }

        if ($request->hasFile('bulletin_precedent'))
        {
            $ancBulletinPath =  $request->bulletin_precedent;
            $nameAncBull = $ancBulletinPath->hashName();
            $abPath = public_path('storage/uploads/documents/bulletins/anciens');
            $ancBulletinPath->move($abPath, $nameAncBull);
        }

        if ($request->hasFile('carnet_vaccination'))
        {
            $vaccPath =  $request->carnet_vaccination;
            $nameCarnet = $vaccPath->hashName();
            $carnetPath = public_path('storage/uploads/documents/carnets');
            $vaccPath->move($carnetPath, $nameCarnet);
        }

        if ($request->has('nom_pere'))
        {
            $famille = new Famille;
            $famille->nom_pere = $request['nom_pere'] ?? null;
            $famille->num_tel_pere = $request['num_tel_pere'] ?? null;
            $famille->nom_mere = $request['nom_mere'] ?? null;
            $famille->num_tel_mere = $request['num_tel_mere'] ?? null;
            $famille->domicile_famille = $request['domicile_famille'];
        }

        if($request->has('nom_etablissement'))
        {
            $parcours = new Parcours;
            $parcours->bulletin_precedent = $nameAncBull ?? null;
            $parcours->nom_etablissement = $request['nom_etablissement'] ?? null;
        }

        $eleve = new Eleve;
        $eleve->matricule_eleve = $request['matricule_eleve'];
        $eleve->nom_eleve = $request['nom_eleve'];
        $eleve->prenom_eleve = $request['prenom_eleve'];
        $eleve->age_eleve = $request['age_eleve'];
        $eleve->sexe_eleve = $request['sexe_eleve'];
        $eleve->photo_profil_eleve = $nameProfile;
        $eleve->maladie_hereditaire = $request['maladie_hereditaire'];
        $eleve->acte_naissance = $request['acte_naissance'];
        $eleve->fiche_renseignement = $request['fiche_renseignement'];
        $eleve->carnet_vaccination = $nameCarnet;

        if(empty($request->input('nom_pere') && $request->input('nom_mere')))
        {
            $eleve->famille_id = $request['famille_id'] ?? null;
        }

        $eleve->classe_id = $request['classe_id'];
        $eleve->save();

        if($request->has('nom_pere') || $request->has('nom_mere'))
        {
            $eleve->famille()->save($famille);
        }

        if($request->has('nom_etablissement'))
        {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $eleve->delete();

        $status = 'Suppression de l\'élève réussie.';

        return redirect()->route('eleves.index')->with([
            'status' => $status,
        ]);
    }
}
