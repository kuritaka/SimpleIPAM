<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/mystyle.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
          <a class="navbar-brand" href="<?php echo base_url('/') ?>"><b>SimpleIPAM</b></a>
        </div>
        <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
        <div id="navbar">
          <ul class="nav navbar-nav">
             <li><a href="<?php echo base_url('/') ?>networks">Networks</a></li>
             <li><a href="<?php echo base_url('/') ?>hosts">Hosts</a></li>
          </ul>
          <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Note<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('/') ?>private_address">Private addresses</a></li>
                  <li><a href="<?php echo base_url('/') ?>cidr">CIDR</a></li>
                </ul>
              </li>
          </ul>
          <!--
          <ul class="nav navbar-nav">
             <li><a href="<?php echo base_url('/') ?>help">Help</a></li>
          </ul>
          -->
         <form class="navbar-form navbar-left" action="<?php echo base_url('/') ?>hosts/search" method="post">
            <div class="form-group">
              <input type="text" name="host_name" class="form-control" placeholder="Search for hosts"  value="<?php echo set_value('host_name', $host_name); ?>">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

