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
<title>编辑分类</title>
<script type="text/javascript">
Zepto(function($){
	$('.parentbutton').on('click',function(){
		window.location.href="/dashboard/category/list/depth/1/parentid/{{$parentid}}"
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
					<li class="current">
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
			<h3>分类管理</h3>
			<div class="row">
				<div class="col c5 rounded addform">
				    <h4>编辑二级分类</h4>
				    <form action="/dashboard/category/doedit/depth/1/parentid/{{$result['parent_id']}}/id/{{$result['id']}}" method="post">
				    {!! csrf_field() !!}
				    <div class="row">
				    	<div class="col c2">
				    		<div>父分类</div>
				    	</div>
				    	<div class="col c10">
				    		<div>
				    			<select name="categoryparent" class="categoryselect">
				    				<?php foreach($parentcategory as $row):?>
				    				<option value="{{$row['id']}}" <?php if($row['id']==$parentid){echo 'selected';}?>>{{$row['name']}}</option>
				    				<?php endforeach;?>
				    			</select>
				    		</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c2">
				    		<div>名称</div>
				    	</div>
				    	<div class="col c10">
				    		<div><input type="text" name="categoryname" placeholder="名称" value="{{$result['name']}}" required></div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c2">
				    		<div>URI</div>
				    	</div>
				    	<div class="col c10">
				    		<div><input type="text" name="categoryuri" placeholder="相对URI" value="{{$result['uri']}}" required></div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c2">
				    		<div>顺序</div>
				    	</div>
				    	<div class="col c10">
				    		<div><input type="number" name="categoryorder" placeholder="顺序" value="{{$result['order']}}" required></div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c2">
				    		<div>状态</div>
				    	</div>
				    	<div class="col c10">
				    		<div>
				    			<input type="checkbox" id="toggle-button" {{$result['status']==1?"checked":""}} name="categorystatus">
                                <label for="toggle-button" class="button-label">
                                    <span class="circle"></span>
                                    <span class="text on">显示</span>
                                    <span class="text off">隐藏</span>
                                </label>
				    		</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c2">
				    		&nbsp;
				    	</div>
				    	<div class="col c10">
				    		<button type="submit">提交</button>
							<button type="button" class="parentbutton">返回</button>
				    	</div>
				    </div>
				    </form>
				</div>
			</div>
		</div>
    </div>
</div>
</body>
</html>