
<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>


<?php
 include '../../Layout/header.php';
?> 
<?php
include("../../Layout/admin/admin-ui-header.php");

$news_id = $_REQUEST['news_id'];

?>  

 <?php

     $con->set_charset("utf8");

     $sorgu = $con->query("SELECT * FROM news WHERE id='".$news_id."' ");

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
                <h3 class="card-title">Slider Oluştur</h3>

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
                <form action="edit_news.php" method="post" enctype="multipart/form-data">
                   
                <input type="hidden" id="news_id" name="news_id"  value="<?php echo $news_id; ?>"  required > 
                  
                  <input type="hidden" id="author" name="author" value="<?php echo $cikti["id"] ?>" required/>
                   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Başlık</label>
                    <input value="<?php echo $cikti["title"] ?>" type="text" class="form-control" id="title" name="title" placeholder="Başlık" required>
                  </div>
                   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                      <textarea  class="form-control" cols="30" rows="10" name="description" placeholder="Açıklama" required><?php echo $cikti["description"] ?></textarea>
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
                   
                     <div class="form-group">
                    <label >Tags </label>
                   <select name="tags" id="tags" class="form-control select" multiple>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                      <option value="5">Five</option>
                      <option value="6">Six</option>
                      <option value="7">Seven</option>
                      <option value="8">Eight</option>
                    </select> 
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