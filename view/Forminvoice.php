 <style type="text/css">
@media print{
#no_print{display:none;}
}
</style>
 <div class="col-md-12">
     <div class="box box-solid">               
        <center>
         <?php require('Formprintinvoice.php') ?>
        </center>
      </div><!-- /.box -->
  </div><!-- ./col -->
 <div id="no_print">
    <center>
        <button type="submit" class="btn btn-success" value="Print" onclick="window.print();"><i class="fa fa-print"></i> พิมพ์ใบแจ้งหนี้</button>
                    <!--<button type="submit" class="btn btn-primary">
                      <i class="fa fa-arrow-circle-down" value="Download"></i> ดาว์นโหลดใบแจ้งหนี้</button>-->
     </center>
</div>
                   