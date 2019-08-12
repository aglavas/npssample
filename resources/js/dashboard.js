import Chart from 'chart.js';

function dashboard() {

    const init = (id, promoters, passives, detractors) => {

        let npsValue = promoters - detractors;

        console.log(npsValue);

        Chart.pluginService.register({
            beforeDraw: function (chart) {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;
                ctx.restore();
                var fontSize = (height / 114).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";
                var text = chart.config.options.elements.center.text,
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;
                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        });

        // Chart.pluginService.register({
        //     beforeDraw: function (chart) {
        //         if (chart.config.options.elements.center) {
        //             //Get ctx from string
        //             var ctx = chart.chart.ctx;
        //
        //             //Get options from the center object in options
        //             var centerConfig = chart.config.options.elements.center;
        //             var fontStyle = centerConfig.fontStyle || 'Arial';
        //             var txt = centerConfig.text;
        //             var color = centerConfig.color || '#000';
        //             var sidePadding = centerConfig.sidePadding || 20;
        //             var sidePaddingCalculated = (sidePadding/100) * (chart.innerRadius * 2)
        //             //Start with a base font of 30px
        //             ctx.font = "30px " + fontStyle;
        //
        //             //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
        //             var stringWidth = ctx.measureText(txt).width;
        //             var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;
        //
        //             // Find out how much the font can grow in width.
        //             var widthRatio = elementWidth / stringWidth;
        //             var newFontSize = Math.floor(30 * widthRatio);
        //             var elementHeight = (chart.innerRadius * 2);
        //
        //             // Pick a new font size so it will not be larger than the height of label.
        //             var fontSizeToUse = Math.min(newFontSize, elementHeight);
        //
        //             //Set font settings to draw it correctly.
        //             ctx.textAlign = 'center';
        //             ctx.textBaseline = 'middle';
        //             var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
        //             var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
        //             ctx.font = fontSizeToUse+"px " + fontStyle;
        //             ctx.fillStyle = color;
        //
        //             //Draw text in center
        //             ctx.fillText(txt, centerX, centerY);
        //         }
        //     }
        // });

        let myChart = new Chart(id, {
            type: 'doughnut',
            data: {
                labels: ['Detractors', 'Passives', 'Promoters'],
                datasets: [{
                    data: [detractors, passives, promoters],
                    backgroundColor: [
                        'rgba(250, 10, 10, 0.2)',
                        'rgba(130, 130, 130, 0.2)',
                        'rgba(12, 221, 23, 0.2)',
                    ],
                    borderColor: [
                        'rgba(250, 10, 10, 1)',
                        'rgba(130, 130, 130, 1)',
                        'rgba(12, 221, 23, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                elements: {
                    center: {
                        text: npsValue  //set as you wish
                    }
                },
                cutoutPercentage: 75,
                legend: {
                    display: false
                }
            }
            // options: {
            //     responsive: true,
            //     legend: {
            //         display: false
            //     }
            // }
            // options: {
            //     elements: {
            //         center: {
            //             text: npsValue,
            //             // color: '#36A2EB', //Default black
            //             // fontStyle: 'Helvetica', //Default Arial
            //             sidePadding: 15 //Default 20 (as a percentage)
            //         }
            //     }
            // }
        });

    };

    return {
        init
    };
}

window.dashboard = dashboard;
