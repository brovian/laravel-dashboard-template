<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/mincss.css" type="text/css" rel="stylesheet">
<link href="/css/dashboard.css" type="text/css" rel="stylesheet">
<link href="/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet">
<script type="text/javascript" src="/js/zepto.min.js"></script>
<script src="/ckeditor/ckeditor.js"></script>
<script src="/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
<title>Demo管理</title>
<script type="text/javascript">
Zepto(function($){
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
				<div class="col c10 rounded addform demodetail">
				    <h4>Demo查看</h4>
				    <?php if(Session::get('msg')):?>
				    <div class="msg success">{{Session::get('msg')}}</div>
				    <?php endif;?>
				    <form action="/dashboard/demo/editdetail/{{$demo['id']}}" method="post">
				    {!! csrf_field() !!}
				    <div class="row">
				    	<div class="col c1">
				    		<div>提交者</div>
				    	</div>
				    	<div class="col c10">
				    		<div class="text">{{$user['name']}}</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c1">
				    		<div>标题</div>
				    	</div>
				    	<div class="col c10">
				    		<div><input type="text" name="title" placeholder="标题" value="{{$demo['title']}}" required></div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c1">
				    		<div>关键词</div>
				    	</div>
				    	<div class="col c10">
				    		<div><input type="text" name="keyword" placeholder="关键词" value="{{$demo['keyword']}}" required></div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c1">
				    		<div>是否公开</div>
				    	</div>
				    	<div class="col c10">
				    		<div class="text">{{$demo['privacy']==0?'不公开':'公开'}}</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c1">
				    		<div>提交时间</div>
				    	</div>
				    	<div class="col c10">
				    		<div class="text">{{$demo['created_at']}}</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c1">
				    		<div>来源</div>
				    	</div>
				    	<div class="col c10">
				    		<div class="text">{{$demo['source']}}</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c1">
				    		<div>审核状态</div>
				    	</div>
				    	<div class="col c10">
				    		<div class="text">
				    			<input type="radio" class="radio" id="status0" name="status" value="0" <?php if ($demo['status']==0){echo 'checked';}?>><label for="status0">未审核</label>
				    			<input type="radio" class="radio" id="status1" name="status" value="1" <?php if ($demo['status']==1){echo 'checked';}?>><label for="status1">已审核</label>
				    			<input type="radio" class="radio" id="status2" name="status" value="2" <?php if ($demo['status']==2){echo 'checked';}?>><label for="status2">未通过审核</label>
				    		</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c1">
				    		<div>状态</div>
				    	</div>
				    	<div class="col c10">
				    		<div>
				    			<input type="checkbox" id="toggle-button" {{$demo['hidden']==1?'':'checked'}} name="hidden" value="0">
                                <label for="toggle-button" class="button-label">
                                    <span class="circle"></span>
                                    <span class="text on">显示</span>
                                    <span class="text off">隐藏</span>
                                </label>
				    		</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col c1">
				    		<div>所属分类</div>
				    	</div>
				    	<div class="col c10">
				    		<div>
				    			<select name="level0" class="category" id="level0">
				    				<?php foreach ($level0 as $row):?>
				    				<option value="{{$row['id']}}" <?php if($row['id']==$demo['category_id']){echo 'selected="selected"';}?>>{{$row['name']}}</option>
				    				<?php endforeach;?>
				    			</select>
				    		</div>
				    	</div>
				    </div>
				    <div class="row"><!-- 富文本编缉器开始 -->
				    	<div class="col c1">
				    		<div>内容</div>
				    	</div>
				    	<div class="col c10">
    						<textarea id="editor" name="content" class="ckeditor">{{htmlspecialchars($demo['content'])}}</textarea>
						</div>
					</div>
				    <div class="row">
				    	<div class="col c1">
				    		&nbsp;
				    	</div>
				    	<div class="col c10">
				    		<button type="submit">提交</button>
				    		<button type="button" onclick="window.location.href='<?php if (Session::get('from')){echo base64_decode(Session::get('from'));}else{echo '/dashboard/demo';}?>'" class="btn-gray">返回</button>
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