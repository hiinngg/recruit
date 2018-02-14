<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\info\index.html";i:1518603075;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>站点信息</title>
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

<body style="padding:10px;">

	<form class="layui-form"  action=""  style="width:70%;">
  <div class="layui-form-item">
    <label class="layui-form-label">宣传口号</label>
    <div class="layui-input-block">
      <input type="text" name="catchword" required  lay-verify="required" placeholder="请输入宣传口号" autocomplete="off" class="layui-input" value="<?php echo isset($data['catchword'])?$data['catchword']: ''; ?>">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">pc端-网站标题</label>
    <div class="layui-input-block">
      <input type="text" name="pctitle" required  lay-verify="required"  autocomplete="off" class="layui-input" value="<?php echo isset($pc['title'])?$pc['title']: ''; ?>">
    </div>
  </div>
   <div class="layui-form-item">
    <label class="layui-form-label">pc端-keywords</label>
    <div class="layui-input-block">
      <input type="text" name="pckeywords" required  lay-verify="required"  autocomplete="off" class="layui-input" value="<?php echo isset($pc['keywords'])?$pc['keywords']: ''; ?>">
    </div>
  </div>
   <div class="layui-form-item">
    <label class="layui-form-label">直聘-title</label>
    <div class="layui-input-block">
      <input type="text" name="potitle" required  lay-verify="required"  autocomplete="off" class="layui-input" value="<?php echo isset($po['title'])?$po['title']: ''; ?>">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">直聘-keywords</label>
    <div class="layui-input-block">
      <input type="text" name="pokeywords" required  lay-verify="required"  autocomplete="off" class="layui-input" value="<?php echo isset($po['keywords'])?$po['keywords']: ''; ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">宣传视频</label>
    <div class="layui-input-block">
    <!--   <input type="text" name="link" required  lay-verify="required" placeholder="请输入视频链接" autocomplete="off" class="layui-input" value="<?php echo isset($data['link'])?$data['link']: ''; ?>"> -->
       	<input type="text"  hidden="hidden" name="myvideo" value="<?php echo isset($data['myvideo'])?$data['myvideo']:''; ?>" />
       	<button type="button" class="layui-btn video" >
	    <i class="layui-icon">&#xe67c;</i>上传
	    </button>
        <p id="videostatus" style="color:#5FB878;margin-top:15px;"><?php echo isset($data['videoname'])?$data['videoname']:''; ?></p>
    </div>
  </div>  
 
<!--   <div class="layui-form-item">
    <label class="layui-form-label">选择栏目</label>
    <div class="layui-input-block">
      <select name="cate" lay-verify="required">
        <option value=""></option>
        <option value="0">北京</option>
        <option value="1">上海</option>
        <option value="2">广州</option>
        <option value="3">深圳</option>
        <option value="4">杭州</option>
      </select>
    </div>
  </div> -->
  

    <label class="layui-form-label">二维码</label>
 	<button type="button"   class="layui-btn " id="cover1">
	<input type="text"  hidden name="label_img" value="<?php echo isset($data['label_img'])?$data['label_img']:''; ?>" />
	<i class="layui-icon">&#xe67c;</i>上传
	</button>


	<div class="labelimg" style="margin:15px 0 0 110px;position:relative;">
	<?php if(isset($data)): ?>
         <img  class="label_img"  src="<?php echo isset($data['label_img'])?$data['label_img']:''; ?>" style="object-fit:cover;width:128px;height:128px;">	
    <?php endif; ?>			   
	</div>	

	 <label class="layui-form-label">网站logo(建议64px*64px)</label>
 	<button type="button"   class="layui-btn " id="cover2">
	<input type="text"  hidden name="logo" value="<?php echo isset($logo)?$logo:''; ?>" />
	<i class="layui-icon">&#xe67c;</i>上传
	</button>


	<div class="logoimg" style="margin:15px 0 0 110px;position:relative;">
	<?php if($logo != ''): ?>
         <img  class="logo"  src="<?php echo $logo; ?>" style="object-fit:cover;width:64px;height:64px;">	
    <?php endif; ?>			   
	</div>	
	
 

  <div class="layui-form-item" style="margin-top:15px;">
    <div class="layui-input-block">
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
            elem: '#cover1'
            ,url: "<?php echo url('imgUpload'); ?>",
            field:"image"
            ,done: function(res, index, upload){
                if(res.code == 0){
                    $("input[name='label_img']").val(res.src.replace(/\\/g,'/'))
                    if($(".labelimg").children("img").length>0){
                        $(".labelimg").children("img").attr("src",res.src.replace(/\\/g,'/'))
                    }else{
                        $(".labelimg").append('<img   style="object-fit:cover; width:128px;height:128px;"    src="'+res.src.replace(/\\/g,'/')+'"  />')
                    }
                }
                //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
                var item = this.item;

                //文件保存失败
                //do something
            }
        });
        
        upload.render({
            elem: '#cover2'
            ,url: "<?php echo url('imgUpload'); ?>",
            field:"image"
            ,done: function(res, index, upload){
                if(res.code == 0){
                    $("input[name='logo']").val(res.src.replace(/\\/g,'/'))
                    if($(".logoimg").children("img").length>0){
                        $(".logoimg").children("img").attr("src",res.src.replace(/\\/g,'/'))
                    }else{
                        $(".logoimg").append('<img   style="object-fit:cover; width:64px;height:64px;"    src="'+res.src.replace(/\\/g,'/')+'"  />')
                    }
                }
                //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
                var item = this.item;

                //文件保存失败
                //do something
            }
        });
        
		  
		  <?php if(isset($data)): ?>
		  

		  
		  form.render()
		  <?php endif; ?>
		  
		  //监听提交
		  form.on('submit(formDemo)', function(data){
	 		if(data.field.label_img==""){
				layer.msg("请上传二维码",{icon:5,shift:6})
				return false;
			}
	 		if(data.field.logo==""){
				layer.msg("请上传logo",{icon:5,shift:6})
				return false;
			}
	 		if( $("#videostatus").text()==""){
	 			layer.msg("请上传视频",{icon:5,shift:6})
				return false;
	 		}

	 		

		data.field['videoname']= $("#videostatus").text();
	     var url="<?php echo url('addInfo'); ?>";
	     var data={data:data.field}
		     <?php if(isset($data)): ?>
	         url="<?php echo url('editInfo'); ?>";
		     data['pageid']="<?php echo $pageid; ?>"
		     <?php endif; ?>
		    /* layer.msg(JSON.stringify(data.field)); */
		    
		   
		    
		    
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
		  		  
              upload.render({
			   elem: '.video'
			  ,url: "<?php echo url('videoUpload'); ?>",
			  field:"video",
			  accept:"video"
		     ,before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
			    layer.load(2); //上传loading
		       } 
			  ,done: function(res, index, upload){			  
			    if(res.code == 0){	
			    	layer.closeAll('loading')
			         $("input[name='myvideo']").val(res.src.replace(/\\/g,'/')) 
                    $("#videostatus").text(res.filename.name+"已成功保存")
                    
			    }			    
			    //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
			    var item = this.item;
			    
			    //文件保存失败
			    //do something
			  }
			});
		  
		  
		});
	</script>

</body>
</html>