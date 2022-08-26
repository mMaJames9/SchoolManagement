<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('eleves.index') }}">Eleves</a></li>
                    <li class="breadcrumb-item active">Mise à jour des informations</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Mise à jour</h3>
                        <p>Mise à jour des informations concernant {{ strtoupper($eleve->nom_eleve ?? '' ) }}. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <form class="form" method="POST" action="{{ route("eleves.update", [$eleve->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div id="rootwizard" class="m-t-50">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                    <li class="nav-item">
                        <a class="active" data-toggle="tab" href="#info-perso" data-target="#info-perso" role="tab">
                            <i class="fa fa-person-circle-question tab-icon"></i>
                            <span>Informations Personnelles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="" data-toggle="tab" href="#info-supp" data-target="#info-supp" role="tab">
                            <i class="fa fa-person-circle-plus tab-icon"></i>
                            <span>Informations Supplémentaires</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="" data-toggle="tab" href="#tab3" data-target="#tab3" role="tab">
                            <i class="fa fa-circle-check tab-icon"></i>
                            <span>Terminé</span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">

                    <div class="tab-pane padding-20 sm-no-padding active slide-left" id="info-perso">
                        <div class="row row-same-height">
                            <div class="col-sm-12 col-lg-6 b-r b-dashed b-grey sm-b-b">
                                <div class="padding-30 sm-padding-5">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default required">
                                                <label for="matricule_eleve">Matricule</label>
                                                <input type="text" class="form-control @error('matricule_eleve') is-invalid @enderror" placeholder="Matricule de l'élève" id="matricule_eleve" name="matricule_eleve" readonly value="{{ old('matricule_eleve', $eleve->matricule_eleve) }}" required>

                                                @error('matricule_eleve')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                                <label for="nom_eleve">Nom</label>
                                                <input type="text" class="form-control @error('nom_eleve') is-invalid @enderror" placeholder="Nom de l'élève" id="nom_eleve" name="nom_eleve" value="{{ old('nom_eleve', $eleve->nom_eleve) }}"  required autofocus>

                                                @error('nom_eleve')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                                <label for="prenom_eleve">Prénom</label>
                                                <input type="text" class="form-control @error('prenom_eleve') is-invalid @enderror" placeholder="Prénom de l'élève" id="prenom_eleve" name="prenom_eleve" value="{{ old('prenom_eleve', $eleve->prenom_eleve) }}"  required>

                                                @error('prenom_eleve')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                                <label for="birthday_eleve">Date de Naissance</label>
                                                <input type="date" class="form-control @error('birthday_eleve') is-invalid @enderror" placeholder="Date de naissance de l'élève" id="birthday_eleve" name="birthday_eleve" value="{{ old('birthday_eleve', $eleve->birthday_eleve) }}"  required autofocus>

                                                @error('birthday_eleve')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default required">
                                                <label for="lieu_naissance">Lieu de Naissance</label>
                                                <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" placeholder="Lieu de naissance de l'élève" id="lieu_naissance" value="{{ old('lieu_naissance', $eleve->lieu_naissance) }}" name="lieu_naissance" required>

                                                @error('lieu_naissance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="sexe_eleve">Sexe</label>
                                                <div class="radio radio-primary">
                                                    <input type="radio" class="form-check-input @error('sexe_eleve') is-invalid @enderror" placeholder="Sexe de l'élève" id="sexe_eleve0" name="sexe_eleve" value="0" {{ $eleve->sexe_eleve == 0 ? 'checked' : '' }} required>
                                                    <label for="sexe_eleve0">Masculin</label>
                                                    <input type="radio" class="form-check-input @error('sexe_eleve') is-invalid @enderror" placeholder="Sexe de l'élève" id="sexe_eleve1" name="sexe_eleve" value="1" {{ $eleve->sexe_eleve == 1 ? 'checked' : '' }} required>
                                                    <label for="sexe_eleve1">Feminin</label>
                                                </div>

                                                @error('sexe_eleve')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="checkbox check-primary">
                                                    <input type="checkbox" value="1" {{ $eleve->acte_naissance == 1 ? 'checked' : '' }} id="acte_naissance" name="acte_naissance" class="@error('acte_naissance') is-invalid @enderror" required>
                                                    <label for="acte_naissance">Acte de Naissance</label>
                                                </div>

                                                @error('acte_naissance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <div class="padding-30 sm-padding-5">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label class="mb-2" for="carnet_vaccination">Photocopie carnet de vaccination</label>
                                                <input type="file" accept="image/png, image/jpeg" class="form-control @error('carnet_vaccination') is-invalid @enderror" placeholder="Photocopie carnet de vaccination de l'élève" id="carnet_vaccination" name="carnet_vaccination">

                                                @error('carnet_vaccination')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label class="mb-2" for="photo_profil_eleve">Photo de profil</label>
                                                <input type="file" accept="image/png, image/jpeg" class="form-control @error('photo_profil_eleve') is-invalid @enderror" placeholder="Photo de profil de l'élève" id="photo_profil_eleve" name="photo_profil_eleve">

                                                @error('photo_profil_eleve')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default form-group-default-select2 required">
                                                <label class="mb-2" for="classe_id">Classe d'inscription</label>
                                                <select class="full-width @error('classe_id') is-invalid @enderror" id="classe_id" name="classe_id" data-init-plugin="select2">
                                                    <option selected disabled hidden>Selectionner le nom de la classe</option>
                                                    @foreach($sections as $key => $section)
                                                    <optgroup label="{{ $section }}">
                                                        @foreach($classes as $key => $classe)
                                                        @if($section == $classe->nom_section)
                                                        <option value="{{ $classe->id }}" {{ ($eleve->classe ? $eleve->classe->id : old('classe_id')) == $classe->id ? 'selected' : '' }}>{{ ucwords($classe->nom_classe) }}</option>
                                                        @endif
                                                        @endforeach
                                                    </optgroup>
                                                    @endforeach
                                                </select>

                                                @error('classe_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane slide-left padding-20 sm-no-padding" id="info-supp">
                        <div class="row row-same-height">
                            <div class="col-sm-12 col-lg-6 b-r b-dashed b-grey sm-b-b">
                                <div class="padding-30 sm-padding-5">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="checkbox check-primary">
                                                    <input type="checkbox" value="1"  {{ $eleve->maladie_hereditaire == null ? '' : 'checked' }} id="checkMaladie" name="checkMaladie" class="@error('checkMaladie') is-invalid @enderror">
                                                    <label for="checkMaladie">L'enfant souffre-t-il d'une maladie <span class="bold">congénitale / héréditaire</span> ? (Si oui préciser laquelle)</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control @error('maladie_hereditaire') is-invalid @enderror" id="maladie_hereditaire" name="maladie_hereditaire" placeholder="Préciser les maladies congénitales/héréditaires de l'enfant" rows="3" {{ $eleve->maladie_hereditaire == null ? 'disabled' : '' }}>{{ old('maladie_hereditaire', $eleve->maladie_hereditaire) }}</textarea>

                                                @error('maladie_hereditaire')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="checkbox check-primary">
                                                    <input type="checkbox" value="1" {{ $eleve->maladie_chronique == null ? '' : 'checked' }} id="checkChronique" name="checkChronique" class="@error('checkChronique') is-invalid @enderror">
                                                    <label for="checkChronique">L'enfant souffre-t-il d'une maladie <span class="bold">chronique</span> ? (Si oui préciser laquelle)</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control @error('maladie_chronique') is-invalid @enderror" id="maladie_chronique"name="maladie_chronique" placeholder="Préciser les maladies chroniques de l'enfant" rows="3" {{ $eleve->maladie_chronique == null ? 'disabled' : '' }}>{{ old('maladie_chronique', $eleve->maladie_chronique) }}</textarea>

                                                @error('maladie_chronique')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="checkbox check-primary">
                                                    <input type="checkbox" value="1" {{ $eleve->alergie_aliment == null ? '' : 'checked' }} id="checkAlergieAliment" name="checkAlergieAliment" class="@error('checkAlergieAliment') is-invalid @enderror">
                                                    <label for="checkAlergieAliment">L'enfant est-il allergique à un <span class="bold">aliment</span> ? (Si oui préciser lequel)</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control @error('alergie_aliment') is-invalid @enderror" id="alergie_aliment" name="alergie_aliment" placeholder="Préciser les aliments auxquels l'enfant est allergique" rows="3" {{ $eleve->alergie_aliment == null ? 'disabled' : '' }}>{{ old('alergie_aliment', $eleve->alergie_aliment) }}</textarea>

                                                @error('alergie_aliment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="padding-30 sm-padding-5">

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="checkbox check-primary">
                                                    <input type="checkbox" value="1" {{ $eleve->alergie_medicament == null ? '' : 'checked' }} id="checkAlergieMedicament" name="checkAlergieMedicament" class="@error('checkAlergieMedicament') is-invalid @enderror">
                                                    <label for="checkAlergieMedicament">L'enfant est-il allergique à un <span class="bold">médicament</span> ? (Si oui préciser lequel)</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control @error('alergie_medicament') is-invalid @enderror" id="alergie_medicament" name="alergie_medicament" placeholder="Préciser les médicaments auxquels l'enfant est allergique" rows="3" {{ $eleve->alergie_medicament == null ? 'disabled' : '' }}>{{ old('alergie_medicament', $eleve->alergie_medicament) }}</textarea>

                                                @error('alergie_medicament')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="checkbox check-primary">
                                                    <input type="checkbox" value="1" {{ $eleve->alergie_substance == null ? '' : 'checked' }} id="checkAlergieSubstance" name="checkAlergieSubstance" class="@error('checkAlergieSubstance') is-invalid @enderror">
                                                    <label for="checkAlergieSubstance">L'enfant est-il allergique à <span class="bold">toute autre substance</span> ? (Si oui préciser laquelle)</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea class="form-control @error('alergie_substance ') is-invalid @enderror" id="alergie_substance" name="alergie_substance" placeholder="Préciser les substances auxquels l'enfant est allergique" rows="3" {{ $eleve->alergie_substance == null ? 'disabled' : '' }}>{{ old('alergie_substance', $eleve->alergie_substance) }}</textarea>

                                                @error('alergie_substance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab3">
                        <h1>Terminé.</h1>
                        <p>Valider maintenant l'enregistrement en cliquant sur le boutton Enregistrer.</p>
                    </div>

                    <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                        <ul class="pager wizard no-style">
                            <li class="next">
                                <button class="btn btn-primary btn-cons btn-animated from-left fa fa-circle-chevron-right pull-right" type="button">
                                    <span>Suivant</span>
                                </button>
                            </li>
                            <li class="next finish hidden">
                                <button class="btn btn-primary btn-cons btn-animated from-left fa fa-check-circle pull-right" type="submit">
                                    <span>Terminé</span>
                                </button>
                            </li>
                            <li class="previous first hidden">
                                <button class="btn btn-default btn-cons btn-animated from-left fa fa-circle-chevron-left pull-right" type="button">
                                    <span>First</span>
                                </button>
                            </li>
                            <li class="previous">
                                <button class="btn btn-default btn-cons pull-right" type="button">
                                    <span>Précédent</span>
                                </button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </form>
    </div>

    @section('scripts')
    @include('partials._script-disabled')
    @endsection

</x-app-layout>
