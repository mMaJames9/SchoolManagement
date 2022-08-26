<div class="modal fade slide-right" id="editEnseignant{{ $enseignant->id }}" tabindex="-1" role="dialog" aria-labelledby="editEnseignant{{ $enseignant->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Mise à jour</h4>
            </div>
            <form class="form" method="POST" action="{{ route("enseignants.update", [$enseignant->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <p class="small-text">Mettez à jour les informations de cet enseignant en modifiant les informations correspondantes dans le formulaire ci-dessous.</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="matricule_enseignant">Matricule</label>
                                <input type="text" class="form-control @error('matricule_enseignant') is-invalid @enderror" placeholder="Matricule de l'enseignant" id="matricule_enseignant" name="matricule_enseignant" readonly value="{{ old('matricule_enseignant', $enseignant->matricule_enseignant) }}" required>

                                @error('matricule_enseignant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="nom_enseignant">Nom</label>
                                <input type="text" class="form-control @error('nom_enseignant') is-invalid @enderror" placeholder="Nom de l'enseignant" id="nom_enseignant" value="{{ old('nom_enseignant', $enseignant->nom_enseignant) }}" name="nom_enseignant" required>

                                @error('nom_enseignant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="prenom_enseignant">Prénom</label>
                                <input type="text" class="form-control @error('prenom_enseignant') is-invalid @enderror" placeholder="Prénom de l'enseignant" id="prenom_enseignant" value="{{ old('prenom_enseignant', $enseignant->prenom_enseignant) }}" name="prenom_enseignant" required>

                                @error('prenom_enseignant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="birthday_enseignant">Date de Naissance</label>
                                <input type="date" class="form-control @error('birthday_enseignant') is-invalid @enderror" id="birthday_enseignant" value="{{ old('birthday_enseignant', $enseignant->birthday_enseignant) }}" placeholder="Date de naissance de l'enseignant" name="birthday_enseignant" required>

                                @error('birthday_enseignant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="num_tel_enseignant">Numéro de Téléphone</label>
                                <input type="text" class="form-control @error('num_tel_enseignant') is-invalid @enderror" id="num_tel_enseignant" placeholder="Numéro de téléphone de l'enseignant" name="num_tel_enseignant" value="{{ old('num_tel_enseignant', $enseignant->num_tel_enseignant) }}" data-inputmask-alias="+237 699 999 999" required>

                                @error('num_tel_enseignant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="experience_enseignant">Années d'expérience</label>
                                <input type="number" class="form-control @error('experience_enseignant') is-invalid @enderror" id="experience_enseignant" placeholder="Nombre d'années d'expérience de l'enseignant" value="{{ old('experience_enseignant', $enseignant->experience_enseignant) }}" name="experience_enseignant" required>

                                @error('experience_enseignant')
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
                                <label class="mb-2" for="cv_enseignant">Curriculum Vitae</label>
                                <input type="file" accept=".doc, .dox, .pdf" class="form-control @error('cv_enseignant') is-invalid @enderror" id="cv_enseignant" placeholder="Numéro de téléphone de l'enseignant" name="cv_enseignant">

                                @error('cv_enseignant')
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
                                <label class="mb-2" for="photo_profil_enseignant">Photo de Profil</label>
                                <input type="file" accept="image/png, image/jpeg" class="form-control @error('photo_profil_enseignant') is-invalid @enderror" id="photo_profil_enseignant" placeholder="Numéro de téléphone de l'enseignant" name="photo_profil_enseignant">

                                @error('photo_profil_enseignant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label for="debut_contrat">Début de Contrat</label>
                                <input type="date" class="form-control @error('debut_contrat') is-invalid @enderror" id="debut_contrat" value="{{ old('debut_contrat', $enseignant->debut_contrat) }}" name="debut_contrat">

                                @error('debut_contrat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label for="fin_contrat">Fin de Contrat</label>
                                <input type="date" class="form-control @error('fin_contrat') is-invalid @enderror" id="fin_contrat" value="{{ old('fin_contrat', $enseignant->fin_contrat) }}" name="fin_contrat">

                                @error('fin_contrat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="salaire">Salaire</label>
                                <input type="number" min="25" step="25" class="form-control @error('salaire') is-invalid @enderror" placeholder="Salaire de l'enseignant" value="{{ old('salaire', $enseignant->salaire) }}" id="salaire" name="salaire" required>

                                @error('salaire')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer fixed-bottom">
                    <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                    <button type="reset" class="btn btn-cons">Effacer</button>
                </div>
            </form>
            </div>
    </div>
</div>
