<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\wamp6\wamp64\www\recruit\public/../application/admin\view\course\courselist.html";i:1514706655;}*/ ?>
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
<!-- 		<input style="width: 200px; margin-right: 15px;" type="text"
			name="keyword" placeholder="请输入新闻名" autocomplete="off"
			class="layui-input"> -->
<!-- 		<button class="layui-btn articleSearch" >
			<i class="layui-icon">&#xe615;</i>查询
		</button> -->
		<button class="layui-btn layui-btn-normal add" data-url="<?php echo url('addCourse'); ?>">
			<i class="layui-icon">&#xe654;</i>新增课程
		</button>
<!-- 		<button class="layui-btn layui-btn-danger">
			<i class="layui-icon">&#xe640;</i>批量删除
		</button> -->
		<button class="layui-btn " onclick="refresh()">
			刷新
		</button>
		<form class="layui-form">
 <div class="layui-form-item">
    <label class="layui-form-label">课程分类</label>
    <div class="layui-input-block">
      <select name="cates"  lay-search   lay-filter="type">
        <option value=""></option>
        <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
           <option value="<?php echo $vo['cateid']; ?>"><?php echo $vo['name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
  </div>
		</form>
	</blockquote>
		
	
    <?php if(isset($none)): ?>
	<div style="position: absolute; left: 50%; top:50%;margin-top:-30px; margin-left:-63px; text-align: center;">
			<i class="layui-icon" style="font-size: 36px;color: #009688;">&#xe69c;</i>
			<p>这里一个课程都没有</p>			
		</div>
		<?php else: ?>
		<table class="layui-table"  id="table"  lay-filter="table" style="width:auto;" >
	    </table>
	<?php endif; ?>
    <script src="/admin/layui/layui.js"></script>
	<script type="text/javascript">

		layui.use([ 'table', 'layer','jquery','form' ], function() {
			var $=layui.jquery;
			var table = layui.table;
			var layer=layui.layer;		
			var form = layui.form
			
			 form.on('select(type)', function(data){	
				 var init= layer.load(2, {shade: false});
				tableIns.reload({
					  where: { 
					     cateid:data.value
					  },
					   done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量
					        layer.closeAll("loading")
					    }
					});
			 });


            <?php if(!isset($none)): ?>
			var init= layer.load(2, {shade: false});
		    //初始化table 
			var tableIns = table.render({
				        elem:"#table",	
				        url: "<?php echo url('course/courseByCate'); ?>",
				        cols:[[
				         {checkbox: true},
				         {field: 'courseid', title: '编号' },
				         {field: 'name', title: '课程名称' },
				         {field: 'type', title: '授课形式',templet:"#typeTpl" },
				         {field: 'price', title: '价格' },
                         {field:'is_show',title:"首页显示",templet: '#show'},
				         {field: 'status', title: '状态',templet: '#statusTpl' },
				         {field: 'createtime', title: '创建时间' },
				         {field: 'score', title: '操作', width:250, toolbar: '#bar'}
				        ]],
					   page:true,
					   done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量
				        layer.closeAll("loading")
				    }
					});
			 
		/* 	 $(".articleSearch").on("click",function(){
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
				 
			 }) */
			 
			 
			<?php endif; ?>
	
			  	  //添加课程
		  	  	$(".add").on("click",function(){			
						var data = {
								title:"新增课程",
								href : $(this).attr("data-url")
							}
						window.parent.navtab.tabAdd(data)
						
			   })
			
				

	//对课程进行操作
		table.on('tool(table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
			  var data = obj.data; //获得当前行数据
			  var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
			  var tr = obj.tr; //获得当前行 tr 的DOM对象	
			  var dtd=$.Deferred();

			 if(layEvent === 'del'){ //删除
			    layer.confirm('确定删除该课程么', function(index){
			    	  _ajax("<?php echo url('delCourse'); ?>",{courseid:data.courseid},dtd)
					  dtd.done(function(){
						  obj.del(); 
						  layer.close(index);
					  })
			    });
			  } else if(layEvent === 'edit'){ //编辑
				 layer.open({
				      type: 2,
				      title: '课程编辑',
				      shadeClose: true,
				      shade: false,
				      maxmin: true, //开启最大化最小化按钮
				      area: ['893px', '500px'],
                      moveOut: true,
				      content: "editCourse?courseid="+data.courseid
				    });
			    
			  }else if(layEvent === 'change2on'){
				  _ajax("<?php echo url('statusChange'); ?>",{courseid:data.courseid,status:1},dtd)
				  dtd.done(function(){
					  $(tr).find("button.on").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>'
						  obj.update({
							  status:1
				       });
				  })
					
			  }else if(layEvent === 'change2off'){
				  _ajax("<?php echo url('statusChange'); ?>",{courseid:data.courseid,status:0},dtd)
				 dtd.done(function(){
			     $(tr).find("button.off").get(0).outerHTML='<button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>'
				  obj.update({
					status:0
				 });
				  })
			
			  }else if(layEvent === 'show2off'){
                 _ajax("<?php echo url('showChange'); ?>",{courseid:data.courseid,is_show:0},dtd)
                 dtd.done(function(){
                     $(tr).find("button.showoff").get(0).outerHTML=' <button class="layui-btn layui-btn-xs showon" lay-event="show2on">激活</button>'
                     obj.update({
                         is_show:0
                     });
                 })
             }else if(layEvent === 'show2on'){
                 _ajax("<?php echo url('showChange'); ?>",{courseid:data.courseid,is_show:1},dtd)
                 dtd.done(function(){
                     $(tr).find("button.showon").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs showoff" lay-event="show2off">撤销</button>'
                     obj.update({
                         is_show:1
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
<script type="text/html" id="show">
    {{#  if(d.is_show== 1){ }}
    <button class="layui-btn layui-btn-warm layui-btn-xs showoff" lay-event="show2off">撤销</button >
    {{#  } else { }}
        <button class="layui-btn layui-btn-xs showon" lay-event="show2on">激活</button>
    {{#  } }}
</script>
<script type="text/html" id="bar">
  <button class="layui-btn layui-btn-xs" lay-event="edit">编辑</button>
  {{#  if(d.status== 1){ }}
   <button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>
  {{#  } else { }}
    <button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>
  {{#  } }}

  <button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button>

  <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="statusTpl">
  {{#  if(d.status == 1){ }}
    <span style="color:#5FB878;">发布中</span>
  {{#  } else { }}
     <span style="color:#FFB800;">未发布</span>
  {{#  } }}
</script>
<script type="text/html" id="typeTpl">
  {{#  if(d.type==0){ }}
    <span style="color:#5FB878;">线下授课</span>

   {{# } else if(d.type==1){ }} 
      <span style="color:#5FB878;">直播授课</span>

  {{#  } else { }} 
      <span style="color:#5FB878;">微信授课</span>
  {{#  } }}
</script>
</body>

</html>