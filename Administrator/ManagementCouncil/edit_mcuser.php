
<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>


<?php
 include '../../Layout/header.php';
?> 
<?php
include("../../Layout/admin/admin-ui-header.php");

$user_id = $_REQUEST['user_id'];

?>  

 <?php

     $con->set_charset("utf8");

     $sorgu = $con->query("SELECT * FROM management_council WHERE id='".$user_id."' ");

      if ($con->errno > 0) {die("<b>Sorgu Hatası:</b> " . $con->error);}

    $cikti = $sorgu->fetch_array();
                      
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
                <h3 class="card-title">Yönetim Kadrosu</h3>

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
              
                  
                <form action="settings_edit_mc.php" method="post" enctype="multipart/form-data">
                     
                <input  value="<?php echo $user_id; ?>"  type="hidden" class="form-control" id="user_id" name="user_id" required >    
                    
                   
                <div class="form-group">
                    <label for="exampleInputEmail1">İsim Soyisim</label>
                    <input value="<?php echo $cikti["full_name"]; ?>" type="text" class="form-control" id="full_name" name="full_name" placeholder="İsim Soyisim" required >
                  </div>   
                   
                    <div class="form-group">
                    <label for="exampleInputEmail1">Unvan</label>
                    <input  value="<?php echo $cikti["degree"]; ?>"  type="text" class="form-control" id="degree" name="degree" placeholder="Unvan" required >
                  </div>  
                   
                    
                 <div class="form-group">
                    <label for="exampleInputFile">Resim </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input  value="<?php echo $cikti["image"]; ?>" type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" required>
                         <label class="custom-file-label" for="exampleInputFile">Dosya Seç</label>
                           
                        </div>
                    </div>
                     <a href="<?php echo $cikti["image"]; ?>">Önceki Fotoğrafı Görmek İçin Tıklayın</a>  
                  </div>
                   

                   <div class="row">
                   
                   <button type="submit" class="btn btn-primary ml-auto mr-1">Kaydet</button>
                       
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





<?php
include("../../Layout/admin/admin-ui-footer.php");
?>  
<?php
 include '../../Layout/footer.php';
?> 