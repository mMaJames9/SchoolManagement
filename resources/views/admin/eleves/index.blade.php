<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Eleves</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Eleves</h3>
                        <p>Liste de tous les eleves de l'école. </p>
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
                        <a id="show-modal" class="btn btn-primary btn-cons" href="{{ route('eleves.create') }}">
                            <span class="fa fa-plus mr-2"></span>
                            <span>Ajouter un nouvel eleve</span>
                        </a>
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
                            <th>Age</th>
                            <th>Classe</th>
                            <th>Inscrit le</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($eleves as $key => $eleve)
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

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ \Carbon\Carbon::parse($eleve->birthday_eleve)->diff(\Carbon\Carbon::now())->format('%y ans') }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $eleve->classe->nom_classe ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                {{ date('d F Y', strtotime($eleve->created_at)) }}
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 15%">

                                <a class="btn btn-sm btn-primary" href="{{ route('eleves.show', $eleve->id) }}">
                                    <span class="fa fa-eye" data-toggle="tooltip" data-placement="top" data-original-title="Afficher les informations de cet élève"></span>
                                </a>

                                <a class="btn btn-sm btn-info" href="{{ route('eleves.edit', $eleve->id) }}">
                                    <span class="fa fa-paste" data-toggle="tooltip" data-placement="top" data-original-title="Modifier les informations de cet élève"></span>
                                </a>

                                <button class="btn btn-sm btn-danger" id="show-modal" data-target="#deleteEleve{{ $eleve->id }}" data-toggle="modal">
                                    <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="Supprimer cet élève"></span>
                                </button>

                            </td>
                        </tr>

                        <div class="modal fade slide-up disable-scroll" id="deleteEleve{{ $eleve->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteEleve{{ $eleve->id }}" aria-hidden="false">
                            <div class="modal-dialog ">
                                <div class="modal-content-wrapper">
                                    <div class="modal-content">
                                        <div class="modal-header clearfix text-left">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="pg-close fs-14"></i>
                                            </button>
                                            <h5>Confirmer <span class="semi-bold">Suppression</span></h5>
                                            <p class="p-b-10">Etes-vous sûr que vous voulez supprimer {{ strtoupper($eleve->nom_eleve ?? '' ) }} ?</p>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" action="{{ route('eleves.destroy', $eleve->id) }}" method="POST">
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

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
