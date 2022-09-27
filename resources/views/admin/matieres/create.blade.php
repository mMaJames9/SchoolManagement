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
                                    <label for="checkCompetence">Cochers si la compétence est déjà enregistrée puis selectionner dans la liste ci-dessous</label>
                                </div>
                            </div>

                            <div class="form-group form-group-default form-group-default-select2">
                                <select class="full-width @error('competence_id') is-invalid @enderror" id="competence_id" name="competence_id" data-init-plugin="select2" disabled>
                                    <option selected disabled hidden>Selectionner la compétence</option>
                                    @foreach($listCompetences as $id => $listCompetence)
                                    <option value="{{ $id }}">{{ ucwords($listCompetence) }}</option>
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

                <div class="modal-footer mt-3">
                    <button type="submit" class="btn btn-primary btn-cons">Valider</button>
                    <button type="reset" class="btn btn-cons">Effacer</button>
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
            } else {
                $('#competence_id').attr('disabled', '');
                $('#intitule_competence').removeAttr('disabled');
            }
        });
</script>
@endsection
