$(function () {
    $('#hc').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '2015年癌症发病例数'
        },
        xAxis: {
            type: 'category',
			//categories:['aaa','bbb','ccc'],
            title: {
                text: null
            },
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '案例总数',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: '千例'
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    allowOverlap: true,
					borderRadius: 5,
					backgroundColor: 'rgba(252, 255, 197, 0.7)',
					borderWidth: 2,
					//borderColor: '#AAA',
                }
            },
            column:{
            	colorByPoint:true
            }
        },
        legend: {
            enabled:true
        },
        credits: {
            enabled: false
        },
        series: [
		{
			name:'癌症类型',			
                data:[
                    ['肺癌',733.3],
                    ['胃癌',679.1],
					['结肠癌',376.3],
					['乳腺癌',268.6],
					['宫颈癌',98.9]
                    
                ]
		}
        ]
    });
});