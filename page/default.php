<?php    $veribul=$db->prepare("SELECT*FROM sayfalar WHERE sayfa_id=:id");
 $veribul->execute(array(
   'id'=>$sayfa_id
 ));
 while($vericek=$veribul->fetch(PDO::FETCH_ASSOC)){?>
   <div class="col-lg-12 col-md-12 col-xs-12">
       <div class="row">
   <div class="container">
     <h3>
     <?php

     echo  $vericek["sayfa_baslik"]; ?> </h3>





   <p><?php
   echo $vericek["sayfa_icerik"];
   ?></p>
   </div>
   </div>
   </div>
<?php } ?>
