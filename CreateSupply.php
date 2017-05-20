<?php
require_once('View/Page.php');
$page = new Page;
$page->setTitle('CreateSupply');
$page->startBody();
?>
<!--body-->       
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              หน้าหลัก 
              <small>สถานะห้องพัก</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
              <li class="active">สถานะห้องพัก</li>
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
          <?php 
        require('view/Formconfigcharge.php');
          ?>          
          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
<!--Footer-->
<!--<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>-->
<?php
$page->endBody();
echo $page->render('view/template.php');
require_once('AppStart/ScripPage.php');
?>
