<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\company\reg.html";i:1517391747;s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1517364003;}*/ ?>
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

  

.bg:after{
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    background-color: #ffffff;
    opacity: 0.3;
    z-index: 0;
    width: 100%;
    height: 100%;
}
.weui-cell:before,.weui-cell:after,.weui-cells:after, .weui-cells:before{
display:none;
}
.weui-cell input{

background:#ffffff;
border-radius:5px;
padding-left:10px;
border:1px solid #ccc;
}
.weui-uploader__input-box{
float:none;
width:175px;height:100px;
}


</style>
<body style="">
<!--<div style="position:fixed;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;">

<span class="fa fa-angle-left" style="margin-left:10px;visibility:hidden;"></span>
<span >首页</span>
<span class="fa fa-list menu" style="margin-right:10px;"></span>
</div>-->
  <div class="main" style="position:absolute;overflow-y: scroll;top:0;bottom:50px;width:100%;-webkit-overflow-scrolling: touch;" >
   
     <div class="content" style="width:100%;height:auto;">
     
<div class="bg" style="position:relative;z-index:0;background-image:url('/static/images/user.png');background-size:cover;height:100vh; width:100%;overflow:scroll;background-attachment: fixed;">

<div class="weui-cells weui-cells_form " style="position:absolute;z-index:1;width:100%;min-height:100vh; background-color: rgba(0,0,0,0);">
	 <div class="weui-cell" >
	  <div class="weui-cell__hd" ><label class="weui-label">企业名称</label></div>
	    <div class="weui-cell__bd" >
	      
	      <input class="weui-input" required="required" name="name" type="text"  >
	    </div>
	  </div>
	   <div class="weui-cell" >
	  <div class="weui-cell__hd"><label class="weui-label">登录密码</label></div>
	    <div class="weui-cell__bd" >
	      <input class="weui-input" required="required" name="pwd" type="password"  >
	    </div>
	  </div>
	   <div class="weui-cell" >
	  <div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
	    <div class="weui-cell__bd" >
	      
	      <input class="weui-input" required="required" name="pwd2" type="password"  >
	    </div>
	  </div>
	    <div class="weui-cell" >
	   <div class="weui-cell__hd"><label class="weui-label">联系人</label></div>
	    <div class="weui-cell__bd" >
	       
	      <input class="weui-input" required="required" name="linkman" type="text" >
	    </div>
	  </div>
	  
	   <div class="weui-cell" >
	   <div class="weui-cell__hd"><label class="weui-label">HR联系电话</label></div>
	    <div class="weui-cell__bd" >
	       
	      <input class="weui-input" required="required" name="tel" type="text" >
	    </div>
	  </div>
	  
	  <h4  style="margin-left:10px; color:#1881EC;">完成以下信息成为内推企业</h4>
	  
	   <div class="weui-cell" >
	   <div class="weui-cell__hd"><label class="weui-label">企业全称</label></div>
	    <div class="weui-cell__bd" >
	       
	      <input class="weui-input" name="fullname" type="text" >
	    </div>
	  </div>
	
   <div class="weui-cell">
    <div class="weui-cell__bd">
      <div class="weui-uploader">
       <div class="weui-uploader__hd">
          <p class="weui-uploader__title">企业LOGO</p>   
        </div>

           <div class="weui-uploader__input-box" style="width: 128px;height: 64px;">
	              <input id="avastar" class="weui-uploader__input"  type="file" accept="image/*" multiple="">
	              <span style="position:absolute;bottom:0;right:-128px;">128px*64px</span>
	              <img src="" alt="" style="width: 128px;height: 64px;" />
          </div>
      </div>
     </div>
    </div>
	  
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <div class="weui-uploader">
       <div class="weui-uploader__hd">
          <p class="weui-uploader__title">办公环境</p>   
        </div>

           <div class="weui-uploader__input-box">
            <input id="image1" class="weui-uploader__input"  type="file" accept="image/*">
            <span style="position:absolute;bottom:0;right:-50%;">企业门口</span>
            <img src="" alt="" style="width:175px;height:100px;" />
          </div>
           <div class="weui-uploader__input-box">
            <input id="image2" class="weui-uploader__input"  type="file" accept="image/*" >
           <span style="position:absolute;bottom:0;right:-50%;">办公环境</span>
           <img src="" alt="" style="width:175px;height:100px;" />
           </div>
           <div class="weui-uploader__input-box">
            <input id="image3" class="weui-uploader__input"  type="file" accept="image/*" >
          <span style="position:absolute;bottom:0;right:-50%;">办公环境</span>
          <img src="" alt="" style="width:175px;height:100px;" />
          </div>
      </div>
     </div>
    </div>

    <a href="javascript:;" class="weui-btn weui-btn_plain-default save" style="margin:0 15px;">提交</a>
	</div>



</div>

    </div>

</div>
      <div class="weui-tabbar" style="position:fixed;bottom:0;z-index:1000;">
        <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item  " >
            <p class="weui-tabbar__label" style="line-height:2.5;">首页</p>
        </a>
        <a href="<?php echo url('course/courselist'); ?>" class="weui-tabbar__item ">

            <p class="weui-tabbar__label" style="line-height:2.5;">微课</p>
        </a>
        <a href="<?php echo url('job/joblist'); ?>" class="weui-tabbar__item ">
            <p class="weui-tabbar__label" style="line-height:2.5;">找工作</p>
        </a>
        <a href="<?php echo url('user/index'); ?>" class="weui-tabbar__item ">
            <p class="weui-tabbar__label" style="line-height:2.5;">我的</p>
        </a>
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
<script src="/static/js/lazyload.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>
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
	         that.parent().children("img").attr("src",result)
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
	          that.parent().children("img").attr("src",data)
	          upload(data, files[0].type,id);
	          img = null;
	        }
					        					        
	      }; 
	     						  				 				  
})	


$(".save").on("click",function(){
var stop=false;
if($("input[name='pwd']").val()!=$("input[name='pwd2']").val()){
 $.toptip('两次输入的密码不相同', 'error');
 return;
}
$("input.weui-input").each(function(){
	if($(this).attr("required")=="required"&&$(this).val()==""){
	   stop=true;
	   $.toptip('必填项不能为空', 'error');
	   return  false;
	}

 formdata.set($(this).attr("name"),$(this).val())   

})
if(stop){
return;
}
$.ajax({
url:"<?php echo url('company/reg'); ?>",
data:formdata,
 type:"POST",
 processData: false,  // 不处理数据
 contentType: false ,  // 不设置内容类型
 beforeSend:function(){
 $.showLoading()
 },
success:function(data){
$.hideLoading();
if(data==1){
$.toast("注册成功");
setTimeout(function(){
location.href="<?php echo url('login'); ?>"
},1000)
}else{
$.toast(data,"cancel");
}
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
    









$(".menu").on("click",function(){
	
	$.actions({
		  actions: [{
		    text: "企业后台",
		    onClick: function() {
		      window.location.href="<?php echo url('company/index'); ?>"
		    }
		  }]
		});
	
})




</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    