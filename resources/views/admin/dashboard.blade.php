@extends('layouts.master')

@section('content')
<div class="row">
    @foreach($surveys as $survey)
        <div class="col-sm-3">
            @include('components.card', ['survey' => $survey])
        </div>
    @endforeach
</div>
@endsection
