<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>مدیریت برنامه البرزدیتا</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->

<style>body{font-family: IRANSans;}</style>
</head>
<body dir="rtl">
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">مدیریت برنامه البرزدیتا</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'indicators'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/indicators">شاخص‌ها</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'cols'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/cols">ستون‌ها</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'indicator_tables'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/indicator_tables">جدول‌ها</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'marks'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/marks">نشان‌ها</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'row_titles'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/row_titles">سطرها</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'units'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/units">واحدها</a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">سامانه <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>
