@if(session('message'))
<script>
    window.addEventListener("load", function() {
        $('.page-content-wrapper').pgNotification({
            style: 'flip',
            message: "{{ session('message') }}",
            position: 'top-right',
            timeout: 4000,
            type: 'warning'
        }).show();
    });
</script>
@endif

@if($errors->count() > 0)
@foreach($errors->all() as $error)
    <script>
        window.addEventListener("load", function() {
            $('.page-content-wrapper').pgNotification({
            style: 'flip',
            message: "{{ $error }}",
            position: 'top-right',
            timeout: 4000,
            type: 'danger'
        }).show();
        });
    </script>
@endforeach
@endif

@if(session('status'))
<script>
    window.addEventListener("load", function () {
        $('.page-content-wrapper').pgNotification({
            style: 'flip',
            message: "{{ session('status') }}",
            position: 'top-right',
            timeout: 4000,
            type: 'success'
        }).show();
    });
</script>
@endif

@if(session('error'))
<script>
    window.addEventListener("load", function () {
        $('.page-content-wrapper').pgNotification({
            style: 'flip',
            message: "{{ session('error') }}",
            position: 'top-right',
            timeout: 6000,
            type: 'warning'
        }).show();
    });
</script>
@endif

@if(!empty($anne_academique))
<script>
    window.addEventListener("load", function () {
        $('.page-content-wrapper').pgNotification({
            style: 'bar',
            message: "Année Scolaire : <span class='bold'>{{ $anne_academique }}</span>",
            position: 'bottom',
            timeout: 4000,
            type: 'info'
        }).show();
    });
</script>
@endif
