<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/mincss.css" type="text/css" rel="stylesheet">
<link href="/css/dashboard.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/js/zepto.min.js"></script>
<title>Demo管理</title>
<script type="text/javascript">
Zepto(function($){
	// 表格每行添加链接
	//$('.datatable tr').not('.tablehead').on('click',function(){
	//	window.location.href="/dashboard/stats/daydetail?uri="+$(this).children('td').eq(0).html()
	//})
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
				<span>Hi,Admin</span>
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
					<li class="current">
						<a href="/dashboard/demo"><img class="menuicon" src="/img/demo.png">Demo管理<img class="arrow" src="/img/arrow.png"></a>
					</li>
					<li>
						<a href="/dashboard/stats"><img class="menuicon" src="/img/stats.png">访问量统计<img class="arrow" src="/img/arrow.png"></a>
					</li>
				</ul>
			</div>
		</div>
        <div class="col c10 contentpage">
			<h3>Demo管理</h3>
			<div class="row">
				<div class="col c11 rounded">
				    <h4>Demo管理</h4>
				    <div class="searchform">
				    	<form action="/dashboard/demo/search" method="get">
				    		{{ csrf_field() }}
				    		<input type="text" name="keyword" placeholder="搜索标题/内容/提交者" value="{{$keyword}}"><button type="submit" class="searchbutton"></button>
				    	</form>
				    </div>
				    <table class="datatable demotable">
				    	<tr class="tablehead">
				    		<th>提交者</th>
				    		<th>收藏数</th>
				    		<th class="uri">标题</th>
				    		<th>提交时间</th>
				    		<th>来源</th>
				    		<th>审核状态</th>
				    		<th>显示状态</th>
				    		<th>操作</th>
				    	</tr>
				    	<?php foreach ($list as $row):?>
				    	<tr>
				    		<td>{{$row['name']}}</td>
				    		<td>{{$row['favs']}}</td>
				    		<td>{{$row['title']}}</td>
				    		<td>{{$row['created_at']}}</td>
				    		<td>{{$row['source']}}</td>
				    		<td><?php if($row['status'] == 1){
				    		    echo '已审核';
				    		} elseif ($row['status'] == 2){
				    		    echo '<span class="red">未通过审核</span>';
				    		} else {
				    		    echo '未审核';
				    		}?></td>
				    		<td>{!!$row['hidden']==1?'隐藏':'<span class="green">显示</span>'!!}</td>
				    		<td><?php echo '<a href="/dashboard/demo/detail/'.$row['id'].'?from='.base64_encode(url()->full()).'" class="btn btn-sm btn-b">查看</a>';?></td>
				    	</tr>
				    	<?php endforeach;?>
				    </table>
				    <h5>共{{$count}}条记录</h5>
				</div>
			</div>
		</div>
    </div>
</div>
</body>
</html>