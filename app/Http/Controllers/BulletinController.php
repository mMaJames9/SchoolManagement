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
    private $annee_id;

    public function __construct()
    {
        if(Carbon::now()->month >= 8 && Carbon::now()->month <= 12)
        {
            $this->annee_id = Annee::where('year_from', Carbon::now()->year)->value('id');
        }
        else
        {
            $previous_year = Carbon::now()->subYear(1)->year;

            $this->annee_id = Annee::where('year_from', $previous_year)->value('id');
        }
    }

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
            $eleves = Eleve::where('annee_id', $this->annee_id)
            ->where('classe_id', $selected)
            ->get();
        }
        else
        {
            $selected = null;
            $eleves = Eleve::where('annee_id', $this->annee_id)
            ->where('classe_id', $selected)->get();
        }

        $annee_id = $this->annee_id;
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

        $niveau0 = array(1, 2, 3, 4, 11, 12, 13, 14);
        $niveau1 = array(5, 6, 14, 15);
        $niveau2 = array(7, 8, 16, 17);
        $niveau3 = array(9, 10, 19, 20);

        if(in_array($eleve->classe_id, $niveau0))
        {
            $selected = 0;
        }
        else if(in_array($eleve->classe_id, $niveau1))
        {
            $selected = 1;
        }
        else if(in_array($eleve->classe_id, $niveau2))
        {
            $selected = 2;
        }
        else
        {
            $selected = 3;
        }

        $competences = Competence::whereHas('matieres', function ($q) use ($selected) {
            $q->where('niveau_matiere', $selected);
        })->get();

        return view('admin.bulletins.create', compact('competences', 'eleve'));
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

        foreach($matieres as $key => $matiere)
        {
            $bulletin = Note::create([
                'eleve_id' => $eleve->id,
                'annee_id' => $this->annee_id,
                'mois_bulletin' => Carbon::now()->format('Y-m'),
                'matiere_id' => $matiere,
                'note_eleve' => $note[$key],
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

        $notes = Note::where('annee_id', $bulletin->annee_id,)
        ->where('mois_bulletin', $bulletin->mois_bulletin)
        ->where('eleve_id', $bulletin->eleve_id)
        ->get();

        $niveau0 = array(1, 2, 3, 4, 11, 12, 13, 14);
        $niveau1 = array(5, 6, 14, 15);
        $niveau2 = array(7, 8, 16, 17);
        $niveau3 = array(9, 10, 19, 20);

        if(in_array($notes->first()->eleve->classe_id, $niveau0))
        {
            $selected = 0;
        }
        else if(in_array($notes->first()->eleve->classe_id, $niveau1))
        {
            $selected = 1;
        }
        else if(in_array($notes->first()->eleve->classe_id, $niveau2))
        {
            $selected = 2;
        }
        else
        {
            $selected = 3;
        }

        $competences = Competence::whereHas('matieres', function ($q) use ($selected) {
            $q->where('niveau_matiere', $selected);
        })->get();

        $eleves = Eleve::where('annee_id', $this->annee_id)
        ->where('classe_id', $bulletin->eleve->classe_id)->get();

        $averages = array();

        foreach($eleves as $key => $eleve)
        {
            $sum_values = 0;
            $my_sum_values = 0;
            $sum_coef = $competences->count();

            foreach($competences as $competence )
            {
                $value = 0;
                $coef = $competence->matieres->sum('coef_matiere');

                for ($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    $value += ( $competence->matieres[$i]->notes[$key]->note_eleve * $competence->matieres[$i]->coef_matiere );
                }

                $moy = $value / $coef;
                $sum_values += round($moy, 2);

                if($eleve->id == $bulletin->eleve_id)
                {
                    $my_moy = $value / $coef;
                    $my_sum_values += round($moy, 2);
                }
            }

            $gen = $sum_values / $sum_coef;
            $gen = round($gen, 2);

            if($eleve->id == $bulletin->eleve_id)
            {
                $index = $key;

                $my_gen = $my_sum_values / $sum_coef;
                $my_gen = round($my_gen, 2);

            }

            $averages[] = $gen;
            rsort($averages);
        }

        return view('admin.bulletins.show', compact('notes', 'competences', 'selected', 'index', 'averages', 'my_gen' ));
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

        $notes = Note::where('annee_id', $bulletin->annee_id,)
        ->where('mois_bulletin', $bulletin->mois_bulletin)
        ->where('eleve_id', $bulletin->eleve_id)
        ->get();

        $niveau0 = array(1, 2, 3, 4, 11, 12, 13, 14);
        $niveau1 = array(5, 6, 14, 15);
        $niveau2 = array(7, 8, 16, 17);
        $niveau3 = array(9, 10, 19, 20);

        if(in_array($notes->first()->eleve->classe_id, $niveau0))
        {
            $selected = 0;
        }
        else if(in_array($notes->first()->eleve->classe_id, $niveau1))
        {
            $selected = 1;
        }
        else if(in_array($notes->first()->eleve->classe_id, $niveau2))
        {
            $selected = 2;
        }
        else
        {
            $selected = 3;
        }

        $competences = Competence::whereHas('matieres', function ($q) use ($selected) {
            $q->where('niveau_matiere', $selected);
        })->get();

        $eleves = Eleve::where('annee_id', $this->annee_id)
        ->where('classe_id', $bulletin->eleve->classe_id)->get();

        $averages = array();

        foreach($eleves as $key => $eleve)
        {
            $sum_values = 0;
            $my_sum_values = 0;
            $sum_coef = $competences->count();

            foreach($competences as $competence )
            {
                $value = 0;
                $coef = $competence->matieres->sum('coef_matiere');

                for ($i = 0; $i < $competence->matieres->count(); $i++)
                {
                    $value += ( $competence->matieres[$i]->notes[$key]->note_eleve * $competence->matieres[$i]->coef_matiere );
                }

                $moy = $value / $coef;
                $sum_values += round($moy, 2);

                if($eleve->id == $bulletin->eleve_id)
                {
                    $my_moy = $value / $coef;
                    $my_sum_values += round($moy, 2);
                }
            }

            $gen = $sum_values / $sum_coef;
            $gen = round($gen, 2);

            if($eleve->id == $bulletin->eleve_id)
            {
                $index = $key;

                $my_gen = $my_sum_values / $sum_coef;
                $my_gen = round($my_gen, 2);

            }

            $averages[] = $gen;
            rsort($averages);
        }

        return view('admin.bulletins.print', compact('notes', 'competences', 'selected', 'index', 'averages', 'my_gen' ));
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

        $notes = Note::where('annee_id', $bulletin->annee_id,)
        ->where('mois_bulletin', $bulletin->mois_bulletin)
        ->where('eleve_id', $eleve->id)
        ->get();

        $niveau0 = array(1, 2, 3, 4, 11, 12, 13, 14);
        $niveau1 = array(5, 6, 14, 15);
        $niveau2 = array(7, 8, 16, 17);
        $niveau3 = array(9, 10, 19, 20);

        if(in_array($notes->first()->eleve->classe_id, $niveau0))
        {
            $selected = 0;
        }
        else if(in_array($notes->first()->eleve->classe_id, $niveau1))
        {
            $selected = 1;
        }
        else if(in_array($notes->first()->eleve->classe_id, $niveau2))
        {
            $selected = 2;
        }
        else
        {
            $selected = 3;
        }

        $competences = Competence::whereHas('matieres', function ($q) use ($selected) {
            $q->where('niveau_matiere', $selected);
        })->get();

        $eleves = Eleve::where('annee_id', $this->annee_id)
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
        $updates = Note::where('annee_id', $bulletin->annee_id,)
        ->where('mois_bulletin', $bulletin->mois_bulletin)
        ->where('eleve_id', $eleve->id)
        ->get();

        $notes = $request['notes'];
        $matieres = $request['matiere'];

        // dd($updates);

        foreach($updates as $key => $update)
        {
            $update->eleve_id = $eleve->id;
            $update->annee_id = $this->annee_id;
            $update->mois_bulletin = Carbon::now()->format('Y-m');
            $update->matiere_id = $matieres[$key];
            $update->note_eleve = $notes[$key];

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
