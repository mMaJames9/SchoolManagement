<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    @if (!empty($selected))
                    <li class="breadcrumb-item"><a href="{{ route('paiements.index') }}">Frais de scolarité</a></li>
                    <li class="breadcrumb-item active">{{ $classes->where('id', $selected)->first()->nom_classe }}</li>
                    @else
                    <li class="breadcrumb-item active">Frais de scolarité</li>
                    @endif
                    
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Paiement Scolarité</h3>
                        <p>Selectionner la classe pour pourvoir enregistrer les paiements de l'élève. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header mb-4 mb-4 ">

                <div class="pull-left">
                    <div class="col-xs-12">
                       
                        <form class="d-flex" action="{{ URL::current() }}" method="GET">

                            <div class="mr-2">
                                <select class="form-control" id="classe" name="classe">
                                    <option selected disabled hidden>Selectionner la classe...</option>
                                    @foreach($sections as $key => $section)
                                    <optgroup label="{{ $section }}">
                                        @foreach($classes as $key => $classe)
                                        @if($section == $classe->nom_section)
                                        <option value="{{ $classe->id }}" {{ ($classe ? $classe->id : old('classe')) == $selected    ? 'selected' : '' }}>{{ ucwords($classe->nom_classe) }}</option>
                                        @endif
                                        
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        
                            
                            <button type="submit" class="btn btn-info">
                                <span>Rechercher</span>
                            </button>
                        </form>
                    </div>
                </div>
                    
                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Rechercher">
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <table class="table table-hover demo-table-search table-responsive-lg" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Matricule</th>
                            <th class="text-lg-center">Inscription</th>
                            <th class="text-lg-center">1ere Tranche</th>
                            <th class="text-lg-center">2e Tranche</th>
                            <th class="text-lg-center">3e Tranche</th> 
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($eleves as $key => $eleve)

                        @php
                        $inscription = $frais->where('annee_id', $annee_id)
                        ->where('type_frais', 'Inscription')->sum('montant_frais');
                        $id_inscription = $frais->where('annee_id', $annee_id)
                        ->where('type_frais', 'Inscription')->value('id');
                        
                        if(!empty($eleve->classe->cycle_id))
                        {
                            $corr = $eleve->classe->cycle_id;

                            $tranche_1 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '1ere Tranche')
                            ->where('cycle_id', $corr)
                            ->sum('montant_frais');

                            $id_tranche_1 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '1ere Tranche')
                            ->where('cycle_id', $corr)
                            ->value('id');

                            $tranche_2 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '2eme Tranche')
                            ->where('cycle_id', $corr)
                            ->sum('montant_frais');

                            $id_tranche_2 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '2eme Tranche')
                            ->where('cycle_id', $corr)
                            ->value('id');

                            $tranche_3 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '3eme Tranche')
                            ->where('cycle_id', $corr)
                            ->sum('montant_frais');

                            $id_tranche_3 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '3eme Tranche')
                            ->where('cycle_id', $corr)
                            ->value('id');
                        }
                        else
                        {
                            $corr = $eleve->classe_id;
                            
                            $tranche_1 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '1ere Tranche')
                            ->where('classe_id', $corr)
                            ->sum('montant_frais');

                            $id_tranche_1 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '1ere Tranche')
                            ->where('classe_id', $corr)
                            ->value('id');

                            $tranche_2 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '2eme Tranche')
                            ->where('classe_id', $corr)
                            ->sum('montant_frais');

                            $id_tranche_2 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '2eme Tranche')
                            ->where('classe_id', $corr)
                            ->value('id');

                            $tranche_3 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '3eme Tranche')
                            ->where('classe_id', $corr)
                            ->sum('montant_frais');

                            $id_tranche_3 = $frais->where('annee_id', $annee_id)
                            ->where('type_frais', '3eme Tranche')
                            ->where('classe_id', $corr)
                            ->value('id');
                        }
                        
                        $versement = $eleve->paiements->sum('montant_paiement');
                        
                        @endphp

                        <tr>

                            <td class="v-align-middle text-nowrap" style="width: 25%">
                                <div class="item-header clearfix">
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ asset("/storage/uploads/profiles/eleves/$eleve->photo_profil_eleve") }}" data-src="{{ asset("/storage/uploads/profiles/eleves/$eleve->photo_profil_eleve") }}">
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="no-margin">
                                            <strong>{{ strtoupper($eleve->nom_eleve ?? '' ) }}</strong>
                                        </p>
                                        <p class="no-margin hint-text">
                                            <span>{{ ucwords($eleve->prenom_eleve ?? '' ) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $eleve->matricule_eleve ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 10%">

                                @php
                                    $montant_restant = $inscription - $versement;
                                @endphp
                                
                                @if($eleve->paiements->where('frais_id', $id_inscription)->sum('montant_paiement') == 0)
                                <span class="label label-sm label-danger">Pas payé</span>
                                @elseif ($eleve->paiements->where('frais_id', $id_inscription)->sum('montant_paiement') < $inscription)
                                <span class="label label-sm label-info">Incomplet (-{{ number_format($montant_restant, 0, ",", " ") }} FCFA)</span>
                                @else
                                <span class="label label-sm label-success">Complet</span>
                                @endif
                                
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 10%">

                                @php
                                    $montant_restant = ($inscription + $tranche_1) - $versement;
                                @endphp
                                
                                @if($eleve->paiements->where('frais_id', $id_tranche_1)->sum('montant_paiement') == 0)
                                <span class="label label-sm label-danger">Pas payé</span>
                                @elseif ($eleve->paiements->where('frais_id', $id_tranche_1)->sum('montant_paiement') < $tranche_1)
                                <span class="label label-sm label-info">Incomplet (-{{ number_format($montant_restant, 0, ",", " ") }} FCFA)</span>
                                @else
                                <span class="label label-sm label-success">Complet</span>
                                @endif
                                
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 10%">

                                @php
                                    $montant_restant = ($inscription + $tranche_1 + $tranche_2) - $versement;
                                @endphp
                                
                                @if($eleve->paiements->where('frais_id', $id_tranche_2)->sum('montant_paiement') == 0)
                                <span class="label label-sm label-danger">Pas payé</span>
                                @elseif ($eleve->paiements->where('frais_id', $id_tranche_2)->sum('montant_paiement') < $tranche_2)
                                <span class="label label-sm label-info">Incomplet (-{{ number_format($montant_restant, 0, ",", " ") }} FCFA)</span>
                                @else
                                <span class="label label-sm label-success">Complet</span>
                                @endif
                                
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 10%">

                                @if ($tranche_3 <> 0)
                                    @php
                                        $montant_restant = ($inscription + $tranche_1 + $tranche_2 + $tranche_3) - $versement;
                                    @endphp
                                    
                                    @if($eleve->paiements->where('frais_id', $id_tranche_3)->sum('montant_paiement') == 0)
                                    <span class="label label-sm label-danger">Pas payé</span>
                                    @elseif ($eleve->paiements->where('frais_id', $id_tranche_3)->sum('montant_paiement') < $tranche_3)
                                    <span class="label label-sm label-info">Incomplet (-{{ number_format($montant_restant, 0, ",", " ") }} FCFA)</span>
                                    @else
                                    <span class="label label-sm label-success">Complet</span>
                                    @endif
                                @else
                                -
                                @endif

                                
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center">

                                <a href="{{ route('paiements.create', $eleve->id) }}" class="btn btn-sm btn-info" data-target="#payFrais{{ $eleve->id }}" data-toggle="modal">
                                    <span class="fa fa-hand-holding-dollar" data-toggle="tooltip" data-placement="top" data-original-title="Payer l'employé"></span>
                                </a>

                            </td>
                        </tr>

                        @include('admin.paiements.create')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
