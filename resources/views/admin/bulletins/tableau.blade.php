<div class="invoice p-2 p-sm-4 min-vh-80 d-flex flex-column">

    <div class="d-flex justify-content-center">
        <div class="text-center" style="min-width: 33%;">
            <p class="small my-0">GROUPE SCOLAIRE BILINGUE FONDATION FOZEU ET MAGAKOU</p>
            <p class="small my-0">DISCIPLINE - TRAVAIL - SUCCES</p>
            <p class="small my-0">Situé au lieu dit "Carrefour La Vie Continue"</p>
            <p class="small my-0">Tel: 675 518 855 / 699 909 321 / 691 774 565</p>
            <p class="small my-0">E-mail: FFEM@gmail.com</p>
        </div>
        <div class="text-center" style="min-width: 33%;">
            <img class="invoice-logo w-25" data-src="{{ asset('assets/img/invoice/squarespace.png') }}" src="{{ asset('assets/img/invoice/squarespace2x.png') }}">
        </div>
        <div class="text-center" style="min-width: 33%;">
            <p class="small my-0">REPUBLIQUE DU CAMEROUN</p>
            <p class="small my-0">MINISTERE DE L'EDUCATION DE BASE</p>
            <p class="small my-0">REGION DU CENTRE</p>
            <p class="small my-0">DELEGATION DE LA MEFOU & AFAMBA</p>
            <p class="small my-0">INSPECTION DE NKOLAFAMBA</p>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="mt-4 p-3 bg-dark text-center">
        <span class="bold h4 text-white mb-0">BULLETIN DE NOTES TRIMESTRIEL No.{{ $notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->evaluation->trimestre->num_trimestre }}</span>
    </div>
    <div class=" mt-0 mb-4 text-center">
        <span class="font-italic h6 mb-0">TERMLY PROGRESS REPORT CARD</span>
    </div>

    <div class="mt-2">
        <div class="d-flex sm-m-t-20 justify-content-around">

            <div class="text-left sm-no-padding w-600 outer" style="max-width: 10rem">
                <div class="mx-auto no-fit">
                    <img class="no-fit w-100" src="{{ asset("/storage/uploads/profiles/eleves").'/'.$notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->photo_profil_eleve }}" alter="{{ strtoupper($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->nom_eleve ?? '' ) }} {{ strtoupper($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->prenom_eleve ?? '' ) }}">
                </div>
            </div>

            <div class="text-left sm-no-padding" style="min-width: auto">
                <div class="no-margin d-flex justify-content-start">
                    <div class="mr-3">
                        <div class="mb-3">
                            <p class="m-0 p-0">Nom et Prénom</p>
                            <p class="m-0 p-0 font-italic">First and last name</p>
                        </div>
                        <div class="mb-3">
                            <p class="m-0 p-0">Date et lieu de naissance</p>
                            <p class="m-0 p-0 font-italic">Date and place of birth</p>
                        </div>
                        <div>
                            <p class="m-0 p-0">Matricule</p>
                            <p class="m-0 p-0 font-italic">Reg. Number</p>
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <p class="mb-4 py-2 bold">{{ strtoupper($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->nom_eleve ?? '' ) }} {{ strtoupper($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->prenom_eleve ?? '' ) }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="mb-4 py-2 bold">{{ date('d/m/Y', strtotime($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->birthday_eleve)) }} à {{ ucwords($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->lieu_naissance ?? '' ) }}</p>
                        </div>
                        <div>
                            <p class="pt-2 bold">{{ strtoupper($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->matricule_eleve ?? '' ) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-left sm-no-padding" style="min-width: auto">
                <div class="no-margin d-flex justify-content-start">
                    <div class="mr-3">
                        <div class="mb-3">
                            <p class="m-0 p-0">Salle</p>
                            <p class="m-0 p-0 font-italic">Class</p>
                        </div>
                        <div class="mb-3">
                            <p class="m-0 p-0">Effectif</p>
                            <p class="m-0 p-0 font-italic">Class size</p>
                        </div>
                        <div>
                            <p class="m-0 p-0">Redouble ?</p>
                            <p class="m-0 p-0 font-italic">Repeat</p>
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <p class="mb-4 py-2 bold">{{ strtoupper($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->classe->nom_classe ?? '' ) }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="mb-4 py-2 bold">{{ $notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->classe->eleves->count() }}</p>
                        </div>
                        <div>
                            <p class="pt-2 bold">
                                @if($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->classes->isNotEmpty())
                                Oui
                                @else
                                Non
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-left sm-no-padding" style="min-width: auto">
                <div class="no-margin d-flex justify-content-start">
                    <div class="mr-3">
                        <div class="mb-3">
                            <p class="m-0 p-0">Année scolaire</p>
                            <p class="m-0 p-0 font-italic">School year</p>
                        </div>
                        <div class="">
                            <p class="m-0 p-0">Enseignant titulaire</p>
                            <p class="m-0 p-0 font-italic">Class teacher</p>
                        </div>
                    </div>
                    <div class="ml-3">
                        <div class="mb-3">
                            <p class="mb-4 py-2 bold">{{ $notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->annee->annee_academique }}</p>
                        </div>
                        <div>
                            <p class="mb-4 py-2 bold">{{ strtoupper($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->classe->enseignant->nom_enseignant ?? '') }} {{ strtoupper($notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->eleve->classe->enseignant->prenom_enseignant ?? '') }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>

    <div class="table-responsive table-invoice my-4">
        <table class="table border table-bulletin">

            @php
                $trimestre = $competences->first()->matieres->first()->notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->evaluation->trimestre_id;

                $ev_trimestre = $competences->first()->matieres->first()->notes->where('eleve_id', $bulletin->eleve_id)->filter(function($item) use ($trimestre) {
                return stripos($item->evaluation->trimestre->evaluations,$trimestre) !== false;
                });

                $numFE = $notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->evaluation->trimestre->evaluations[0];
                $numSE = $notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->evaluation->trimestre->evaluations[1];
                $numTE = $notes->where('mois_bulletin', $bulletin->mois_bulletin)->first()->evaluation->trimestre->evaluations[2];
            @endphp

            <thead>
                <tr>
                    <th class="p-1 border text-center">Compétences</th>
                    <th class="p-1 border ">Evaluations</th>
                    <th class="p-1 border text-center">
                        CI/TL-{{ $numFE->num_evaluation }}
                    </th>
                    <th class="p-1 border text-center">
                        CI/TL-{{ $numSE->num_evaluation }}
                    </th>
                    <th class="p-1 border text-center">
                        CI/TL-{{ $numTE->num_evaluation }}
                    </th>
                    <th class="p-1 border text-center">Moy. Gen.</th>
                </tr>
            </thead>

            <tbody class="border">

                @foreach($competences as $key => $competence)
                @php
                    $total = array();
                @endphp
                <tr>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center w-25" rowspan="{{ $competence->matieres->count() + 2 }}">
                        <p class="bold">Competence {{ $loop->iteration}}</p>
                        <p>{{ ucwords(strtolower($competence->intitule_competence)) }}</p>
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap w-35">
                        <p>{{ strtoupper($competence->matieres[0]->forme_evaluation) }} - ({{ strtoupper($competence->matieres[0]->notation_matiere) }} pts)</p>
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center w-10">
                        @php
                        if($ev_trimestre->count() >= 1)
                        {
                            $evaluation1 = $competence->matieres[0]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[0]->id)->first();
                        }
                        @endphp

                        @if(!empty($evaluation1))
                        <p>{{ $evaluation1->note_eleve ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center w-10">
                        @php
                        if($ev_trimestre->count() >= 2)
                        {
                            $evaluation2 = $competence->matieres[0]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[1]->id)->first();
                        }
                        @endphp

                        @if(!empty($evaluation2))
                        <p>{{ $evaluation2->note_eleve ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center w-10">
                        @php
                        if($ev_trimestre->count() == 3)
                        {
                            $evaluation3 = $competence->matieres[0]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[2]->id)->first();
                        }
                        @endphp

                        @if(!empty($evaluation3))
                        <p>{{ $evaluation3->note_eleve ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center w-10">
                        @php
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

                        $total[0] = $moy_gen;
                        @endphp

                        <p>{{ round($moy_gen, 2) }}</p>
                    </td>

                </tr>

                @for($i = 1; $i < $competence->matieres->count(); $i++)
                <tr>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap">
                        <p>{{ strtoupper($competence->matieres[$i]->forme_evaluation) }} - ({{ strtoupper($competence->matieres[$i]->notation_matiere) }} pts)</p>
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center">
                        @php
                        if($competence->matieres[$i]->notes->count() >= 1)
                        {
                            $evaluation1 = $competence->matieres[$i]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[0]->id)->first();
                        }
                        @endphp

                        @if(!empty($evaluation1))
                        <p>{{ $evaluation1->note_eleve ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center">
                        @php
                        if($competence->matieres[$i]->notes->count() >= 2)
                        {
                            $evaluation2 = $competence->matieres[$i]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[1]->id)->first();
                        }
                        @endphp

                        @if(!empty($evaluation2))
                        <p>{{ $evaluation2->note_eleve ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center">
                        @php
                        if($competence->matieres[$i]->notes->count() == 3)
                        {
                            $evaluation3 = $competence->matieres[$i]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[2]->id)->first();
                        }
                        @endphp

                        @if(!empty($evaluation3))
                        <p>{{ $evaluation3->note_eleve ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="pt-1 pb-0 px-3 border v-align-middle text-nowrap text-center">
                        @php
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
                        @endphp

                        <p>{{ round($moy_gen, 2) }}</p>
                    </td>

                </tr>
                @endfor

                @for($i = 1; $i < $competence->matieres->count(); $i++)
                <tr>

                    <td class="bg-info text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap">
                        <p class="bold">TOTAL COMPETENCE {{ $loop->iteration }}</p>
                    </td>

                    <td class="bg-info text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap text-white text-center">
                        @if(!empty($evaluation1))
                        @php
                        $somme1 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {
                            $somme1 +=  $competence->matieres[$i]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[0]->id)->first()->note_eleve;
                        }

                        $sum1 = calculScore($somme1, $competence->matieres->sum('notation_matiere'));

                        @endphp

                        <p class="bold">{{ round($somme1, 2) ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="bg-info text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap text-white text-center">
                        @if(!empty($evaluation2))
                        @php
                        $somme2 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {
                            $somme2 +=  $competence->matieres[$i]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[1]->id)->first()->note_eleve;
                        }

                        $sum2 = calculScore($somme2, $competence->matieres->sum('notation_matiere'));

                        @endphp

                        <p class="bold">{{ round($somme2, 2) ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="bg-info text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap text-white text-center">
                        @if(!empty($evaluation3))
                        @php
                        $somme3 =null;

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {
                            $somme3 +=  $competence->matieres[$i]->notes->where('eleve_id', $bulletin->eleve_id)->where('annee_id', $bulletin->annee_id)->where('evaluation_id', $notes->first()->evaluation->trimestre->evaluations[2]->id)->first()->note_eleve;
                        }

                        $sum3 = calculScore($somme3, $competence->matieres->sum('notation_matiere'));

                        @endphp

                        <p class="bold">{{ round($somme3, 2) ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="bg-info text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap text-white text-center">
                        @php
                        $sommeTotale = array_sum($total);

                        $sumTotal = calculScore($sommeTotale, $competence->matieres->sum('notation_matiere'));

                        $arrayMoyenne[$key] = $sumTotal;

                        @endphp

                        <p class="bold">{{ round($sommeTotale, 2) ?? '-' }}</p>
                    </td>

                </tr>

                <tr class="last-row">

                    <td class="bg-success text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap">
                        <p class="bold">CÔTE</p>
                    </td>

                    <td class="bg-success text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap text-white text-center">
                        @if(!empty($evaluation1))
                        <p class="bold">{{ calculGrade($sum1) ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="bg-success text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap text-white text-center">
                        @if(!empty($evaluation2))
                        <p class="bold">{{ calculGrade($sum2) ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="bg-success text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap text-white text-center">
                        @if(!empty($evaluation3))
                        <p class="bold">{{ calculGrade($sum3) ?? '-' }}</p>
                        @endif
                    </td>

                    <td class="bg-success text-white pt-1 pb-0 px-3 border v-align-middle text-nowrap text-white text-center">
                        <p class="bold">{{ calculGrade($sumTotal) ?? '-' }}</p>
                    </td>

                </tr>
                @endfor

            @endforeach

            @php
                $gen = array_sum($arrayMoyenne) / $competences->count();

                $position = array_search($my_gen, $averages, true) + 1;

                if ($position == 1)
                {
                    $pos = "1 ER";
                }
                else
                {
                    $pos = "$position EME";
                }
            @endphp

            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-auto">
        <div class="sm-no-padding p-4 border mx-1" style="min-width: 33%;">
            <p>MOYENNE GENERALE: <span class="bold">{{ round($gen, 2) }} / 20</span></p>
            <p>NOTE GENERALE: <span class="bold">{{ calculGrade($gen) }}</span></p>
            <p>RANG: <span class="bold">{{ $pos }}</span></p>
            <p>MOYENNE DU PREMIER: <span class="bold">{{ max($averages) }} / 20</span></p>
            <p>MOYENNE DU DERNIER: <span class="bold">{{ min($averages) }} / 20</span></p>
            <p>MOYENNE DE LA CLASSE: <span class="bold">{{ round(array_sum($averages) / count($averages), 2) }} / 20</span></p>
        </div>

        <div class="sm-no-padding p-4 border mx-1 text-center" style="min-width: 33%;">
            <p class="bold fs-15 mb-4">AMÉLIORATION SUR</p>
            <div class="d-flex justify-content-center">
                <div class="text-right">
                    <p class="bold">Absences:</p>
                    <p class="bold">Retard:</p>
                    <p class="bold">vestimentaire:</p>
                    <p class="bold">Propreté:</p>
                    <p class="bold">Comportement:</p>
                </div>
                <div class="text-left">
                    <p>
                        <span class="ml-4 checkbox checkbox-primary">
                            <input type="checkbox" class="form-check-input">
                            <label>Oui</label>
                            <input type="checkbox" class="form-check-input">
                            <label>Non</label>
                        </span>
                    </p>
                    <p>
                        <span class="ml-4 checkbox checkbox-primary">
                            <input type="checkbox" class="form-check-input">
                            <label>Oui</label>
                            <input type="checkbox" class="form-check-input">
                            <label>Non</label>
                        </span>
                    </p>
                    <p>
                        <span class="ml-4 checkbox checkbox-primary">
                            <input type="checkbox" class="form-check-input">
                            <label>Oui</label>
                            <input type="checkbox" class="form-check-input">
                            <label>Non</label>
                        </span>
                    </p>
                    <p>
                        <span class="ml-4 checkbox checkbox-primary">
                            <input type="checkbox" class="form-check-input">
                            <label>Oui</label>
                            <input type="checkbox" class="form-check-input">
                            <label>Non</label>
                        </span>
                    </p>
                    <p>
                        <span class="ml-4 checkbox checkbox-primary">
                            <input type="checkbox" class="form-check-input">
                            <label>Oui</label>
                            <input type="checkbox" class="form-check-input">
                            <label>Non</label>
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="sm-no-padding border ml-1 d-flex flex-column justify-content-center" style="min-width: 33%;">

            <div class="sm-no-padding border-bottom">
                <p class="bold fs-10 text-center mb-5">SIGNATURE DE L'ENSEIGNANT: </p>
            </div>

            <div class="sm-no-padding">
                <p class="bold fs-10 pb-5 text-center mb-5">SIGNATURE ET REMARQUE DU COORDINATEUR: </p>
            </div>

            <div class="sm-no-padding border-top">
                <p class="bold fs-10 text-center mb-5">SIGNATURE DES PARENTS/TUTEUR: </p>
            </div>

        </div>
    </div>
</div>
