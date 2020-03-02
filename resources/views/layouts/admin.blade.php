<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>{{Helper::system()->title}} :: Administravimas</title>

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/gritter/css/jquery.gritter.css')}}"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('lib/chart-master/Chart.js')}}"></script>
    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="/admin" class="logo"><b>Admin<span>istravimas</span></b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li>
                    <form method="post" action="{{route('logout', app()->getLocale())}}">
                        @csrf
                        <input type="submit" class="logout" value="Atsijungti">
                    </form>
                </li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="{{route('user.profile', [app()->getLocale(), Auth::id()])}}"><img
                            src="{{Auth::user()->photo}}" class="img-circle" width="80"></a></p>
                <h5 class="centered">{{Auth::user()->name}}</h5>
                <li class="mt">
                    <a href="/admin">
                        <i class="fa fa-dashboard"></i>
                        <span>Pagrindinis</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.news')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Naujienos</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/users">
                        <i class="fa fa-dashboard"></i>
                        <span>Vartotojai</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/system">
                        <i class="fa fa-dashboard"></i>
                        <span>Sistema</span>
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
            <div class="row">
            @yield('content')
            <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
                <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                    <div class="donut-main">
                        <h4>COMPLETED ACTIONS & PROGRESS</h4>
                        <canvas id="newchart" height="130" width="130"></canvas>
                        <script>
                            var doughnutData = [{
                                value: 70,
                                color: "#4ECDC4"
                            },
                                {
                                    value: 30,
                                    color: "#fdfdfd"
                                }
                            ];
                            var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
                        </script>
                    </div>
                    <!--NEW EARNING STATS -->
                    <div class="panel terques-chart">
                        <div class="panel-body">
                            <div class="chart">
                                <div class="centered">
                                    <span>TODAY EARNINGS</span>
                                    <strong>$ 890,00 | 15%</strong>
                                </div>
                                <br>
                                <div class="sparkline" data-type="line" data-resize="true" data-height="75"
                                     data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff"
                                     data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4"
                                     data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                            </div>
                        </div>
                    </div>
                    <!--new earning end-->
                    <!-- RECENT ACTIVITIES SECTION -->
                    <h4 class="centered mt">RECENT ACTIVITY</h4>
                    <!-- First Activity -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>Just Now</muted>
                                <br/>
                                <a href="#">Paul Rudd</a> purchased an item.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Second Activity -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>2 Minutes Ago</muted>
                                <br/>
                                <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Third Activity -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>3 Hours Ago</muted>
                                <br/>
                                <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- Fourth Activity -->
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>7 Hours Ago</muted>
                                <br/>
                                <a href="#">Brando Page</a> purchased a year subscription.<br/>
                            </p>
                        </div>
                    </div>
                    <!-- USERS ONLINE SECTION -->
                    <h4 class="centered mt">TEAM MEMBERS ONLINE</h4>
                    <!-- First Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-divya.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">DIVYA MANIAN</a><br/>
                                <muted>Available</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Second Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-sherman.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">DJ SHERMAN</a><br/>
                                <muted>I am Busy</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Third Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-danro.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">DAN ROGERS</a><br/>
                                <muted>Available</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Fourth Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-zac.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">Zac Sniders</a><br/>
                                <muted>Available</muted>
                            </p>
                        </div>
                    </div>
                    <!-- CALENDAR-->
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="date-popover" class="popover top"
                                     style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title" style="disadding: none;"></h3>
                                    <div id="date-popover-content" class="popover-content"></div>
                                </div>
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- / calendar -->
                </div>
                <!-- /col-lg-3 -->
            </div>
            <!-- /row -->
        </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>
                &copy; Copyright <strong>Atletas</strong>. Visos teisės saugomos
            </p>
            <a href="/admin#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="lib/gritter-conf.js"></script>
<!--script for this page-->
<script src="lib/sparkline-chart.js"></script>
<script src="lib/zabuto_calendar.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashio!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
            // (string | optional) the image to display on the left
            image: 'img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 8000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
</script>
<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [{
                type: "text",
                label: "Special event",
                badge: "00"
            },
                {
                    type: "block",
                    label: "Regular event",
                }
            ]
        });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
</body>

</html>
