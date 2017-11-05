<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">

    <title>EASYNOTE - Make Notes Simple</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/static/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/Public/static/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/Public/static/css/style.css" rel="stylesheet">
    <link href="/Public/static/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="/index.php/Home/Index/login" method="post">
		        <h2 class="form-login-heading">EASY NOTE</h2>
		        <div class="login-wrap">
		            <input type="text" name="username" value="<?php echo ($username); ?>" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password">
		            <br>
		            <button class="btn btn-theme btn-block" type="submit" ><i class="fa fa-lock">
					</i> 登&nbsp&nbsp陆</button>

					<br>
					<div class="alert alert-danger alert-dismissable <?php echo ($hideWarn); ?>">
						<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">
							&times;
						</button>
						<?php echo ($warning); ?>
					</div>
		            <div class="registration">
		                还没有注册账户？<br/>
		                <a class="" href="/index.php/Home/Index/newAccount">
		                    注册一个吧
		                </a>
		            </div>
		
		        </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/Public/static/js/jquery.js"></script>
    <script src="/Public/static/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/Public/static/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/Public/images/temp/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>