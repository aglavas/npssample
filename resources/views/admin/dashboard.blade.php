@extends('layouts.master')

@section('content')

    {{--,--}}
    {{--[--}}
    {{--'id' => 2,--}}
    {{--'name' => 'Emma NL - 30 days',--}}
    {{--'count' => '600',--}}
    {{--'detractors' => '16',--}}
    {{--'passives' => '24',--}}
    {{--'promoters' => '60',--}}
    {{--],--}}
    {{--[--}}
    {{--'id' => 3,--}}
    {{--'name' => 'Emma NL - 100 days',--}}
    {{--'count' => '1000',--}}
    {{--'detractors' => '16',--}}
    {{--'passives' => '24',--}}
    {{--'promoters' => '60',--}}
    {{--],--}}
    {{--[--}}
    {{--'id' => 4,--}}
    {{--'name' => 'Emma NL - 500 days',--}}
    {{--'count' => '1000',--}}
    {{--'detractors' => '16',--}}
    {{--'passives' => '24',--}}
    {{--'promoters' => '60',--}}
    {{--]--}}

    @php

    $surveys = [
        [
            'id' => 1,
            'name' => 'Emma NL - After delivery',
            'count' => '500',
            'detractors' => '10',
            'passives' => '30',
            'promoters' => '60',
        ]
    ];

    @endphp


    <div class="row">
        @foreach($surveys as $survey)
            <div class="col-sm-3">
                @include('components.card', ['id' => $survey['id'], 'name' => $survey['name'], 'count' => $survey['count'], 'detractors' => $survey['detractors'], 'passives' => $survey['passives'], 'promoters' => $survey['promoters']])
            </div>
        @endforeach
    </div>
@endsection
