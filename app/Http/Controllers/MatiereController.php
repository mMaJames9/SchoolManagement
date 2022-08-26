<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatiereStoreRequest;
use App\Http\Requests\MatiereUpdateRequest;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('matiere_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matieres = Matiere::all()->sortBy("niveau_matiere");
        $data = Matiere::all()->count();

        return view('admin.matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatiereStoreRequest $request)
    {
        $matiere = Matiere::create([
            'intitule_matiere' => $request['intitule_matiere'] ,
            'niveau_matiere' => $request['niveau_matiere'] ,
            'coef_matiere' => $request['coef_matiere'] ,
        ]);

        $status = 'Ajout d\'une nouvelle matiere réussie.';

        return redirect()->route('matieres.index')->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Matiere $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Matiere $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        abort_if(Gate::denies('matiere_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.matieres.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Matiere $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(MatiereUpdateRequest $request, Matiere $matiere)
    {
        $matiere->intitule_matiere = $request['intitule_matiere'];
        $matiere->niveau_matiere = $request['niveau_matiere'];
        $matiere->coef_matiere = $request['coef_matiere'];

        $matiere->save();

        $status = 'Mise à jour de la matière réussie.';

        return redirect()->route('matieres.index')->with([
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
        abort_if(Gate::denies('matiere_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matiere = Matiere::FindOrFail($id);

        $matiere->delete();

        $status = 'Suppression de la matière réussie.';

        return redirect()->route('matieres.index')->with([
            'status' => $status,
        ]);
    }
}
