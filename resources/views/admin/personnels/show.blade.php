<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('personnels.index') }}">Personnel</a></li>
                    <li class="breadcrumb-item active">{{ strtoupper($personnel->nom_personnel ?? '' ) }}</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <div class="row-xs-height">
                            <div class="social-user-profile col-xs-height text-center col-top">
                                <div class="thumbnail-wrapper d48 circular bordered b-white">
                                    <img alt="Avatar" width="55" height="55" data-src-retina="{{ asset("storage/uploads/profiles/personnels/$personnel->photo_profil_personnel") }}" data-src="{{ asset("storage/uploads/profiles/personnels/$personnel->photo_profil_personnel") }}" src="{{ asset("storage/uploads/profiles/personnels/$personnel->photo_profil_personnel") }}">
                                </div>
                            </div>
                            <div class="col-xs-height p-l-20">
                                <h3 class="no-margin p-b-5 bold">{{ strtoupper($personnel->nom_personnel ?? '' ) }}</h3>
                                <p class="no-margin fs-16">{{ ucwords($personnel->prenom_personnel ?? '' ) }}</p>
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

                                        @if (isset($personnel->birthday_personnel))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Date de naissance</span>
                                            <p>{{ date('d F Y', strtotime($personnel->birthday_personnel)) }}</p>
                                        </div>
                                        @endif

                                        @if (isset($personnel->phone_number))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Numéro Téléphone</span>
                                            <p>
                                                {{ $personnel->phone_number }}
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($personnel->experience_personnel))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Expérience Profesionnelle</span>
                                            <p>
                                                {{ $personnel->experience_personnel }} ans
                                            </p>
                                        </div>
                                        @endif

                                        @if (isset($personnel->cv_personnel))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">CV</span>
                                            <br>
                                            <span class="fas fa-check mr-2"></span>
                                            <a class="badge badge-success" target="_blank" href='{{ route('previewPersonnelCV', $personnel->id) }}'>
                                                Voir CV de l'employé
                                            </a>
                                        </div>
                                        @endif

                                        @if (isset($personnel->debut_contrat))
                                        <div class="mb-3">
                                            <span class="text-uppercase fs-12 bold">Contrat</span>
                                            <p>
                                                Du {{ date('d F Y', strtotime($personnel->debut_contrat)) }} au {{ date('d F Y', strtotime($personnel->fin_contrat)) }} ({{ \Carbon\Carbon::parse($personnel->debut_contrat)->diff(\Carbon\Carbon::parse($personnel->fin_contrat))->format('%y ans %m mois') }})
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
