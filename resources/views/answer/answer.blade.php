@extends('layouts.master')


@section('content')
<div class="m-portlet m-portlet--bordered m-portlet--rounded m-portlet--responsive-mobile" id="main_portlet">
    {!! Form::open(['id' => 'answer-form', 'class' => 'm-form form-notify', 'route' => ['post.answer'] , 'method' => 'POST']) !!}
    <div class="m-portlet__body">
        @csrf
        <div class="form-group m-form__group">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    <div class="question-text">{{$question->content}}</div>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
            </div>
            <div class="row">
                {{--<div class="col-lg-3">--}}
                {{--</div>--}}
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="numbers row">
                        <div id="rating_1" class="number" data-rating="1">
                            1
                        </div>
                        <div id="rating_2" class="number" data-rating="2">
                            2
                        </div>
                        <div id="rating_3" class="number" data-rating="3">
                            3
                        </div>
                        <div id="rating_4" class="number" data-rating="4">
                            4
                        </div>
                        <div id="rating_5" class="number" data-rating="5">
                            5
                        </div>
                        <div id="rating_6" class="number" data-rating="6">
                            6
                        </div>
                        <div id="rating_7" class="number" data-rating="7">
                            7
                        </div>
                        <div id="rating_8" class="number" data-rating="8">
                            8
                        </div>
                        <div id="rating_9" class="number" data-rating="9">
                            9
                        </div>
                        <div id="rating_10" class="number" data-rating="10">
                            10
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    @if ($errors->has('rating'))
                        @include('layouts.validation', ['error' => 'rating'])
                    @endif
                </div>
                <div class="col-lg-3">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    <div class="pull-left">Not at all likely</div>
                    <div class="pull-right">Extremely likely</div>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
            </div>
            @if ( ($errors->has('label_id')) || ($errors->has('content')))
                <div class="additional-info">
            @else
                <div class="additional-info" style="display:none">
            @endif
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="question-text">Why you selected your score?</div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        {!! Form::select('label_id', $labelTranslations, null, ['name' => 'label_id', 'class' => 'bs-select form-control']) !!}
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        @if ($errors->has('label_id'))
                            @include('layouts.validation', ['error' => 'label_id'])
                        @endif
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="question-text">What is the most important reason for your score?</div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        {!! Form::textarea('content', null, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        @if ($errors->has('content'))
                            @include('layouts.validation', ['error' => 'content'])
                        @endif
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
            </div>
            {!! Form::input('text', 'lang', $lang, ['class' => 'form-control m-input', 'hidden']) !!}
            {!! Form::input('text', 'event', $event, ['class' => 'form-control m-input', 'hidden']) !!}
            {!! Form::input('text', 'hash', $hash, ['class' => 'form-control m-input', 'hidden']) !!}
        </div>
        @include('layouts.portlet_alerts')
    </div>
    @include('layouts.submit_button')
    {!! Form::close() !!}
</div>
<script type="text/javascript">
    $(document).ready(function(){
        const Answer = answer();
        Answer.init();

        @if ($errors->any())
            let rating = {{old('rating', '')}}
            Answer.validationInit(rating);
        @endif
    });
</script>
@endsection
