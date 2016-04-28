 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	<title>校吧</title>
	<link rel="stylesheet"type="text/css" href="css/jquery.mobile-1.4.5.css">
   <link rel="stylesheet"type="text/css" href="css/index.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<div data-role="page" id="home">
      <div class="header" data-role="header">
         <a href="#panel" data-role="button" data-icon="bars" data-iconpos="notext" data-theme="b">Mine</a>
         <h1>广州中医药大学</h1>
         <a href="search.html" rel="external" data-role="button" data-icon="search" data-iconpos="notext" data-theme="b">Search</a>
     </div>
     <div data-role="content">
        <?php 
        //连接数据库
        include "php/config.php";
        $sql="select * from bbs";
        $res=mysqli_query($dbc,$sql)or die('Error sql!');
        function toHtmlcode($content)  
            {  
                return $content = str_replace("\n","<br>",str_replace(" ", "&nbsp;", $content));  
            }  
        while($row=mysqli_fetch_array($res)){
        ?>
              <div class="content">
                <div class="mt">
                  <span class="photo"><img src="images/summer.jpg" alt=""></span>
                  <span class="name"><?= $row['username']?></span>
                  <span class="time"><?= $row['createTime']?></span>
                </div>
                <div class="mc">
                  <?= $row['content']?>
                </div>
                 <div class="mf">
                  <span class="more"><a class="first" href="" data-role="none;"></a></span>
                  <span class="more"><a class="second" href="" data-role="none;"></a></span>
                  <span class="more"><a class="third" href="" data-role="none;"></a></span>
                </div>
              </div><!--content结束-->
          <?php  
          }
          ?>
        <div><a href="javascript:;" rel="external" class="edit" href="" type="file" data-role="none">+</a></div>
     </div>
     <div data-role="footer" data-position="fixed">
        <div data-role="navbar">
          <ul>
             <li><a href="#" data-icon="home" class="ui-btn-active" data-theme="b">首 页</a></li>
             <li><a href="activities.html" rel="external"data-icon="search" href="#" data-theme="b">活 动</a></li>
             <li><a href="find.html" rel="external" data-icon="search" href="#" data-theme="b">失物招领</a></li>
          </ul>
        </div>
     </div>
     <!-- defaultpanel  --> 
         <div data-role="panel"  id="panel" data-theme="b"  data-position-fixed="true"> 
             <div class="p-content">
               <a href="login.html" rel="external" data-role="button">登录</a>
               <a href="register.html" rel="external" data-role="button">注册</a>
             </div>                 
         </div> <!-- /defaultpanel --> 
  </div>
  <script>
  $(".edit").click(function(){
    var con=confirm("请先登录！");
    if(con==true){
      window.location.href="login.html";
    }

  });
  </script>
</body>
</html>