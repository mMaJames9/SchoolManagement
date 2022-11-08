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
                            <div class="form-group">
                                <div class="checkbox check-primary">
                                    <input type="checkbox" value="1" id="checkCompetence" name="checkCompetence" class="@error('checkCompetence') is-invalid @enderror">
                                    <label for="checkCompetence">Cocher si la compétence est déjà enregistrée puis selectionner dans la liste ci-dessous</label>
                                </div>
                            </div>

                            <div class="form-group form-group-default form-group-default-select2">
                                <select class="full-width @error('competence_id') is-invalid @enderror" id="competence_id" name="competence_id" data-init-plugin="select2" disabled>
                                    <option selected disabled hidden>Selectionner la compétence</option>
                                    @foreach($competences as $key => $competence)
                                    <option value="{{ $competence->id }}">{{ ucwords($competence->intitule_competence) }}</option>
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
                                <label for="intitule_competence">Intitulé compétence</label>
                                <input type="text" class="form-control @error('intitule_competence') is-invalid @enderror" placeholder="Intitulé de la compétence" id="intitule_competence" name="intitule_competence">

                                @error('intitule_competence')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row d-none">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="niveau_competence">Niveau</label>
                                <input type="number" min="0" max="2" class="form-control @error('niveau_competence') is-invalid @enderror" placeholder="Niveau de la competence" id="niveau_competence" name="niveau_competence" value="{{ $selected }}">

                                @error('niveau_competence')
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
                                <input type="text" class="form-control @error('forme_evaluation') is-invalid @enderror" placeholder="Forme d'évaluation de la compétence" id="forme_evaluation" name="forme_evaluation" required>

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
                                <input type="number" min="1" class="form-control @error('notation_matiere') is-invalid @enderror" placeholder="Total de la forme d'évaluation" id="notation_matiere" name="notation_matiere" required>

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

@section('scripts')
<script>
    $(document).on('change', '#checkCompetence', function()
        {
            if($(this).is(":checked")) {
                $('#competence_id').removeAttr('disabled');
                $('#intitule_competence').attr('disabled', '');
                $('#niveau_competence').attr('disabled', '');
            } else {
                $('#competence_id').attr('disabled', '');
                $('#intitule_competence').removeAttr('disabled');
                $('#niveau_competence').removeAttr('disabled');
            }
        });
</script>
@endsection
