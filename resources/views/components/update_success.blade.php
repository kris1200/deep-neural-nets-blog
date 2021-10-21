
{{-- Update success message --}}
@if (session('update_success_message'))


<div class="alert position-fixed" role="alert" id="update_success">
    {{ session('update_success_message') }}
</div>

@endif
