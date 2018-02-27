<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/mincss.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/js/zepto.min.js"></script>
<style type="text/css">
html{background-color: #fff;background-image:url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHdpZHRoPSczMDAnIGhlaWdodD0nMzAwJyB2aWV3Qm94PScwIDAgMzAwIDMwMCc+Cgk8ZGVmcz4KCQk8cGF0dGVybiBpZD0nYmx1ZXN0cmlwZScgcGF0dGVyblVuaXRzPSd1c2VyU3BhY2VPblVzZScgeD0nMCcgeT0nMCcgd2lkdGg9JzIwJyBoZWlnaHQ9JzIwJyB2aWV3Qm94PScwIDAgNDAgNDAnID4KCQk8cmVjdCB3aWR0aD0nMTEwJScgaGVpZ2h0PScxMTAlJyBmaWxsPScjZmZmJy8+CgkJCTxwYXRoIGQ9J00xLDFoNDB2NDBoLTQwdi00MCcgZmlsbC1vcGFjaXR5PScwJyBzdHJva2Utd2lkdGg9JzEnIHN0cm9rZS1kYXNoYXJyYXk9JzAsMSwxJyBzdHJva2U9JyNjY2MnLz4KCQk8L3BhdHRlcm4+IAoJCTxmaWx0ZXIgaWQ9J2Z1enonIHg9JzAnIHk9JzAnPgoJCQk8ZmVUdXJidWxlbmNlIHR5cGU9J3R1cmJ1bGVuY2UnIHJlc3VsdD0ndCcgYmFzZUZyZXF1ZW5jeT0nLjIgLjMnIG51bU9jdGF2ZXM9JzUnIHN0aXRjaFRpbGVzPSdzdGl0Y2gnLz4KCQkJPGZlQ29sb3JNYXRyaXggdHlwZT0nc2F0dXJhdGUnIGluPSd0JyB2YWx1ZXM9JzAnLz4KCQk8L2ZpbHRlcj4KCTwvZGVmcz4KCTxyZWN0IHdpZHRoPScxMDAlJyBoZWlnaHQ9JzEwMCUnIGZpbGw9J3VybCgjYmx1ZXN0cmlwZSknLz4KPHJlY3Qgd2lkdGg9JzEwMCUnIGhlaWdodD0nMTAwJScgZmlsdGVyPSd1cmwoI2Z1enopJyBvcGFjaXR5PScwLjEnLz4KPC9zdmc+Cg==);}
.loginwrap {border-radius:10px;border:1px solid #ccc;box-shadow:10px 10px 5px #ccc;height:614px;padding:24px 0;margin-top:50px;background-color:#fff;}
.logo {background:url(/img/logo-v.png) no-repeat center center;height:190px;margin-bottom:30px}
.center{text-align:center;margin-bottom:30px;}
input {outline:none;border-radius:0 20px 20px 0}
.addon{width: 0.5em;display: inline-block;border-radius:20px 0 0 20px}
.person{background:url(/img/person.png) no-repeat center center}
.password{background:url(/img/password.png) no-repeat center center}
.captchatext{background:url(/img/captcha.png) no-repeat center center}
.captcha img{border-radius:20px;}
button.btn{width:16.5em;border-radius:20px;margin-top:40px;}
form{position:relative;}
.errormsg{position:relative;top:-40px;left:-0.5em;text-align:center;padding:10px;float:left;margin-bottom:-40px;font-size:14px;color:red;}
</style>
<title>Dashboard Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col c4">&nbsp;</div>
        <div class="col c4 loginwrap">
        <div class="col c12 logo"></div>
        	<div class="col c1">&nbsp;</div>
        	<div class="col c10">
                <form method="post" action="/dashboard/checklogin">
            		{{ csrf_field() }}
                	<?php if($errors->all()):?>
            		<div class="col c12 center errormsg">
                    	<?php echo $errors->all()[0]?>
                    </div>
                    <?php endif;?>
            		<div class="col c12 center">
            			<span class="addon person">&nbsp;</span><input class="smooth" type="text" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus />
            		</div>
            		<div class="col c12 center">
            			<span class="addon password">&nbsp;</span><input class="smooth" type="password" name="password" value="{{ old('password') }}"  placeholder="Password" required />
            		</div>
            		<div class="col c12 center">
                		<span class="addon captchatext">&nbsp;</span><input type="text" name="captcha" placeholder="Captcha" required>
                	</div>
            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
            		<div class="col c12 center captcha">
                	{!!captcha_img('flat')!!}
                	</div>
            		<div class="col c12 center">
                    	<button type="submit" class="btn btn-a btn-sm">Login</button>
                    </div>
            	</form>
        	</div>
        	<div class="col c1">&nbsp;</div>
		</div>
        <div class="col c4">&nbsp;</div>
    </div>
</div>
<script type="text/javascript">
$('.captcha img').click(function(){
    $.ajax({
        type: 'GET',
        url: '/rebuildcaptcha',
        dataType: 'text',
        timeout: 300,
        success: function(data){
        	$('.captcha img').attr('src',data);
        },
        error: function(xhr, type){
        	alert('Ajax error!')
        }
    })
})
</script>
</body>
</html>