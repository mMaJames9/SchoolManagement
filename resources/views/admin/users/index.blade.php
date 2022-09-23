<x-app-layout>

    @include('admin.users.create')

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Utilisateurs</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Utilisateurs</h3>
                        <p>Liste de tous les utilisateurs de cette application. </p>
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
                        <button id="show-modal" class="btn btn-primary btn-cons" data-target="#addNewUser" data-toggle="modal">
                            <span class="fa fa-plus mr-2"></span>
                            <span>Ajouter un nouvel utilisateur</span>
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
                <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Numéro Tel.</th>
                            <th>Rôle</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr>

                            <td class="v-align-middle text-nowrap" style="width: 30%">
                                <div class="item-header clearfix">
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ asset('storage/uploads/profiles/personnels/'.Auth::user()->personnel->photo_profil_personnel) }}" data-src="{{ asset('storage/uploads/profiles/personnels/'.Auth::user()->personnel->photo_profil_personnel) }}">
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

                            <td class="v-align-middle text-nowrap" style="width: 20%">
                                <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ Auth::user()->personnel->phone_number ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                @foreach(Auth::user()->roles as $key => $item)
                                @if($item->name == 'Fondateur')
                                <span class="label label-sm label-danger">
                                    {{ $item->name }}
                                </span>
                                @elseif($item->name == 'Econome')
                                <span class="label label-sm label-secondary">
                                    {{ $item->name }}
                                </span>
                                @elseif($item->name == 'Directeur')
                                <span class="label label-sm label-success">
                                    {{ $item->name }}
                                </span>
                                @elseif($item->name == 'Secretaire')
                                <span class="label label-sm label-warning">
                                    {{ $item->name }}
                                </span>
                                @else
                                <span class="label label-sm label-info">
                                    {{ $item->name }}
                                </span>
                                @endif
                                @endforeach
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 15%">

                            </td>
                        </tr>

                        @foreach($users as $key => $user)
                        <tr>

                            <td class="v-align-middle text-nowrap" style="width: 30%">
                                <div class="item-header clearfix">
                                    <div class="thumbnail-wrapper d32 circular">
                                        <img width="40" height="40" src="{{ asset('storage/uploads/profiles/personnels/'.$user->personnel->photo_profil_personnel) }}" data-src="{{ asset('storage/uploads/profiles/personnels/'.$user->personnel->photo_profil_personnel) }}">
                                    </div>
                                    <div class="inline m-l-10">
                                        <p class="no-margin">
                                            <strong>{{ strtoupper($user->personnel->nom_personnel ?? '' ) }}</strong>
                                        </p>
                                        <p class="no-margin hint-text">
                                            <span>{{ ucwords($user->personnel->prenom_personnel ?? '' ) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 20%">
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $user->personnel->phone_number ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                @foreach($user->roles as $key => $item)
                                @if($item->name == 'Fondateur')
                                <span class="label label-sm label-danger">
                                    {{ $item->name }}
                                </span>
                                @elseif($item->name == 'Econome')
                                <span class="label label-sm label-secondary">
                                    {{ $item->name }}
                                </span>
                                @elseif($item->name == 'Directeur')
                                <span class="label label-sm label-success">
                                    {{ $item->name }}
                                </span>
                                @elseif($item->name == 'Secretaire')
                                <span class="label label-sm label-warning">
                                    {{ $item->name }}
                                </span>
                                @else
                                <span class="label label-sm label-info">
                                    {{ $item->name }}
                                </span>
                                @endif
                                @endforeach
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 15%">

                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info" data-target="#editUser{{ $user->id }}" data-toggle="modal">
                                    <span class="fa fa-paste" data-toogle="tooltip" data-placement="top" data-original-title="Afficher le rôle de cet utilisateur"></span>
                                </a>

                                <button class="btn btn-sm btn-danger" data-target="#deleteUser{{ $user->id }}" data-toggle="modal">
                                    <span class="fa fa-trash" data-toogle="tooltip" data-placement="top" data-original-title="Supprimer cet utilisateur"></span>
                                </button>

                            </td>
                        </tr>

                        <div class="modal fade slide-up disable-scroll" id="deleteUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUser{{ $user->id }}" aria-hidden="false">
                            <div class="modal-dialog ">
                                <div class="modal-content-wrapper">
                                    <div class="modal-content">
                                        <div class="modal-header clearfix text-left">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="pg-close fs-14"></i>
                                            </button>
                                            <h5>Confirmer <span class="semi-bold">Suppression</span></h5>
                                            <p class="p-b-10">Etes-vous sûr que vous voulez supprimer {{ strtoupper($user->personnel->nom_personnel ?? '' ) }} ?</p>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form" action="{{ route('users.destroy', $user->id) }}" method="POST">
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

                        @include('admin.users.edit')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
