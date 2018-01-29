<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\user\jobuser.html";i:1517215647;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员课程申请管理</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style type="text/css">
.flex-row {
	display: flex;
	align-items: center;
}
</style>

<body  style="scroll-x:scroll;">
	<blockquote class="layui-elem-quote flex-row">
	<!-- 	<input style="width: 200px; margin-right: 15px;" type="text"
			name="keyword" placeholder="请输入新闻名" autocomplete="off"
			class="layui-input">
		<button class="layui-btn articleSearch" >
			<i class="layui-icon">&#xe615;</i>查询
		</button>
		<button class="layui-btn layui-btn-normal add" data-url="<?php echo url('editArticle'); ?>">
			<i class="layui-icon">&#xe654;</i>新增新闻
		</button> -->
<!-- 		<button class="layui-btn layui-btn-danger">
			<i class="layui-icon">&#xe640;</i>批量删除
		</button> -->
		<button class="layui-btn " onclick="refresh()">
			刷新
		</button>
	</blockquote>
		
	
    <?php if(isset($none)): ?>
	<div style="position: absolute; left: 50%; top:50%;margin-top:-30px; margin-left:-63px; text-align: center;">
			<i class="layui-icon" style="font-size: 36px;color: #009688;">&#xe69c;</i>
			<p>这里一点内容都没有</p>			
		</div>
		<?php else: ?>
		<table class="layui-table"  id="table"  lay-filter="table" style="width:auto;" >
	    </table>
	<?php endif; ?>
    <script src="/admin/layui/layui.js"></script>
	<script type="text/javascript">
	var tranStatus={
			'发布':1,
			'不发布':0
	}
	
	var sex=['男','女'];
	
		layui.use([ 'table', 'layer','jquery','form' ], function() {
			var $=layui.jquery;
			var table = layui.table;
			var layer=layui.layer;		
			var form = layui.form
		<?php if(!isset($none)): ?>
			var init= layer.load(2, {shade: false});
		var articleTable = table.render({
			        elem:"#table",	
			        <?php if(\think\Request::instance()->get('userid') != ''): ?>
			           where:{
			        	   userid:<?php echo \think\Request::instance()->get('userid'); ?>
			           },
			            <?php endif; ?>
			        url: "<?php echo url('user/jobuser'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'orderid', title: '编号',type:"numbers" },
			         {field:'jname',title:'职位名称'},
			         {field: 'createtime', title: '申请时间' },
			         {field: 'status', title: '状态',templet: '#statusTpl' },
			         {field: 'score', title: '操作', width:250, toolbar: '#bar'}
			        ]],
				   page:true,
				   done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量
			        layer.close(init)
			    }
				});
			 
			 
			 $(".articleSearch").on("click",function(){
				 var keyword=$("input[name='keyword']").val();
				 if(keyword==""){
					 return;
				 }
				 articleTable.reload({
					  where: { 
					    keyword:keyword
					  }
					  ,page: {
					    curr: 1 //重新从第 1 页开始
					  }
					});
				 
			 })
			 
			 
			<?php endif; ?>
	
			
				$(".add").on("click",function(){			
					var data = {
							title:"新增新闻",
							href : $(this).attr("data-url")
						}
					window.parent.navtab.tabAdd(data)
					
				})
			
				


				table.on('tool(table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
					  var data = obj.data; //获得当前行数据
					  var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					  var tr = obj.tr; //获得当前行 tr 的DOM对象	
					  var dtd=$.Deferred();
					  console.log(data)
					  if(layEvent === 'detail'){ //查看
						$.ajax({
							url:"<?php echo url('getdetail'); ?>",
							data:{userid:data.userid},
							beforeSend:function(){
                               layer.load(2)
							},
							success:function(data){
								layer.closeAll();
								 if(data.rsid==0){
  	
				                    	layer.alert("这家伙很懒，什么也没留下")

				                    }else if(data.status==0&&data.rsid>0){
				                    	layer.alert( '<p><strong>头像：</strong><img src="'+data.avastar+'"  style="width:64px;height:64px;" /></p>')

				                    }else{
				                   	  layer.alert(
				                   			  '<p><strong>头像：</strong><img src="'+((data.avastar==""||!data.avastar)?"/static/images/avastar.png":data.avastar)+'"  style="width:64px;height:64px;" /></p>'+
				                              '<p><strong>姓名：</strong><span>'+data.truename+'</span></p>'+
				                              '<p><strong>性别：</strong><span>'+sex[data.sex]+'</span></p>'+
				                              '<p><strong>出生日期：</strong><span>'+data.birthdate+'</span></p>'+
				                              '<p><strong>目标职位：</strong><span>'+data.position+'</span></p>'+
				                              '<p><strong>毕业院校：</strong><span>'+data.graduated+'</span></p>'+
				                              '<p><strong>学历：</strong><span>'+data.education+'</span></p>'+
				                              '<p><strong>自我评价：</strong></p>'+
				                              '<p>'+data.selfevaluation+'</p>'+
				                              '<p><strong>工作地点：</strong></p>'+
				                              '<p>'+data.experience+'</p>'
				    						  )
				                    }  	
							}
						})
						  
						  
						  

					  } else if(layEvent === 'del'){ //删除
					    layer.confirm('确定删除该新闻么', function(index){
					    	  _ajax("<?php echo url('articleDel'); ?>",{postid:data.postid},dtd)
							  dtd.done(function(){
								  obj.del(); 
								  layer.close(index);
							  })
					    });
					  }else  if(layEvent === 'feedback'){
						  
						  layer.prompt({
							  formType: 2,
							  value: data.feedback,
							  title: '请输入反馈信息',
							  area: ['300px', '200px'] //自定义文本域宽高
							}, function(value, index, elem){
								 $.ajax({
								    	url:"<?php echo url('course/editfeedback'); ?>",  	
								    	data:{orderid:data.orderid,text:value},
								    	type:"post",
								    	beforeSend:function(){
								    		layer.load(2)
								    	},
								    	success:function(data){
								    		layer.closeAll("loading")
								    		if(data==1){
								    			layer.msg("反馈成功");
								    			obj.update({
													feedback:value,
													status:1
												 });
								    		}
								    	},
								    	complete:function(){
								    		layer.closeAll("loading")
								    	}
								    	
								    })
							  layer.close(index);
							});
					  
					  }else if(layEvent === 'edit'){ //编辑
						  layer.open({
						      type: 2,
						      title: '内容编辑',
						      shadeClose: true,
						      shade: false,
						      maxmin: true, //开启最大化最小化按钮
						      area: ['893px', '600px'],
						      content: "articleEdit?id="+data.postid
						    });
					    
					  }else if(layEvent === 'change2on'){
						  _ajax("<?php echo url('statusChange'); ?>",{postid:data.postid,status:1},dtd)
						  dtd.done(function(){
							  $(tr).find("button.on").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>'
								  obj.update({
									  is_valid:1
						       });
						  })
							
					  }else if(layEvent === 'change2off'){
						  _ajax("<?php echo url('statusChange'); ?>",{postid:data.postid,status:0},dtd)
						 dtd.done(function(){
					     $(tr).find("button.off").get(0).outerHTML='<button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>'
						  obj.update({
							is_valid:0
						 });
						  })
					
					  }
					});
				
				function  _ajax(url,data,deferred){
					var index = layer.load(2, {shade: false});
					$.ajax({
						url:url,
						data:data,
						type:"post",
						success:function(data){
							layer.close(index)
							if(data==1){
								deferred.resolve();
							}else{
								layer.msg("操作失败");
							}
							
						}
						
					})
					
					
				}
				 
		});
	
	function refresh(){
		history.go(0)
	}
	

		
		
	</script>
<script type="text/html" id="bar">
  <button class="layui-btn layui-btn-xs" lay-event="detail">会员详情</button>
  <button class="layui-btn layui-btn-xs" lay-event="feedback">反馈</button>

  <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="statusTpl">
  {{#  if(d.status == 1){ }}
    <span style="color:#5FB878;">已反馈</span>
  {{#  } else { }}
     <span style="color:#FFB800;">未反馈</span>
  {{#  } }}
</script>
</body>

</html>