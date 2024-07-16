<?php

include_once 'config/dbconn.php';


// load data on scroll 21-05-23 
$sql = "SELECT * FROM join_professionals LIMIT ".$_POST['offset'].",".$_POST['limit']."";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){

    $string = strip_tags($row["listing_about"]); 
    $length = strlen($string);

 echo  '<div class="row justify-content-center mt-2">
 <div class="col-md-4 col-sm-12">
     <div class="img-box-white" style="">
         <div class="image-round-bg" style="">
             <img src="/assets/files/' . $row["image"].'" alt="" style="">
         </div>
     </div>
 </div>
 <div class="col-md-8 col-sm-12"
     style="background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;">
     <div class="list-right-box">
         <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-12">
                 <p class="text-capitalize" style=" font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;">
                    '.$row["name"].'
                 </p>
                 <p style="color: grey;">
                     '.$row["service"].'
                 </p>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-12" style=" text-align: end;">
                 <strong style="color: #006aff;"><i class="fad fa fa-check-circle me-2" style="--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  "></i>Verified</strong>
             </div>
         </div>
         <p class="mt-2" style="    font-size: 14px;color: grey;">
          ' .($length > 180  ? substr($string, 0, 100): $row["listing_about"]).'
         
        
         </p>
         <div class="row mt-3 align-items-center">
             <div class="col-md-12 col-sm-12 d-flex justify-content-between" style=" align-items: baseline;">
                 <div class="d-flex align-items-center">
                     <p style="  font-weight: 400;     padding: 3px 10px; font-size: 14px; color: #343C6A;">
                         Rating </p>
                     <i class="fa-solid fa-star"></i>
                     <i class="fa-solid fa-star"></i>
                     <i class="fa-solid fa-star"></i>
                     <i class="fa-solid fa-star"></i>
                     <i class="fa-solid fa-star"></i>
                 </div>
                 <div class="col-md-6 col-sm-6" style=" text-align: end;">
                     <a href="professional/'.$row["id"].'/'.$row["name"].'"><button
                             class="mt-2 view-prof-btn">View</button></a>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>';
}



/*foreach ($result as $key => $row) {
    ?>
    <div class="row justify-content-center mt-2">
        <div class="col-md-4 col-sm-12">
            <div class="img-box-white" style="">
                <div class="image-round-bg" style="">
                    <img src="<?php echo "/assets/files/" . $row["image"]; ?>" alt="" style="">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12"
            style="background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;">
            <div class="list-right-box">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <p class="text-capitalize" style=" font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;">
                            <?php echo $row['name']; ?>
                        </p>
                        <p style="color: grey;">
                            <?php echo $row['service']; ?>
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style=" text-align: end;">
                        <strong style="color: #006aff;"><i class="fad fa fa-check-circle me-2" style="--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  "></i>Verified</strong>
                    </div>
                </div>
                <p class="mt-2" style="    font-size: 14px;color: grey;">
                    <?php
                    $string = strip_tags($row['listing_about']);
                    if (strlen($string) > 180) {
                        $string_cut = substr($string, 0, 100);
                        echo $string_cut . "...";
                    } else {
                        echo $row['listing_about'];
                    } ?>
                </p>
                <div class="row mt-3 align-items-center">
                    <div class="col-md-12 col-sm-12 d-flex justify-content-between" style=" align-items: baseline;">
                        <div class="d-flex align-items-center">
                            <p style="  font-weight: 400;     padding: 3px 10px; font-size: 14px; color: #343C6A;">
                                Rating </p>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-md-6 col-sm-6" style=" text-align: end;">
                            <a href="professional/<?php echo $row['id']; ?>/<?php echo $row['name']; ?>"><button
                                    class="mt-2 view-prof-btn">View</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
*/