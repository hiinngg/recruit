<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\job\joblist.html";i:1514341698;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>工作管理</title>
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
		<button class="layui-btn layui-btn-normal add"  style="margin-right:20px;" data-url="<?php echo url('addTalent'); ?>">
			<i class="layui-icon">&#xe654;</i>新增工作定制
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
		layui.use([ 'table', 'layer','jquery','form',"upload" ], function() {
			var $=layui.jquery;
			var table = layui.table;
			var layer=layui.layer;		
			var form = layui.form;
			var upload = layui.upload;
		<?php if(!isset($none)): ?>
			var init= layer.load(2, {shade: false});
		var talentTable = table.render({
			        elem:"#table",	      
			        url: "<?php echo url('job/jobList'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'pageid', title: '编号'},
					{field: 'title', title: '标题' },
					{field: 'status', title: '状态',templet: '#statusTpl' },
			         {field: 'createtime', title: '创建时间' },
			         {field: 'score', title: '操作', width:250, toolbar: '#bar'}
			        ]],
				   page:true,
				   done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量
			        layer.close(init)
			    }
				});
			
			<?php endif; ?>
	
			


              upload.render({
			   elem: '.add'
			  ,url: "<?php echo url('imgUpload'); ?>",
			  field:"image"
			  ,done: function(res, index, upload){			  

			     if(res==1){

                   talentTable.reload();

                  }
			    
			    //文件保存失败
			    //do something
			  }
			});  
				
				
				
				
				

				table.on('tool(table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
					  var data = obj.data; //获得当前行数据
					  var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					  var tr = obj.tr; //获得当前行 tr 的DOM对象	
					  var dtd=$.Deferred();
					  console.log(data)
					  if(layEvent === 'detail'){ //查看
                          layer.photos({
                              photos: {
                                  "title": "工作定制", //相册标题
                                  "id": data.pageid, //相册id
                                  "start": 0, //初始显示的图片序号，默认0
                                  "data": [   //相册包含的图片，数组格式
                                      {
                                          "pid": data.pageid, //图片id
                                          "src": data.content, //原图地址
                                      }
                                  ]
                              },
                              tab: function(pic, layero){
                                  console.log(pic) //当前图片的一些信息
                              }
                          });

					  } else if(layEvent === 'del'){ //删除
					    layer.confirm('确定删除该工作定制么', function(index){
					    	  _ajax("<?php echo url('talentDel'); ?>",{pageid:data.pageid,path:data.content},dtd)
							  dtd.done(function(){
								  obj.del(); 
								  layer.close(index);
							  })
					    });
					  }else if(layEvent === 'change2on'){
						  _ajax("<?php echo url('statusChange'); ?>",{pageid:data.pageid,status:1},dtd)
						  dtd.done(function(){
							  $(tr).find("button.on").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>'
								  obj.update({
									  status:1
						       });
						  })
							
					  }else if(layEvent === 'change2off'){
						  _ajax("<?php echo url('statusChange'); ?>",{pageid:data.pageid,status:0},dtd)
						 dtd.done(function(){
					     $(tr).find("button.off").get(0).outerHTML='<button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>'
						  obj.update({
							status:0
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
  <button class="layui-btn layui-btn-xs" lay-event="detail">查看</button>
  {{#  if(d.status == 1){ }}
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
</body>

</html>