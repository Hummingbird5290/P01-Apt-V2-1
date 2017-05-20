<?php
require_once('View/Page.php');
$page = new Page;
$page->setTitle('EditProfile');
$page->startBody();
?>
  <!--body-->       
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              หน้าหลัก 
              <small>สร้าง User</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="BackEnd.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
              <li class="active">สร้าง User</li>
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
          <?php require('view/EditProfile.php'); ?> 
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
<?php
$page->endBody();
echo $page->render('view/template.php');
require_once('AppStart/ScripPage.php');
?> 
   