@if (count($errors->all()) > 1)
<h2>Tenim multiples errors</h2>
@else
<h2>No tenim cap error</h2> 
@endif

{{--  @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}