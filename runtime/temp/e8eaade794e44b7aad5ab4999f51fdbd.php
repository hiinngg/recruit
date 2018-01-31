<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\index\index.html";i:1517298065;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport"
		  content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
	<title>网站后台管理系统</title>
	<style type="text/css">


		a {
			color: #ffffff;
		}

		.layui-nav-tree .layui-nav-child a {
			color: #ffffff\9;
			filter: alpha(opacity = 50); /*IE*/
		}

		.layui-this {
			background: #009688;
			color: #FFFFFF !important;
		}

		#home .layui-tab-close {
			display: none;
		}

		.layui-tab-content .layui-tab-item {
			z-index: 0;
			height:100%;
			padding-top:40px;
			box-sizing:border-box;

		}

	</style>

</head>

<body class="layui-layout-body " style="height:100%;">
<div class="layui-layout layui-layout-admin "  style="height:100%;">
	<div class="layui-header"   style="z-index:0;">
		<div class="layui-logo">网站后台管理系统</div>
		<!-- 头部区域（可配合layui已有的水平导航） -->
		<ul class="layui-nav layui-layout-right">
			<li class="layui-nav-item"><a href="javascript:;"> <?php echo $adminuser; ?>
			</a>
			<!--	<dl class="layui-nav-child">
					<dd>
						<a href="">基本资料</a>
					</dd>
					<dd>
						<a href="">安全设置</a>
					</dd>
				</dl>--></li>
			<li class="layui-nav-item"><a href="<?php echo url('index/logout'); ?>">退出</a>
			</li>
		</ul>
	</div>


	<div class="layui-side layui-bg-black">
		<div class="layui-side-scroll">
			<!-- 左侧导航区域（可配合layui已有的垂直导航） -->
			<ul class="layui-nav layui-nav-tree" lay-filter="navtab">
				<li class="layui-nav-item layui-this"><a href="#" data-url="">后台首页</a>
				</li>
			<li class="layui-nav-item"><a href="#">公司申请审核</a>
					<dl class="layui-nav-child">
						<dd>
							<a   data-url="<?php echo url('position/positionList'); ?>"  href="javascript:;">企业普工招聘</a>
						</dd>
						<dd>
							<a href="#"  data-url="<?php echo url('job/cteam'); ?>">企业团队定制</a>
						</dd>
						<dd>
							<a href="#"  data-url="<?php echo url('job/ctalent'); ?>">企业人才定制</a>
						</dd>
					</dl>
				</li>
				<li class="layui-nav-item"><a href="#">会员申请审核</a>
					<dl class="layui-nav-child">
						<dd>
							<a data-url="<?php echo url('user/jobuser'); ?>" href="javascript:;">工作申请</a>
						</dd>
						<dd>
							<a href="#"  data-url="<?php echo url('user/courseuser'); ?>">课程申请</a>
						</dd>
						<dd>
							<a data-url="<?php echo url('user/pouser'); ?>" href="javascript:;">普工申请</a>
						</dd>
					</dl>
				</li>	
				<li class="layui-nav-item"><a href="#">课程管理</a>
					<dl class="layui-nav-child">
						<dd>
							<a data-url="<?php echo url('course/index'); ?>" href="javascript:;">课程类目管理</a>
						</dd>
						<dd>
							<a data-url="<?php echo url('course/courseList'); ?>" href="javascript:;">课程列表</a>
						</dd>
					</dl>

				</li>
				<li class="layui-nav-item"><a href="#"
											  data-url="<?php echo url('company/companyList'); ?>">企业管理</a></li>
				<li class="layui-nav-item"><a href="#">职位管理</a>
					<dl class="layui-nav-child">
						<dd>
							<a data-url="<?php echo url('job/jobcate'); ?>" href="javascript:;">职位类目管理</a>
						</dd>
						<dd>
							<a href="#"  data-url="<?php echo url('job/jobList'); ?>">职位列表</a>
						</dd>	
					</dl>
				</li>
				<li class="layui-nav-item"><a href="#"
											  data-url="<?php echo url('user/userList'); ?>">会员管理</a></li>
				<li class="layui-nav-item "><a class=""
											   href="javascript:;">页面设置</a>
					<dl class="layui-nav-child">
						<dd>
							<a data-url="<?php echo url('page/pageList'); ?>" href="javascript:;">内容块编辑</a>
						</dd>
						<dd>
							<a data-url="<?php echo url('nav/navList'); ?>" href="javascript:;">导航设置</a>
						</dd>
						<dd>
							<a data-url="<?php echo url('carousel/carlist'); ?>" href="javascript:;">轮播图设置</a>
						</dd>

					</dl>
				</li>
				<li class="layui-nav-item"><a href="#"
											  data-url="<?php echo url('info/index'); ?>">站点信息</a></li>


			</ul>
		</div>
	</div>

	<div class="layui-body "
		 style=" bottom:0;">
		<!-- 内容主体区域 -->
		<div id="navtab"  style="height: 100%;position:relative;overflow-y: hidden;margin:0;" class="layui-tab" lay-allowClose="true" lay-filter="navtab">
			<ul class="layui-tab-title" style=" background: #ffffff;width:100%;height:40px;position: fixed;z-index:9999; top:60px;padding-left:200px;box-sizing: border-box;">
				<li id="home" lay-id="home" class="layui-this">后台首页</li>
			</ul>
			<div class="layui-tab-content"style="padding:0;height:100%;">
				<div class="layui-tab-item layui-show" style="">
					<iframe src=""  style="width: 100%;height:100%;"
							frameborder="0"></iframe>
				</div>
			</div>
		</div>


	</div>


</div>

<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    var currentIframeId=0;
    var navtab
    layui.config({
        base : '/admin/js/'
    }).use([ 'jquery', 'element', 'navtab' ], function() {
        window.jQuery = window.$ = layui.jquery;
        var element = layui.element;
        navtab = layui.navtab({
            elem : '#navtab'
        });



        $(".layui-nav").find("[data-url]").on("click", function() {
            var def=$.Deferred();
            if ($(this).text() == "后台首页") {
                element.tabChange('navtab', 'home');
                return;
            }
            var data = {
                title : $(this).text(),
                href : $(this).attr("data-url")
            }
            var iframeid = navtab.tabAdd(data);



        })

    });



</script>

</body>

</html>