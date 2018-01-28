<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\company\positionedit.html";i:1516869742;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
	<title>小猫直聘</title>
<!-- 	<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css"> -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css">
   <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.0/css/jquery-weui.min.css">
   <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 
</head>
<style>

body {
    font-family: -apple-system, BlinkMacSystemFont, "PingFang SC","Helvetica Neue",STHeiti,"Microsoft Yahei",Tahoma,Simsun,sans-serif;
    box-sizing:border-box;
	margin:0;
	padding:0;
}
img{
	max-width:100%;
}
.row-center{
	display:flex;
	align-items:center;
	justify-content:center;
}
.col-center{
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:center;
}
.sever{
	margin-top:30px;
}
.hidden{
    display:none;
}
.line-indent{
	text-indent:2em;
}
.text-nowrap{
	white-space:nowrap; 
	text-overflow:ellipsis; 
	-o-text-overflow:ellipsis; 
	overflow: hidden; 
}
.weui-bar__item_on P{
	color:#1881EC !important;
}
  .course-item p{
   margin:0;
  	white-space:nowrap; 
text-overflow:ellipsis; 
-o-text-overflow:ellipsis; 
overflow: hidden; 
  }

  
  .weui-tabbar__label{
	font-size:16px;
  }
  .text-center{
	text-align:center;
  }
.texts-hide{
	width:100%;
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 3;
overflow: hidden;
word-wrap:break-word;
word-break: break-all;
}
.text-hide{
	width:100%;
overflow: hidden;
text-overflow:ellipsis;
white-space: nowrap;
word-wrap:break-word;
word-break: break-all;

}
.weui-toptips{
	z-index:2000;
}
.Eleditor-controller{
	z-index:2000;
}
.weui-uploader__input-box{
float:none;
width:175px;height:100px;
}



</style>
<body style="width:100%;">
 <div class="weui-cells weui-cells_form" style="height:auto;overflow-y:scroll;width:100%;">
   
  <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位名称</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="name"   value="<?php echo isset($data['name'])?$data['name']:''; ?>">
        </div>
  </div>
  
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">招聘人数</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="number"   value="<?php echo isset($data['number'])?$data['number']:''; ?>">
        </div>
  </div>
  
   <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位薪酬</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="salary"   value="<?php echo isset($data['salary'])?$data['salary']:''; ?>">
        </div>
  </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">岗位福利</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  id="treatment" name="treat" value="<?php echo isset($value)?$value:''; ?>" data-value="<?php echo isset($value)?$value:''; ?>" >
        </div>
    </div>
  <a href="javascript:void(0);" class="weui-cell weui-cell_link  addtreat">
        <div class="weui-cell__bd">自定义岗位福利</div>
  </a>

   <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">入职补贴</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="subsidy">
            <option value="0" >否</option>
            <option value="1" selected>是</option>
          </select>
        </div>
      </div>

     </div>

<p style="padding-left:15px;">工作描述</p>

<div style="padding:10px 15px;overflow-x:auto;" id="articleEditor"></div>
 <!-- =======================================================================环境照片 -->
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <div class="weui-uploader">
       <div class="weui-uploader__hd">
          <p class="weui-uploader__title">工作环境</p>   
        </div>
        <?php if(is_array($pics) || $pics instanceof \think\Collection || $pics instanceof \think\Paginator): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
         <div class="weui-uploader__input-box">
            <input id="image<?php echo $i; ?>" class="weui-uploader__input"  type="file" accept="image/*">
            <!-- <span style="position:absolute;bottom:0;right:-50%;">企业门口</span> -->
            <?php if($vo == $i): ?>
               <img src="" alt="" data-src="" style="width:175px;height:100px;" />
               <?php else: ?>
                <img src="<?php echo $vo; ?>" alt="" data-src="<?php echo $vo; ?>" style="width:175px;height:100px;" />
            <?php endif; ?>
            
          </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

      </div>
     </div>
    </div> 
 
 
 
 
 
  
     <div class="sever text-center">
   
        <a href="javascript:;" class="positionsave weui-btn weui-btn_mini weui-btn_default">提交</a>
     </div> 
  
 <!--    <div class="panel-overlay"></div>
    Left Panel with Reveal effect
    <div class="panel panel-left panel-reveal">
        <div class="content-block">
            <p>这是一个侧栏</p>
            <p></p>
            Click on link with "close-panel" class will close panel
            <p><a href="#" class="close-panel">关闭</a></p>
        </div>
    </div>  -->
<!--    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'></script>
   <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'></script> -->
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>
<script src="/admin/eleditor/Eleditor.min.js"></script>
<script src="/admin/eleditor/webuploader.min.js"></script>
<script src="/static/js/swiper.min.js"></script>

<script>

var formdata = new FormData();

var chooseimg=$(".weui-uploader__input").get(0);
    
  var canvas = document.createElement("canvas");
 var ctx = canvas.getContext('2d');
 //    瓦片canvas
 var tCanvas = document.createElement("canvas");
 var tctx = tCanvas.getContext("2d");
 var maxsize = 100 * 1024;   




var items=[];
      


var items=[
           {
             title:'五险一金',
             value: 1
           },
           {
             title: '周末双休',
             value: 2
           },
           {
             title:'员工培训',
             value: 3
           },
           {
             title: '员工旅游',
             value: 4
           },
             {
             title: '十三薪',
             value: 5
           },
         ];
  
//图片上传类
$(".weui-uploader__input").on("change",function(){

var that = $(this)
var id = that.attr("id")
	 // readURL(this); 
if (!this.files.length) return;

//window.parent.del.push(imgobj.attr("src"));

	var files = Array.prototype.slice.call(this.files);
	  var reader = new FileReader();
	   reader.readAsDataURL(files[0]);
	   reader.onload = function (e) {
		   
	        var result = this.result;
	        var img = new Image();
	        img.src = result;
	                      //如果图片大小小于200kb，则直接等待上传
	        if (result.length <= maxsize) {
	       //  that.parent().children("img").attr("src",result)
	          img = null;
	          upload(result, files[0].type,id);
	          return;
	        }
	                      
	                      
             //图片加载完毕之后进行压缩，然后上传     
	        if (img.complete) {
	          callback();
	        } else {
	          img.onload = callback;
	        }
	        function callback() {
	          var data = compress(img);
	        //  that.parent().children("img").attr("src",data)
	          upload(data, files[0].type,id);
	          img = null;
	        }
					        					        
	      }; 
	     						  				 				  
})	



  		    	var Edr = new Eleditor({
  		    	    el: '#articleEditor', //容器
  		    	    upload:{
  		    	       server: "<?php echo url('imgupload'); ?>", //填写你的后端上传路径
  		    	       fileSizeLimit: 2 //限制图片上传大小，单位M
  		    	    },
  		    	  toolbars: [
  		    	              'insertText',
  		    	              'editText',
  		    	              'insertImage',
  		    	              'insertLink',
  		    	              'insertHr',
  		    	              'deleteThis',
  		    	              'undo',
  		    	              'cancel'
                   ],
  		    	    placeHolder: "",
  		    	});
  		    

  		     	<?php if(isset($data)): ?>
       		  var desc='<?php echo $data['desc']; ?>';
       	      $("select[name='subsidy']").val("<?php echo $data['is_subsidy']; ?>").change()
	  
       		  <?php if(is_array($data['arr']) || $data['arr'] instanceof \think\Collection || $data['arr'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['arr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       		  items.push({
       		  title:"<?php echo $vo; ?>",
       		  value:"<?php echo $vo; ?>"
       		  })
       		  <?php endforeach; endif; else: echo "" ;endif; ?>
       		    $("#treatment").select("update", { multi:true,items:items })
       		  	Edr.append('<p>'+desc+'</p>');
           	<?php endif; ?>
  		    	
  		
         $(".addtreat").on("click",function(){
         $.prompt({
           title: '自定义福利',
           text: '',
           input: '',
           empty: false, // 是否允许为空
           onOK: function (input) {
             items.push({
               title:input,
               value:input
             })
             $("#treatment").select("update", { items:items })
           },
           onCancel: function () {
             //点击取消
           }
         });
         })


         $("#treatment").select({
           title: "岗位福利",
           multi: true,
           items: items
         });


         $(".positionsave").on("click",function(){
            	data={};
           
            
           //整理表单
                 $(".weui-cells_form").find("input").each(function(){
             		
             		if($(this).val()==""){
             			
             	     $.toptip('必填项不能为空', 'error');
             		 data={}	
             			return false;
             		}
             		data[$(this).attr("name")]=$(this).val();
             	})
             	if(JSON.stringify(data) == "{}"){
             		
             	$.toptip('必填项不能为空', 'error');
             		return;
             	}
          	
             	$("#articleEditor").children(".Eleditor-placeholder").remove();
             	if(Edr.getContent()==""){
             		 $.toptip('请填写工作描述', 'error');
             		 Edr.append('<p class="Eleditor-placeholder">点击此处编辑内容</p>');
             		 return ;
             	}
           /*   	if($(this).parent().parent().find("textarea[name='desc']").val()==""){
             	    $.toptip('必填项不能为空', 'error');
         			return ;
             	} */
             
            	//遍历图片
        		var images=[];
        		$(".weui-uploader__input-box").each(function(){
        			if($(this).find("img").attr("data-src")!=""){
        				images.push($(this).find("img").attr("data-src"));
        			}
        		})

               	  if (images === undefined ||images.length == 0) {
               	   	$.toptip('请上传环境照片', 'error');
        	            return ;
        	        }	
             	
     
             var postdata={};	
             var url="<?php echo url('addposition'); ?>";
             
             postdata['image']=images;
            data['subsidy']=$("select[name='subsidy']").val();	
            // data['desc']=$(this).parent().parent().find("textarea[name='desc']").val().replace(/\n|\r\n/g,"<br>")
            data['desc']=Edr.getContent()
            
            <?php if(isset($data)): ?>
            
            url="<?php echo url('positionedit'); ?>";
            data['oldcontent']='<?php echo $data['desc']; ?>';
            postdata['poid']=<?php echo $data['poid']; ?>;
            
            <?php endif; ?>
            
            postdata['data']=data;
          
             $.ajax({
             	
             	url:url,
             	data:postdata,
             	type:"post",
             	beforeSend:function(){
             		 $.showLoading('正在保存')
             	},
             	success:function(data){
             	    $.hideLoading();
             		if(data==1){
             	     $.toast("保存成功",500);
             	      setTimeout(function(){
             	        // location.href="<?php echo url('company/index'); ?>"
             	        history.go(0)
             	     },500)
             
             		}else{
             			$.toast(data);
             		}
             		
             	},
             	complete:function(){
             		
             		 $.hideLoading();
             	}
             	
             })

         })

//转化为src 并加入formdata
function upload(basestr,type,name){        
 	  var text = window.atob(basestr.split(",")[1]);
	  var buffer = new ArrayBuffer(text.length);
	  var ubuffer = new Uint8Array(buffer);
	  var pecent = 0 , loop = null;
	  for (var i = 0; i < text.length; i++) {
	    ubuffer[i] = text.charCodeAt(i);
	  }
 	  var Builder = window.BlobBuilder || window.WebKitBlobBuilder ||
      window.MozBlobBuilder || window.MSBlobBuilder;
     window.URL = window.URL || window.webkitURL;
	  var blob;
	  if (Builder) {
	    var builder = new BlobBuilder();
	    builder.append(buffer);
	    blob = builder.getBlob(type);
	  } else { 
	   var  blob = new  Blob([buffer], {type: type});
	  }
	//应为覆盖  formdata.append('imagefile', blob);
	  formdata.set(name,blob)
	  $.ajax({
		  url:"<?php echo url('poimg'); ?>",
		  type:"POST",
		  data:formdata,
		  processData: false,  // 不处理数据
		  contentType: false ,  // 不设置内容类型
		  beforeSend:function(){
		   $.showLoading()
		  },
		  success:function(data){
			  $.hideLoading();
			  if(data==0){
		
			   $.toptip('请上传正确的照片格式', 'error');
			 
			  }else{
				  $("#"+data['id']).next().attr("src",data['src']);
				  $("#"+data['id']).next().attr("data-src",data['src']);
			  }
			  
			 
			/*   if(data==1){
			  $.toast("注册成功");
			  setTimeout(function(){
				  
			  },1000)
			  }else{
			  $.toast(data,"cancel");
			  } */
	     }
		  
	  })

}




//压缩函数
function compress(img) {
	  var initSize = img.src.length;
	  var width = img.width;
	  var height = img.height;
	  //如果图片大于四百万像素，计算压缩比并将大小压至400万以下
	  var ratio;
	  if ((ratio = width * height / 4000000)>1) {
	      ratio = Math.sqrt(ratio);
	      width /= ratio;
	      height /= ratio;
	  }else {
	      ratio = 1;
	  }
	  canvas.width = width;
	  canvas.height = height;
//		铺底色
	  ctx.fillStyle = "#fff";
	  ctx.fillRect(0, 0, canvas.width, canvas.height);
	  //如果图片像素大于100万则使用瓦片绘制
	  var count;

	      ctx.drawImage(img, 0, 0, width, height);
	  //进行最小压缩
	  var ndata = canvas.toDataURL('image/jpeg', 0.6);
	  console.log('压缩前：' + initSize);
	  console.log('压缩后：' + ndata.length);
	  console.log('压缩率：' + ~~(100 * (initSize - ndata.length) / initSize) + "%");
	  tCanvas.width = tCanvas.height = canvas.width = canvas.height = 0;
	  return ndata;
	    }
    


</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    