<x-app-layout>

    @section('styles')

    <link rel="stylesheet" href="{{ asset('assets/vendors/filepond/dist/filepond.css') }}">
    @endsection

    @section('scripts')

    @endsection

    <div class="page-title">
        <div class="row mb-3">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Liste des enseignants</h3>
                <p class="text-subtitle text-muted">Liste de tous les enseignants travaillant dans l'école</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                @role('Fondateur')
                <div class="float-start float-lg-end">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createEnseignant" data-bs-backdrop="true">
                        <i class="bi bi-plus bi-middle"></i>
                        <span>Ajouter un nouvel enseignant</span>
                    </a>
                </div>

                @include('admin.enseignants.create')

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
                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
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
                                <h6 class="text-muted font-semibold">Followers</h6>
                                <h6 class="font-extrabold mb-0">183.000</h6>
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
                                    <i class="iconly-boldAdd-Enseignant"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Following</h6>
                                <h6 class="font-extrabold mb-0">80.000</h6>
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
                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                <h6 class="font-extrabold mb-0">112</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="tableEnseignant">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom</th>
                            <th>Matricule</th>
                            <th>Age</th>
                            <th>Créé le</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($enseignants as $key => $enseignant)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td>
                                <div class="user-menu d-flex">
                                    <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle user-img d-flex align-items-center me-3">
                                        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                                            <img class="bg-no-repeat bg-center bg-cover mh-100 mw-100" src="{{url("/storage/uploads/profiles/enseignants/$enseignant->photo_profil_enseignant")}}">
                                        </div>
                                    </div>
                                    <div class="user-name text-start me-3">
                                        <h6 class="mb-0 text-gray-600">{{  ucwords($enseignant->nom_enseignant) }}</h6>
                                        <p class="mb-0 text-sm text-gray-600">
                                            {{  ucwords($enseignant->prenom_enseignant) }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{ $enseignant->matricule_enseignant }}
                            </td>

                            <td>
                                {{ $enseignant->age_enseignant }} ans
                            </td>

                            <td>
                                {{ $enseignant->created_at }}
                            </td>

                            <td class="text-center">
                                @role('Fondateur')
                                <div class="modal-danger me-1 mb-1 d-inline-block">
                                    <a type="button" class="btn icon icon-left btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteEnseignant{{ $enseignant->id }}">
                                        <i class="bi bi-trash bi-middle"></i>
                                    </a>

                                    <!--Danger theme Modal -->
                                    <div class="modal fade text-left" id="DeleteEnseignant{{ $enseignant->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalDelteEnseignant" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('enseignants.destroy', $enseignant->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalDelteEnseignant">
                                                            Supprimer enseignant
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Êtes-vous sûr de vouloir supprimer <span class="fw-bold">{{ ucwords($enseignant->nom_enseignant) }}</span> ?
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
        let tableEnseignant = document.querySelector('#tableEnseignant');
        let dataTable = new simpleDatatables.DataTable(tableEnseignant);
    </script>
    @endsection

</x-app-layout>
