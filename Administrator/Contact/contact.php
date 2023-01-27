<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>


<?php
 include '../../Layout/header.php';
?> 
<?php
include("../../Layout/admin/admin-ui-header.php");
?>  
    

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
      <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
        
     </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">İletişim Bilgileri Düzenle</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
               <form action="contact_update.php" method="post" enctype="multipart/form-data">
                   
                   
                    <?php

                        $con->set_charset("utf8");

                        $sorgu = $con->query("SELECT * FROM contact");

                        if ($con->errno > 0) {
                            die("<b>Sorgu Hatası:</b> " . $con->error);
                        }

                        $cikti = $sorgu->fetch_array();
                        
                    ?>  
                        
                <div class="form-group">
                  <label>Gsm</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                  
                     <input value="<?php echo $cikti["gsm"]; ?>" placeholder="Telefon" class="form-control" name="contact_gsm" type="tel">
                      
                  </div>
                  <!-- /.input group -->
                </div>
                   
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input value="<?php echo $cikti["email"]; ?>" type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Email" required >
                  </div>   
                   
                    <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                    <input value="<?php echo $cikti["address"]; ?>" type="text" class="form-control" id="contact_address" name="contact_address" placeholder="Adres" required >
                  </div>  
                   
                   <div class="form-group">
                    <label for="exampleInputEmail1">Fax</label>
                    <input value="<?php echo $cikti["fax"]; ?>" type="text" class="form-control" id="contact_fax" name="contact_fax" placeholder="Fax" >
                  </div>  
                   
            
                   <div class="row">
                   
                   <button type="submit" class="btn btn-primary ml-auto mr-1">Güncelle</button>
                       
                   </div>
                   
                    
                   
                 </form>
                        
                       
                        
              </div>
              <!-- /.card-body -->
                
                <div class="card-footer row">
                
                </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 





<script>
$(function() {
  $('input[type="tel"]').inputmask({ alias: "phone", "clearIncomplete": true });
});
</script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3.7/dist/inputmask/inputmask.js"></script>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3.7/dist/inputmask/inputmask.extensions.js"></script>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3.7/dist/inputmask/inputmask.numeric.extensions.js"></script>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3.7/dist/inputmask/inputmask.date.extensions.js"></script>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3.7/dist/inputmask/inputmask.phone.extensions.js"></script>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3.7/dist/inputmask/jquery.inputmask.js"></script>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3.7/dist/inputmask/phone-codes/phone.js"></script>


<?php
include("../../Layout/admin/admin-ui-footer.php");
?>  
<?php
 include '../../Layout/footer.php';
?> 