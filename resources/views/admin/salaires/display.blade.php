<div class="invoice p-2 p-sm-4 min-vh-100 d-flex flex-column">

    <div class="border-bottom pb-4">
        <div class="d-flex justify-content-between">
            <div>
                <img class="invoice-logo w-50" data-src="{{ asset('assets/img/invoice/squarespace.png') }}" src="{{ asset('assets/img/invoice/squarespace2x.png') }}">
                <address class="font-montserrat">
                    <p class="mb-0  ">Situé au lieu dit "Carrefour La Vie Continue"</p>
                    <p class="mb-0">NGONA 200m de la route principale</p>
                    <p class="mb-0">(+237) 675 518 855, (+237) 699 909 321, (+237) 691 774 565</p>
                    <p class="mb-0">FFEM@gmail.com</p>
                </address>
            </div>
            <div>
                <div class="sm-no-padding pt-4">
                    <h2 class="font-montserrat all-caps hint-text">BULLETIN DE PAIE</h2>
                </div>

                <div class="sm-no-padding sm-p-b-20 d-flex align-items-start justify-content-start mt-3">
                    <div class="mr-2">
                        <div class="font-montserrat bold all-caps">Année scolaire :</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="text-left">
                        <div class="">{{ $anne_academique }}</div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-2">
        <div class="sm-m-t-20">
            <div class="sm-no-padding pt-4">
                <p class="small no-margin">Bulletin de paie pour:</p>
                <span class="bold m-t-0">
                    <div>
                        <span class="h5">{{ isset($salaire->enseignant_id) ? strtoupper($salaire->enseignant->nom_enseignant) : strtoupper($salaire->personnel->nom_personnel)  }}</span>
                        <span class="h5">{{ isset($salaire->enseignant_id) ? strtoupper($salaire->enseignant->prenom_enseignant) : strtoupper($salaire->personnel->prenom_personnel)  }}</span>
                    </div>
                    <div>
                        <span class="fs-12 all-caps font-montserrat bold">{{ isset($salaire->enseignant_id) ? strtoupper($salaire->enseignant->matricule_enseignant) : ''  }}</span>
                    </div>
                </span>
                <div class="mt-3">
                    <strong>Informations Personnelles:</strong>
                    <div>
                        <span class="fs-12 all-caps font-montserrat">Numéro de Téléphone : </span>
                        <span>{{ isset($salaire->enseignant_id) ? strtoupper($salaire->enseignant->num_tel_enseignant) : $salaire->personnel->phone_number  }}</span>
                    </div>
                    <div>
                        <span class="fs-12 all-caps font-montserrat">Début contrat : </span>
                        <span>
                            {{
                                isset($salaire->enseignant_id) ?
                                (isset($salaire->enseignant->debut_contrat) ? date('d F Y', strtotime($salaire->enseignant->debut_contrat)) : 'NON SIGNE')
                                :
                                (isset($salaire->personnel->debut_contrat) ? date('d F Y', strtotime($salaire->personnel->debut_contrat)) : 'NON SIGNE')
                            }}
                        </span>
                    </div>
                    @if (isset($salaire->enseignant_id) ? isset($salaire->enseignant->debut_contrat) : isset($salaire->personnel->debut_contrat))
                    <div>
                        <span class="fs-12 all-caps font-montserrat">Fin contrat : </span>
                        <span>
                            {{
                                isset($salaire->enseignant_id) ?
                                (isset($salaire->enseignant->fin_contrat) ? date('d F Y', strtotime($salaire->enseignant->fin_contrat)) : 'NON SIGNE')
                                :
                                (isset($salaire->personnel->fin_contrat) ? date('d F Y', strtotime($salaire->personnel->fin_contrat)) : 'NON SIGNE')
                            }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="table-responsive table-invoice my-4">
        <table class="table border-top">
            <thead>
                <tr>
                    <th class="">Mois</th>
                    <th class="text-lg-center">Montant</th>
                    <th class="text-lg-center">Date</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($salaires->where(isset($salaire->enseignant_id) ? 'enseignant_id' : 'personnel_id', isset($salaire->enseignant_id) ? $salaire->enseignant->id : $salaire->personnel->id) as $key => $paiement)
                <tr>
                    <td class="">
                        <p class="text-black">{{ date('F Y', strtotime($paiement->date_paiement_salaire)) }}</p>
                    </td>
                    <td class="text-center">{{ number_format($paiement->montant_salaire, 0, ",", " ") }} FCFA</td>
                    <td class="text-center">{{ date('d F Y', strtotime($paiement->created_at)) }}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between mt-auto">
        <div class="">
            <img width="30%" class="invoice-signature" src="{{ asset('assets/img/invoice/signature2x.png') }}">
            <p>Mme. {{ strtoupper(Auth::user()->personnel->nom_personnel) }}</p>
        </div>

        <div class="bg-dark px-5 text-right text-nowrap py-3">
            <h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">Total</h5>
            <h2 class="no-margin text-white semi-bold">
                {{ isset($salaire->enseignant_id) ? number_format($salaires
                ->where(isset($salaire->enseignant_id) ? 'enseignant_id' : 'personnel_id', isset($salaire->enseignant_id) ? $salaire->enseignant->id : $salaire->personnel->id)
                ->sum('montant_salaire'), 0, ",", " ")
                :
                number_format($salaires
                ->where(isset($salaire->enseignant_id) ? 'enseignant_id' : 'personnel_id', isset($salaire->enseignant_id) ? $salaire->enseignant->id : $salaire->personnel->id)
                ->sum('montant_salaire'), 0, ",", " ") }}
                FCFA
            </h2>
        </div>
    </div>

    <p class="small hint-text border-top mt-5">Document à conserver sans limitation de durée. Aucun duplicatat ne pourra être délivré.</p>
</div>
