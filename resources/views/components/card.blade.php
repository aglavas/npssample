<div class="card text-center" style="width: 30rem;">
    <div class="card-body">
        <h4 class="card-title">{{$name}}</h4>
        {{--<a href="/aaaa" class="stretched-link">View</a>--}}
        <h5>{{$count}} Responses</h5>
        <canvas id="cardChart_{{$id}}" width="400" height="400"></canvas>
        <br>
        <a href="/survey/{{$id}}" class="btn btn-primary stretched-link">View</a>
        <div class="row">
            <div class="col-sm-4">
                <p style="font-size:40px">&#128515;</p> {{$promoters}}%
            </div>
            <div class="col-sm-4">
                <p style="font-size:40px">&#128528;</p> {{$passives}}%
            </div>
            <div class="col-sm-4">
                <p style="font-size:40px">&#128542;</p> {{$detractors}}%
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        let canvas = document.getElementById("cardChart_{{$id}}");
        let promoters = {{$promoters}};
        let passives = {{$passives}};
        let detractors = {{$detractors}};
        const Dashboard = dashboard();
        Dashboard.init(canvas, promoters, passives, detractors);
    });
</script>
