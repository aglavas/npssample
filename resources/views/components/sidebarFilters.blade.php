<hr>
<div class="sidebar-filters">
    <span class="m-menu__link-text sidebar-caption">Score type</span>
    <div style="font-size:30px;">
        <div class="score-div" id="score_all" data-score="all">
            ALL
        </div>
        <div class="score-div" id="score_promoters" data-score="promoters">
            &#128515;
        </div>
        <div class="score-div" id="score_passives" data-score="passives">
            &#128528;
        </div>
        <div class="score-div" id="score_detractors" data-score="detractors">
            &#128542;
        </div>
    </div>
</div>
<hr>
<div class="sidebar-filters">
    <span class="m-menu__link-text sidebar-caption">Responses</span>
    <br>
    <br>
    <div class="form-group">
        <span class="switch">
            <input type="checkbox" class="switch" id="switchComments">
            <label for="switchComments">With comments</label>
        </span>
    </div>
    {{--<div class="form-group">--}}
        {{--<span class="switch">--}}
            {{--<input type="checkbox" class="switch" id="switchIdentity">--}}
            {{--<label for="switchIdentity">With identity</label>--}}
        {{--</span>--}}
    {{--</div>--}}
</div>
<hr>
<div class="sidebar-filters">
    <div>
        <span class="m-menu__link-text sidebar-caption">Labels</span>
    </div>
    <br>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="labelOffRadio" name="groupOfDefaultRadios" value="off" checked>
        <label class="custom-control-label" for="labelOffRadio">Filter off</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="labelOnRadio" name="groupOfDefaultRadios" value="on">
        <label class="custom-control-label" for="labelOnRadio">Selected</label>
    </div>
    <br>
    <select class="labels-sol" name="label" multiple="multiple">
        @foreach($labels as $label)
            <option value="{{$label->id}}">{{$label->title}}</option>
        @endforeach
    </select>
</div>
<hr>
<div class="sidebar-filters">
    <button id="searchButton" type="button" class="btn btn-primary">Search</button>
    <button id="resetButton" type="button" class="btn btn-danger">Reset</button>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        let url = "{{Request::url()}}";
        let getParams = @json(Request()->all());

        const SidebarFilters = sidebarFilters();
        SidebarFilters.init(url, getParams);
    });
</script>
