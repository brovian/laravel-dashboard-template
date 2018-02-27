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
<title>访问量统计</title>
<script type="text/javascript">
Zepto(function($){
	// 表格每行添加链接
	$('.datatable tr').not('.tablehead').on('click',function(){
			window.location.href="/dashboard/stats/daydetail?uri="+$(this).children('td').eq(0).html()
		})
})
</script>
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
					<li>
						<a href="/dashboard/index"><img class="menuicon" src="/img/dashboard.png">控制面板<img class="arrow" src="/img/arrow.png"></a>
					</li>
					<li>
						<a href="/dashboard/category"><img class="menuicon" src="/img/category.png">分类管理<img class="arrow" src="/img/arrow.png"></a>
					</li>
					<li>
						<a href="/dashboard/demo"><img class="menuicon" src="/img/demo.png">Demo管理<img class="arrow" src="/img/arrow.png"></a>
					</li>
					<li class="current">
						<a href="/dashboard/stats"><img class="menuicon" src="/img/stats.png">访问量统计<img class="arrow" src="/img/arrow.png"></a>
					</li>
				</ul>
			</div>
		</div>
        <div class="col c10 contentpage">
			<h3>访问量统计</h3>
			<div class="row">
				<div class="col c2 chart rounded">
				    <h4>PV数</h4>
				    <div class="quickcount">
				    	<div class="yesterday">
				    		<span class="value">10000</span>
				    		<span class="date">昨天</span>
				    	</div>
				    	<div class="today">
				    		<span class="value">11000</span>
				    		<span class="date">今天</span>
				    	</div>
				    	<div class="trend up"></div>
				    </div>
				</div>
				<div class="col c2 chart rounded">
				    <h4>IP数</h4>
				    <div class="quickcount">
				    	<div class="yesterday">
				    		<span class="value">1000</span>
				    		<span class="date">昨天</span>
				    	</div>
				    	<div class="today">
				    		<span class="value">1100</span>
				    		<span class="date">今天</span>
				    	</div>
				    	<div class="trend up"></div>
				    </div>
				</div>
				<div class="col c2 chart rounded">
				    <h4>平均停留时间</h4>
				    <div class="quickcount">
				    	<div class="yesterday">
				    		<span class="value">0:50</span>
				    		<span class="date">昨天</span>
				    	</div>
				    	<div class="today">
				    		<span class="value">0:49</span>
				    		<span class="date">今天</span>
				    	</div>
				    	<div class="trend down"></div>
				    </div>
				</div>
				<div class="col c2 chart rounded">
				    <h4>新增用户数</h4>
				    <div class="quickcount">
				    	<div class="yesterday">
				    		<span class="value">100</span>
				    		<span class="date">昨天</span>
				    	</div>
				    	<div class="today">
				    		<span class="value">100</span>
				    		<span class="date">今天</span>
				    	</div>
				    	<div class="trend nochange"></div>
				    </div>
				</div>
			</div>
			
			<div class="row">
				<div class="col c11 rounded">
				    <h4>访问量</h4>
				    <div class="searchform">
				    	<form action="/dashboard/stats/search" method="get">
				    		{{ csrf_field() }}
				    		<input type="text" name="uri" placeholder="查询指定uri数据"><button type="submit" class="searchbutton"></button>
				    	</form>
				    </div>
				    <table class="datatable statsdata">
				    	<tr class="tablehead">
				    		<th class="uri">URI</th>
				    		<th>时间段</th>
				    		<th>PV</th>
				    		<th>IP</th>
				    		<th>平均停留时间</th>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/usercenter</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    	<tr>
				    		<td>/</td>
				    		<td>2017.9.30-2017.10.1</td>
				    		<td>1000</td>
				    		<td>200</td>
				    		<td>0:30</td>
				    	</tr>
				    </table>
				    <div class="col c12 page">
				    	<a class="firstpage" href="javascript:;">首页</a><a class="pagenum current" href="javascript:;">1</a><a class="pagenum" href="javascript:;">2</a><a class="pagenum" href="javascript:;">3</a><a class="pagenum" href="javascript:;">4</a><a class="pagenum" href="javascript:;">5</a><a class="lastpage" href="javascript:;">末页</a>
				    </div>
				</div>
			</div>
		</div>
    </div>
</div>
</body>
</html>