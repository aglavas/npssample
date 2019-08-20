@extends('layouts.master')

@section('content')
    @include('components.topStatistics', ['survey' => $survey])
@endsection
