<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('enseignants.index') }}">Enseignant</a></li>
                    <li class="breadcrumb-item active">{{ strtoupper($enseignant->nom_enseignant ?? '' ) }}</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <div class="row-xs-height">
                            <div class="social-user-profile col-xs-height text-center col-top">
                                <div class="thumbnail-wrapper d48 circular bordered b-white">
                                    <img alt="Avatar" width="55" height="55" data-src-retina="{{ asset("storage/uploads/profiles/enseignants/$enseignant->photo_profil_enseignant") }}" data-src="{{ asset("storage/uploads/profiles/enseignants/$enseignant->photo_profil_enseignant") }}" src="{{ asset("storage/uploads/profiles/enseignants/$enseignant->photo_profil_enseignant") }}">
                                </div>
                            </div>
                            <div class="col-xs-height p-l-20">
                                <h3 class="no-margin p-b-5 bold">{{ strtoupper($enseignant->nom_enseignant ?? '' ) }}</h3>
                                <p class="no-margin fs-16">{{ ucwords($enseignant->prenom_enseignant ?? '' ) }}</p>
                                <p class="no-margin fs-15">Matricule : {{ $enseignant->matricule_enseignant }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="feed">
            <!-- START DAY -->
            <div class="day" data-social="day">
                <!-- START ITEM -->
                <div class="card no-border bg-transparent full-width" data-social="item">
                    <!-- START CONTAINER FLUID -->
                    <div class="container-fluid p-t-30 p-b-30 ">
                        <div class="row row-same-height">
                            <div class="col-lg">
                                <div class="card card-default">
                                    <div class="card-header separator mb-4">
                                        <div class="card-title">Informations Personnelles</div>
                                    </div>
                                    <div class="card-body">

                                        @if (isset($enseignant->birthday_enseignant))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Date de naissance</span>
                                            <p>{{ date('d F Y', strtotime($enseignant->birthday_enseignant)) }}</p>
                                        </div>
                                        @endif

                                        @if (isset($enseignant->num_tel_enseignant))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Numéro Téléphone</span>
                                            <p>
                                                {{ $enseignant->num_tel_enseignant }}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($enseignant->experience_enseignant))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Expérience Profesionnelle</span>
                                            <p>
                                                {{ \Carbon\Carbon::parse($enseignant->experience_enseignant)->diff(\Carbon\Carbon::now())->format('%y ans') }}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($enseignant->cv_enseignant))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">CV</span>
                                            <br>
                                            <span class="fas fa-check mr-2"></span>
                                            <a class="badge badge-success" target="_blank" href='{{ route('previewEnseignantCV', $enseignant->id) }}'>
                                                Voir CV de l'enseignant
                                            </a>
                                        </div>
                                        @endif

                                        @if (isset($enseignant->debut_contrat))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Contrat</span>
                                            <p>
                                                Du {{ date('d F Y', strtotime($enseignant->debut_contrat)) }} au {{ date('d F Y', strtotime($enseignant->fin_contrat)) }} ({{ \Carbon\Carbon::parse($enseignant->debut_contrat)->diff(\Carbon\Carbon::parse($enseignant->fin_contrat))->format('%y ans %m mois') }})
                                            </p>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
