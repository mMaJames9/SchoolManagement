<x-app-layout>

    <div class="jumbotron" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="breadcrumb-item active">Parents</li>
                </ol>
                <!-- END BREADCRUMB -->
                <div class="card card-transparent">
                    <div class="card-body">
                        <h3>Parents</h3>
                        <p>Liste de tous les parents d'élèves. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">

            <div class="card-header mb-4 ">
                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Rechercher">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="card-body">
                <table class="table table-hover demo-table-search table-responsive-block dataTable no-footer" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>Parent</th>
                            <th>Numéro Téléphone</th>
                            <th>Domicile</th>
                            <th>Enfant(s)</th>
                            <th class="text-lg-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($familles as $key => $famille)
                        <tr>

                            <td class="v-align-middle "width="30%">
                                <p>{{ strtoupper($famille->nom_pere ?? $famille->nom_mere) }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 20%">
                                <p>{{ $famille->num_tel_pere ?? $famille->num_tel_mere }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 15%">
                                <p>{{ $famille->domicile_famille ?? '' }}</p>
                            </td>

                            <td class="v-align-middle text-nowrap" style="width: 20%">
                                @foreach ($famille->eleves as $key => $item)
                                <a class="label label-sm label-primary" href="{{ route('eleves.show', $item->id) }}">{{ strtoupper($item->nom_eleve) }}</a>
                                @endforeach
                            </td>

                            <td class="v-align-middle text-nowrap text-lg-center" style="width: 15%">

                                <a href="{{ route('familles.edit', $famille->id) }}" class="btn btn-sm btn-info" data-target="#editFamille{{ $famille->id }}" data-toggle="modal">
                                    <span class="fa fa-paste" data-toogle="tooltip" data-placement="top" data-original-title="Modifier les informations de ce(s) parent(s)"></span>
                                </a>

                            </td>
                        </tr>

                        @include('admin.familles.edit')

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @section('scripts')

    <script>
        $(document).ready(function()
        {
            $(document).on('change', '#checkPere', function()
            {
                if($(this).is(":checked")) {
                    $('#nom_pere').removeAttr('disabled');
                    $('#num_tel_pere').removeAttr('disabled');
                } else {
                    $('#nom_pere').attr('disabled', '');
                    $('#num_tel_pere').attr('disabled', '');
                }
            });

            $(document).on('change', '#checkMere', function()
            {
                if($(this).is(":checked")) {
                    $('#nom_mere').removeAttr('disabled');
                    $('#num_tel_mere').removeAttr('disabled');
                } else {
                    $('#nom_mere').attr('disabled', '');
                    $('#num_tel_mere').attr('disabled', '');
                }
            });
        })
    </script>
    @endsection

</x-app-layout>
