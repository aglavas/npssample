@extends('layouts.master')

@section('content')
    <div class="m-portlet m-portlet--bordered m-portlet--rounded m-portlet--responsive-mobile" id="main_portlet">
        @include('components.topStatistics', ['survey' => $survey])
    </div>
    <div class="row">
        <div class="col-lg-2 center">
            @if ($answers->total() === 0)
                <h1>0 / {{$answers->total()}} Responses</h1>
            @elseif ($answers->total() < $answers->toArray()['per_page'])
                <h1>{{$answers->total()}} / {{$answers->total()}} Responses</h1>
            @elseif ($answers->total() < ($answers->toArray()['per_page'] * $answers->toArray()['current_page']))
                <h1>{{$answers->total()}} / {{$answers->total()}} Responses</h1>
            @else
                <h1>{{$answers->toArray()['per_page'] * $answers->toArray()['current_page']}} / {{$answers->total()}} Responses</h1>
            @endif
        </div>
        <div class="col-lg-8 center">
            <input id="answerSearch" type="text" placeholder="&#x1F50D; Search">
            <a href="{{Request::url()}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Reset</a>
        </div>
        <div class="col-lg-2">
            @if (App\Services\QueryFormatter::checkNewest(Request::fullUrl()))
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle button-grey" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h2>Newest</h2>
                    </button>
                    <div id="dropdownMenu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{App\Services\QueryFormatter::formatOrderBy(Request::fullUrl())}}oldest=true">Oldest</a>
                    </div>
                </div>
            @else
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle button-grey" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h2>Oldest</h2>
                    </button>
                    <div id="dropdownMenu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{App\Services\QueryFormatter::formatOrderBy(Request::fullUrl())}}newest=true">Newest</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <br>
        </div>
    </div>
    @foreach($answers as $answer)
        @include('components.answer', ['answer' => $answer])
    @endforeach
    {{$answers->appends($_GET)->links()}}
<script type="text/javascript">

    let currentUrl = @json(Request::url());

    $(document).ready(function(){
        $('#dropdownMenuButton').click( function(e) {e.preventDefault();

            $('#dropdownMenu').toggle(function() {
                $(this).toggleClass("dropdown-menu dropdown-menu show");;
            }, function() {
                $(this).toggleClass("dropdown-menu show dropdown-menu");;
            });

            return false; } );

        $(document).keyup(function(event) {
            if ($("#answerSearch").is(":focus") && event.key == "Enter") {
                let contentQueryString = event.target.value;
                window.location.href = currentUrl + '?content=' + contentQueryString;
            }
        });
    });
</script>
@endsection
