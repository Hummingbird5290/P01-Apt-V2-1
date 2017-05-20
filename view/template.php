<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tell the browser to be responsive to screen width -->  
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <link rel="shortcut icon" href="dist/img/team.png" />
   
 <title>Apatment | <?php echo $this->title; ?></title>
    <?php  require('appstart/buldle.php') ;
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if ($_SESSION['Login'] != true ) 
    {
      $_SESSION['message'] = "You must log in before viewing your profile page!";
      header("location: error.php");    
    };
    ?>
   <style type ="text/css">
    @media print{
    #no_print{display:none;}
    }
    </style>
    </head>
 <?php  require('appstart/munu.php') ?>
<body class="skin-blue-light sidebar-mini">
      <div class="wrapper">       
        <!-- Content Wrapper. Contains page content -->      
        <?php echo $this->body; ?>     
        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.1.0
          </div>
          <strong>Copyright &copy; 2017 <a href="">Apartment System</a>.</strong>
        </footer>      
      </div><!-- ./wrapper -->
</body>
</html>

