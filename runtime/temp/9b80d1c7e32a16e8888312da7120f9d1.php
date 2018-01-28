<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\wamp6\wamp64\www\recruit\public/../application/admin\view\user\userlist.html";i:1517143035;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用戶列表</title>
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
var sex=["男",'女'];
    layui.use([ 'table', 'layer','jquery','form' ], function() {
        var $=layui.jquery;
        var table = layui.table;
        var layer=layui.layer;
        var form = layui.form
        <?php if(!isset($none)): ?>
        var init= layer.load(2, {shade: false});
        var articleTable = table.render({
            elem:"#table",
            url: "<?php echo url('UserList'); ?>",
            cols:[[
                {checkbox: true},
                {field: 'user_id', title: '编号' },
                {field: 'telphone', title: '注册信息（手机或微信授权）',templet: '#telTpl'},
                {field: 'time', title: '创建时间' },
                {field: 'score', title: '操作', width:250, toolbar: '#bar'}
            ]],
            page:true,
            done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量

                layer.close(init)
            }
        });


        $(".search").on("click",function(){
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
                   /*  layer.open({
                        type: 2,
                        title: '内容查看',
                        shadeClose: true,
                        shade: false,
                        maxmin: true, //开启最大化最小化按钮
                        area: ['893px', '600px'],
                        content: "info?userid="+data.userid
                    }); */
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
             

                }else if(layEvent === 'eval'){
                	  layer.open({
                          type: 2,
                          title: '内容查看',
                          shadeClose: true,
                          shade: false,
                          area: ['100%', '100%'],
                          content: "evalbyuse?userid="+data.userid
                      });
                }
                else if(layEvent === 'addeval'){
              	  layer.open({
                        type: 2,
                        title: '内容查看',
                        shadeClose: true,
                        shade: false,
                        area: ['100%', '100%'],
                        content: "addeval?userid="+data.userid
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

    <button class="layui-btn layui-btn-warm layui-btn-xs " lay-event="eval">评测管理</button>
 
    <button class="layui-btn  layui-btn-xs " lay-event="addeval">上传评测</button>

    <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="nameTpl">
    {{#  if(!d.truename||d.truename == ""){ }}
<span style="color:#FFB800;">未填</span>
   
    {{#  } else { }}
     <span style="color:#5FB878;">{{d.truename}}</span>
    {{#  } }}
</script>
<script type="text/html" id="telTpl">
    {{#  if(d.telphone !=""){ }}
    <span style="color:#5FB878;">{{d.telphone}}</span>
    {{#  } else { }}
    <span style="color:#FFB800;">微信授权</span>
    {{#  } }}
</script>
<script type="text/html" id="statusTpl">
    {{#  if(d.is_subsidy == 1){ }}
    <span style="color:#5FB878;">是</span>
    {{#  } else { }}
    <span style="color:#FFB800;">否</span>
    {{#  } }}
</script>
</body>

</html>