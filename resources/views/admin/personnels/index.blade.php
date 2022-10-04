<x-app-layout>

    @include('admin.personnels.create')

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Personnels</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Personnel Administratif</h3>
                        <p>Liste de tout le personnel administratif de l'école. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header mb-4">

                <div class="d-flex justify-content-between">
                    <div>
                        <div class="col-xs-12">
                            <button id="show-modal" class="btn btn-primary btn-cons" data-target="#addNewPersonnel" data-toggle="modal">
                                <span class="fa fa-plus mr-md-2"></span>
                                <span class="d-none d-md-inline">Ajouter un nouvel personnel</span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <div class="col-xs-12">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Rechercher">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Age</th>
                            <th>Numéro Tel.</th>
                            <th>Expérience</th>
                            <th>Contrat</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        <tr>
                            <td class="v-align-middle text-nowrap w-lg-25">
                                <div class="item-header clearfix">
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ asset('storage/uploads/profiles/personnels/'.Auth::user()->personnel->photo_profil_personnel) }}" data-src="{{ asset('/storage/uploads/profiles/personnels/'.Auth::user()->personnel->photo_profil_personnel) }}">
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="no-margin">
                                            <strong>{{ strtoupper(Auth::user()->personnel->nom_personnel ?? '' ) }}</strong>
                                        </p>
                                        <p class="no-margin hint-text">
                                            <span>{{ ucwords(Auth::user()->personnel->prenom_personnel ?? '' ) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ \Carbon\Carbon::parse(Auth::user()->personnel->birthday_personnel)->diff(\Carbon\Carbon::now())->format('%y ans') }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ Auth::user()->personnel->phone_number ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ \Carbon\Carbon::parse(Auth::user()->personnel->experience_personnel)->diff(\Carbon\Carbon::now())->format('%y ans') }} <span class="d-inline d-lg-none">d'expérience</span></p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p> @if (Auth::user()->personnel->debut_contrat == null)
                                <span class="label label-sm label-secondary">Non signé</span>
                                @else
                                <span class="label label-sm label-info">{{ \Carbon\Carbon::parse(Auth::user()->personnel->debut_contrat)->diff(\Carbon\Carbon::parse(Auth::user()->personnel->fin_contrat))->format('%y ans %m mois') }}</span>
                                @endif</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">

                            </td>
                        </tr>

                        @foreach($personnels as $key => $personnel)
                        <tr>
                            <td class="v-align-middle text-nowrap w-lg-25">
                                <div class="item-header clearfix">
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ asset("/storage/uploads/profiles/personnels/$personnel->photo_profil_personnel") }}" data-src="{{ asset("/storage/uploads/profiles/personnels/$personnel->photo_profil_personnel") }}">
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="no-margin">
                                            <strong>{{ strtoupper($personnel->nom_personnel ?? '' ) }}</strong>
                                        </p>
                                        <p class="no-margin hint-text">
                                            <span>{{ ucwords($personnel->prenom_personnel ?? '' ) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ \Carbon\Carbon::parse($personnel->birthday_personnel)->diff(\Carbon\Carbon::now())->format('%y ans') }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ $personnel->phone_number ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p>{{ \Carbon\Carbon::parse($personnel->experience_personnel)->diff(\Carbon\Carbon::now())->format('%y ans') }} <span class="d-inline d-lg-none">d'expérience</span></p>
                            </td>

                            <td class="v-align-middle text-nowrap w-lg-15">
                                <p> @if ($personnel->debut_contrat == null)
                                <span class="label label-sm label-secondary">Non signé</span>
                                @else
                                <span class="label label-sm label-info">{{ \Carbon\Carbon::parse($personnel->debut_contrat)->diff(\Carbon\Carbon::parse($personnel->fin_contrat))->format('%y ans %m mois') }}</span>
                                @endif</p>
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center w-lg-15">

                                <a class="btn btn-sm btn-primary" href="{{ route('personnels.show', $personnel->id) }}">
                                    <span class="fa fa-eye"  data-toogle="tooltip" data-placement="top" data-original-title="Afficher les informations de cet employé"></span>
                                </a>

                                @if (isset($personnel->users) && $personnel->users->first()->roles->first()->name !== 'Fondateur')
                                <a href="{{ route('personnels.edit', $personnel->id) }}" class="btn btn-sm btn-info" data-target="#editPersonnel{{ $personnel->id }}" data-toggle="modal">
                                    <span class="fa fa-paste"  data-toogle="tooltip" data-placement="top" data-original-title="Modifier les informations de cet employé"></span>
                                </a>

                                <button id="show-modal" class="btn btn-sm btn-danger" data-target="#deletePersonnel{{ $personnel->id }}" data-toggle="modal">
                                    <span class="fa fa-trash" data-toogle="tooltip" data-placement="top" data-original-title="Supprimer cet employé"></span>
                                </button>
                                @endif
                            </td>
                        </tr>

                        <div class="modal fade slide-up disable-scroll" id="deletePersonnel{{ $personnel->id }}" tabindex="-1" role="dialog" aria-labelledby="deletePersonnel{{ $personnel->id }}" aria-hidden="false">
                            <div class="modal-dialog ">
                                <div class="modal-content-wrapper">
                                    <div class="modal-content">
                                        <div class="modal-header clearfix text-left">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="pg-close fs-14"></i>
                                            </button>
                                            <h5>Confirmer <span class="semi-bold">Suppression</span></h5>
                                            <p class="p-b-10">Etes-vous sûr que vous voulez supprimer {{ strtoupper($personnel->nom_personnel ?? '' ) }} ?</p>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" action="{{ route('personnels.destroy', $personnel->id) }}" method="POST">
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

                        @include('admin.personnels.edit')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
