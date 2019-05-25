<?php
  	require_once "php/lib/db.php";



			$dbcon= new DB;
			$dbcon->Open();

			$sql =  "SELECT last_insert_id() FROM nodeinfo";
      query($sql);
			$res = $dbcon->Query($sql);
			$cnt = $dbcon->NumRows($res);

			$TotalNodes = $cnt;
			$dbcon->Close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <title>Dashboard / WOORIBANK BLOCKEXPLORER</title>
  <link rel="shortcut icon" href="img/favicon.png">


<link rel="stylesheet" href="fonts/open-sans/style.min.css"> <!-- common font  styles  -->
<link rel="stylesheet" href="fonts/universe-admin/style.css"> <!-- universeadmin icon font styles -->
<link rel="stylesheet" href="fonts/mdi/css/materialdesignicons.min.css"> <!-- meterialdesignicons -->
<link rel="stylesheet" href="fonts/iconfont/style.css"> <!-- DEPRECATED iconmonstr -->
<link rel="stylesheet" href="vendor/flatpickr/flatpickr.min.css"> <!-- original flatpickr plugin (datepicker) styles -->
<link rel="stylesheet" href="vendor/simplebar/simplebar.css"> <!-- original simplebar plugin (scrollbar) styles  -->
<link rel="stylesheet" href="vendor/tagify/tagify.css"> <!-- styles for tags -->
<link rel="stylesheet" href="vendor/tippyjs/tippy.css"> <!-- original tippy plugin (tooltip) styles -->
<link rel="stylesheet" href="vendor/select2/css/select2.min.css"> <!-- original select2 plugin styles -->
<!--<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css"> <!-- original bootstrap styles -->
<link rel="stylesheet" href="js/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.min.css" id="stylesheet"> <!-- universeadmin styles -->
<link rel="stylesheet" href="vendor/tui-chart/tui-chart.min.css">


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/ie.assign.fix.min.js"></script>
  <script type="text/javascript">

  // $(document).ready(function(){
  //   $("#ID_RewardsFAS").text("1");
  // });


  setTimeout(function(){
    alert("1");
  },1000);


   function checkData(){
    $.ajax({
      url: '/ajax.php',
      type: 'post',
      timeout: 1000,
      success:function(response){
        $("#ID_RewardsFAS").text("1");
      },
      error:function(request,status,error){
        console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        }
    });
}

// $("#ID_RewardsFAS").text("1");
  </script>
</head>
<body class="js-loading"> <!-- add for rounded corners: form-controls-rounded -->
<div class="page-preloader js-page-preloader">
  <div class="page-preloader__logo">
    <img src="img/logo-black-lg.png" alt="" class="page-preloader__logo-image">
  </div>
  <div class="page-preloader__desc">Welcome to WooriBank Block Explorer</div>
  <div class="page-preloader__loader">
    <div class="page-preloader__loader-heading">System Loading</div>
    <div class="page-preloader__loader-desc">Widgets update</div>
    <div class="progress progress-rounded page-preloader__loader-progress">
      <div id="page-loader-progress-bar" class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
  <div class="page-preloader__copyright">ThemesAnytime, 2018</div>
</div>

  <div class="navbar navbar-light navbar-expand-lg">
  <button class="sidebar-toggler" type="button">
    <span class="ua-icon-sidebar-open sidebar-toggler__open"></span>
    <span class="ua-icon-alert-close sidebar-toggler__close"></span>
  </button>

  <span class="navbar-brand">
    <a href="/"><img src="img/logo.png" alt="" class="navbar-brand__logo"></a>
    <span class="ua-icon-menu slide-nav-toggle"></span>
  </span>

  <span class="navbar-brand-sm">
    <a href="/"><img src="img/logo-sm.png" alt="" class="navbar-brand__logo"></a>
    <span class="ua-icon-menu slide-nav-toggle"></span>
  </span>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
    <span class="ua-icon-navbar-open navbar-toggler__open"></span>
    <span class="ua-icon-alert-close navbar-toggler__close"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar-collapse">
    <div class="navbar__menu">
      <ul class="navbar-nav">
        <li class="nav-item dropdown navbar__menu-item">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            Block
          </a>
          <!--<div class="dropdown-menu navbar__menu-dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><span class="iconfont-users dropdown-item__icon"></span>Lead</a>
            <a class="dropdown-item" href="#"><span class="iconfont-user-circle dropdown-item__icon"></span>Contact: Person</a>
            <a class="dropdown-item" href="#"><span class="iconfont-building-b dropdown-item__icon"></span>Contact: Company</a>
            <a class="dropdown-item" href="#"><span class="iconfont-deal dropdown-item__icon"></span>Deal</a>
            <a class="dropdown-item" href="#"><span class="iconfont-arrow-right dropdown-item__icon"></span>Import</a>
          </div>
		  -->
        </li>
        <li class="nav-item dropdown dropdown__columns navbar__menu-item">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            Transaction
          </a>
          <!--<div class="dropdown-menu dropdown__columns-menu navbar__menu-dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="dropdown__columns-container">
              <div class="dropdown__columns-column">
                <a class="dropdown-item dropdown__columns-item" href="#">Range Slider</a>
                <a class="dropdown-item dropdown__columns-item" href="#">Confirm Alerts</a>
                <a class="dropdown-item dropdown__columns-item" href="#">Tag Editor</a>
                <a class="dropdown-item dropdown__columns-item" href="#">Date Picker</a>
                <a class="dropdown-item dropdown__columns-item" href="#">Date Range Picker</a>
                <a class="dropdown-item dropdown__columns-item" href="#">File Upload</a>
                <a class="dropdown-item dropdown__columns-item" href="#">Growl Notifications</a>
                <a class="dropdown-item dropdown__columns-item" href="#">Wysiwyg Editor</a>
                <a class="dropdown-item dropdown__columns-item" href="#">Page Tour</a>
              </div>
            </div>
          </div>-->
        </li>
        <li class="nav-item navbar__menu-item">
          <a class="nav-link" href="#">Node</a>
        </li>
        <li class="nav-item navbar__menu-item">
          <a class="nav-link" href="#">Contract</a>
        </li>
      </ul>
      <div class="navbar__menu-side">
        <div class="navbar-search navbar__menu-search">
          <div class="input-group input-group-icon iconfont icon-right">
            <input class="form-control navbar-search__input navbar__menu-search-input" type="text" placeholder="Search"/><span class="input-icon ua-icon-search"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <div class="page-content">

<div class="container-fluid">
  <div class="page-content__header">
    <div>
      <h2 class="page-content__header-heading">WooriBank Block Explorer</h2>
      <div class="page-content__header-description">Welcome to Our Block Infomation Dashboard</div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="widget widget-welcome">
        <div class="widget-welcome__message">
          <h4 class="widget-welcome__message-l1">Current Quotations</h4>
          <h6 class="widget-welcome__message-l2">Welcome back!</h6>
        </div>
        <div class="widget-welcome__stats">
          <div class="widget-welcome__stats-item early-growth">
            <span class="widget-welcome__stats-item-value">$10.002</span>
            <span class="widget-welcome__stats-item-desc">Last Price</span>
          </div>
          <div class="widget-welcome__stats-item monthly-growth">
            <span class="widget-welcome__stats-item-value">+10.2%</span>
            <span class="widget-welcome__stats-item-desc">Change</span>
          </div>
          <div class="widget-welcome__stats-item daily-growth">
            <span class="widget-welcome__stats-item-value">9412704.64 FAS</span>
            <span class="widget-welcome__stats-item-desc">24H Volume</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-6">
      <div class="widget widget-alpha widget-alpha--color-amaranth">
        <div>
          <div class="widget-alpha__amount"><?php echo "0"; ?></div>
          <div class="widget-alpha__description">Total Genesis Block</div>
        </div>
        <span class="widget-alpha__icon ua-icon-suitcase"></span>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6">
      <div class="widget widget-alpha widget-alpha--color-green-jungle">
        <div>
          <div class="widget-alpha__amount"><?php echo ($TotalNodes); ?></div>
          <div class="widget-alpha__description">Total Nodes</div>
        </div>
        <span class="widget-alpha__icon ua-icon-user-outline"></span>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6">
      <div class="widget widget-alpha widget-alpha--color-orange widget-alpha--donut">
        <div>
          <div class="widget-alpha__amount"><h2 id="ID_RewardsFAS"></div>


          <div class="widget-alpha__description">Rewards FAS</div>
        </div>
        <span class="widget-alpha__icon ua-icon-conversion-rate"></span>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6">
      <div class="widget widget-alpha widget-alpha--color-java widget-alpha--help">
        <div>
          <div class="widget-alpha__amount">
            <h2 id="ID_SmartContracts"></div>
          <div class="widget-alpha__description">Smart Contracts</div>
        </div>
        <span class="widget-alpha__icon ua-icon-ticket"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="statistic-widget statistic-widget-f">
        <div id="radial-progress-ex1" class="statistic-widget-f__chart">
          <span class="statistic-widget-f__chart-text"></span>
        </div>
        <div class="statistic-widget-f__info">
          <div class="statistic-widget-f__value color-picton-blue"><h2 id="ID_Current_TPS"></div>
          <div class="statistic-widget-f__desc">Current TPS / TOP TPS</div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="statistic-widget statistic-widget-f">
        <div id="radial-progress-ex2" class="statistic-widget-f__chart">
          <span class="statistic-widget-f__chart-text"></span>
        </div>
        <div class="statistic-widget-f__info">
          <div class="statistic-widget-f__value color-waterlemon"><h2 id="ID_Total_Nodes"></div>
          <div class="statistic-widget-f__desc">Active Nodes / Total Nodes</div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="statistic-widget statistic-widget-f">
        <div id="radial-progress-ex3" class="statistic-widget-f__chart">
          <span class="statistic-widget-f__chart-text"></span>
        </div>
        <div class="statistic-widget-f__info">
          <div class="statistic-widget-f__value color-heliotrope"><h2 id="ID_Contract"></div>
          <div class="statistic-widget-f__desc">Private / Public Contract</div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="statistic-widget statistic-widget-f">
        <div id="radial-progress-ex4" class="statistic-widget-f__chart">
          <span class="statistic-widget-f__chart-text"></span>
        </div>
        <div class="statistic-widget-f__info">
          <div class="statistic-widget-f__value color-success"><h2 id="ID_Users"></div>
          <div class="statistic-widget-f__desc">Active Users / Total Users</div>
        </div>
      </div>
    </div>
  </div>

<div class="m-content m-content--reset">
    <h2>Line Charts</h2>

    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="chart-widget tui-chart-widget">
          <div id="tui-chart-widget-ex1" class="chart-widget__chart"></div>
        </div>
      </div>
    </div>
  </div>


<div class="container-fluid">
  <div class="page-content__header">
    <div>
      <h2 class="page-content__header-heading">Block Information</h2>
    </div>
  </div>
  <div class="main-container table-container">
    <table id="datatable" class="table table-striped">
      <thead>
      <tr>
        <th>Block Number</th>
        <th>Create Time</th>
        <th>Server Name</th>
        <th>Previous Block Info.</th>
        <th>Hash</th>
      </tr>
      </thead>
      <tbody>
		  <tr>
			<td><a href="#" class="link-info">1</a></td>
			<td>2019/02/15 20:11:24</td>
			<td>NW1</td>
			<td>0</td>
			<td>69F0BA16B5ACE257553E2FD23F74D6B4</td>
		  </tr>
		  <tr>
			<td><a href="#" class="link-info">2</a></td>
			<td>2019/02/15 20:11:27</td>
			<td>NW2</td>
			<td>1</td>
			<td>48ADE1F88E07F872CDBA5073A9A557C9</td>
		  </tr>
		  <tr>
			<td><a href="#" class="link-info">3</a></td>
			<td>2019/02/15 20:11:28</td>
			<td>NW3</td>
			<td>2</td>
			<td>48ADE1F88E07F872CDBA5073A9A557C9</td>
		  </tr>
		  <tr>
			<td><a href="#" class="link-info">3</a></td>
			<td>2019/02/15 20:11:28</td>
			<td>NW3</td>
			<td>2</td>
			<td>48ADE1F88E07F872CDBA5073A9A557C9</td>
		  </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="col-xl-12 col-lg-12" style="padding:20px 40px 20px 40px;">
	  <div class="page-content__header">
		<div>
		  <h2 class="page-content__header-heading">Transaction Information</h2>
		</div>
	  </div>
      <div class="widget widget-controls widget-table widget-account-activity">
        <div class="widget-controls__header">
          <div>
          </div>
        </div>
        <div class="widget-controls__content js-scrollable">
          <table class="table table-no-border table-striped">
            <thead>
              <tr>
                <th>Hash value</th>
                <th>Create Time</th>
                <th>From</th>
                <th>To</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
                <td>e</td>
              </tr>
              <tr>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
                <td>e</td>
              </tr>
              <tr>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
                <td>e</td>
              </tr>
              <tr>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
                <td>e</td>
              </tr>
              <tr>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
                <td>e</td>
              </tr>
              <tr>
                <td>a</td>
                <td>b</td>
                <td>c</td>
                <td>d</td>
                <td>e</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
 <div class="col-xl-12 col-lg-12" style="padding:20px 40px 20px 40px;">
  <div class="page-content__header">
    <div>
      <h2 class="page-content__header-heading">Smart Contract List</h2>
    </div>
  </div>
      <div class="widget widget-table widget-controls widget-payouts widget-controls--dark">
        <div class="widget-controls__header">
          <div>
            <span class="widget-controls__header-icon ua-icon-wallet"></span> Smart Contract
          </div>
        </div>
        <div class="widget-controls__content js-scrollable" data-simplebar="init"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="top: 2px; height: 260px;"></div></div><div class="simplebar-track horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
          <table class="table table-no-border table-striped">
            <tbody>
              <tr>
                <td class="table__datetime">Contract Value</td>
                <td><span class="font-semibold color-info">Private</span></td>
                <td><span class="font-semibold">Public</span></td>
              </tr>
              <tr>
                <td class="table__datetime">Contract Value</td>
                <td><span class="font-semibold color-info">Private</span></td>
                <td><span class="font-semibold">Public</span></td>
              </tr>
              <tr>
                <td class="table__datetime">Contract Value</td>
                <td><span class="font-semibold color-info">Private</span></td>
                <td><span class="font-semibold">Public</span></td>
              </tr>
              <tr>
                <td class="table__datetime">Contract Value</td>
                <td><span class="font-semibold color-info">Private</span></td>
                <td><span class="font-semibold">Public</span></td>
              </tr>
              <tr>
                <td class="table__datetime">Contract Value</td>
                <td><span class="font-semibold color-info">Private</span></td>
                <td><span class="font-semibold">Public</span></td>
              </tr>
              <tr>
                <td class="table__datetime">Contract Value</td>
                <td><span class="font-semibold color-info">Private</span></td>
                <td><span class="font-semibold">Public</span></td>
              </tr>
              <tr>
                <td class="table__datetime">Contract Value</td>
                <td><span class="font-semibold color-info">Private</span></td>
                <td><span class="font-semibold">Public</span></td>
              </tr>
              <tr>
                <td class="table__datetime">Contract Value</td>
                <td><span class="font-semibold color-info">Private</span></td>
                <td><span class="font-semibold">Public</span></td>
              </tr>
            </tbody>
          </table>
        </div></div></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="statistic-widget statistic-widget-g">
        <div class="statistic-widget-g__info">
          <div class="statistic-widget-g__title">Followers</div>
          <div class="statistic-widget-g__desc">
            Get Around Easily A New <br>
            York Limousine Service
          </div>
          <a href="#" class="statistic-widget-g__link">Details</a>
        </div>
        <div id="radial-progress-ex5" class="statistic-widget-g__chart">
          <span class="statistic-widget-g__chart-text"></span>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="statistic-widget statistic-widget-g">
        <div class="statistic-widget-g__info">
          <div class="statistic-widget-g__title">Orders</div>
          <div class="statistic-widget-g__desc">
            Get Around Easily A New <br>
            York Limousine Service
          </div>
          <a href="#" class="statistic-widget-g__link">Details</a>
        </div>
        <div id="radial-progress-ex6" class="statistic-widget-g__chart">
          <span class="statistic-widget-g__chart-text"></span>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="statistic-widget statistic-widget-g">
        <div class="statistic-widget-g__info">
          <div class="statistic-widget-g__title">Tasks</div>
          <div class="statistic-widget-g__desc">
            Get Around Easily A New <br>
            York Limousine Service
          </div>
          <a href="#" class="statistic-widget-g__link">Details</a>
        </div>
        <div id="radial-progress-ex7" class="statistic-widget-g__chart">
          <span class="statistic-widget-g__chart-text"></span>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="statistic-widget statistic-widget-g">
        <div class="statistic-widget-g__info">
          <div class="statistic-widget-g__title">Clients</div>
          <div class="statistic-widget-g__desc">
            Get Around Easily A New <br>
            York Limousine Service
          </div>
          <a href="#" class="statistic-widget-g__link">Details</a>
        </div>
        <div id="radial-progress-ex8" class="statistic-widget-g__chart">
          <span class="statistic-widget-g__chart-text"></span>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="vendor/echarts/echarts.min.js"></script>

 <!--<script src="vendor/jquery/jquery.min.js"></script>-->
<script src="vendor/popper/popper.min.js"></script>
 <!--<script src="vendor/bootstrap/js/bootstrap.min.js"></script>-->
 <script src="js/node_modules/bootstrap/dist/js/bootstrap.min.js"type="text/javascript"></script>

<script src="vendor/select2/js/select2.full.min.js"></script>
<script src="vendor/simplebar/simplebar.js"></script>
<script src="vendor/text-avatar/jquery.textavatar.js"></script>
<script src="vendor/tippyjs/tippy.all.min.js"></script>
<script src="vendor/flatpickr/flatpickr.min.js"></script>
<script src="vendor/wnumb/wNumb.js"></script>
<script src="js/main.js"></script>
<script src="js/node_main.js"></script>
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/tui-chart/tui-code-snippet.js"></script>
<script src="vendor/tui-chart/tui-chart.min.js"></script>
<script src="js/preview/tui-charts/tui-line-charts.min.js"></script>

<script src="vendor/jquery-circle-progress/circle-progress.min.js"></script>
<script src="js/preview/default-dashboard.min.js"></script>
<script src="js/Update.js"></script>


  <div class="slide-nav">
  <div class="slide-nav__header">
    <a href="#" class="slide-nav__back ua-icon-step-arrow-left"></a>
    <img src="img/logo.png" alt="" class="slide-nav__logo">
  </div>
  <div class="slide-nav__body">
    <div class="slide-nav__scrollpane js-scrollable">
      <div class="slide-nav__items">
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/30.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Storage</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/31.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Search</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/32.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Calendar</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/33.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Mail</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/34.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Images</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/35.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">News</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/36.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Maps</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/37.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Market</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/38.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Weather</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/39.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Music</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/40.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Tickets</span>
        </a>
        <a href="#" class="slide-nav__item">
          <img src="img/slidenav/41.png" alt="" class="slide-nav__item-image">
          <span class="slide-nav__item-text">Stats</span>
        </a>
      </div>
    </div>
  </div>
</div>
<script src="js/preview/slide-nav.min.js"></script>



</body>
</html>
