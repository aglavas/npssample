<div class="shadow p-3 mb-5 bg-white rounded">
    <div class="card text-center" onclick='window.open("{{$survey->url}}", "_self")' style="cursor: pointer;">
        <div class="card-body">
            <h4 class="card-title">{{$survey->name}}</h4>
            <h5>{{$survey->count}} Responses</h5>
            <h5>&nbsp;</h5>
            <canvas id="cardChart_{{$survey->id}}" width="400" height="400"></canvas>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <p class="happy" style="font-size:40px">&#128515;</p> {{$survey->promotersPercent}}%
                </div>
                <div class="col-sm-4">
                    <p style="font-size:40px">&#128528;</p> {{$survey->passivesPercent}}%
                </div>
                <div class="col-sm-4">
                    <p class="sad" style="font-size:40px">&#128542;</p> {{$survey->detractorsPercent}}%
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        let canvas = document.getElementById("cardChart_{{$survey->id}}");
        let promoters = {{$survey->promoters}};
        let passives = {{$survey->passives}};
        let detractors = {{$survey->detractors}};
        const Dashboard = dashboard();
        Dashboard.init(canvas, promoters, passives, detractors);
    });
</script>
