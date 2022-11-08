<div class="modal fade slide-right" id="editMatiere{{ $competence->matieres[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="editMatiere{{ $competence->matieres[$i]->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <span class="close fas fa-xmark fs-14 mt-2" data-dismiss="modal" aria-hidden="true"></span>
                <h4 class="p-b-5"><span class="semi-bold">Mise à jour</h4>
            </div>
            <form class="form" method="POST" action="{{ route("matieres.update", [$competence->matieres[$i]->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <p class="small-text">Mettez à jour les informations de cette matière en modifiant les informations correspondantes dans le formulaire ci-dessous.</p>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label class="mb-2" for="competence_id">Compétences</label>
                                <select class="full-width @error('competence_id') is-invalid @enderror" id="competence_id" name="competence_id" data-init-plugin="select2">
                                    <option selected disabled hidden>Selectionner la compétence</option>
                                    @foreach($listCompetences as $id => $listCompetence)
                                    <option value="{{ $id }}" {{ ($competence->matieres[0] ? $competence->matieres[$i]->competence_id : old('competence_id')) == $id ? 'selected' : '' }}>{{ ucwords($listCompetence) }}</option>
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
                                <label for="forme_evaluation">Forme d'évaluation</label>
                                <input type="text" class="form-control @error('forme_evaluation') is-invalid @enderror" placeholder="Forme d'évaluation de la compétence"  value="{{ old('forme_evaluation', $competence->matieres[$i]->forme_evaluation) }}" id="forme_evaluation" name="forme_evaluation" required>

                                @error('forme_evaluation')
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
                                <label for="notation_matiere">Notation</label>
                                <input type="number" min="1" value="{{ old('notation_matiere', $competence->matieres[$i]->notation_matiere) }}" class="form-control @error('notation_matiere') is-invalid @enderror" placeholder="Total de la forme d'évaluation" id="notation_matiere" name="notation_matiere" required>

                                @error('notation_matiere')
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
