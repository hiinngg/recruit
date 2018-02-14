<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\carousel\edit.html";i:1518315077;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>轮播图编辑（建议<?php echo $width; ?>px * <?php echo $height; ?>px）</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style>
.label_img{
	object-fit:cover;
	width:100%;
	height:100%;
}
.hide{
	display:none;
}
</style>

<body style="overflow:scroll;">

	<form class="layui-form"  action=""  style="width:70%;">
<!--  	<button type="button"   class="layui-btn " id="cover1">
	<input type="text"  hidden name="label_img" value="<?php echo isset($data['label_img'])?$data['label_img']:''; ?>" />
	<i class="layui-icon">&#xe67c;</i>上传
	</button> -->

<?php if(is_array($data['path']) || $data['path'] instanceof \think\Collection || $data['path'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['path'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div class="imgupload" style="margin:15px 0 0 110px;width:<?php echo $width; ?>px;  overflow:hidden; height:<?php echo $height; ?>px;text-align:center;border:1px solid #ccc; line-height:300px;position:relative;">
		<span class="layui-icon">&#xe654;</span>
		<button class="layui-btn layui-icon link hide" style="position:absolute;right:53px;top:0;">&#xe64c;</button>
		<button class="layui-btn layui-icon del hide" style="position:absolute;right:0;top:0;width:50px;">&#xe640;</button>
		<?php if($vo != $i): ?>
	    <button class="layui-btn layui-icon link" style="position:absolute;right:53px;top:0;">&#xe64c;</button>
		<button class="layui-btn layui-icon del" style="position:absolute;right:0;top:0;width:50px;">&#xe640;</button>
		<img  src="<?php echo $vo['src']; ?>"  <?php if($vo['url'] != ''): ?>data-url="<?php echo $vo['url']; ?>"<?php endif; ?>  class="cover" style="position:absolute;top:0;left:0;z-index:-1;">
		<?php endif; ?>
				   
</div>	
<?php endforeach; endif; else: echo "" ;endif; ?>
	
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block" style="margin-top:30px;">
      <button class="layui-btn" lay-submit lay-filter="formDemo">保存</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

  </form>
    
    <script type="text/javascript" src="/admin/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/admin/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
	<script src="/admin/js/jquery-3.2.1.min.js"></script>
	<script src="/admin/layui/layui.js"></script>
	<script>
	layui.use(['form','upload','layer'], function(){
		  var form   = layui.form;
		  var upload = layui.upload;
		  var layer  = layui.layer;


		  upload.render({
			   elem: '.imgupload'
			  ,url: "<?php echo url('imgUpload'); ?>",
			  field:"image"
			  ,done: function(res, index, upload){			  
			    if(res.code == 0){	
			         $(this.item).children("button").removeClass("hide");
			     if( $(this.item).children("img").length>0){
			    	 $(this.item).children("img").attr("src",res.src.replace(/\\/g,'/'))
			     }else{
			    	 $(this.item).append('<img  src="'+res.src.replace(/\\/g,'/')+'"  class="cover" style="position:absolute;top:0;left:0;z-index:-1;">')
			    	 	
			     }
			    }			    
			    //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
		 
			    //文件保存失败
			    //do something
			  }
			}); 
		  
		   $(".del").on("click",function(e){
		    	e.stopPropagation();
		        $(this).parent().children("img").remove();
		        $(this).addClass("hide")
		        return false;
		    })
		    $(".link").on("click",function(e){
		    	e.stopPropagation();
		         var that=this
		    	layer.prompt({
		    		  title: '请输入以http://或https://开头的url',
		              value: $(that).parent().children("img").attr("data-url")? $(that).parent().children("img").attr("data-url"):"",
		    		}, function(value, index, elem){
		    			/*  var reg=/^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/)(([A-Za-z0-9-~]+)\.)+([A-Za-z0-9-~\/])+$/;
		    			 if(!reg.test(value)){ 
		    				 layer.msg("请输入有效的网址"); 
		    				 return;
		    			 } */
		    		  $(that).parent().children("img").attr("data-url",value)
		    		  
		    		  layer.close(index);
		    		});
		    	
		    	
		    	
		        return false;
		    })
		  
		  //监听提交
		  form.on('submit(formDemo)', function(data){
			 	var images=[];
            	$(".imgupload").each(function(){
            	if($(this).children("img").length>0){
            		images.push({'url':$(this).children("img").attr("data-url")?$(this).children("img").attr("data-url"):"",'src':$(this).children("img").attr("src")})	
            	}	
            		
            	})

	 		   if (images === undefined ||images.length == 0) {
	            layer.msg("请上传轮播图",{icon:5,shift:6})
	            return false;
	        }
            	
            	  var url="<?php echo url(\think\Request::instance()->action()); ?>";
                  var data={images:images}
                  <?php if(isset($data)): ?>
                  data['carid']="<?php echo $data['carid']; ?>"
                  <?php endif; ?>
                      $.ajax({
                          url:url,
                          data:data,
                          type:"POST",
                          beforeSend:function(){
                              layer.load(2, {shade: false});
                          },
                          success:function(data){
                              layer.closeAll()
                              if(data==1){
                                  layer.msg("保存成功",{ time: 700 },function(){
                                      history.go(0)
                                  })
                              }
                          }
                      })
	    
		    return false;
		  });
		  		  
     
		  
		  
		});
	</script>

</body>
</html>