<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Salaires</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Salaires</h3>
                        <p>Liste des salariés de l'école pour le mois courant. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header mb-4">
                <div class="pull-left">
                    <div class="col-xs-12">
                        <form action="{{ URL::current() }}" method="GET">
                            <button class="btn btn-complete btn-cons" name="type_salaries" value="personnel" type="submit">
                                <span class="fa fa-user-gear mr-2"></span>
                                <span>Personnel Administratif</span>
                            </button>

                            <button class="btn btn-danger btn-cons" name="type_salaries" value="enseignant" type="submit">
                                <span class="fa fa-chalkboard-teacher mr-2"></span>
                                <span>Enseignants</span>
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

                <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Numéro Tel.</th>
                            <th>Contrat</th>
                            <th>Salaire</th>
                            <th>Statut</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @foreach($employes as $key => $employe)
                        <tr>
                            <td class="v-align-middle text-nowrap" style="width: 25%">
                                <div class="item-header clearfix">
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ isset($employe->nom_personnel) ? asset("/storage/uploads/profiles/personnels/$employe->photo_profil_personnel") : asset("/storage/uploads/profiles/enseignants/$employe->photo_profil_enseignant")  }}" data-src="{{ isset($employe->nom_personnel) ? asset("/storage/uploads/profiles/personnels/$employe->photo_profil_personnel") : asset("/storage/uploads/profiles/enseignants/$employe->photo_profil_enseignant")  }}">
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="no-margin">
                                            <strong>{{ strtoupper($employe->nom_personnel ?? $employe->nom_enseignant ) }}</strong>
                                        </p>
                                        <p class="no-margin hint-text">
                                            <span>{{ ucwords($employe->prenom_personnel ?? $employe->prenom_enseignant ) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $employe->phone_number ?? $employe->num_tel_enseignant }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>@if ($employe->debut_contrat == null)
                                <span class="label label-sm label-secondary">Non signé</span>
                                @else
                                <span class="label label-sm label-info">{{ \Carbon\Carbon::parse($employe->debut_contrat)->diff(\Carbon\Carbon::parse($employe->fin_contrat))->format('%y ans %m mois') }}</span>
                                @endif</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ number_format($employe->salaire, 0, ",", " ") }} FCFA</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>
                                    @if ($employe->salaireMensuel->count() == 0)
                                    <span class="label label-warning">Impayé</span>
                                    @else
                                    <span class="label label-success">Payé</span>
                                    @endif
                                </p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 15%">
                                @if ($employe->salaires->count() <> 0)
                                <a class="btn btn-sm btn-primary" href="{{ route('salaires.show', $employe->salaireMensuel->first()->id) }}">
                                    <span class="fa fa-eye" data-toggle="tooltip" data-placement="top" data-original-title="Afficher le bulletin de paie"></span>
                                </a>
                                @endif

                                @if ($employe->salaireMensuel->count() == 0)
                                <a href="{{ route('salaires.create', $employe->id) }}" class="btn btn-sm btn-info" data-target="#paySalaire{{ $employe->id }}" data-toggle="modal">
                                    <span class="fa fa-hand-holding-dollar" data-toggle="tooltip" data-placement="top" data-original-title="Payer l'employé"></span>
                                </a>
                                @endif

                            </td>
                        </tr>

                        @include('admin.salaires.create')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
