@extends('layouts.master')


@section('content')

{!! Form::open(['id' => 'answer-form', 'class' => 'm-form form-notify', 'route' => ['post.answer'] , 'method' => 'POST']) !!}
<div class="m-portlet__body">
    @csrf
    <div class="form-group m-form__group">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <h3>{{$question->content}}</h3>
                {{--<h4>{!! Form::label('question', $question->content) !!}</h4>--}}
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group m-form__group">
                    {!! Form::select('rating', $ratingArray, null, ['id' => 'rating', 'name' => 'rating', 'class' => 'bs-select form-control']) !!}
                    @if ($errors->has('rating'))
                        @include('layouts.validation', ['error' => 'rating'])
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br>
            </div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-lg-4">--}}
                {{--Not at all likely--}}
            {{--</div>--}}
            {{--<div class="col-lg-4">--}}
            {{--</div>--}}
            {{--<div class="col-lg-4">--}}
                {{--Extremely likely--}}
            {{--</div>--}}
        {{--</div>--}}
        @if ( ($errors->has('label_id')) || ($errors->has('content')))
            <div class="additional-info">
        @else
            <div class="additional-info" style="display:none">
        @endif
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <div class="form-group m-form__group">
                        <h3>Why you selected your score?</h3>
                        {!! Form::select('label_id', $labelTranslations, null, ['name' => 'label_id', 'class' => 'bs-select form-control filter-input']) !!}
                        @if ($errors->has('label_id'))
                            @include('layouts.validation', ['error' => 'label_id'])
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <div class="form-group m-form__group">
                        <h3>What is the most important reason for your score?</h3>
                        {!! Form::textarea('content', null, ['rows' => 4, 'cols' => 54, 'style' => 'resize:none', 'class' => 'filter-input']) !!}
                        @if ($errors->has('content'))
                            @include('layouts.validation', ['error' => 'content'])
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
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
<script type="text/javascript">
    $(document).ready(function(){
        const Answer = answer();
        Answer.init();
    });
</script>
@endsection
