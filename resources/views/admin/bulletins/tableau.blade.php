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

    <div class="mt-2">
        <div class="d-flex sm-m-t-20 justify-content-around">
            <div class="text-left sm-no-padding p-4 border" style="min-width: 25rem">
                <p class="no-margin">Nom: <span class="bold">{{ strtoupper($notes->first()->eleve->nom_eleve ?? '' ) }} {{ strtoupper($notes->first()->eleve->prenom_eleve ?? '' ) }}</span></p>
                <p class="no-margin">Sexe:
                    <span class="bold">
                    @if ($notes->first()->eleve->sexe_eleve == 1)
                        FEMININ
                    @else
                        MASCULIN
                    @endif
                    </span>
                </p>
                <p class="no-margin">Date et Lieu de Naissance: <span class="bold">{{ date('d F Y', strtotime($notes->first()->eleve->birthday_eleve)) }} à {{ ucwords($notes->first()->eleve->lieu_naissance ?? '' ) }}</span></p>
                <p class="no-margin">Matricule: <span class="bold">{{ strtoupper($notes->first()->eleve->matricule_eleve ?? '' ) }}</span></p>
                <p class="no-margin">Bulletin: <span class="bold">{{ date('F Y', strtotime($notes->first()->mois_bulletin)) }}</span></p>
            </div>

            <div class="text-left sm-no-padding p-4 border" style="min-width: 25rem">
                <p class="no-margin">ANNEE SCOLAIRE: <span class="bold">{{ $notes->first()->annee->annee_academique }}</span></p>
                <p class="no-margin">NIVEAU: <span class="bold">{{ $selected }}</span></p>
                <p class="no-margin">CLASSE: <span class="bold">{{ strtoupper($notes->first()->eleve->classe->nom_classe ?? '' ) }}</span></p>
                <p class="no-margin">INSCRITS: <span class="bold">{{ $notes->first()->eleve->classe->eleves->count() }}</span></p>
                <p class="no-margin">ENSEIGNANT: <span class="bold">{{ strtoupper($notes->first()->eleve->classe->enseignant->nom_enseignant ?? '') }} {{ strtoupper($notes->first()->eleve->classe->enseignant->prenom_enseignant ?? '') }}</span></p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="table-responsive table-invoice my-4">
        <table class="table border">
            <thead>
                <tr>
                    <th class="p-1 border text-center">Compétences</th>
                    <th class="p-1 border ">Matières</th>
                    <th class="p-1 border text-center">Coef.</th>
                    <th class="p-1 border text-center">Scores</th>
                    <th class="p-1 border text-center">Notes</th>
                </tr>
            </thead>
            <tbody class="border">

                @php
                    $sum_values = 0;
                    $sum_coef = $competences->count();
                @endphp

                @foreach($competences as $key => $competence)

                <tr>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 30%" rowspan="{{ $competence->matieres->count() }}">
                        <p class="bold">Comptence {{ $loop->iteration}}</p>
                        <p>{{ ucwords(strtolower($competence->intitule_competence)) }}</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap w-lg-20">
                        <p>{{ strtoupper($competence->matieres[0]->intitule_matiere) }}</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        <p>{{ $competence->matieres[0]->coef_matiere }}</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        <p>{{ $competence->matieres[0]->notes[$index]->note_eleve }} / 20</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        <p>{{ calculGrade($competence->matieres[0]->notes[$index]->note_eleve) }}</p>
                    </td>

                </tr>

                @for($i = 1; $i < $competence->matieres->count(); $i++)

                <tr>

                    <td class="p-2 border v-align-middle text-nowrap w-lg-20">
                        <p>{{ strtoupper($competence->matieres[$i]->intitule_matiere) }}</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        <p>{{ $competence->matieres[$i]->coef_matiere }}</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        {{ $competence->matieres[$i]->notes[$index]->note_eleve }} /20
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        <p>{{ calculGrade($competence->matieres[$i]->notes[$index]->note_eleve) }}</p>
                    </td>

                </tr>
                @endfor

                <tr class="text-info">

                    <td class="p-2 v-align-middle text-nowrap w-lg-30">
                        <p></p>
                    </td>

                    <td class="p-2 v-align-middle text-nowrap w-lg-20">
                        <p class="bold">MOYENNE COMPETENCE {{ $loop->iteration }}</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        <p class="bold">{{ $competence->matieres->sum('coef_matiere') }}</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        @php
                        $value = 0;
                        $coef = $competence->matieres->sum('coef_matiere');

                        for ($i = 0; $i < $competence->matieres->count(); $i++)
                        {
                            $value += ( $competence->matieres[$i]->notes[$index]->note_eleve * $competence->matieres[$i]->coef_matiere );
                        }

                        $moy = $value / $coef;

                        $sum_values +=round($moy, 2);

                        @endphp

                        <p class="bold">{{ round($moy, 2) }} / 20</p>
                    </td>

                    <td class="p-2 border v-align-middle text-nowrap text-center" style="width: 15%">
                        <p class="bold">{{ calculGrade($moy) }}</p>
                    </td>
                </tr>

            @endforeach

            @php
                $gen = $sum_values / $sum_coef;

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
        <div class="sm-no-padding p-4 border mr-1" style="min-width: 33%;">
            <p class="fs-16">MOYENNE GENERALE: <span class="bold">{{ round($gen, 2) }} / 20</span></p>
            <p class="fs-16">NOTE GENERALE: <span class="bold">{{ calculGrade($gen) }}</span></p>
            <p class="fs-16">RANG: <span class="bold">{{ $pos }}</span></p>
            <p class="fs-16">MEILLEURE MOYENNE: <span class="bold">{{ max($averages) }} / 20</span></p>
            <p class="fs-16">MOYENNE LA PLUS BASSE: <span class="bold">{{ min($averages) }} / 20</span></p>
            <p class="fs-16">MOYENNE DE LA CLASSE: <span class="bold">{{ round(array_sum($averages) / count($averages), 2) }} / 20</span></p>
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
