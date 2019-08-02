import Chart from 'chart.js';

function dashboard() {

    const init = (id, promoters, passives, detractors) => {
        console.log('tujsam');

        let myChart = new Chart(id, {
            type: 'pie',
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
        });

    };

    return {
        init
    };
}

window.dashboard = dashboard;
