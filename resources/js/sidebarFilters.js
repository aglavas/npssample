function getBuilder(part) {
    return (id = 0, context) =>
        context ? context.find(`${part}_${id}`) : $(`${part}_${id}`);
}

function sidebarFilters() {
    const labelsSol = $('.labels-sol');
    const scoreDiv = $('.score-div');
    const navbarDropdown = $('#navbarDropdown');
    const langDropdown = $('#langDropdown');
    const labelOnRadio = $('#labelOnRadio');
    const labelOffRadio = $('#labelOffRadio');
    const labelRadioButtons = $('input[type=radio][name=groupOfDefaultRadios]');
    const switchComments = $('#switchComments');
    const switchIdentity = $('#switchIdentity');
    const searchButton = $('#searchButton');
    const resetButton = $('#resetButton');
    const getScore = getBuilder('#score');

    let selectedScore = null;
    let previousScore = null;
    let withComments = false;
    let withIdentity = false;
    let withLabels = false;

    const init = (surveyUrl, getParams) => {

        labelsSol.select2({
            width: "200px",
            disabled: "true"
        });

        labelOnRadio.click( function() {
            labelsSol.select2('destroy');
            labelsSol.prop('disabled', false);
            labelsSol.select2({width: "200px"});
        } );

        labelOffRadio.click( function() {
            labelsSol.select2('destroy');
            labelsSol.prop('disabled', true);
            labelsSol.select2({width: "200px"});
        } );

        navbarDropdown.click( function(e) {e.preventDefault();
            langDropdown.toggle(function() {
                $(this).toggleClass("navbar-expand navbar-collapse");
            }, function() {
                $(this).toggleClass("navbar-collapse navbar-expand");
            });

            return false;
        });

        scoreDiv.click(function () {
            selectedScore = $(this).data("score");

            if (previousScore === null) {
                previousScore = $(this);
                $(this).toggleClass("score-selected");
            } else {
                previousScore.toggleClass("score-selected");
                previousScore = $(this);
                $(this).toggleClass("score-selected");
            }
        });

        switchComments.change(function() {
            if(this.checked) {
                withComments = true;
            } else {
                withComments = false;
            }
        });

        switchIdentity.change(function() {
            if(this.checked) {
                withIdentity = true;
            } else {
                withIdentity = false;
            }
        });

        labelRadioButtons.change(function() {
            if (this.value == 'off') {
                withLabels = false;
            }
            else if (this.value == 'on') {
                withLabels = true;
            }
        });

        searchButton.click(function () {

            let query = surveyUrl + '?';

            if (selectedScore) {
                query = query + `score=${selectedScore}&`;
            }

            if (withComments) {
                query = query + `comments=true&`;
            }

            if (withIdentity) {
                query = query + `identity=true&`;
            }

            if (withLabels) {
                let selectedLabels = labelsSol.select2('data');

                selectedLabels.forEach(function (item) {
                    query = query + `labels[]=${item.id}&`;
                });

            }

            if (query.slice(-1) === '&') {
                query = query.slice(0, -1);
            }

            window.location = query;
        });

        resetButton.click(function () {
            window.location = surveyUrl;
        });

        Object.keys(getParams).forEach(function(key) {

            if (key === 'score') {
                let scoreSelector = getScore(getParams[key]);
                selectedScore = getParams[key];
                scoreSelector.toggleClass("score-selected");
                previousScore = scoreSelector;
            }

            if (key === 'comments') {
                withComments = true;
                switchComments.prop('checked', true);
            }

            if (key === 'identity') {
                withIdentity = true;
                switchIdentity.prop('checked', true);
            }

            if (key === 'labels') {
                withLabels = true;
                labelsSol.select2('destroy');
                labelsSol.prop('disabled', false);
                labelsSol.select2({width: "200px"});
                labelOnRadio.prop('checked', true);
                labelsSol.val(getParams[key]);
                labelsSol.trigger('change');
            }


        });
    };

    return {
        init
    };
}

window.sidebarFilters = sidebarFilters;
