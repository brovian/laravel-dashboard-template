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
<title>分类管理</title>
<script type="text/javascript">
Zepto(function($){
	$('.parentbutton').on('click',function(){
		window.location.href="/dashboard/category/list/depth/1/parentid/{{$redirectid['parent_id']}}"
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
				    <h4>新增三级分类</h4>
				    <?php if(Session::get('msg')):?>
				    <div class="msg success">{{Session::get('msg')}}</div>
				    <?php endif;?>
				    <form action="/dashboard/category/add/depth/2/parentid/{{$parentid}}" method="post">
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
				    		<div><input type="text" name="categoryname" placeholder="名称" required></div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c2">
				    		<div>URI</div>
				    	</div>
				    	<div class="col c10">
				    		<div><input type="text" name="categoryuri" placeholder="相对URI" required></div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c2">
				    		<div>顺序</div>
				    	</div>
				    	<div class="col c10">
				    		<div><input type="number" name="categoryorder" placeholder="顺序" required></div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c2">
				    		<div>状态</div>
				    	</div>
				    	<div class="col c10">
				    		<div>
				    			<input type="checkbox" id="toggle-button" name="categorystatus">
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
			<div class="row">
				<div class="col c11 rounded">
				    <h4>三级分类</h4>
				    <table class="datatable">
				    	<tr class="tablehead">
				    		<th>名称</th>
				    		<th>URI</th>
				    		<th>顺序</th>
				    		<th>状态</th>
				    		<th>操作</th>
				    	</tr>
				    	<?php foreach ($category as $row):?>
				    	<tr>
				    		<td>{{$row['name']}}</td>
				    		<td>{{$row['uri']}}</td>
				    		<td>{{$row['order']}}</td>
				    		<td>{!!$row['status']==0 ? '<span class="red">隐藏</span>':'<span class="green">显示</span>'!!}</td>
				    		<td>
				    			<a href="/dashboard/category/edit/depth/2/id/{{$row['id']}}" class="btn btn-a btn-sm">编辑</a>
				    		</td>
				    	</tr>
				    	<?php endforeach;?>
				    </table>
				    <?php if (empty($category)){echo '<span class="red">暂无分类</span>';}?>
				</div>
			</div>
		</div>
    </div>
</div>
</body>
</html>