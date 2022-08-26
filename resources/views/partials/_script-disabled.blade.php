<script>
    $(document).ready(function()
    {
        $(document).on('change', '#checkRedouble', function()
        {
            if($(this).is(":checked")) {
                $(('#classe_redouble')).removeAttr('disabled');
            } else {
                $('#classe_redouble').attr('disabled', '');
            }
        });

        $(document).on('change', '#checkEcole', function()
        {
            if($(this).is(":checked")) {
                $(('#nom_etablissement')).removeAttr('disabled');
                $(('#bulletin_precedent')).removeAttr('disabled');
            } else {
                $('#nom_etablissement').attr('disabled', '');
                $('#bulletin_precedent').attr('disabled', '');
            }
        });

        $(document).on('change', '#checkMaladie', function()
        {
            if($(this).is(":checked")) {
                $(('#maladie_hereditaire')).removeAttr('disabled');
            } else {
                $('#maladie_hereditaire').attr('disabled', '');
            }
        });

        $(document).on('change', '#checkChronique', function()
        {
            if($(this).is(":checked")) {
                $(('#maladie_chronique')).removeAttr('disabled');
            } else {
                $('#maladie_chronique').attr('disabled', '');
            }
        });

        $(document).on('change', '#checkAlergieAliment', function()
        {
            if($(this).is(":checked")) {
                $(('#alergie_aliment')).removeAttr('disabled');
            } else {
                $('#alergie_aliment').attr('disabled', '');
            }
        });

        $(document).on('change', '#checkAlergieMedicament', function()
        {
            if($(this).is(":checked")) {
                $(('#alergie_medicament')).removeAttr('disabled');
            } else {
                $('#alergie_medicament').attr('disabled', '');
            }
        });

        $(document).on('change', '#checkAlergieSubstance', function()
        {
            if($(this).is(":checked")) {
                $(('#alergie_substance')).removeAttr('disabled');
            } else {
                $('#alergie_substance').attr('disabled', '');
            }
        });

        $(document).on('change', '#checkParent', function()
        {
            if($(this).is(":checked")) {
                $(('#famille_id')).removeAttr('disabled');
                $('#checkPere').attr('disabled', '');
                $('#nom_pere').attr('disabled', '');
                $('#num_tel_pere').attr('disabled', '');
                $('#checkMere').attr('disabled', '');
                $('#nom_mere').attr('disabled', '');
                $('#num_tel_mere').attr('disabled', '');
                $('#domicile_famille').attr('disabled', '');
            } else {
                $(('#famille_id')).attr('disabled', '');
                $('#checkPere').removeAttr('disabled');
                $('#checkMere').removeAttr('disabled');
                $('#domicile_famille').removeAttr('disabled');
            }
        });

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