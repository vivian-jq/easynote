<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/static/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/Public/static/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/Public/static/css/style.css" rel="stylesheet">
    <link href="/Public/static/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/static/css/to-do.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >

    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="../HomePage/index.html" class="logo"><b>EASY NOTE</b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!--锁屏-->
            <li>
                <a href="/index.php/Home/Admin/../HomePage/lock" title="锁屏">
                    <i class="fa fa-unlock"></i>
                </a>
            </li>
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="/index.php/Home/Admin/../Index/logout">退 出</a></li>
        </ul>
    </div>

</header>
<!--header end-->
    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="/Public/images/temp/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered">Marcel Newman</h5>

            <!--photo end-->

            <li class="mt">
                <a class=[user_manager] href="/index.php/Home/Admin/userManager">
                    <i class="fa fa-home"></i>
                    <span>用 户 管 理</span>
                </a>
            </li>

            <li class="mt">
                <a class=[admin_manager] href="/index.php/Home/Admin/adminManager">
                    <i class="fa fa-home"></i>
                    <span>管 理 员 管 理</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->



    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> To-Do Lists</h3>


            <!-- 用户列表 -->
            <div class="row mt">
                <div class="col-md-12">
                    <section class="task-panel tasks-widget">
                        <div class="panel-heading">
                            <div class="pull-left"><h5><i class="fa fa-tasks"></i> 用 户 管 理</h5></div>
                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="task-content">

                                <ul class="task-list">
                                    <li>
                                        <div class="task-checkbox">
                                            <input type="checkbox" class="list-child" value=""  />
                                        </div>
                                        <div class="task-title">
                                            <span class="task-title-sp">Dashgum - Admin Panel Theme</span>
                                            <span class="badge bg-theme">Done</span>
                                            <div class="pull-right hidden-phone">
                                                <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="task-checkbox">
                                            <input type="checkbox" class="list-child" value=""  />
                                        </div>
                                        <div class="task-title">
                                            <span class="task-title-sp">Extensive collection of plugins</span>
                                            <span class="badge bg-warning">Cool</span>
                                            <div class="pull-right hidden-phone">
                                                <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="task-checkbox">
                                            <input type="checkbox" class="list-child" value=""  />
                                        </div>
                                        <div class="task-title">
                                            <span class="task-title-sp">Free updates always, no extra fees.</span>
                                            <span class="badge bg-success">2 Days</span>
                                            <div class="pull-right hidden-phone">
                                                <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="task-checkbox">
                                            <input type="checkbox" class="list-child" value=""  />
                                        </div>
                                        <div class="task-title">
                                            <span class="task-title-sp">More features coming soon</span>
                                            <span class="badge bg-info">Tomorrow</span>
                                            <div class="pull-right hidden-phone">
                                                <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="task-checkbox">
                                            <input type="checkbox" class="list-child" value=""  />
                                        </div>
                                        <div class="task-title">
                                            <span class="task-title-sp">Hey, seriously, you should buy this Dashboard</span>
                                            <span class="badge bg-important">Now</span>
                                            <div class="pull-right">
                                                <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class=" add-task-row">
                                <a class="btn btn-default btn-sm pull-right" href="todo_list.html#">查看全部</a>
                            </div>
                        </div>
                    </section>
                </div><!-- /col-md-12-->
            </div><!-- /row -->


            <!-- 管理员列表 -->
            <div class="row mt">
                <div class="col-md-12">
                    <section class="task-panel tasks-widget">
                        <div class="panel-heading">
                            <div class="pull-left"><h5><i class="fa fa-tasks"></i> 管 理 员 管 理</h5></div>
                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="task-content">

                                <ul class="task-list">

                                </ul>
                            </div>

                            <div class=" add-task-row">
                                <a class="btn btn-default btn-sm pull-right" href="todo_list.html#">查看全部</a>
                            </div>
                        </div>
                    </section>
                </div><!-- /col-md-12-->
            </div><!-- /row -->

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        copyright@151250160 <a href="#" target="_blank">吴静琦</a>
        <a href="/index.php/Home/Admin/#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="/Public/static/js/jquery.js"></script>
<script src="/Public/static/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/Public/static/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/Public/static/js/jquery.scrollTo.min.js"></script>
<script src="/Public/static/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="/Public/static/js/common-scripts.js"></script>

<!--script for this page-->
<script src="js/jquery-ui.js"></script>
<script src="/Public/static/js/tasks.js" type="text/javascript"></script>

<script>
    jQuery(document).ready(function() {
        TaskList.initTaskWidget();
    });

    $(function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    });

</script>


<script>
    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

</body>
</html>