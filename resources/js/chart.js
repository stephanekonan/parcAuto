import ApexCharts from 'apexcharts';
import moment from 'moment';

const joursDeLaSemaine = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
const datesPourSemaineEnCours = joursDeLaSemaine.map(jour => `${jour} ${moment().startOf('isoWeek').add(joursDeLaSemaine.indexOf(jour), 'days').locale('fr_FR').format('DD MMM')}`);

const getAccoutingGerantChartOptions = (nbreParJourNowWeek, nbreParJourPastWeek, maxNbre) => {

    let mainChartColors = {}

    mainChartColors = {
        borderColor: '#9CB2DD',
        labelColor: '#6B7280',
        opacityFrom: 0.45,
        opacityTo: 0.10,
    }

    return {
        chart: {
            height: 650,
            type: 'area',
            fontFamily: 'Poppins',
            foreColor: mainChartColors.labelColor,
            toolbar: {
                show: true
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                enabled: true,
                opacityFrom: mainChartColors.opacityFrom,
                opacityTo: mainChartColors.opacityTo
            }
        },
        dataLabels: {
            enabled: true
        },
        tooltip: {
            style: {
                fontSize: '14px',
                fontFamily: 'Poppins',
            },
        },
        grid: {
            show: true,
            borderColor: mainChartColors.borderColor,
            strokeDashArray: 5,
            padding: {
                left: 35,
                bottom: 15
            }
        },
        series: [
            {
                name: 'Véhicules (semaine actuelle)',
                data: nbreParJourNowWeek,
                color: '#1A56DB'
            },
            {
                name: 'Véhicules (semaine passée)',
                data: nbreParJourPastWeek,
                color: '#FDBA8C'
            }
        ],
        markers: {
            size: 5,
            strokeColors: '#ffffff',
            hover: {
                size: 15,
                sizeOffset: 5
            }
        },
        xaxis: {
            categories: datesPourSemaineEnCours,
            labels: {
                style: {
                    colors: [mainChartColors.labelColor],
                    fontSize: '14px',
                    fontWeight: 500,
                },
            },
            axisBorder: {
                color: mainChartColors.borderColor,
            },
            axisTicks: {
                color: mainChartColors.borderColor,
            },
            crosshairs: {
                show: true,
                position: 'back',
                stroke: {
                    color: mainChartColors.borderColor,
                    width: 1,
                    dashArray: 10,
                },
            },
        },
        yaxis: {
            min: 0,
            max: maxNbre,
            labels: {
                style: {
                    colors: [mainChartColors.labelColor],
                    fontSize: '14px',
                    fontWeight: 500,
                },
            },
        },
        legend: {
            fontSize: '14px',
            fontWeight: 500,
            fontFamily: 'Inter, sans-serif',
            labels: {
                colors: [mainChartColors.labelColor]
            },
            itemMargin: {
                horizontal: 10
            }
        },
        responsive: [
            {
                breakpoint: 1024,
                options: {
                    xaxis: {
                        labels: {
                            show: true
                        }
                    }
                }
            }
        ]
    };
}

const fetchDataFromServerGerant = () => {
    fetch('/api/statistics/vehicules')
        .then(response => response.text())
        .then(data => {
            return JSON.parse(data);
        })
        .then(data => {
            const chartOptions = getAccoutingGerantChartOptions(data.nbreParJourNowWeek, data.nbreParJourPastWeek, data.maxNbre);
            const chart = new ApexCharts(document.getElementById('statistics-chart'), chartOptions);
            chart.render();
            chart.updateSeries([
                { data: data.nbreParJourNowWeek },
                { data: data.nbreParJourPastWeek },
            ]);
        })
        .catch(error => console.error('Erreur lors de la récupération des données:', error));
};

if (document.getElementById('statistics-chart')) {
    fetchDataFromServerGerant();
}

