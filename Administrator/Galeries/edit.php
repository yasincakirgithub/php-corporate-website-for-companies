
<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>


<?php
 include '../../Layout/header.php';
?> 
<?php
include("../../Layout/admin/admin-ui-header.php");

$galery_id = $_REQUEST['galery_id'];

?>  

 <?php

     $con->set_charset("utf8");

     $sorgu = $con->query("SELECT * FROM image_group WHERE id='".$galery_id."' ");

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
                <h3 class="card-title">Galeri Düzenle</h3>

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
              
                    <form action="edit_galeries.php" method="post" enctype="multipart/form-data">
                        
                  <input  value="<?php echo $galery_id; ?>"  type="hidden" class="form-control" id="galery_id" name="galery_id" required >        
                        
                  <div class="form-group">
                    <label for="exampleInputEmail1">İsim</label>
                    <input value="<?php echo $cikti["name"]; ?>"  type="text" class="form-control" id="name" name="name" placeholder="Galeri İsmi" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <input  value="<?php echo $cikti["description"]; ?>" type="text" class="form-control" id="description" name="description" placeholder="Açıklama" required>
                  </div>
                   
                   <div class="form-group">
                    <label for="exampleInputFile">Resim </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" required>
                        <label class="custom-file-label" for="exampleInputFile">Dosya Seç</label>
                      </div>
                    </div>
                  </div>
                   
                   <div class="row mr-1">
                   <button type="submit" class="btn btn-primary ml-auto">Kaydet</button>
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