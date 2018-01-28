<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp6\wamp64\www\recruit\public/../application/admin\view\job\ctalent.html";i:1517144567;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>人才定制需求列表</title>
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
		<button class="layui-btn " onclick="refresh()">
			刷新
		</button>
	</blockquote>

    <?php if(isset($none)): ?>
	<div style="position: absolute; left: 50%; top:50%;margin-top:-30px; margin-left:-63px; text-align: center;">
			<i class="layui-icon" style="font-size: 36px;color: #009688;">&#xe69c;</i>
			<p>暂时没有内容</p>			
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
			       
			        url: "<?php echo url('ctalent'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'taid', title: '编号' },
			         {field: 'name', title: '职位名称' },
			         {field: 'status', title: '状态',templet: '#statusTpl' },
			         {field: 'createtime', title: '创建时间' },
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
	
			  	

				table.on('tool(table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
					  var data = obj.data; //获得当前行数据
					  var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					  var tr = obj.tr; //获得当前行 tr 的DOM对象	
					  var dtd=$.Deferred();
					  console.log(data)
					  if(layEvent === 'detail'){ //查看
						  layer.alert(
                           '<p><strong>职位名称：</strong><span>'+data.name+'</span></p>'+
                           '<p><strong>职位薪酬：</strong><span>'+data.salary+'</span></p>'+
                           '<p><strong>人才技能：</strong></p>'+
                           '<p>'+data.skill+'</p>'+
                           '<p><strong>工作内容：</strong></p>'+
                           '<p>'+data.content+'</p>'+
                           '<p><strong>工作地点：</strong><span>'+data.location+'</span></p>'
						  )

					  } else if(layEvent === 'feedback'){ //编辑
						  layer.prompt({
							  formType: 2,
							  value: data.feedback,
							  title: '请输入反馈信息',
							  area: ['300px', '200px'] //自定义文本域宽高
							}, function(value, index, elem){


								 $.ajax({
								    	url:"<?php echo url('editfeedback'); ?>",  	
								    	data:{taid:data.taid,text:value},
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
  <button class="layui-btn layui-btn-xs" lay-event="detail">查看</button>
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