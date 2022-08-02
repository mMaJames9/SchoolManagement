<x-app-layout>

    @section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
    @endsection

    <div class="page-title">
        <div class="row mb-3">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Liste des utilisateurs</h3>
                <p class="text-subtitle text-muted">Liste des personnes qui ont accès à ce logiciel</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                @role('Fondateur')
                <div class="float-start float-lg-end">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser" data-bs-backdrop="true">
                        <i class="bi bi-plus bi-middle"></i>
                        <span>Ajouter un nouvel utilisateur</span>
                    </a>
                </div>

                @include('admin.users.create')

                @endrole
            </div>
        </div>
    </div>

    <section class="section">

        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {{-- <h6 class="text-muted font-semibold">Profile Views</h6> --}}
                                {{-- <h6 class="font-extrabold mb-0">112.000</h6> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {{-- <h6 class="text-muted font-semibold">Followers</h6> --}}
                                {{-- <h6 class="font-extrabold mb-0">183.000</h6> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {{-- <h6 class="text-muted font-semibold">Following</h6> --}}
                                {{-- <h6 class="font-extrabold mb-0">80.000</h6> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {{-- <h6 class="text-muted font-semibold">Saved Post</h6> --}}
                                {{-- <h6 class="font-extrabold mb-0">112</h6> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="tableUser">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Créé le</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>

                            <td>
                                {{ ucwords(Auth::user()->name) }}
                            </td>

                            <td class="text-primary">
                                <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                            </td>

                            <td>
                                @foreach(Auth::user()->roles as $key => $item)
                                @if($item->name == "Fondateur")
                                <small class="badge bg-primary">{{ $item->name }}</small>
                                @elseif ($item->name == "Directeur")
                                <small class="badge bg-info">{{ $item->name }}</small>
                                @elseif ($item->name == "Econome")
                                <small class="badge bg-info">{{ $item->name }}</small>
                                @else
                                <small class="badge bg-success">{{ $item->name }}</small>
                                @endif
                                @endforeach
                            </td>

                            <td>
                                {{ Auth::user()->created_at }}
                            </td>

                            <td></td>
                        </tr>

                        @foreach($users as $key => $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td>
                                {{  ucwords($user->name) }}
                            </td>

                            <td class="text-primary">
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </td>

                            <td>
                                @foreach($user->roles as $key => $item)
                                @if($item->name == "Fondateur")
                                <small class="badge bg-primary">{{ $item->name }}</small>
                                @elseif ($item->name == "Directeur")
                                <small class="badge bg-secondary">{{ $item->name }}</small>
                                @elseif ($item->name == "Econome")
                                <small class="badge bg-info">{{ $item->name }}</small>
                                @else
                                <small class="badge bg-success">{{ $item->name }}</small>
                                @endif
                                @endforeach
                            </td>

                            <td>
                                {{ $user->created_at }}
                            </td>

                            <td class="text-center">
                                @role('Fondateur')
                                <div class="modal-danger me-1 mb-1 d-inline-block">
                                    <a type="button" class="btn icon icon-left btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteUser{{ $user->id }}">
                                        <i class="bi bi-trash bi-middle"></i>
                                    </a>

                                    <!--Danger theme Modal -->
                                    <div class="modal fade text-left" id="DeleteUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalDelteUser" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalDelteUser">
                                                            Supprimer utilisateur
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Êtes-vous sûr de vouloir supprimer <span class="fw-bold">{{ ucwords($user->name) }}</span> ?
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Non</span>
                                                        </button>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger ml-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Oui</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endrole
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>

    @section('custimize')


    <script>
        // Simple Datatable
        let tableUser = document.querySelector('#tableUser');
        let dataTable = new simpleDatatables.DataTable(tableUser);
    </script>
    @endsection

</x-app-layout>
