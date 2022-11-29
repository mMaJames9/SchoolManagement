<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Models\Annee;
use App\Models\Note;
use App\Models\Classe;
use App\Models\Competence;
use App\Models\Eleve;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('bulletin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(isset($request['classe']))
        {
            $selected = $request['classe'];
            $eleves = Eleve::where('annee_id', anneeId())
            ->where('classe_id', $selected)
            ->get();
        }
        else
        {
            $selected = null;
            $eleves = Eleve::where('annee_id', anneeId())
            ->where('classe_id', $selected)->get();
        }

        $annee_id = anneeId();
        $notes = Note::all();
        $classes = Classe::all()->sortByDesc("created_at");
        $sections = Classe::groupBy('nom_section')->pluck('nom_section', 'id');

        return view('admin.bulletins.index',
        compact('eleves',
        'classes',
        'sections',
        'selected',
        'notes',
        'annee_id'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBulletin(Eleve $eleve)
    {
        abort_if(Gate::denies('bulletin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $niveau0Fr = array(1, 2, 3, 4);
        $niveau0En = array(11, 12, 13, 14);

        $niveau1 = array(5, 6);
        $niveau23 = array(7, 8, 9, 10);

        $niveauEn = array(14, 15, 16, 17, 19, 20);

        if(in_array($eleve->classe_id, $niveau1))
        {
            $selected = 1;
        }
        else if(in_array($eleve->classe_id, $niveau23))
        {
            $selected = 2;
        }
        else if(in_array($eleve->classe_id, $niveauEn))
        {
            $selected = null;
        }
        else
        {
            $selected = 0;
        }

        $num_ev = getEvaluation(Carbon::now()->format('n'));

        $competences = Competence::where('niveau_competence', $selected)->get();

        return view('admin.bulletins.create', compact('competences', 'eleve', 'num_ev'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBulletin(NoteStoreRequest $request, Eleve $eleve)
    {
        $note = $request['notes'];
        $matieres = $request['matiere'];

        $num_ev = getEvaluation(Carbon::now()->format('n'));

        foreach($matieres as $key => $matiere)
        {
            $bulletin = Note::create([
                'eleve_id' => $eleve->id,
                'annee_id' => anneeId(),
                'mois_bulletin' => Carbon::now()->format('Y-m-d'),
                'matiere_id' => $matiere,
                'note_eleve' => $note[$key],
                'evaluation_id' => $num_ev,
            ]);
        }

        $status = "Les notes de $eleve->nom_eleve ont bien été enregistrées";

        $bulletin = $eleve->notes->first();

        return redirect()->route('bulletins.show', $bulletin->id)->with([
            'status' => $status,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list(Eleve $eleve)
    {

        abort_if(Gate::denies('bulletin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bulletins.list', compact('eleve'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $bulletin)
    {
        abort_if(Gate::denies('bulletin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notes = Note::where('annee_id', $bulletin->annee_id)
        ->where('eleve_id', $bulletin->eleve_id)
        ->where('mois_bulletin', $bulletin->mois_bulletin)
        ->get();

        $niveau0Fr = array(1, 2, 3, 4);
        $niveau0En = array(11, 12, 13, 14);

        $niveau1 = array(5, 6);
        $niveau23 = array(7, 8, 9, 10);

        $niveauEn = array(14, 15, 16, 17, 19, 20);

        if(in_array( $notes->first()->eleve->classe_id, $niveau1))
        {
            $selected = 1;
        }
        else if(in_array( $notes->first()->eleve->classe_id, $niveau23))
        {
            $selected = 2;
        }
        else if(in_array( $notes->first()->eleve->classe_id, $niveauEn))
        {
            $selected = null;
        }
        else
        {
            $selected = 0;
        }

        $competences = Competence::where('niveau_competence', $selected)->get();

        $eleves = Eleve::where('annee_id', anneeId())
        ->where('classe_id', $bulletin->eleve->classe_id)->get();

        $averages = array();
        $winPerc = array();

        foreach($eleves as $key => $eleve)
        {
            $trimestre = $competences->first()->matieres->first()->notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->evaluation->trimestre_id;

            $ev_trimestre = $competences->first()->matieres->first()->notes->where('eleve_id', $eleve->id)->filter(function($item) use ($trimestre) {
                return stripos($item->evaluation->trimestre->evaluations,$trimestre) !== false;
            });

            foreach($competences as $item => $competence )
            {
                $total = array();

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {

                    if($ev_trimestre->count() >= 1)
                    {
                        $evaluation1 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[0]->id)->first();
                    }

                    if($ev_trimestre->count() >= 2)
                    {
                        $evaluation2 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[1]->id)->first();
                    }

                    if($ev_trimestre->count() == 3)
                    {
                        $evaluation3 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[2]->id)->first();

                    }

                    if(!empty($evaluation1) && !empty($evaluation2) && !empty($evaluation3))
                    {
                        $moy_gen = ($evaluation1->note_eleve + $evaluation2->note_eleve + $evaluation3->note_eleve) / 3;
                    }
                    else if (!empty($evaluation1) && !empty($evaluation2))
                    {
                        $moy_gen = ($evaluation1->note_eleve + $evaluation2->note_eleve) / 2;
                    }
                    else
                    {
                        $moy_gen = $evaluation1->note_eleve;
                    }

                    $total[$i] = $moy_gen;
                }

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    if($ev_trimestre->count() >= 1)
                    {
                        $evaluation1 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[0]->id)->first();
                    }

                    if(!empty($evaluation1))
                    {
                        $somme1 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {

                            $somme1 +=  $evaluation1->note_eleve;

                        }

                        $sum1 = calculScore($somme1, $competence->matieres->sum('notation_matiere'));
                    }
                }

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    if($ev_trimestre->count() >= 2)
                    {
                        $evaluation2 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[1]->id)->first();
                    }

                    if(!empty($evaluation2))
                    {
                        $somme2 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {

                            $somme2 +=  $evaluation2->note_eleve;
                        }

                        $sum2 = calculScore($somme2, $competence->matieres->sum('notation_matiere'));
                    }
                }

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    if($ev_trimestre->count() == 3)
                    {
                        $evaluation3 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[2]->id)->first();
                    }

                    if(!empty($evaluation3))
                    {
                        $somme3 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {

                            $somme3 +=  $evaluation3->note_eleve;
                        }

                        $sum3 = calculScore($somme3, $competence->matieres->sum('notation_matiere'));
                    }
                }

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    $sommeTotale = array_sum($total);
                    $sumTotal = calculScore($sommeTotale, $competence->matieres->sum('notation_matiere'));

                    $arrayMoyenne[$item] = $sumTotal;
                }

                if($eleve->id == $bulletin->eleve_id)
                {
                    $mySommeTotale =array_sum($total);
                    $mySumTotal = calculScore($sommeTotale, $competence->matieres->sum('notation_matiere'));
                }
            }

            $gen = array_sum($arrayMoyenne) / $competences->count();
            $gen = round($gen, 2);

            if($eleve->id == $bulletin->eleve_id)
            {
                $index = $key;

                $my_gen = array_sum($arrayMoyenne) / $competences->count();
                $my_gen = round($my_gen, 2);
            }

            $averages[] = $gen;

            if($gen >= 10)
            {
                $winPerc[] = $gen;
            }

            rsort($averages);
        }

        $win = (sizeof($winPerc) / $eleves->count()) * 100;

        return view('admin.bulletins.show', compact( 'bulletin', 'notes', 'competences', 'selected', 'index', 'averages', 'my_gen', 'win'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printBulletin(Note $bulletin)
    {
        abort_if(Gate::denies('bulletin_print'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notes = Note::where('annee_id', $bulletin->annee_id)
        ->where('eleve_id', $bulletin->eleve_id)
        ->where('mois_bulletin', $bulletin->mois_bulletin)
        ->get();

        $niveau0Fr = array(1, 2, 3, 4);
        $niveau0En = array(11, 12, 13, 14);

        $niveau1 = array(5, 6);
        $niveau23 = array(7, 8, 9, 10);

        $niveauEn = array(14, 15, 16, 17, 19, 20);

        if(in_array( $notes->first()->eleve->classe_id, $niveau1))
        {
            $selected = 1;
        }
        else if(in_array( $notes->first()->eleve->classe_id, $niveau23))
        {
            $selected = 2;
        }
        else if(in_array( $notes->first()->eleve->classe_id, $niveauEn))
        {
            $selected = null;
        }
        else
        {
            $selected = 0;
        }

        $competences = Competence::where('niveau_competence', $selected)->get();

        $eleves = Eleve::where('annee_id', anneeId())
        ->where('classe_id', $bulletin->eleve->classe_id)->get();

        $averages = array();
        $winPerc = array();

        foreach($eleves as $key => $eleve)
        {
            $trimestre = $competences->first()->matieres->first()->notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->evaluation->trimestre_id;

            $ev_trimestre = $competences->first()->matieres->first()->notes->where('eleve_id', $eleve->id)->filter(function($item) use ($trimestre) {
                return stripos($item->evaluation->trimestre->evaluations,$trimestre) !== false;
            });

            foreach($competences as $item => $competence )
            {
                $total = array();

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {

                    if($ev_trimestre->count() >= 1)
                    {
                        $evaluation1 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[0]->id)->first();
                    }

                    if($ev_trimestre->count() >= 2)
                    {
                        $evaluation2 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[1]->id)->first();
                    }

                    if($ev_trimestre->count() == 3)
                    {
                        $evaluation3 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[2]->id)->first();

                    }

                    if(!empty($evaluation1) && !empty($evaluation2) && !empty($evaluation3))
                    {
                        $moy_gen = ($evaluation1->note_eleve + $evaluation2->note_eleve + $evaluation3->note_eleve) / 3;
                    }
                    else if (!empty($evaluation1) && !empty($evaluation2))
                    {
                        $moy_gen = ($evaluation1->note_eleve + $evaluation2->note_eleve) / 2;
                    }
                    else
                    {
                        $moy_gen = $evaluation1->note_eleve;
                    }

                    $total[$i] = $moy_gen;
                }

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    if($ev_trimestre->count() >= 1)
                    {
                        $evaluation1 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[0]->id)->first();
                    }

                    if(!empty($evaluation1))
                    {
                        $somme1 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {

                            $somme1 +=  $evaluation1->note_eleve;

                        }

                        $sum1 = calculScore($somme1, $competence->matieres->sum('notation_matiere'));
                    }
                }

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    if($ev_trimestre->count() >= 2)
                    {
                        $evaluation2 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[1]->id)->first();
                    }

                    if(!empty($evaluation2))
                    {
                        $somme2 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {

                            $somme2 +=  $evaluation2->note_eleve;
                        }

                        $sum2 = calculScore($somme2, $competence->matieres->sum('notation_matiere'));
                    }
                }

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    if($ev_trimestre->count() == 3)
                    {
                        $evaluation3 = $competence->matieres[$i]->notes->where('eleve_id', $eleve->id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[2]->id)->first();
                    }

                    if(!empty($evaluation3))
                    {
                        $somme3 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {

                            $somme3 +=  $evaluation3->note_eleve;
                        }

                        $sum3 = calculScore($somme3, $competence->matieres->sum('notation_matiere'));
                    }
                }

                for($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    $sommeTotale = array_sum($total);
                    $sumTotal = calculScore($sommeTotale, $competence->matieres->sum('notation_matiere'));

                    $arrayMoyenne[$item] = $sumTotal;
                }

                if($eleve->id == $bulletin->eleve_id)
                {
                    $mySommeTotale =array_sum($total);
                    $mySumTotal = calculScore($sommeTotale, $competence->matieres->sum('notation_matiere'));
                }
            }

            $gen = array_sum($arrayMoyenne) / $competences->count();
            $gen = round($gen, 2);

            if($eleve->id == $bulletin->eleve_id)
            {
                $index = $key;

                $my_gen = array_sum($arrayMoyenne) / $competences->count();
                $my_gen = round($my_gen, 2);
            }

            $averages[] = $gen;

            if($gen >= 10)
            {
                $winPerc[] = $gen;
            }

            rsort($averages);
        }

        $win = (sizeof($winPerc) / $eleves->count()) * 100;

        return view('admin.bulletins.print', compact( 'bulletin' ,'notes', 'competences', 'selected', 'index', 'averages', 'my_gen', 'win' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Eleve $eleve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBulletin(Eleve $eleve, Note $bulletin)
    {
        abort_if(Gate::denies('bulletin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notes = Note::where('annee_id', $bulletin->annee_id)
        ->where('mois_bulletin', $bulletin->mois_bulletin)
        ->where('eleve_id', $eleve->id)
        ->get();

        $niveau0Fr = array(1, 2, 3, 4);
        $niveau0En = array(11, 12, 13, 14);

        $niveau1 = array(5, 6);
        $niveau23 = array(7, 8, 9, 10);

        $niveauEn = array(14, 15, 16, 17, 19, 20);

        if(in_array( $notes->first()->eleve->classe_id, $niveau1))
        {
            $selected = 1;
        }
        else if(in_array( $notes->first()->eleve->classe_id, $niveau23))
        {
            $selected = 2;
        }
        else if(in_array( $notes->first()->eleve->classe_id, $niveauEn))
        {
            $selected = null;
        }
        else
        {
            $selected = 0;
        }

        $competences = Competence::where('niveau_competence', $selected)->get();

        $eleves = Eleve::where('annee_id', anneeId())
        ->where('classe_id', $bulletin->eleve->classe_id)->get();

        foreach($eleves as $key => $student)
        {
            if($student->id == $bulletin->eleve_id)
            {
                $index = $key;
            }
        }

        return view('admin.bulletins.edit', compact('competences', 'eleve', 'index', 'bulletin'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBulletin(NoteStoreRequest $request, Eleve $eleve, Note $bulletin)
    {
        $updates = Note::where('annee_id', $bulletin->annee_id)
        ->where('mois_bulletin', $bulletin->mois_bulletin)
        ->where('eleve_id', $eleve->id)
        ->get();

        $notes = $request['notes'];
        $matieres = $request['matiere'];

        $num_ev = getEvaluation(Carbon::now()->format('n'));

        foreach($updates as $key => $update)
        {
            $update->eleve_id = $eleve->id;
            $update->annee_id = anneeId();
            $update->mois_bulletin = Carbon::now()->format('Y-m-d');
            $update->matiere_id = $matieres[$key];
            $update->note_eleve = $notes[$key];
            $update->evaluation_id = $num_ev;

            $update->save();
        }

        $status = "Les notes de $eleve->nom_eleve ont bien été mises à jour";

        return redirect()->route('bulletins.show', $bulletin->id)->with([
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
        //
    }
}
