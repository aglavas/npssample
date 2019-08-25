<div class="shadow p-3 mb-5 bg-white rounded">
    <div class="card text-left">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-1 center">
                    @if ($answer->rating >= 7)
                        <p class="rating-smiley">&#128515;  <div class="promoter-rating">{{$answer->rating}}</div></p>
                    @elseif(($answer->rating >= 4) && ($answer->rating <= 7))
                        <p class="rating-smiley">&#128528;  <div class="passives-rating">{{$answer->rating}}</div></p>
                    @else
                        <p class="rating-smiley">&#128542;  <div class="detractors-rating">{{$answer->rating}}</div></p>
                    @endif
                </div>
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="answer-timestamp">
                                {{$answer->created_at}}
                                {{--{{$answer->created_at->diffForHumans()}}--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="answer-content">
                                {{$answer->content}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @if (!is_null($answer->label_id))
                                <span class="badge badge-pill badge-primary">{{$answer->label->title}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    {{--$(document).ready(function(){--}}
        {{--let canvas = document.getElementById("cardChart_{{$survey->id}}");--}}
        {{--let promoters = {{$survey->promoters}};--}}
        {{--let passives = {{$survey->passives}};--}}
        {{--let detractors = {{$survey->detractors}};--}}
        {{--const Dashboard = dashboard();--}}
        {{--Dashboard.init(canvas, promoters, passives, detractors);--}}
    {{--});--}}
</script>
