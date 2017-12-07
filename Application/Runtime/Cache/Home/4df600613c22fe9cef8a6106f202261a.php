<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

	<title>DASHGUM - FREE Bootstrap Admin Template</title>

	<!-- Bootstrap core CSS -->
	<link href="/Public/static/css/bootstrap.css" rel="stylesheet">
	<!--external css-->
	<link href="/Public/static/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="/Public/static/css/zabuto_calendar.css">
	<link rel="stylesheet" type="text/css" href="/Public/static/js/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="/Public/static/lineicons/style.css">

	<!-- Custom styles for this template -->
	<link href="/Public/static/css/style.css" rel="stylesheet">
	<link href="/Public/static/css/style-responsive.css" rel="stylesheet">

	<script src="/Public/static/js/chart-master/Chart.js"></script>

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
                <a href="/index.php/Home/HomePage/../HomePage/lock" title="锁屏">
                    <i class="fa fa-unlock"></i>
                </a>
            </li>
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="/index.php/Home/HomePage/../Index/logout">退 出</a></li>
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

            <p class="centered"><a href="/index.php/Home/HomePage/../HomePage/profile">
                <img src="/upload/profile/profile<?php echo ($user["id"]); ?>.jpg" class="img-circle" width="60" height="60"
                     onerror="this.src='/upload/profile/profile-default.jpg'">
            </a></p>
            <h5 class="centered"><?php echo ($user["username"]); ?></h5>

            <li class="mt">
                <a class=active href="/index.php/Home/HomePage/../HomePage/index">
                    <i class="fa fa-home"></i>
                    <span>主 页</span>
                </a>
            </li>

            <li class="sub-menu">
                <a class="[new]" href="/index.php/Home/HomePage/../Note/newNote" >
                    <i class="fa fa-magic"></i>
                    <span>快 速 开 始</span>
                </a>
            </li>

            <li class="sub-menu">
                <a class="[mynote]" href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>我 的 笔 记</span>
                </a>
                <ul class="sub">
                    <li  class="[note_by_book]"><a href="/index.php/Home/HomePage/../Note/noteByBook">笔 记 本 查 看</a></li>
                    <li  class="[note_by_time]"><a href="/index.php/Home/HomePage/../Note/noteByTime">时 间 查 看</a></li>
                    <li  class="[note_by_tag]"><a href="/index.php/Home/HomePage/../Note/noteByTag">标 签 查 看</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="[friend]" href="javascript:;" >
                    <i class="fa fa-users"></i>
                    <span>关 注</span>
                </a>
                <ul class="sub">
                    <li  class="[following]"><a href="/index.php/Home/HomePage/../Follow/following">我 的 关 注</a></li>
                    <li  class="[followers]"><a href="/index.php/Home/HomePage/../Follow/followers">谁 关 注 我</a></li>
                    <li  class="[search]"><a href="/index.php/Home/HomePage/../Follow/searchUser">用 户 搜 索</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="[social]" href="javascript:;" >
                    <i class="fa fa-globe"></i>
                    <span>社 区</span>
                </a>
                <ul class="sub">
                    <li  class="[public_note]"><a  href="/index.php/Home/HomePage/../Social/publicNote"> 笔 记 圈</a></li>
                    <li  class="[other_share]"><a  href="/index.php/Home/HomePage/../Social/otherShare"> 好 友 分 享</a></li>
                    <li  class="[my_share]"><a  href="/index.php/Home/HomePage/../Social/myShare"> 我 的 分 享</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a class="[message]" href="javascript:;" >
                    <i class="fa fa-star"></i>
                    <span>动 态</span>
                </a>
                <ul class="sub">
                    <li  class="[my_comment]"><a  href="/index.php/Home/HomePage/../Social/myComment">我 的 评 论</a></li>
                    <li  class="[other_comment]"><a  href="/index.php/Home/HomePage/../Social/otherComment">好 友 评 论</a></li>
                </ul>
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

			<div class="row">
				<div class="col-lg-9">

					<div class="row" style="padding-top: 10px">
						<div class="border-head" style="padding-bottom: 20px">
							<h3><i class="fa fa-database"></i> 基本数据</h3>
						</div>

						<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
							<div class="box1">
								<i class="fa fa-file-o fa-4x"></i>
								<h3><?php echo ($numbers["notes"]); ?></h3>
							</div>
							<p>你已经写过 <?php echo ($numbers["notes"]); ?> 篇笔记了<br>再接再厉!</p>
						</div>

						<div class="col-md-2 col-sm-2 box0">
							<div class="box1">
								<i class="fa fa-book fa-4x"></i>
								<h3><?php echo ($numbers["books"]); ?></h3>
							</div>
							<p>你已经有 <?php echo ($numbers["books"]); ?> 个笔记本了<br>继续积累吧!</p>
						</div>

						<div class="col-md-2 col-sm-2 box0">
							<div class="box1">
								<i class="fa fa-heart-o fa-4x"></i>
								<h3>+<?php echo ($numbers["votes"]); ?></h3>
							</div>
							<p>有 <?php echo ($numbers["votes"]); ?> 人赞过你的笔记<br>人气越来越旺!</p>
						</div>

						<div class="col-md-2 col-sm-2 box0">
							<div class="box1">
								<i class="fa fa-comments-o fa-4x"></i>
								<h3>+<?php echo ($numbers["comments"]); ?></h3>
							</div>
							<p>有 <?php echo ($numbers["comments"]); ?> 人评论过你的笔记<br>赶紧去看看吧!</p>
						</div>

						<div class="col-md-2 col-sm-2 box0">
							<div class="box1">
								<i class="fa fa-users fa-4x"></i>
								<h3>+<?php echo ($numbers["followers"]); ?></h3>
							</div>
							<p>有 <?php echo ($numbers["followers"]); ?> 人关注了你<br>继续加油哦!</p>
						</div>

					</div><!-- /row mt -->


					<div class="row mt">
						<!-- SERVER STATUS PANELS -->

						<div class="border-head">
							<h3><i class="fa fa-clock-o"></i> 最近修改的笔记<a href="/index.php/Home/HomePage/../Note/noteByTime"> >>></a></h3>
						</div>

						<?php if(is_array($notes)): foreach($notes as $key=>$note): ?><! -- NOTE PANEL -->
							<div class="col-lg-4 col-md-4 col-sm-4 mb">

								<div class="note-panel-sm pn" onmouseenter="appear(this)" onmouseleave="disapper(this)">
									<div class="note-panel-title">
										<p><?php echo ($note["title"]); ?></p>
										<p style="font-size: 15px">上次修改：<?php echo ($note["modify_time"]); ?></p>
									</div>

									<div class="note-panel-content">
										<p><i class="fa fa-heart"></i> <?php echo ($note["votes"]); ?></p>
									</div>

									<div id="<?php echo ($note["id"]); ?>" class="note-operate pull-down" hidden >
										<i class="fa fa-eye fa-2x" onclick="show_note(this)"></i>
										<i class="fa fa-edit fa-2x" onclick="edit_note(this)"></i>
										<i class="fa fa-trash-o fa-2x" onclick="delete_note(this)"></i>
									</div>

								</div>
							</div><!-- /col-md-4 --><?php endforeach; endif; ?>

					</div>

					<div class="row mt">
						<!--CUSTOM CHART START -->
						<div class="border-head">
							<h3><i class="fa fa-globe"></i> 好友分享<a href="/index.php/Home/HomePage/../Social/otherShare"> >>></a></h3>
						</div>

						<?php if(is_array($shares)): foreach($shares as $key=>$share): ?><! -- SHARE PANEL -->
								<div class="col-lg-12 mb">
									<div class="share-panel pn">
										<div class="share-panel-header" style="display: inline-block">
											<div class="photo">
												<img src="/upload/profile/profile<?php echo ($share["uid_from"]); ?>.jpg" width="100px" style="margin-left: -20px"
													 onerror="this.src='/upload/profile/profile-default.jpg'">
											</div>

											<div class="details" style="float:left">
												<p>
													<a href="#"><?php echo ($share["username"]); ?></a>&nbsp;给你分享了一篇笔记：</p>
												<p style="font-size: 16px;font-style: italic;">&nbsp;“<?php echo ($share["reason"]); ?>”</p>
											</div>

											<div class="title" >
												<p style="font-size: 16px;font-weight: bold">《<?php echo ($share["title"]); ?>》</p>

												<?php $alltags = explode("；",$share['tags']) ?>
												<?php if(is_array($alltags)): foreach($alltags as $key=>$tag): ?><span class="label label-info" style="font-size: 12px;margin-right: 5px"><?php echo ($tag); ?></span><?php endforeach; endif; ?>

											</div>

										</div>
										<br>

										<div class="share-panel-content">
											<?php echo (htmlspecialchars_decode($share["content"])); ?>
										</div>
										<br>

										<div class="share-panel-footer">
											<p style="float: left;color: #818182;position: absolute;bottom: 5px">分享时间：<?php echo ($share["modify_time"]); ?></p>
											<div class="share-panel-operator">
												<button name="<?php echo ($share["nid"]); ?>" class="btn btn-warning" onclick="vote(this)"><i class="fa fa-heart"></i>&nbsp;<?php echo ($share["votes"]); ?></button>
												<button name="<?php echo ($share["nid"]); ?>" class="btn btn-warning" onclick="comment(this)"><i class="fa fa-comment">&nbsp;评论</i></button>
												<button name="<?php echo ($share["id"]); ?>" class="btn btn-warning" onclick="more(this)">阅读原文&nbsp;<i class="fa fa-angle-right"></i></button>
											</div>
										</div>

									</div>

								</div><!-- /col-lg-12 -->
							<br><?php endforeach; endif; ?>

						<!--custom chart end-->
					</div><!-- /row -->

				</div><!-- /col-lg-9 END SECTION MIDDLE -->


				<!-- **********************************************************************************************************************************************************
                RIGHT SIDEBAR CONTENT
                *********************************************************************************************************************************************************** -->

				<div class="col-lg-3 ds">
					<!-- COMMENT PANEL -->
					<h3>好友评论</h3>

					<?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><div class="desc">
							<div class="thumb">
								<img src="/upload/profile/profile<?php echo ($comment["uid"]); ?>.jpg" width="80px" style="margin-left: -15px"
									 onerror="this.src='/upload/profile/profile-default.jpg'">
							</div>
							<div class="details">
								<p><muted><?php echo ($comment["cmt_time"]); ?></muted><br/>
									<a href="#"><?php echo ($comment["username"]); ?></a> 评论了<strong>《<?php echo ($comment["title"]); ?>》</strong>：<?php echo ($comment["content"]); ?><br/>
								</p>
							</div>
						</div><?php endforeach; endif; ?>

					<?php if(count($comments)==0){echo '<p style="text-align: center;padding:10px 0">暂无评论</p>';} else {echo '<p style="text-align: center;padding:10px 0"><a style="color: #ff865c" href="/index.php/Home/HomePage/../Social/otherComment">>> 前往评论区</a></p>';} ?>



					<!-- VOTE PANEL -->
					<h3>好友点赞</h3>

					<?php if(is_array($votes)): foreach($votes as $key=>$vote): ?><div class="desc">
							<div class="thumb">
								<img src="/upload/profile/profile<?php echo ($vote["uid"]); ?>.jpg" width="80px" style="margin-left: -15px"
									 onerror="this.src='/upload/profile/profile-default.jpg'">
							</div>
							<div class="details">
								<p><muted><?php echo ($vote["vote_time"]); ?></muted><br/>
									<a href="#"><?php echo ($comment["username"]); ?></a> 点赞了<strong>《<?php echo ($vote["title"]); ?>》</strong><br/>
								</p>
							</div>
						</div><?php endforeach; endif; ?>

					<?php if(count($votes)==0){echo '<p style="text-align: center;padding:10px 0">暂无点赞</p>';} ?>
				</div><!-- /col-lg-3 -->
			</div><! --/row -->


			<!-- Modal -->
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="commentModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"> 留 下 你 珍 贵 的 评 论 </h4>
						</div>
						<form action="/index.php/Home/HomePage/../Social/comment" method="post">
							<div class="modal-body">
								<input type="hidden" name="nid" value="">

								<input required type="text" name="comment" placeholder="评论内容" class="form-control placeholder-no-fix">

							</div>
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-default" type="button">取 消</button>
								<button class="btn btn-theme" type="submit">确 认</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- modal -->

		</section>
	</section>

	<!--main content end-->
	<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        copyright@151250160 <a href="#" target="_blank">吴静琦</a>
        <a href="/index.php/Home/HomePage/#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="/Public/static/js/jquery.js"></script>
<script src="/Public/static/js/jquery-1.8.3.min.js"></script>
<script src="/Public/static/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/Public/static/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/Public/static/js/jquery.scrollTo.min.js"></script>
<script src="/Public/static/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/Public/static/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="/Public/static/js/common-scripts.js"></script>

<script type="text/javascript" src="/Public/static/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="/Public/static/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="/Public/static/js/sparkline-chart.js"></script>
<script src="/Public/static/js/zabuto_calendar.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: '欢迎使用easynote!',
            // (string | mandatory) the text inside the notification
            text: '你可以隐藏左侧的导航栏，也可以在离开的时候锁屏。祝你使用愉快！<br>（本提示可以关闭）',
            // (string | optional) the image to display on the left
            image: '/Public/images/temp/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });

    function appear(node) {
        node.getElementsByClassName("note-operate").item(0).removeAttribute("hidden");
    }

    function disapper(node) {
        node.getElementsByClassName("note-operate").item(0).setAttribute("hidden","");
    }

    function delete_note(node) {
        if(window.confirm("删除是不可恢复的，你确认要删除这篇笔记吗？")){
            window.location="/index.php/Home/HomePage/../Note/deleteNote/nid/"+node.parentNode.id;
        }
    }

    function show_note(node) {
        window.location="/index.php/Home/HomePage/../Note/note/nid/"+node.parentNode.id;
    }

    function edit_note(node) {
        window.location="/index.php/Home/HomePage/../Note/editNote/nid/"+node.parentNode.id;
    }

    function vote(node) {
        $.post("/index.php/Home/HomePage/../Social/vote",
            {
                nid:node.name
            },
            function(data,status){
                node.innerHTML='<i class="fa fa-heart"></i>&nbsp;'+data;
            });
    }

    function comment(node) {
        document.getElementsByName('nid').item(0).setAttribute("value",node.name);
        $('#commentModal').modal('show');
    }

    function more(node) {
        window.location="/index.php/Home/HomePage/../Social/share/sid/"+node.name;
    }
</script>



</body>
</html>