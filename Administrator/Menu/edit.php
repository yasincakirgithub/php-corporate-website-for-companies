
<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>


<?php
 include '../../Layout/header.php';
?> 
<?php
include("../../Layout/admin/admin-ui-header.php");

$menu_id = $_REQUEST['menu_id'];

?>  

 <?php

     $con->set_charset("utf8");

     $sorgu = $con->query("SELECT * FROM main_menu WHERE id='".$menu_id."' ");

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
                <h3 class="card-title">Menu Düzenle</h3>

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
               <form action="edit_menu.php" method="post" enctype="multipart/form-data">
                   
                <input  value="<?php echo $menu_id; ?>"  type="hidden" class="form-control" id="menu_id" name="menu_id" required >       
                   
                    <div class="form-group">
                    <label for="exampleInputEmail1">Başlık</label>
                    <input onkeyup="set_url()" value="<?php echo $cikti["title"]; ?>" type="text" class="form-control" id="title" name="title" placeholder="Başlık" required>
                  </div>
                   
                   <div class="form-group">
                    <label for="exampleInputEmail1">Menu Tipi</label>
                       <select class="form-control" name="type" id="type">
                       
                       <option <?php if( $cikti["type"] == "dropdown"){ echo 'selected'; }; ?>  value="dropdown">dropdown</option>
                       <option  <?php if( $cikti["type"] == "link"){ echo 'selected'; }; ?> value="link" >link</option>
                      
                       </select>
                  </div>
                   
                   <div class="form-group">
                    <label for="exampleInputEmail1">Öncelik</label>
                    <input value="<?php echo $cikti["priority"]; ?>" type="number" class="form-control" id="priority" name="priority" placeholder="Öncelik" required>
                  </div>
             
                   
                    <div class="form-group clearfix">
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
                   
                   <?php 
                   
                        if( $cikti["type"] == "link"){ 


                        }; 
                   ?>
                   
                   <div class="form-group" id="url-show" style="display:none">
                    <label for="exampleInputEmail1">Url</label>
                    <input type="text" class="form-control" id="page_route_url" name="page_route_url" placeholder="Url" readonly>
                  </div>   
                   
                  <div class="form-group" id="image-show">
                    <label for="exampleInputFile">Resim </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" >
                        <label class="custom-file-label" for="exampleInputFile">Dosya Seç</label>
                      </div>
                    </div>
                  </div>   
                   
                   <textarea id="summernote" name="editordata">
                   <?php
                       
                        $con->set_charset("utf8");

                        $sorgu2 = $con->query("SELECT * FROM pages WHERE menu_id='".$menu_id."' ");

                        if ($con->errno > 0) {die("<b>Sorgu Hatası:</b> " . $con->error);}

                        $page = $sorgu2->fetch_array();
                       
                       echo $page['description'];

                       
                    ?>
                   
                   </textarea>
                   
                   
                   
                   
                   
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
    
 $( "#type" ).change(function() {
    
    if($(this).val()=="link"){
        $('.note-editor').show();
        $('#page_route_url').show();
        $('#url-show').show();
        $('#image-show').show();
        set_url()
        
    }
    else{
        $('.note-editor').hide();
        $('#page_route_url').hide();
        $('#url-show').hide();
        $('#image-show').hide();
        set_url()
    }
  
}); 
    
    
  
setTimeout(function(){ 
    
    if($('#type').val()=="link"){
    
    $('.note-editor').show();
        $('#page_route_url').show();
        $('#url-show').show();
        $('#image-show').show();
        set_url()  
        
   }
    else{
        $('.note-editor').hide();
        $('#page_route_url').hide();
        $('#url-show').hide();
        $('#image-show').hide();
        set_url()
        
    }
    
}, 100);    
    
      
</script>


<script>

    function set_url(){
        
        var title = $('#title').val()
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