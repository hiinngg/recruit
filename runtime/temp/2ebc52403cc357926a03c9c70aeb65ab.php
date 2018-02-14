<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\post\index.html";i:1517631904;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新闻管理</title>
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
		<input style="width: 200px; margin-right: 15px;" type="text"
			name="keyword" placeholder="请输入新闻名" autocomplete="off"
			class="layui-input">
		<button class="layui-btn articleSearch" >
			<i class="layui-icon">&#xe615;</i>查询
		</button>
		<button class="layui-btn layui-btn-normal add" data-url="<?php echo url('create'); ?>">
			<i class="layui-icon">&#xe654;</i>新增新闻
		</button>
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
			<p>这里一篇新闻都没有</p>			
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
		layui.use([ 'table', 'layer','jquery','form' ], function() {
			var $=layui.jquery;
			var table = layui.table;
			var layer=layui.layer;		
			var form = layui.form
		<?php if(!isset($none)): ?>
			var init= layer.load(2, {shade: false});
		var articleTable = table.render({
			        elem:"#table",	
			       
			        url: "<?php echo url('index'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'postid', title: '编号',type:"numbers" },
			         {field: 'title', title: '标题' },
			         {field: 'createtime', title: '创建时间' },
			         {field: 'is_show', title: '首页底部', templet:"#showTpl" },
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
			
					  if(layEvent === 'detail'){ //查看
						  layer.open({
						      type: 2,
						      title: '内容查看',
						      shadeClose: true,
						      shade: false,
						      maxmin: true, //开启最大化最小化按钮
						      area: ['893px', '600px'],
						      content: "articlePreview?id="+data.postid
						    });

					  } else if(layEvent === 'del'){ //删除
					    layer.confirm('确定删除该新闻么', function(index){
					    	  _ajax("<?php echo url('delete'); ?>",{newsid:data.newsid},dtd)
							  dtd.done(function(){
								  obj.del(); 
								  layer.close(index);
							  })
					    });
					  } else if(layEvent === 'edit'){ //编辑
						  layer.open({
						      type: 2,
						      title: '内容编辑',
						      shadeClose: true,
						      shade: false,
						      area: ['100%', '100%'],
						      content: "edit?id="+data.postid
						    });
					    
					  }else if(layEvent === 'link'){
						  var content="<?php echo \think\Request::instance()->root(true); ?>"+"/index/post/postdetail?postid="+data.postid;
						  layer.open({
							  content: "<input id='post"+data.postid+"'   type='text' value="+content+" />"
							  ,btn: ['复制到剪贴板', '确定']
							  ,yes: function(index, layero){
								  $("#post"+data.postid).select(); 
								  document.execCommand("Copy");  
							  }
							  ,btn2: function(index, layero){
							
								
							  }
					
							});
						  
						
						  
						  
					  }else if(layEvent === 'show2on'){
						  _ajax("<?php echo url('showChange'); ?>",{postid:data.postid,is_show:1},dtd)
						  dtd.done(function(){
							  $(tr).find("button.show2on").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs show2off" lay-event="show2off">撤销</button>'
								  obj.update({
									is_show:1
						       });
						})
							
					  }else if(layEvent === 'show2off'){
						  _ajax("<?php echo url('showChange'); ?>",{postid:data.postid,is_show:0},dtd)
						 dtd.done(function(){
					     $(tr).find("button.show2off").get(0).outerHTML='<button class="layui-btn layui-btn-xs show2on" lay-event="show2on">显示</button>'
						  obj.update({
							is_show:0
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
  <button class="layui-btn layui-btn-xs" lay-event="edit">编辑</button>
  <button class="layui-btn layui-btn-xs" lay-event="link">生成链接</button>
  <button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button>
 
  <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="showTpl">
  {{#  if(d.is_show== 1){ }}
    <button class="layui-btn layui-btn-warm layui-btn-xs show2off" lay-event="show2off">撤销</button>
  {{#  } else { }}
     <button class="layui-btn  layui-btn-xs  show2on" lay-event="show2on">显示</button>
  {{#  } }}
</script>
</body>

</html>