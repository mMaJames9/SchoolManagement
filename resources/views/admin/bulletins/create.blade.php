<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bulletins.index') }}">Bulletins Scolaire</a></li>
                    <li class="breadcrumb-item active">{{ strtoupper($eleve->nom_eleve ) }}</li>

                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Enregistrement des Notes</h3>
                        <p>Mois de {{ date('F Y') }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('storeBulletin', $eleve->id) }}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-responsive-block no-footer mb-4">
                        <thead>
                            <tr>
                                <th class="v-align-middle text-nowrap text-lg-center">Compétences</th>
                                <th>Intitule</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($competences as $key => $competence)
                            <tr>

                                <td class="v-align-middle text-nowrap text-lg-center" style="width: 40%" rowspan="{{ $competence->matieres->count() }}">
                                    <p class="bold">Comptence {{ $loop->iteration}}</p>
                                    <p>{{ ucwords(strtolower($competence->intitule_competence)) }}</p>
                                </td>

                                <td class="v-align-middle text-nowrap" style="width: 20%">
                                    <input type="hidden" name="matiere[]" value="{{ $competence->matieres[0]->id }}">
                                    <p>{{ strtoupper($competence->matieres[0]->intitule_matiere) }}</p>
                                </td>

                                <td class="v-align-middle text-nowrap" style="width: 30%">
                                    <input type="number" min="0" max="20" step="0.25" class="form-control @error('notes[]') is-invalid @enderror" placeholder="Note en {{ strtoupper($competence->matieres[0]->intitule_matiere) }}" id="notes[0]" name="notes[]" required>

                                @error('notes[]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </td>

                            </tr>

                            @for($i = 1; $i < $competence->matieres->count(); $i++)
                            <tr>

                                <td class="v-align-middle text-nowrap" style="width: 20%">
                                    <input type="hidden" name="matiere[]" value="{{ $competence->matieres[$i]->id }}">
                                    <p>{{ strtoupper($competence->matieres[$i]->intitule_matiere) }}</p>
                                </td>

                                <td class="v-align-middle text-nowrap" style="width: 30%">
                                    <input type="number" min="0" max="20" step="0.25" class="form-control @error('notes[]') is-invalid @enderror" placeholder="Note en {{ strtoupper($competence->matieres[$i]->intitule_matiere) }}" id="notes[{{$i}}]" name="notes[]" required>

                                @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </td>

                            </tr>
                            @endfor

                            @endforeach

                        </tbody>
                    </table>

                    <div class="pull-right">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-cons" type="submit">
                                <span>Enregistrer</span>
                            </button>
                            <button type="reset" class="btn btn-cons">Effacer</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
