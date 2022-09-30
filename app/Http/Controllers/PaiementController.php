<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaiementStoreRequest;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Frais;
use App\Models\Paiement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request as FacadesRequest;

class PaiementController extends Controller
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
        abort_if(Gate::denies('paiement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        $frais = Frais::all();
        $paiements = Paiement::all();
        $classes = Classe::all()->sortByDesc("created_at");
        $sections = Classe::groupBy('nom_section')->pluck('nom_section', 'id');

        return view('admin.paiements.index',
        compact('eleves',
        'classes',
        'sections',
        'selected',
        'frais',
        'paiements',
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
    public function storePaiement(PaiementStoreRequest $request, Eleve $eleve)
    {
        $inscription = Frais::where('annee_id', $this->annee_id)
        ->where('type_frais', 'Inscription')->sum('montant_frais');
        $id_inscription = Frais::where('annee_id', $this->annee_id)
        ->where('type_frais', 'Inscription')->value('id');

        if(!empty($eleve->classe->cycle_id))
        {
            $frais = $eleve->classe->cycle_id;

            $tranche_1 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '1ere Tranche')
            ->where('cycle_id', $frais)
            ->sum('montant_frais');

            $id_tranche_1 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '1ere Tranche')
            ->where('cycle_id', $frais)
            ->value('id');

            $tranche_2 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '2eme Tranche')
            ->where('cycle_id', $frais)
            ->sum('montant_frais');

            $id_tranche_2 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '2eme Tranche')
            ->where('cycle_id', $frais)
            ->value('id');

            $tranche_3 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '3eme Tranche')
            ->where('cycle_id', $frais)
            ->sum('montant_frais');

            $id_tranche_3 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '3eme Tranche')
            ->where('cycle_id', $frais)
            ->value('id');
        }
        else
        {
            $frais = $eleve->classe_id;

            $tranche_1 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '1ere Tranche')
            ->where('classe_id', $frais)
            ->sum('montant_frais');

            $id_tranche_1 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '1ere Tranche')
            ->where('classe_id', $frais)
            ->value('id');

            $tranche_2 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '2eme Tranche')
            ->where('classe_id', $frais)
            ->sum('montant_frais');

            $id_tranche_2 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '2eme Tranche')
            ->where('classe_id', $frais)
            ->value('id');

            $tranche_3 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '3eme Tranche')
            ->where('classe_id', $frais)
            ->sum('montant_frais');

            $id_tranche_3 = Frais::where('annee_id', $this->annee_id)
            ->where('type_frais', '3eme Tranche')
            ->where('classe_id', $frais)
            ->value('id');
        }

        $pension = $inscription + $tranche_1 + $tranche_2 + $tranche_3;

        $montant_paiement = $request['montant_paiement'];

        if($montant_paiement > $pension)
        {
            $error = "Le montant versé exède la somme totale de la pension. Le montant total de la pension avec inscription pour cet élève est de ".number_format($pension, 0, ",", " "). " FCFA.";

            return redirect()->back()->with([
                'error' => $error,
            ]);
        }
        else
        {
            $versement = Paiement::where('annee_id', $this->annee_id)
            ->where('eleve_id', $eleve->id)
            ->sum('montant_paiement');


            if($versement < $inscription)
            {
                if(($montant_paiement + $versement) <= $inscription)
                {
                    $paiement = Paiement::create([
                    'montant_paiement' => $montant_paiement,
                    'eleve_id' => $eleve->id,
                    'frais_id' => $id_inscription,
                    'annee_id' => $this->annee_id,
                    ]);

                    $status = 'Le paiement de la scolarité à bien été enregistré.';

                    return redirect()->back()->with([
                        'status' => $status,
                    ]);
                }
                elseif(($montant_paiement + $versement) > $pension)
                {
                    $montant_restant = ($pension) - $versement;

                    $error = "Le montant versé exède la somme totale de la pension. Il ne manque plus que ".number_format($montant_restant, 0, ",", " "). " FCFA  à payer.";

                    return redirect()->back()->with([
                        'error' => $error,
                    ]);
                }
                else
                {
                    $montant_restant = ($versement + $montant_paiement) - $inscription;

                    $paiement1 = Paiement::create([
                    'montant_paiement' => $montant_paiement - $montant_restant,
                    'eleve_id' => $eleve->id,
                    'frais_id' => $id_inscription,
                    'annee_id' => $this->annee_id,
                    ]);

                    $montant_paiement = $montant_restant;

                    $versement = Paiement::where('annee_id', $this->annee_id)
                    ->where('eleve_id', $eleve->id)
                    ->sum('montant_paiement');

                    if($montant_paiement <= 0)
                    {
                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }
                    elseif(($montant_paiement >= $tranche_1) && (($versement - $inscription) < $tranche_1))
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $tranche_1,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_1,
                            'annee_id' => $this->annee_id,
                        ]);

                        $montant_paiement = $montant_paiement - $tranche_1;
                    }
                    else
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $montant_paiement,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_1,
                            'annee_id' => $this->annee_id,
                        ]);

                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }

                    $versement = Paiement::where('annee_id', $this->annee_id)
                    ->where('eleve_id', $eleve->id)
                    ->sum('montant_paiement');

                    if($montant_paiement <= 0)
                    {
                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }
                    elseif(($montant_paiement >= $tranche_2) && (($versement - $tranche_1 - $inscription) < $tranche_2))
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $tranche_2,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_2,
                            'annee_id' => $this->annee_id,
                        ]);

                        $montant_paiement = $montant_paiement - $tranche_2;
                    }
                    else
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $montant_paiement,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_2,
                            'annee_id' => $this->annee_id,
                        ]);

                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }

                    $versement = Paiement::where('annee_id', $this->annee_id)
                    ->where('eleve_id', $eleve->id)
                    ->sum('montant_paiement');

                    if($montant_paiement <= 0)
                    {
                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }
                    elseif(($tranche_3 <> null) && ($montant_paiement >= $tranche_3) && (($versement - $tranche_2 - $tranche_1 - $inscription) < $tranche_3))
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $tranche_3,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_3,
                            'annee_id' => $this->annee_id,
                        ]);

                        $montant_paiement = $montant_paiement - $tranche_3;
                    }
                    else
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $montant_paiement,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_3,
                            'annee_id' => $this->annee_id,
                        ]);
                    }

                    $status = 'Le paiement de la scolarité à bien été enregistré.';

                    return redirect()->back()->with([
                        'status' => $status,
                    ]);

                }
            }

            elseif(($versement < $pension) && (($versement - $inscription) < $tranche_1))
            {
                if(($montant_paiement + $versement) <= ($inscription + $tranche_1))
                {
                    $paiement = Paiement::create([
                    'montant_paiement' => $montant_paiement,
                    'eleve_id' => $eleve->id,
                    'frais_id' => $id_tranche_1,
                    'annee_id' => $this->annee_id,
                    ]);

                    $status = 'Le paiement de la scolarité à bien été enregistré.';

                    return redirect()->back()->with([
                        'status' => $status,
                    ]);
                }
                elseif(($montant_paiement + $versement) > $pension)
                {
                    $montant_restant = ($pension) - $versement;

                    $error = "Le montant versé exède la somme totale de la pension. Il ne manque plus que ".number_format($montant_restant, 0, ",", " "). " FCFA  à payer.";

                    return redirect()->back()->with([
                        'error' => $error,
                    ]);
                }
                else
                {
                    $montant_restant = ($versement + $montant_paiement) - ($inscription + $tranche_1);

                    $paiement1 = Paiement::create([
                    'montant_paiement' => $montant_paiement - $montant_restant,
                    'eleve_id' => $eleve->id,
                    'frais_id' => $id_tranche_1,
                    'annee_id' => $this->annee_id,
                    ]);

                    $montant_paiement = $montant_restant;

                    $versement = Paiement::where('annee_id', $this->annee_id)
                    ->where('eleve_id', $eleve->id)
                    ->sum('montant_paiement');

                    if($montant_paiement <= 0)
                    {
                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }
                    elseif(($montant_paiement >= $tranche_2) && (($versement - $tranche_1 - $inscription) < $tranche_2))
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $tranche_2,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_2,
                            'annee_id' => $this->annee_id,
                        ]);

                        $montant_paiement = $montant_paiement - $tranche_2;
                    }
                    else
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $montant_paiement,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_2,
                            'annee_id' => $this->annee_id,
                        ]);

                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }

                    $versement = Paiement::where('annee_id', $this->annee_id)
                    ->where('eleve_id', $eleve->id)
                    ->sum('montant_paiement');

                    if($montant_paiement <= 0)
                    {
                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }
                    elseif(($tranche_3 <> null) && ($montant_paiement >= $tranche_3) && (($versement - $tranche_2 - $tranche_1 - $inscription) < $tranche_3))
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $tranche_3,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_3,
                            'annee_id' => $this->annee_id,
                        ]);

                        $montant_paiement = $montant_paiement - $tranche_3;
                    }
                    else
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $montant_paiement,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_3,
                            'annee_id' => $this->annee_id,
                        ]);
                    }

                    $status = 'Le paiement de la scolarité à bien été enregistré.';

                    return redirect()->back()->with([
                        'status' => $status,
                    ]);

                }
            }

            elseif(($versement < $pension) && (($versement - $tranche_1 - $inscription) < $tranche_2))
            {
                if(($montant_paiement + $versement) <= ($inscription + $tranche_1 + $tranche_2))
                {
                    $paiement = Paiement::create([
                    'montant_paiement' => $montant_paiement,
                    'eleve_id' => $eleve->id,
                    'frais_id' => $id_tranche_2,
                    'annee_id' => $this->annee_id,
                    ]);

                    $status = 'Le paiement de la scolarité à bien été enregistré.';

                    return redirect()->back()->with([
                        'status' => $status,
                    ]);
                }
                elseif(($montant_paiement + $versement) > $pension)
                {
                    $montant_restant = ($pension) - $versement;

                    $error = "Le montant versé exède la somme totale de la pension. Il ne manque plus que ".number_format($montant_restant, 0, ",", " "). " FCFA  à payer.";

                    return redirect()->back()->with([
                        'error' => $error,
                    ]);
                }
                else
                {
                    $montant_restant = ($versement + $montant_paiement) - ($inscription + $tranche_1 + $tranche_2);

                    $paiement1 = Paiement::create([
                    'montant_paiement' => $montant_paiement - $montant_restant,
                    'eleve_id' => $eleve->id,
                    'frais_id' => $id_tranche_2,
                    'annee_id' => $this->annee_id,
                    ]);

                    $montant_paiement = $montant_restant;

                    $versement = Paiement::where('annee_id', $this->annee_id)
                    ->where('eleve_id', $eleve->id)
                    ->sum('montant_paiement');

                    if($montant_paiement <= 0)
                    {
                        $status = 'Le paiement de la scolarité à bien été enregistré.';

                        return redirect()->back()->with([
                            'status' => $status,
                        ]);
                    }
                    elseif(($tranche_3 <> null) && ($montant_paiement >= $tranche_3) && (($versement - $tranche_2 - $tranche_1 - $inscription) < $tranche_3))
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $tranche_3,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_3,
                            'annee_id' => $this->annee_id,
                        ]);

                        $montant_paiement = $montant_paiement - $tranche_3;
                    }
                    else
                    {
                        $paiement = Paiement::create([
                            'montant_paiement' => $montant_paiement,
                            'eleve_id' => $eleve->id,
                            'frais_id' => $id_tranche_3,
                            'annee_id' => $this->annee_id,
                        ]);
                    }

                    $status = 'Le paiement de la scolarité à bien été enregistré.';

                    return redirect()->back()->with([
                        'status' => $status,
                    ]);

                }
            }

            elseif($tranche_3 <> null && ($versement < $pension) && (($versement - $tranche_2 - $tranche_1 - $inscription) < $tranche_3))
            {
                if(($montant_paiement + $versement) <= ($pension))
                {
                    $paiement = Paiement::create([
                    'montant_paiement' => $montant_paiement,
                    'eleve_id' => $eleve->id,
                    'frais_id' => $id_tranche_3,
                    'annee_id' => $this->annee_id,
                    ]);

                    $status = 'Le paiement de la scolarité à bien été enregistré.';

                    return redirect()->back()->with([
                        'status' => $status,
                    ]);
                }
                else
                {
                    $montant_restant = ($pension) - $versement;

                    $error = "Le montant versé exède la somme nécessaire pour la 3e tranche. Il ne manque plus que ".number_format($montant_restant, 0, ",", " "). " FCFA  à payer.";

                    return redirect()->back()->with([
                        'error' => $error,
                    ]);

                }
            }

            else
            {
                $status = 'La scolarité de cet élève a été entièrement payée.';

                return redirect()->back()->with([
                    'status' => $status,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Paiement $paiements
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Paiement $paiements
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Paiement $paiements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiements)
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
        //
    }
}
