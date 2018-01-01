<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\user\index.html";i:1514600516;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
	<title>首页</title>
</head>
<style>
html {
	font-family:-apple-system, BlinkMacSystemFont, 'Microsoft YaHei', sans-serif;
   color:#333;
}
    .row-center{
        display:flex;
        justify-content:center;
        align-items:center;
    }
.col-center{
    display:flex;
    flex-direction: column;
    justify-content:center;
    align-items:center;
}


</style>

<body style="margin:0;">
<div class="page">
   <!-- <header class="bar bar-nav">
        <a class="button button-link button-nav pull-left" href="/demos/card" data-transition='slide-out'>
            <span class="icon icon-left"></span>
            返回
        </a>
        <h1 class="title">我的生活</h1>
    </header>-->
    <nav class="bar bar-tab" style="background:#000000;color:#ffffff;">
       <a class="tab-item " href="<?php echo url('index/index'); ?>">

            <span class="tab-label">首页</span>
        </a>
        <a class="tab-item " href="<?php echo url('course/courseList'); ?>">

            <span class="tab-label">微课</span>
        </a>
        <a class="tab-item" href="<?php echo url('position/jobList'); ?>">

            <span class="tab-label">找工作</span>
        </a>
        <a class="tab-item  active" href="<?php echo url('user/index'); ?>">
            <span class="tab-label">我的</span>
        </a>
    </nav>
    
  


    
    
    <div class="content " style="background:#ffffff;">
            <!-- Slider -->
        <div class="row-center" style="width:100%;height:226px;background:#ccc;">
        <div  style="">
        <img src="<?php echo $data['avastar']; ?>"  alt=""  style="width:146px;height:146px;border-radius:50%;border:5px solid #717171;"/>
        </div>
        </div>
        
          <div class="buttons-tab">
    <a href="#tab1" class="tab-link active button">我的简历</a>
     <a href="#tab2" class="tab-link button">我的申请</a>
    <a href="#tab3" class="tab-link button">我的课程</a>
       <!--  <a href="#tab3" class="tab-link button">设置</a> -->
  </div>
  <div class="content-block">
    <div class="tabs">
      <div id="tab1" class="tab active">
        <div class="content-block">
        <?php if(isset($none)): ?>
            <p class="text-center">你还没有填写简历,<a href="#" data-popup=".popup-about" class="open-popup  popup-about"  >马上去填写</a></p>
            <?php else: ?>         
	      <p><span>姓名：</span><span><?php echo $data['truename']; ?></span></p>
	      <p><span>性别：</span><span><?php echo $data['sex']==0?'男':"女"; ?></span></p>
	      <p><span>出生日期：</span><span><?php echo $data['birthdate']; ?></span></p>
	      <p><span>目标职位：</span><span><?php echo $data['position']; ?></span></p>
	      <p><span>毕业院校：</span><span><?php echo $data['graduated']; ?></span></p>
	      <p><span>学历：</span><span><?php echo $data['education']; ?></span></p>
	      <p><span>自我评价：</span><span><?php echo $data['selfevaluation']; ?></span></p>
	      <p><span>工作经历：</span><span><?php echo $data['experience']; ?></span></p>
	          <p><a href="#" class="button button-dark  open-popup  popup-about">修改简历</a></p>
	      
        <?php endif; ?>
        
      
        </div>
      </div>
      <div id="tab2" class="tab">
        <div class="content-block">
            <h3 class="text-center">工作申请列表</h3>
            <div class="list-block">
                <ul>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">序号</div>
                            <div class="item-after">工作名称</div>
                        </div>
                    </li>

                    <?php if(is_array($courselist) || $courselist instanceof \think\Collection || $courselist instanceof \think\Paginator): $i = 0; $__LIST__ = $courselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title"><?php echo $vo['orderid']; ?></div>
                            <div class="item-after">点击查看详情</div>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
        </div>
      </div>
      <div id="tab3" class="tab">
        <div class="content-block">
                   
         <h3 class="text-center">课程列表</h3>
   <div class="list-block">
    <ul>
      <li class="item-content">
        <div class="item-inner">
          <div class="item-title">序号</div>
          <div class="item-after">课程名称</div>
        </div>
      </li>
      
      <?php if(is_array($courselist) || $courselist instanceof \think\Collection || $courselist instanceof \think\Paginator): $i = 0; $__LIST__ = $courselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li class="item-content">
        <div class="item-inner">
          <div class="item-title"><?php echo $vo['orderid']; ?></div>
          <div class="item-after">点击查看详情</div>
        </div>
      </li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
  
    </ul>
  </div> 
 
        </div>
      </div>
    </div>
  </div>
        
        
        
         
    </div>
    
    
    
    

    
    
</div>

    <div class="popup  popup-about" >
		  <div class="content-block">
		   <div class="list-block">
		   <form action="">
    <ul>
      <!-- Text inputs -->
      <li>
        <div class="item-content">
       
          <div class="item-inner">
            <div class="item-title label">姓名</div>
            <div class="item-input">
              <input type="text" name="name" required placeholder="请输入你的姓名"  value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
            </div>
          </div>
        </div>
      </li>
      
<!--            <li>
        <div class="item-content">
       
          <div class="item-inner">
            <div class="item-title label">密码</div>
            <div class="item-input">
              <input type="password" name="pwd" required placeholder="请输入你的密码" value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
            </div>
          </div>
        </div>
      </li> -->
  <!--       <li>
        <div class="item-content">
       
          <div class="item-inner">
            <div class="item-title label">确认密码</div>
            <div class="item-input">
              <input type="password" name="pwd2" required placeholder="请再次输入你的密码" value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
            </div>
          </div>
        </div>
      </li> -->
          <li>
        <div class="item-content">

          <div class="item-inner">
            <div class="item-title label">生日</div>
            <div class="item-input">
              <input type="date" name="date" required placeholder="请输入出生日期" value="<?php echo isset($data['birthdate'])?$data['birthdate']:''; ?>">
            </div>
          </div>
        </div>
      </li>
       <li>
        <div class="item-content">

          <div class="item-inner">
            <div class="item-title label">性别</div>
            <div class="item-input">
              <select name="sex" required>
                <option value="0">男</option>
                <option value="1">女</option>
              </select>
            </div>
          </div>
        </div>
      </li>
       <li>
        <div class="item-content">
       
          <div class="item-inner">
            <div class="item-title label">目标职业</div>
            <div class="item-input">
              <input required name="position" type="text" placeholder="请输入你的目标职位" value="<?php echo isset($data['position'])?$data['position']:''; ?>">
            </div>
          </div>
        </div>
      </li>
       <li>
        <div class="item-content">
       
          <div class="item-inner">
            <div class="item-title label">毕业院校</div>
            <div class="item-input">
              <input required name="graduated" type="text" placeholder="请输入你的毕业院校" value="<?php echo isset($data['graduated'])?$data['graduated']:''; ?>">
            </div>
          </div>
        </div>
      </li>
      
       <li>
        <div class="item-content">

          <div class="item-inner">
            <div class="item-title label">学历</div>
            <div class="item-input">
              <select name="edu" required>
                <option value="初中">初中</option>
                <option value="高中">高中</option>
                  <option value="大专">大专</option>
                    <option value="本科">本科</option>
                    
                      <option value="硕士">硕士</option>
                        <option value="博士">博士</option>
              </select>
            </div>
          </div>
        </div>
      </li>

      <li class="align-top">
        <div class="item-content">

          <div class="item-inner">
            <div class="item-title label">自我评价</div>
            <div class="item-input">
              <textarea name="selfevaluation" required></textarea>
            </div>
          </div>
        </div>
      </li>
      
        <li class="align-top">
        <div class="item-content">

          <div class="item-inner">
            <div class="item-title label">工作经历</div>
            <div class="item-input">
              <textarea name="experience" required></textarea>
            </div>
          </div>
        </div>
      </li>
    </ul>
    </form>
  </div>
  <div class="content-block">
    <div class="row">
      <div class="col-50"><a href="#" class="close-popup  button button-big button-fill button-danger "  >取消</a></div>
      <div class="col-50"><a href="#" class="button button-big button-fill button-success  save">提交</a></div>
    </div>
  </div>   
		  </div>
	</div>
<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>


<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>

<script>
$(function(){

	<?php if(isset($data)): ?>
	$("select[name='sex']").val("<?php echo $data['sex']; ?>").change()
	$("select[name='edu']").val("<?php echo $data['education']; ?>").change()
	
		  var desc="<?php echo $data['experience']; ?>";
		  var menu="<?php echo $data['selfevaluation']; ?>";
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  desc=desc.replace(reg,"\n");
		  menu=menu.replace(reg,"\n");
		  $("textarea[name='experience']").text(desc)
		  $("textarea[name='selfevaluation']").text(menu)
	<?php endif; ?>
	
		  
		
	
    $(".save").on("click",function(){
    	data={};
  
        $("input").each(function(){
    		
    		if($(this).val()==""){
    			
    			$.alert("必填项不能为空")
    			
    			return false;
    		}
    		data[$(this).attr("name")]=$(this).val();
    	})
    	if(data.length==0){
    		$.alert("必填项不能为空1")
    		return;
    	}
    /* 	if($("input[name='pwd']").val()!=$("input[name='pwd2']").val()){
    		$.alert("两次密码输入不一致")
			return ;
    	} */
    	if($("textarea[name='experience']").val()==""||$("textarea[name='selfevaluation']").val()==""){
    		$.alert("必填项不能为空")
			return ;
    	}
    data['sex']=$("select[name='sex']").val();	
    data['edu']=$("select[name='edu']").val();	
    data['experience']=$("textarea[name='experience']").val().replace(/\n|\r\n/g,"<br>")
    data['selfevaluation']=$("textarea[name='selfevaluation']").val().replace(/\n|\r\n/g,"<br>")
    $.ajax({
    	
    	url:"<?php echo url('editinfo'); ?>",
    	data:{data:data},
    	type:"post",
    	beforeSend:function(){
    		 $.showPreloader('正在保存')
    	},
    	success:function(data){
    		$.hidePreloader();
    		if(data==1){
    	     $.toast("保存成功");
    	     location.href="<?php echo url('user/index'); ?>"
    		}else{
    			$.toast(data);
    		}
    		
    	},
    	complete:function(){
    		
    		 $.hidePreloader();
    	}
    	
    })
    	
    })
	
	$.init();
});
</script>
</body>
</html>