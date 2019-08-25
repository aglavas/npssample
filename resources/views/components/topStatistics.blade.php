<div class="row">
    <div class="col-lg-3 center border-right">
        {{$survey->promotersPercent - $survey->detractorsPercent}}%
    </div>
    <div class="col-lg-3 border-right">
        <div class="align-next">
            <div>
                <p style="font-size:40px">&#128515;</p>
            </div>
            <div>
                {{$survey->promotersPercent}}%
            </div>
        </div>
    </div>
    <div class="col-lg-3 border-right">
        <div class="align-next">
            <div>
                <p style="font-size:40px">&#128528;</p>
            </div>
            <div>
                {{$survey->passivesPercent}}%
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="align-next">
            <div>
                <p style="font-size:40px">&#128542;</p>
            </div>
            <div>
                {{$survey->detractorsPercent}}%
            </div>
        </div>
    </div>
</div>
