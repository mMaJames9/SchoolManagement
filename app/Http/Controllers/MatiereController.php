<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatiereStoreRequest;
use App\Http\Requests\MatiereUpdateRequest;
use App\Models\Competence;
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
    public function index(Request $request)
    {
        abort_if(Gate::denies('matiere_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(isset($request['niveau']))
        {
            $selected = $request['niveau'];
            $competences = Competence::whereHas('matieres', function ($q) use ($selected) {
                $q->where('niveau_matiere', $selected);
            })->get();

        }
        else
        {
            $selected = null;
            $competences = Competence::whereHas('matieres', function ($q) use ($selected) {
                $q->where('niveau_matiere', $selected);
            })->get();
        }

        $listCompetences = Competence::all()->pluck('intitule_competence', 'id');

        return view('admin.matieres.index', compact('competences', 'listCompetences', 'selected'));
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
        $matiere = new Matiere;
        $matiere->intitule_matiere = $request['intitule_matiere'];
        $matiere->niveau_matiere = $request['niveau_matiere'];
        $matiere->coef_matiere = $request['coef_matiere'];

        if($request->filled('checkCompetence'))
        {
            $this->validate($request, [
                'competence_id' => ['required', 'integer'],
            ]);

            $matiere->competence_id = $request['competence_id'];

            $matiere->save();
        }
        else
        {
            $competence = new Competence;

            $this->validate($request, [
                'intitule_competence' => ['required', 'string', 'max:255', 'unique:competences'],
            ]);

            $competence->intitule_competence = $request['intitule_competence'];

            $competence->save();

            $competence->matieres()->save($matiere);
        }

        $status = 'Ajout d\'une nouvelle matiere réussie.';

        return redirect()->back()->with([
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
        $matiere->competence_id = $request['competence_id'];

        $matiere->save();

        $status = 'Mise à jour de la matière réussie.';

        return redirect()->back()->with([
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

        return redirect()->back()->with([
            'status' => $status,
        ]);
    }
}
