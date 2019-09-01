<div class="shadow p-3 mb-5 bg-white rounded">
    <div class="card text-center">
        <div class="card-body">
            <h4 class="card-title">ALL</h4>
            <h5>{{$surveyStatistic['responsesCount']}} Responses</h5>
            <h5>{{$surveyStatistic['surveyCount']}} Surveys</h5>
            <canvas id="cardChart_all" width="400" height="400"></canvas>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <p class="happy" style="font-size:40px">&#128515;</p> {{ App\Services\PercentCalculator::calculatePercent($surveyStatistic['promotersCount'], $surveyStatistic['passivesCount'], $surveyStatistic['detractorsCount'], $surveyStatistic['promotersCount']) }} %
                </div>
                <div class="col-sm-4">
                    <p style="font-size:40px">&#128528;</p> {{ App\Services\PercentCalculator::calculatePercent($surveyStatistic['promotersCount'], $surveyStatistic['passivesCount'], $surveyStatistic['detractorsCount'], $surveyStatistic['passivesCount'] ) }} %
                </div>
                <div class="col-sm-4">
                    <p class="sad" style="font-size:40px">&#128542;</p> {{ App\Services\PercentCalculator::calculatePercent($surveyStatistic['promotersCount'], $surveyStatistic['passivesCount'], $surveyStatistic['detractorsCount'], $surveyStatistic['detractorsCount']) }} %
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        let canvas = document.getElementById("cardChart_all");
        let promoters = {{$surveyStatistic['promotersCount']}};
        let passives = {{$surveyStatistic['passivesCount']}};
        let detractors = {{$surveyStatistic['detractorsCount']}};
        const Dashboard = dashboard();
        Dashboard.init(canvas, promoters, passives, detractors);
    });
</script>
