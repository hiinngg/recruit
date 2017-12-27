<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\index\index.html";i:1514372711;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
	<title>首页</title>
	<link rel="stylesheet" href="/static/mui/css/mui.min.css" />
</head>
<style>
html {
	font-family:-apple-system, BlinkMacSystemFont, 'Microsoft YaHei', sans-serif;
    font-size: 16px;
}
.row-center{
	display:flex;
	justify-content:center;
	align-items:center;
	
}
@media screen and (min-width: 375px) {
    html {
        /* iPhone6的375px尺寸作为16px基准，414px正好18px大小, 600 20px */
        font-size: calc(100% + 2 * (100vw - 375px) / 39);
        font-size: calc(16px + 2 * (100vw - 375px) / 39);
    }
}
@media screen and (min-width: 414px) {
    html {
        /* 414px-1000px每100像素宽字体增加1px(18px-22px) */
        font-size: calc(112.5% + 4 * (100vw - 414px) / 586);
        font-size: calc(18px + 4 * (100vw - 414px) / 586);
    }
}
@media screen and (min-width: 600px) {
    html {
        /* 600px-1000px每100像素宽字体增加1px(20px-24px) */
        font-size: calc(125% + 4 * (100vw - 600px) / 400);
        font-size: calc(20px + 4 * (100vw - 600px) / 400);
    }
}
@media screen and (min-width: 1000px) {
    html {
        /* 1000px往后是每100像素0.5px增加 */
        font-size: calc(137.5% + 6 * (100vw - 1000px) / 1000);
        font-size: calc(22px + 6 * (100vw - 1000px) / 1000);
    }
}



</style>

<body style="margin:0;">

	<div style="width:100%;height:14.125rem;background:#ccc;"></div>
    <h2 style="text-align:center;">职造课程</h2>	
    <div class="mui-row row-center"  style="padding:15px;justify-content:space-around;">
    <div class="mui-col-sm-3" style="padding:8px; background:#ccc;">1</div>
     <div class="mui-col-sm-3" style="padding:8px;background:#ccc;">2</div>
     <div class="mui-col-sm-3" style="padding:8px;background:#ccc;">3</div>
      <div class="mui-col-sm-3" style="padding:8px;background:#ccc;">4</div>
    </div>
    
    
    <div class="row-center" style="width:100%;height:5.4rem;background:black;position:fixed;bottom:15px;;color:#ffffff;justify-content:space-around;">
    <span  data-url="">首页</span>
      <span>|</span>
     <span data-url="">微课</span>
       <span>|</span>
      <span  data-url="">找工作</span>
        <span>|</span>
       <span  data-url="">我的</span>
    </div>
    
	<script src="/static/mui/js/mui.min.js"></script>
</body>
</html>