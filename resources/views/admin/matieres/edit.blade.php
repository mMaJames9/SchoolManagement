<div class="modal fade slide-right" id="editMatiere{{ $competence->matieres[0]->id }}" tabindex="-1" role="dialog" aria-labelledby="editMatiere{{ $competence->matieres[0]->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Mise à jour</h4>
            </div>
            <form class="form" method="POST" action="{{ route("matieres.update", [$competence->matieres[0]->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <p class="small-text">Mettez à jour les informations de cette matière en modifiant les informations correspondantes dans le formulaire ci-dessous.</p>

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="form-group form-group-default form-group-default-select2">
                                <select class="full-width @error('competence_id') is-invalid @enderror" id="competence_id" name="competence_id" data-init-plugin="select2">
                                    <option selected disabled hidden>Selectionner la compétence</option>
                                    @foreach($listCompetences as $id => $listCompetence)
                                    <option value="{{ $id }}" {{ ($competence->matieres[0] ? $competence->matieres[0]->competence_id : old('competence_id')) == $id ? 'selected' : '' }}>{{ ucwords($listCompetence) }}</option>
                                    @endforeach
                                </select>

                                @error('competence_id')
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
                                <label for="intitule_matiere">Intitulé matière</label>
                                <input type="text" class="form-control @error('intitule_matiere') is-invalid @enderror" placeholder="Intitulé de la matière"  value="{{ old('intitule_matiere', $competence->matieres[0]->intitule_matiere) }}" id="intitule_matiere" name="intitule_matiere" required>

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
                                <label for="coef_matiere">Niveau</label>
                                <input type="number" min="0" max="3" class="form-control @error('coef_matiere') is-invalid @enderror" placeholder="Niveau correspondant" value="{{ old('coef_matiere', $competence->matieres[0]->niveau_matiere) }}" id="niveau_matiere" name="niveau_matiere" required>

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
                                <input type="number" min="1" value="{{ old('coef_matiere', $competence->matieres[0]->coef_matiere) }}" class="form-control @error('coef_matiere') is-invalid @enderror" placeholder="Coefficient de la matière" id="coef_matiere" name="coef_matiere" required>

                                @error('coef_matiere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                        <button type="reset" class="btn btn-cons">Effacer</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
