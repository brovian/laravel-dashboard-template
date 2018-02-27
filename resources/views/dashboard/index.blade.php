<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/mincss.css" type="text/css" rel="stylesheet">
<link href="/css/dashboard.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/js/zepto.min.js"></script>
<script type="text/javascript" src="/js/chart.min.js"></script>
<title>Dashboard</title>
</head>
<body>
<div class="container">
    <div class="row wrap">
        <div class="col c2 menu">
			<div class="logo">
				<a href="/dashboard/"><img src="/img/logo-v.png"></a>
			</div>
			<div class="adminbox">
				<span>Hi,Vian</span>
				<div class="adminmodule">
    				<a href="/dashboard/admin"><img src="/img/setting.png"></a>
    				<a href="/dashboard/logout"><img src="/img/exit.png"></a>
				</div>
			</div>
			<div class="menulist">
				<ul>
					<li class="current">
						<a href="/dashboard/index"><img class="menuicon" src="/img/dashboard.png">控制面板<img class="arrow" src="/img/arrow.png"></a>
					</li>
					<li>
						<a href="/dashboard/category"><img class="menuicon" src="/img/category.png">分类管理<img class="arrow" src="/img/arrow.png"></a>
					</li>
					<li>
						<a href="/dashboard/demo"><img class="menuicon" src="/img/demo.png">Demo管理<img class="arrow" src="/img/arrow.png"></a>
					</li>
					<li>
						<a href="/dashboard/stats"><img class="menuicon" src="/img/stats.png">访问量统计<img class="arrow" src="/img/arrow.png"></a>
					</li>
				</ul>
			</div>
		</div>
        <div class="col c10 contentpage">
			<h3>控制面板</h3>
			<div class="row">
				<div class="col c5 chart rounded">
				    <h4>最近访问量</h4>
					<canvas id="recentpv" ></canvas>
				</div>
				<div class="col c5 chart rounded">
				    <h4>最近抓取量</h4>
				    <canvas id="recentfetch" ></canvas>
				</div>
			</div>
			<div class="row">
				<div class="col c5 chart rounded">
				    <h4>最近提交Demo量</h4>
				    <canvas id="recentsubmit" ></canvas>
				</div>
				<div class="col c5 chart rounded">
				    <h4>最近新增用户量</h4>
				    <canvas id="recentusers" ></canvas>
				</div>
			</div>
			
            <script>
            //Get the context of the canvas element we want to select
            Chart.defaults.global.legend.display = false;
            var ctx1 = document.getElementById("recentpv").getContext('2d');
            var ctx2 = document.getElementById("recentfetch").getContext('2d');
            var ctx3 = document.getElementById("recentsubmit").getContext('2d');
            var ctx4 = document.getElementById("recentusers").getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],
                        borderColor: ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {scales: {xAxes: [{gridLines: {display:false}}],yAxes: [{ticks: {beginAtZero:true},gridLines: {display:false}}]}}
            });
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],
                        borderColor: ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {scales: {xAxes: [{gridLines: {display:false}}],yAxes: [{ticks: {beginAtZero:true},gridLines: {display:false}}]}}
            });
            new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],
                        borderColor: ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {scales: {xAxes: [{gridLines: {display:false}}],yAxes: [{ticks: {beginAtZero:true},gridLines: {display:false}}]}}
            });
            new Chart(ctx4, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],
                        borderColor: ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {scales: {xAxes: [{gridLines: {display:false}}],yAxes: [{ticks: {beginAtZero:true},gridLines: {display:false}}]}}
            });
            
            </script>
		</div>
    </div>
</div>
</body>
</html>