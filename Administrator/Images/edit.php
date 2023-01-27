
<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>


<?php
 include '../../Layout/header.php';
?> 
<?php
include("../../Layout/admin/admin-ui-header.php");

$image_id = $_REQUEST['image_id'];

?>  

 <?php

     $con->set_charset("utf8");

     $sorgu = $con->query("SELECT * FROM images WHERE id='".$image_id."' ");

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
                <h3 class="card-title">Resim Düzenle</h3>

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
                  
                  <form action="edit_images.php" method="post" enctype="multipart/form-data">
                      
                 <input  value="<?php echo $image_id; ?>"  type="hidden" class="form-control" id="image_id" name="image_id" required >              
                      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <input value="<?php echo $cikti["description"]; ?>" type="text" class="form-control" id="description" name="description" placeholder="Açıklama" required>
                  </div>
                
                
                   <div class="form-group">
                    <label for="exampleInputFile">Resim </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input  type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" required>
                        <label class="custom-file-label" for="exampleInputFile">Dosya Seç</label>
                      </div>
                    </div>
                  </div>
                   
                    <div class="form-group">
                        
                    <label for="exampleInputEmail1">Galeri Grubu</label>
                        
                        <select class="form-control" name="group">
                            
                        <?php

                        $con->set_charset("utf8");

                        $sorgu = $con->query("SELECT * FROM image_group");

                        if ($con->errno > 0) {
                            die("<b>Sorgu Hatası:</b> " . $con->error);
                        }

                        while(  $cikti2 = $sorgu->fetch_array() ) {
                            
                        $selected_string = "";
                        if($cikti2["id"]==$cikti["group_id"]){ 
                             $selected_string = "selected";
                        };
                          
                        echo "<option ".$selected_string." value='". $cikti2["id"] ."' >". $cikti2["name"] ."</option> ";
                       
                        };
                        
                        $sorgu->close();
                        $con->close();

                        ?>       

                        </select>
                        
                  </div>
                   
                     
                 <div class="form-group clearfix">
                       <div class="icheck-primary d-inline">
                        <input <?php if( $cikti["is_visible"] == 1)
                                    { echo 'checked'; }; 
                               ?>  
                               value="1" type="checkbox" id="is_active" name="is_active" >
                        <label for="checkboxPrimary1">
                        </label>
                      </div>
                      
                      <div class="icheck-primary d-inline">
                        <label for="checkboxPrimary3">
                          Aktif
                        </label>
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



<script>

    
    function set_url(){
        
        
        var title = $('#page_title').val()
        var url = title.replaceAll(" ","-");
        url = url.toLowerCase()
        
        $('#page_route_url').val(url+".php")
        
    }
   

</script>





<?php
include("../../Layout/admin/admin-ui-footer.php");
?>  
<?php
 include '../../Layout/footer.php';
?> 