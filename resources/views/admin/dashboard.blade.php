@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
        @include('components.overallCard', ['surveyStatistic' => $surveyStatistic])
    </div>
    @foreach($surveys as $survey)
        <div class="col-sm-6 col-md-4 col-lg-3">
            @include('components.card', ['survey' => $survey])
        </div>
    @endforeach
</div>
@endsection
