import Chart from 'chart.js';

function dashboard() {

    const init = (id, promoters, passives, detractors) => {

        let npsValue = promoters - detractors;

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
        });

    };

    return {
        init
    };
}

window.dashboard = dashboard;
