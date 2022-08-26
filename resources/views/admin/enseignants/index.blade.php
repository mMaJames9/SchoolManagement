<x-app-layout>

    @include('admin.enseignants.create')

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Enseignants</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Enseignants</h3>
                        <p>Liste de tous les enseignants de l'école. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header mb-4 mb-4">
                <div class="pull-left">
                    <div class="col-xs-12">
                        <button id="show-modal" class="btn btn-primary btn-cons" data-target="#addNewEnseignant" data-toggle="modal">
                            <span class="fa fa-plus mr-2"></span>
                            <span>Ajouter un nouvel enseignant</span>
                        </button>
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
                <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Matricule</th>
                            <th>Numéro Tel.</th>
                            <th>Age</th>
                            <th>Expérience</th>
                            <th>Contrat</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($enseignants as $key => $enseignant)
                        <tr>

                            <td class="v-align-middle text-nowrap" style="width: 20%">
                                <div class="item-header clearfix">
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ asset("/storage/uploads/profiles/enseignants/$enseignant->photo_profil_enseignant") }}" data-src="{{ asset("/storage/uploads/profiles/enseignants/$enseignant->photo_profil_enseignant") }}">
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="no-margin">
                                            <strong>{{ strtoupper($enseignant->nom_enseignant ?? '' ) }}</strong>
                                        </p>
                                        <p class="no-margin hint-text">
                                            <span>{{ ucwords($enseignant->prenom_enseignant ?? '' ) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $enseignant->matricule_enseignant ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $enseignant->num_tel_enseignant ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ \Carbon\Carbon::parse($enseignant->birthday_enseignant)->diff(\Carbon\Carbon::now())->format('%y ans') }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 10%">
                                <p>{{ $enseignant->experience_enseignant ?? '' }} ans</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p> @if ($enseignant->debut_contrat == null)
                                <span class="label label-sm label-secondary">Non signé</span>
                                @else
                                <span class="label label-sm label-info">{{ \Carbon\Carbon::parse($enseignant->debut_contrat)->diff(\Carbon\Carbon::parse($enseignant->fin_contrat))->format('%y ans %m mois') }}</span>
                                @endif</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 15%">

                                <a class="btn btn-sm btn-primary" href="{{ route('enseignants.show', $enseignant->id) }}">
                                    <span class="fa fa-eye" data-toogle="tooltip" data-placement="top" data-original-title="Afficher les informations de cet enseignant"></span>
                                </a>

                                <a href="{{ route('enseignants.edit', $enseignant->id) }}" class="btn btn-sm btn-info" data-target="#editEnseignant{{ $enseignant->id }}" data-toggle="modal">
                                    <span class="fa fa-paste" data-toogle="tooltip" data-placement="top" data-original-title="Modifier les informations de cet enseignant"></span>
                                </a>

                                <button id="show-modal" class="btn btn-sm btn-danger" data-target="#deleteEnseignant{{ $enseignant->id }}" data-toggle="modal">
                                    <span class="fa fa-trash" data-toogle="tooltip" data-placement="top" data-original-title="Supprimer cet enseignant"></span>
                                </button>

                            </td>
                        </tr>

                        <div class="modal fade slide-up disable-scroll" id="deleteEnseignant{{ $enseignant->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteEnseignant{{ $enseignant->id }}" aria-hidden="false">
                            <div class="modal-dialog ">
                                <div class="modal-content-wrapper">
                                    <div class="modal-content">
                                        <div class="modal-header clearfix text-left">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="pg-close fs-14"></i>
                                            </button>
                                            <h5>Confirmer <span class="semi-bold">Suppression</span></h5>
                                            <p class="p-b-10">Etes-vous sûr que vous voulez supprimer {{ strtoupper($enseignant->nom_enseignant ?? '' ) }} ?</p>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" action="{{ route('enseignants.destroy', $enseignant->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <div class="pull-right">
                                                    <button type="button" class="btn btn-secondary m-t-5" data-dismiss="modal">Annuler</button>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger m-t-5">Supprimer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('admin.enseignants.edit')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
