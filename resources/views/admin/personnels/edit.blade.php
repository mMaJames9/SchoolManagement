<div class="modal fade slide-right" id="editPersonnel{{ $personnel->id }}" tabindex="-1" role="dialog" aria-labelledby="editPersonnel{{ $personnel->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Mise à jour</h4>
            </div>
            <form class="form" method="POST" action="{{ route("personnels.update", [$personnel->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <p class="small-text">Mettez à jour les informations de cet employé en modifiant les informations correspondantes dans le formulaire ci-dessous.</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="nom_personnel">Nom</label>
                                <input type="text" class="form-control @error('nom_personnel') is-invalid @enderror" placeholder="Nom de l'employé" id="nom_personnel" name="nom_personnel" value="{{ old('nom_personnel', $personnel->nom_personnel) }}" required>

                                @error('nom_personnel')
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
                                <label for="prenom_personnel">Prénom</label>
                                <input type="text" class="form-control @error('prenom_personnel') is-invalid @enderror" placeholder="Prénom de l'employé" id="prenom_personnel" value="{{ old('prenom_personnel', $personnel->prenom_personnel) }}" name="prenom_personnel" required>

                                @error('prenom_personnel')
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
                                <label for="birthday_personnel">Date de Naissance</label>
                                <input type="date" class="form-control @error('birthday_personnel') is-invalid @enderror" id="birthday_personnel" placeholder="Date de naissance de l'employé" name="birthday_personnel" value="{{ old('birthday_personnel', $personnel->birthday_personnel) }}" required>

                                @error('birthday_personnel')
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
                                <label for="phone_number">Numéro de Téléphone</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Numéro de téléphone de l'employé" value="{{ old('phone_number', $personnel->phone_number) }}" name="phone_number" data-inputmask-alias="+237 699 999 999" required>

                                @error('phone_number')
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
                                <label for="experience_personnel">Années d'expérience</label>
                                <input type="number" class="form-control @error('experience_personnel') is-invalid @enderror" id="experience_personnel" value="{{ old('experience_personnel', $personnel->experience_personnel) }}" placeholder="Nombre d'années d'expérience de l'employé" name="experience_personnel" required>

                                @error('experience_personnel')
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
                                <label class="mb-2" for="cv_personnel">Curriculum Vitae</label>
                                <input type="file" accept=".doc, .dox, .pdf" class="form-control @error('cv_personnel') is-invalid @enderror" id="cv_personnel" placeholder="Numéro de téléphone de l'employé" name="cv_personnel">

                                @error('cv_personnel')
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
                                <label class="mb-2" for="photo_profil_personnel">Photo de Profil</label>
                                <input type="file" accept="image/png, image/jpeg" class="form-control @error('photo_profil_personnel') is-invalid @enderror" id="photo_profil_personnel" placeholder="Numéro de téléphone de l'employé" name="photo_profil_personnel">

                                @error('photo_profil_personnel')
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
                                <input type="date" class="form-control @error('debut_contrat') is-invalid @enderror" id="debut_contrat" value="{{ old('debut_contrat', $personnel->debut_contrat) }}" name="debut_contrat">

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
                                <input type="date" class="form-control @error('fin_contrat') is-invalid @enderror" id="fin_contrat" value="{{ old('fin_contrat', $personnel->fin_contrat) }}" name="fin_contrat">

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
                                <input type="number" min="25" step="25" class="form-control @error('salaire') is-invalid @enderror" placeholder="Salaire de l'employé" value="{{ old('salaire', $personnel->salaire) }}" id="salaire" name="salaire" required>

                                @error('salaire')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer mt-3">
                    <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                    <button type="reset" class="btn btn-cons">Effacer</button>
                </div>
            </form>
            </div>
    </div>
</div>
