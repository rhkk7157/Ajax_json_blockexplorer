<?php


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
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css"> <!-- original bootstrap styles -->
<link rel="stylesheet" href="css/style.min.css" id="stylesheet"> <!-- universeadmin styles -->
<link rel="stylesheet" href="vendor/tui-chart/tui-chart.min.css">



  <script src="js/ie.assign.fix.min.js"></script>
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
      <h2 class="page-content__header-heading">DataTables</h2>
    </div>
  </div>
  <div class="m-datatable">
    <table id="datatable" class="table table-striped">
      <thead>
      <tr>
        <th>Hash</th>
        <th>time</th>
        <th>From</th>
        <th>To</th>
        <th>Amount</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>


  <?php
require_once "php/lib/db.php";

$row ="";

  $dbcon= new DB;
  $dbcon->Open();

  $sql =  "SELECT Hash,time,From_,To_,Amount,Action FROM transactioninfo limit 100";

  $res = $dbcon->Query($sql);
  $cnt = $dbcon->NumRows($res);


while($row = $dbcon->FetchAssoc($res))
{
   $rows[] = array(
      'Hash'         => $row['Hash'],
      'time'   => $row['time'],
      'From_'               => $row['From_'],
      'To_'         => $row['To_'],
      'Amount'         => $row['Amount'],
      'Action'         => $row['Action']
    );

}
for($i=0; $i< $cnt; $i++) {
?>
      <tr>
        <td><?=$rows[$i]['Hash']?></td>
        <td><?=$rows[$i]['time']?></td>
        <td><?=$rows[$i]['From_']?></td>
        <td><?=$rows[$i]['To_']?></td>
        <td><?=$rows[$i]['Amount']?></td>
        <td><?=$rows[$i]['Action']?></td>
      </tr>
<?php
}
$dbcon->Close();
 ?>
      </tbody>
    </table>
  </div>
</div>

  </div>
</div>




  <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/js/select2.full.min.js"></script>
<script src="vendor/simplebar/simplebar.js"></script>
<script src="vendor/text-avatar/jquery.textavatar.js"></script>
<script src="vendor/tippyjs/tippy.all.min.js"></script>
<script src="vendor/flatpickr/flatpickr.min.js"></script>
<script src="vendor/wnumb/wNumb.js"></script>
<script src="js/main.js"></script>


<script src="vendor/datatables/datatables.min.js"></script>
<script src="js/preview/datatables.min.js"></script>


<div class="sidebar-mobile-overlay"></div>


  <div class="settings-panel">
  <div class="settings-panel__header">
    <span class="settings-panel__close ua-icon-modal-close"></span>

    <h5 class="settings-panel__heading">Theme Customizer</h5>
    <div class="settings-panel__desc">Customize & Preview In Real Time</div>
  </div>
  <div class="settings-panel__body">
    <div class="settings-panel__layout-options">
      <h6 class="settings-panel__block-heading">Layout Options</h6>
      <div class="settings-panel__layout-option">
        <label class="switch-inline">
          <span class="switch">
            <input type="checkbox" id="collapse-sidebar">
              <span class="switch-slider"></span>
            </span>
            <span class="switch-inline__text">Collapse Sidebar</span>
        </label>
      </div>
      <div class="settings-panel__layout-option">
        <label class="switch-inline">
          <span class="switch">
            <input type="checkbox" id="hide-sidebar">
              <span class="switch-slider"></span>
            </span>
            <span class="switch-inline__text">Hide Sidebar</span>
        </label>
      </div>
      <div class="settings-panel__layout-option">
        <label class="switch-inline">
          <span class="switch">
            <input type="checkbox" id="full-height-sidebar">
              <span class="switch-slider"></span>
            </span>
          <span class="switch-inline__text">Full Height Sidebar</span>
        </label>
      </div>
      <div class="settings-panel__layout-option">
        <label class="switch-inline">
          <span class="switch">
            <input type="checkbox" id="rounded-form-controls">
              <span class="switch-slider"></span>
            </span>
          <span class="switch-inline__text">Rounded Form Controls</span>
        </label>
      </div>
    </div>
    <div class="settings-panel__theme-colors">
      <h6 class="settings-panel__block-heading">Theme Colors</h6>

      <ul class="list-unstyled">
        <!--<li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-a">
            <span class="color-radio__color"></span>
            <span class="color-radio__text">#1</span>
          </label>
        </li>-->
        <li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-b">
            <span class="color-radio__color color-radio__color--deep-cerulean"></span>
            <span class="color-radio__text">#2</span>
          </label>
        </li>
        <li>
          <label class="color-radio js-settings-color is-checked">
            <input type="radio" name="settings_color" data-style="style" checked>
            <span class="color-radio__color color-radio__color--river-bad"></span>
            <span class="color-radio__text">#3</span>
          </label>
        </li>
        <li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-d">
            <span class="color-radio__color color-radio__color--sun-juan"></span>
            <span class="color-radio__text">#4</span>
          </label>
        </li>
        <li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-e">
            <span class="color-radio__color color-radio__color--bermuda-gray"></span>
            <span class="color-radio__text">#5</span>
          </label>
        </li>
        <li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-f">
            <span class="color-radio__color color-radio__color--deep-sea"></span>
            <span class="color-radio__text">#6</span>
          </label>
        </li>
        <li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-i">
            <span class="color-radio__color color-radio__color--wine-berry"></span>
            <span class="color-radio__text">#7</span>
          </label>
        </li>
        <li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-g">
            <span class="color-radio__color  color-radio__color--big-stone"></span>
            <span class="color-radio__text">#8</span>
          </label>
        </li>
        <li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-j">
            <span class="color-radio__color color-radio__color--killarney"></span>
            <span class="color-radio__text">#9</span>
          </label>
        </li>
        <li>
          <label class="color-radio js-settings-color">
            <input type="radio" name="settings_color" data-style="style-h">
            <span class="color-radio__color color-radio__color--kabul"></span>
            <span class="color-radio__text">#10</span>
          </label>
        </li>
      </ul>
    </div>
  </div>
</div>

<span class="settings-panel-control">
  <span class="settings-panel-control__icon ua-icon-settings"></span>
</span>
<script src="js/preview/settings-panel.min.js"></script>




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
