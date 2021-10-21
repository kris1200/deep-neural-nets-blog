{{-- Creation  success message --}}
@if (session('creation_success_message'))

<div class="alert alert-success position-fixed" role="alert" id="creation_success">
    {{ session('creation_success_message') }}
</div>

@endif
