<!DOCTYPE HTML>
<html>
    <head>
        <title>BioQuest Solutions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="<?php echo base_url(); ?>/assets/css/style.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url(); ?>/assets/css/font-awesome.css" rel="stylesheet"> 
        <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"> </script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"> </script>
        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>/assets/js/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.slimscroll.min.js"></script>
        <!-- Custom and plugin javascript -->
        <link href="<?php echo base_url(); ?>/assets/css/custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

        <!----->

        <!--pie-chart--->
        <script src="<?php echo base_url(); ?>/assets/js/pie-chart.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#demo-pie-1').pieChart({
                    barColor: '#3bb2d0',
                    trackColor: '#eee',
                    lineCap: 'round',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

                $('#demo-pie-2').pieChart({
                    barColor: '#fbb03b',
                    trackColor: '#eee',
                    lineCap: 'butt',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

                $('#demo-pie-3').pieChart({
                    barColor: '#ed6498',
                    trackColor: '#eee',
                    lineCap: 'square',
                    lineWidth: 8,
                    onStep: function (from, to, percent) {
                        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                    }
                });

           
            });

        </script>
        <!--skycons-icons-->
        <script src="<?php echo base_url(); ?>/assets/js/skycons.js"></script>
        <!--//skycons-icons-->
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1> <a class="navbar-brand" href="">BioQuest</a></h1>         
                </div>
                <div class=" border-bottom">
                    <div class="full-left">
                      <section class="full-top">
                    </section>
                   
                    <div class="clearfix"> </div>
                   </div>
         
           
                    <!-- Brand and toggle get grouped for better mobile display -->
             
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="drop-men" >
                        <ul class=" nav_1">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><img src="<?php echo base_url(); ?>/assets/images/login (1).jpg"  height="60px"></a>
                              <ul class="dropdown-menu " role="menu">
                                <li><a href="<?php echo base_url(); ?>users/resetpassword"><i class="fa fa-user"></i>Edit Profile</a></li>
                                <li><a href="<?php echo base_url(); ?>users/logout"><i class="fa fa-envelope"></i>Logout</a></li>
                              </ul>
                            </li>
                           
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <div class="clearfix"></div>
          
                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>users/" class=" hvr-bounce-to-right"><i class="fa fa-group nav_icon"></i> <span class="nav-label">Users</span> </a>
                                </li>

                                 <li>
                                    <a href="<?php echo base_url(); ?>users/faq" class=" hvr-bounce-to-right"><i class="fa fa-question nav_icon"></i> <span class="nav-label">FAQ</span> </a>
                                </li>
                                
                               
                                 <li>
                                    <a href="<?php echo base_url(); ?>users/my_faq" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">My Questions</span> </a>
                                </li>
                             
                            </ul>
                        </div>
                    </div>
            </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">