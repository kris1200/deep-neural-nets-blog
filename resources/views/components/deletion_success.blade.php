
{{-- Deletion success message --}}
@if (session('deletion_success_message'))

<div class="alert position-fixed" role="alert" id="deletion_success">
    {{ session('deletion_success_message') }}
</div>


@endif
