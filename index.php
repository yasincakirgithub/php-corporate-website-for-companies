<html>

<head>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    
    
</head>  
    
<body>
    
    
<?php 
    
require('Database/db.php');

        $menu_information = $con->query("SELECT * FROM main_menu ORDER BY priority ASC;");
        if ($con->errno > 0) {
        die("<b>Sorgu Hatası:</b> " . $con->error);}
     
    
?>
    
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">YasinPress</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
<?php
        
             while( $cikti_menu = $menu_information->fetch_array() ){
                 
               if($cikti_menu["type"]=="link"){
                     
                 $page_information = $con->query("SELECT * FROM pages WHERE menu_id='".$cikti_menu["id"]."'");
                 $cikti_page = $page_information->fetch_array();
                     
                 echo "
                             <li class='nav-item'>
                                <a class='nav-link' href='Pages/".$cikti_menu["title"]."/".$cikti_page["route_url"]."'>".$cikti_menu["title"]." <span class='sr-only'>(current)</span></a>
                             </li>
                             ";
                
                }
                 
                 else{  
                     
                     $page_information = $con->query("SELECT * FROM pages WHERE menu_id='".$cikti_menu["id"]."'");
                     
                 
                    echo    "
                            <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                              ".$cikti_menu["title"]."
                            </a>
                            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
                     
                     while( $cikti_page = $page_information->fetch_array()){
                         
                          echo "
                             <a class='dropdown-item' href='Pages/".$cikti_menu["title"]."/".$cikti_page["route_url"]."'>".$cikti_page["title"]."</a>
                   
                        ";
                         
                     }; 
                     
                  
                             
                   echo "</div>
                          </li>";    
                 
                }     
                 
     }    
?>
            
    </ul>
  </div>
</nav>    
    
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>       
</body>    


</html>