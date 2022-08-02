<div class="modal fade text-left" id="createEnseignant" tabindex="-1" role="dialog" aria-labelledby="myModalCreateEnseignant" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalCreateEnseignant">Formulaire de création</h4>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <form class="form form-horizontal" method="POST" action="{{ route('enseignants.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="matricule_enseignant">Matricule</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('matricule_enseignant') is-invalid @enderror" placeholder="Matricule de l'enseignant" id="matricule_enseignant" name="matricule_enseignant" readonly value="{{ 'FFM-'.now()->format('y').'A-E'.mt_rand(1, 300) }}" required>

                                        @error('matricule_enseignant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nom_enseignant">Nom</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('nom_enseignant') is-invalid @enderror" placeholder="Nom de l'enseignant" id="nom_enseignant" name="nom_enseignant" required autofocus>

                                        @error('nom_enseignant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="prenom_enseignant">Prénom</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('prenom_enseignant') is-invalid @enderror" placeholder="Prénom de l'enseignant" id="prenom_enseignant" name="prenom_enseignant" required autofocus>

                                        @error('prenom_enseignant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="age_enseignant">Age</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" class="form-control @error('age_enseignant') is-invalid @enderror" id="age_enseignant" min="21" max="70" name="age_enseignant" placeholder="Age de l'enseignant" required autofocus>

                                        @error('age_enseignant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="experience_enseignant">CV</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <input type="file" accept=".doc, .dox, .pdf" class="form-control @error('experience_enseignant') is-invalid @enderror" name="experience_enseignant" required autofocus>

                                        @error('experience_enseignant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="photo_profil_enseignant">Photo de profil</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">

                                        <input type="file" accept="image/png, image/jpeg" class="form-control @error('photo_profil_enseignant') is-invalid @enderror" name="photo_profil_enseignant" required autofocus>

                                        @error('photo_profil_enseignant')
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

                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-secondary">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Annuler</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Valider la création</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
