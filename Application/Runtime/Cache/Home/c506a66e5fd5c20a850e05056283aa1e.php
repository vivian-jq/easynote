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
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="../HomePage/index.html#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-theme">5</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have 5 new messages</p>
                    </li>
                    <li>
                        <a href="../HomePage/index.html#">
                            <span class="photo"><img alt="avatar" src="/Public/images/temp/ui-zac.jpg"></span>
                            <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                            <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="../HomePage/index.html#">
                            <span class="photo"><img alt="avatar" src="/Public/images/temp/ui-divya.jpg"></span>
                            <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                            <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="../HomePage/index.html#">
                            <span class="photo"><img alt="avatar" src="/Public/images/temp/ui-danro.jpg"></span>
                            <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                            <span class="message">
                                        Love your new Dashboard.
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="../HomePage/index.html#">
                            <span class="photo"><img alt="avatar" src="/Public/images/temp/ui-sherman.jpg"></span>
                            <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                            <span class="message">
                                        Please, answer asap.
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="../HomePage/index.html#">See all messages</a>
                    </li>
                </ul>
            </li>
            <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="/index.php/Home/Admin/logout">Logout</a></li>
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


            <li class="sub-menu">
                <a class="[manager]" href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>成 员 管 理</span>
                </a>
                <ul class="sub">
                    <li class="[user_manager]"><a  href="/index.php/Home/Admin/userManager">用 户</a></li>
                    <li class="[admin_manager]"><a  href="/index.php/Home/Admin/adminManager">管 理 员</a></li>
                </ul>
            </li>
            <!--user end-->


            <li class="sub-menu">
                <a class="active" href="javascript:;" >
                    <i class="fa fa-envelope"></i>
                    <span>邮 件 审 批</span>
                </a>
                <ul class="sub">
                    <li class="active"><a  href="/index.php/Home/Admin/allEmails">全 部 邮 件</a></li>
                    <li class="[unread_emails]"><a  href="/index.php/Home/Admin/unReadEmails">未 读 邮 件</a></li>
                    <li class="[read_emails]"><a  href="/index.php/Home/Admin/readEmails">已 读 邮 件</a></li>
                </ul>
            </li>
            <!--email end-->

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