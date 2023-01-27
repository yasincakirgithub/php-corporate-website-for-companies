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
                <h3 class="card-title">Sayfa Sil</h3>

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
         
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Başlık</th>
                            <th>Url</th>
                            <th>Aktiflik</th>
                            <th>Öncelik</th>
                            <th>Resim</th>
                            <th>Menu Adı</th>
                            <th>Düzenle</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php

                        $con->set_charset("utf8");

                        $sorgu = $con->query("SELECT * FROM pages");
                        
                       
                        
                        if ($con->errno > 0) {
                            die("<b>Sorgu Hatası:</b> " . $con->error);
                        }

                        while(  $cikti = $sorgu->fetch_array() ) {
                            
                        $sorgu2 = $con->query("SELECT * FROM main_menu WHERE id=".$cikti['menu_id']." ");
                        $menu = $sorgu2->fetch_array();    
                            
                        if($menu["type"]=="dropdown"){
                            
                          echo "<tr>
                        <td>". $cikti["id"] ."</td>
                        <td>". $cikti["title"]."</td>
                        <td>". $cikti["route_url"]."</td>
                        <td>". $cikti["is_active"]."</td>
                        <td>". $cikti["priority"] ."</td>
                        <td><img style='width:40px;height:40px' src='". $cikti["image"]."'/>
                        <td>". $menu["title"] ."</td>
                        
                        
                        <td style='position:relative'>
                        <i onclick='delete_page(".$cikti["id"].")'  class='ml-3 fa fa-trash' style='cursor:pointer' aria-hidden='true'></i>
                        
                        <form method='POST' action='edit_page.php' >
                        <button type='submit' style='position:absolute;right:50px;bottom:20px;background-color:transparent;border:0' >
                        <input type='hidden' id='page_id' name='page_id' value='".$cikti["id"]."' />
                        <i onclick='edit_page(".$cikti["id"].")' class='ml-3 fa fa-edit' style='cursor:pointer' aria-hidden='true'></i>
                        </button>
                        </form>
                        </td> </tr>";    
                            
                        }    
                      
                        };
                        
                        $sorgu->close();
                        $con->close();

                        ?>    
                    </tbody>
                </table>
              
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

    
    
    
function delete_page(value){
    
      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
      if (result.isConfirmed) {
          
         $.ajax({
                url: "/Administrator/Pages/delete_page.php",
                method: "POST",
                data: {
                    'page_id': parseInt(value),
                },
                success: function (res) {
                    
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                    
                    
                    window.location.href = "";
                    
                    
                }
            });
          
          
          
          
      }
    })    
}
    

    
    
</script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
include("../../Layout/admin/admin-ui-footer.php");
?>  


<?php
 include '../../Layout/footer.php';
?> 


