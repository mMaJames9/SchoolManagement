<div class="modal fade slide-right" id="addNewMatiere" tabindex="-1" role="dialog" aria-labelledby="addNewMatiere" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Nouvelle</span> Matière</h4>
            </div>
            <form class="form" method="POST" action="{{ route('matieres.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="small-text">Enregister un nouvelle matière en remplissant tous les champs de ce formulaire</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label for="intitule_matiere">Intitulé matière</label>
                                <input type="text" class="form-control @error('intitule_matiere') is-invalid @enderror" placeholder="Intitulé de la matière" id="intitule_matiere" name="intitule_matiere" required>

                                @error('intitule_matiere')
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
                                <label for="niveau_matiere">Niveau</label>
                                <input type="number" min="0" max="3" class="form-control @error('niveau_matiere') is-invalid @enderror" placeholder="Niveau correspondant" id="niveau_matiere" name="niveau_matiere" required>

                                @error('niveau_matiere')
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
                                <label for="coef_matiere">Coef. Matière</label>
                                <input type="number" min="1" class="form-control @error('coef_matiere') is-invalid @enderror" placeholder="Coefficient de la matière" id="coef_matiere" name="coef_matiere" required>

                                @error('coef_matiere')
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
