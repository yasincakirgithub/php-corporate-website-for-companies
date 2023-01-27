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
         
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Açıklama</th>
                            <th>Aktiflik</th>
                            <th>Resim</th>
                            <th>Grup</th>
                            <th>Düzenle</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php

                        $con->set_charset("utf8");

                        $sorgu = $con->query("SELECT * FROM images");

                        if ($con->errno > 0) {
                            die("<b>Sorgu Hatası:</b> " . $con->error);
                        }

                        
                        while(  $cikti = $sorgu->fetch_array() ) {
                            
//                        $id= $cikti["author"];   
//                        $sorgu2 = $con->query("SELECT * FROM members WHERE id='$id' ");  
//                        $cikti2 = $sorgu2->fetch_array();     
                               
                        echo "<tr>
                        <td>". $cikti["id"] ."</td>
                        <td>". $cikti["description"]."</td>
                        <td>". $cikti["is_visible"]."</td>
                        <td><img style='width:60px;height:40px' src='". $cikti["url"]."'/></td>
                        <td>". $cikti["group_id"]."</td>
                        
                        <td style='position:relative'>
                        <i onclick='delete_images(".$cikti["id"].")'  class='ml-2 fa fa-trash' style='cursor:pointer' aria-hidden='true'></i>
                        <form method='POST' action='edit.php' >
                        <button type='submit' style='position:absolute;left:60px;bottom:20px;background-color:transparent;border:0' >
                        <input type='hidden' id='image_id' name='image_id' value='".$cikti["id"]."' />
                        <i onclick='edit_images(".$cikti["id"].")' class='ml-3 fa fa-edit' style='cursor:pointer' aria-hidden='true'></i>
                        </button>
                        </form>
                        </td> 
                        
                        </tr>";
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
 
function delete_images(value){
    
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
                url: "/Administrator/Images/delete_images.php",
                method: "POST",
                data: {
                    'image_id': parseInt(value),
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
