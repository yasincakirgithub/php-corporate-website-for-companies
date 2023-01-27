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
                <h3 class="card-title">Sosyal Medya</h3>

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
               <form action="social_links_update.php" method="post" enctype="multipart/form-data">
                   
                   
                    <?php

                        $con->set_charset("utf8");

                        $sorgu = $con->query("SELECT * FROM social_links");

                        if ($con->errno > 0) {
                            die("<b>Sorgu Hatası:</b> " . $con->error);
                        }

                        $cikti = $sorgu->fetch_array();
                        
                    ?>  
                        
               <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
                    <input value="<?php echo $cikti["facebook_url"]; ?>" type="text" class="form-control" id="social_links_facebook" name="social_links_facebook" required >
                  </div>  
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Youtube</label>
                    <input value="<?php echo $cikti["youtube_url"]; ?>" type="text" class="form-control" id="social_links_youtube" name="social_links_youtube" required >
                  </div>   
                   
                    <div class="form-group">
                    <label for="exampleInputEmail1">Twitter</label>
                    <input value="<?php echo $cikti["twitter_url"]; ?>" type="text" class="form-control" id="social_links_twitter" name="social_links_twitter"  required >
                  </div>  
                   
                   <div class="form-group">
                    <label for="exampleInputEmail1">Google</label>
                    <input value="<?php echo $cikti["google_url"]; ?>" type="text" class="form-control" id="social_links_google" name="social_links_google"  >
                  </div> 
                   
                      <div class="form-group">
                    <label for="exampleInputEmail1">İnstagram</label>
                    <input value="<?php echo $cikti["instagram_url"]; ?>" type="text" class="form-control" id="social_links_instagram" name="social_links_instagram"  >
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