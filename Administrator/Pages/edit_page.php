
<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>


<?php
 include '../../Layout/header.php';
?> 
<?php
include("../../Layout/admin/admin-ui-header.php");

$page_id = $_REQUEST['page_id'];

?>  

 <?php

     $con->set_charset("utf8");

     $sorgu = $con->query("SELECT * FROM pages WHERE id='".$page_id."' ");

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
                <h3 class="card-title">Sayfa Oluştur</h3>

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
               <form action="settings_edit_page.php" method="post" enctype="multipart/form-data">
                   
                   
            <input  value="<?php echo $page_id; ?>"  type="hidden" class="form-control" id="page_id" name="page_id" required >          
                   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sayfa Başlığı</label>
                  <input value="<?php echo $cikti["title"]; ?>" onkeyup="set_url()" type="text" class="form-control" id="page_title" name="page_title" placeholder="Başlık">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Url</label>
                    <input value="<?php echo $cikti["route_url"]; ?>" type="text" class="form-control" id="page_route_url" name="page_route_url" placeholder="Url" readonly>
                  </div>
                   
                   <div class="form-group">
                    <label for="exampleInputEmail1">Öncelik</label>
                    <input value="<?php echo $cikti["priority"]; ?>" type="number" max="10" min="1" class="form-control" id="priority" name="priority" placeholder="Öncelik" required>
                  </div>
                
                    <div class="form-group">
                    <label for="exampleInputFile">Resim </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input value="<?php echo $cikti["image"]; ?>" type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" required>
                        <label class="custom-file-label" for="exampleInputFile">Dosya Seç</label>
                      </div>
                    </div>
                  </div>
                   
                   
                  <textarea id="summernote" name="editordata"><?php echo $cikti["description"]; ?></textarea>
                   
                
                   
                    <div class="form-group mt-2">
                        
                    <label for="exampleInputEmail1">Menu</label>
                        
                        <select class="form-control" name="menu_id" required>
                            
                        <?php

                        $con->set_charset("utf8");

                        $sorgu = $con->query("SELECT * FROM main_menu WHERE type='dropdown' ");

                        if ($con->errno > 0) {
                            die("<b>Sorgu Hatası:</b> " . $con->error);
                        }

                        while(  $menu = $sorgu->fetch_array() ) {
                             
                        $selected_menu ="";
                        if($menu["id"] == $cikti["menu_id"]){
                            $selected_menu = "selected";
                        };   
                            
                        echo "
                        
                        <option ".$selected_menu." value='". $menu["id"] ."' >". $menu["title"] ."</option> 
                       
                       ";
                        };
                        
                        $sorgu->close();
                        $con->close();

                        ?>       

                        </select>
                        
                  </div>
                   
                   
                      <div class="form-group clearfix ">
                      <div class="icheck-primary d-inline">
                        <input <?php if( $cikti["is_active"] == 1)
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