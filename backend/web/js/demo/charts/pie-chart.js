'use strict';

$(document).ready(function(){
    var pieData = [
        {data: 1, color: '#F44336', label: 'آپارتمان'},
        {data: 2, color: '#03A9F4', label: 'مجتمع های آپارتمانی'},
        {data: 3, color: '#8BC34A', label: 'ویلا - خانه'},
        {data: 4, color: '#FFEB3B', label: 'مغازه و املاک تجاری'},
        {data: 4, color: '#009688', label: 'زمین و کلنگی'},
        {data: 4, color: '#009688', label: 'زمین و املاک کشاورزی'},
        {data: 4, color: '#009688', label: 'دامداری و دامپروری'},
        {data: 4, color: '#009688', label: 'املاک صنعتی'},
    ];


    /*---------------------------------
        Pie Chart
    ---------------------------------*/
    if($('#pie-chart')[0]){
        $.plot('#pie-chart', pieData, {
            series: {
                pie: {
                    show: true,
                    stroke: {
                        width: 2,
                    },
                },
            },
            legend: {
                container: '.flot-chart__legends--pie',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0,
                labelBoxBorderColor: '#fff'
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false,
                cssClass: 'flot-tooltip'
            }

        });
    }

    /*---------------------------------
        Donut Chart
    ---------------------------------*/
    if($('#donut-chart')[0]){
        $.plot('#donut-chart', pieData, {
            series: {
                pie: {
                    innerRadius: 0.5,
                    show: true,
                    stroke: {
                        width: 2,
                    },
                },
            },
            legend: {
                container: '.flot-chart__legends--donut',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false,
                cssClass: 'flot-tooltip'
            }

        });
    }
});
