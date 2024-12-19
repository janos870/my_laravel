@extends('layouts.app')

@section('content')

<div class="flex justify-center items-center min-h-screen alert alert-danger">
    @if(session('error'))
        <h2>{{ session('error') }}</h2>   
````@endif
</div>
@endsection