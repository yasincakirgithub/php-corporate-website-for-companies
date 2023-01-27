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
              <div class="card-body row  col-lg-12">
                  
                  
                  
                   <?php
                        $sayac=0;

                        $con->set_charset("utf8");

                        $sorgu = $con->query("SELECT * FROM management_council");

                        if ($con->errno > 0) {
                            die("<b>Sorgu Hatası:</b> " . $con->error);
                        }

                        while(  $cikti = $sorgu->fetch_array() ) {
                        
                         
                          echo "<div class='card col-lg-4' style='position:relative'>
                            <img class='card-img-top' src='".$cikti["image"]."' alt='Card image cap'>
                            <div class='card-body'>
                              <h5 class='card-title'> ".$cikti["full_name"]." / <b>".$cikti["degree"]."</b>  </h5>
                              
                              
                           <form method='post' action='edit_mcuser.php'>      
                              <i onclick='delete_mcuser(".$cikti["id"].")'  class='ml-5 mr-3 fa fa-trash' style='position:absolute;right:20px;bottom:20px;cursor:pointer' aria-hidden='true'></i> 
                           
                           
                           <input type='hidden' id='user_id' name='user_id' value='".$cikti["id"]."' />
                           <button style='position:absolute;right:0;bottom:20px;background-color:transparent;border:0' type='submit'><i onclick='edit_page(".$cikti["id"].")' class=' fa fa-edit' style='cursor:pointer' aria-hidden='true'></i></button> 
                          
                          </form>
                           
                            </div>  
                          </div> " ;
                            
                        }
                        
                        $sorgu->close();
                        $con->close();

                   ?>      
                      
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
   
function delete_mcuser(value){
    
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
                url: "/Administrator/ManagementCouncil/delete_mcuser.php",
                method: "POST",
                data: {
                    'user_id': parseInt(value),
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