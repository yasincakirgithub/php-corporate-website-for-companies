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
                <h3 class="card-title">Slider Düzenle</h3>

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
                            <th>Açıklama</th>
                            <th>Resim</th>
                            <th>Taglar</th>
                            <th>Tarih</th>
                            <th>Yazar</th>
                            <th>Düzenle</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php

                        $con->set_charset("utf8");

                        $sorgu = $con->query("SELECT * FROM news");

                        if ($con->errno > 0) {
                            die("<b>Sorgu Hatası:</b> " . $con->error);
                        }

                      
                        
                        
                        
                        while(  $cikti = $sorgu->fetch_array() ) {
                            
                        $id= $cikti["author"];   
                        $sorgu2 = $con->query("SELECT * FROM members WHERE id='$id' ");  
                        $cikti2 = $sorgu2->fetch_array();     
                               
                        echo "<tr>
                        <td>". $cikti["id"] ."</td>
                        <td>". $cikti["title"]."</td>
                        <td>". $cikti["description"]."</td>
                        <td><img style='width:60px;height:40px' src='". $cikti["image"]."'/></td>
                        <td>". $cikti["tags"]."</td>
                        <td>". $cikti["date"] ."</td>
                        <td>". $cikti2["full_name"]."</td>
                        
                        <td style='position:relative'>
                        <i onclick='delete_news(".$cikti["id"].")'  class='ml-2 fa fa-trash' style='cursor:pointer' aria-hidden='true'></i>
                        <form method='POST' action='edit.php' >
                        <button type='submit' style='position:absolute;right:30px;bottom:20px;background-color:transparent;border:0' >
                        <input type='hidden' id='news_id' name='news_id' value='".$cikti["id"]."' />
                        <i onclick='edit_news(".$cikti["id"].")' class='ml-3 fa fa-edit' style='cursor:pointer' aria-hidden='true'></i>
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
 
function delete_news(value){
    
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
                url: "/Administrator/News/delete_news.php",
                method: "POST",
                data: {
                    'news_id': parseInt(value),
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
