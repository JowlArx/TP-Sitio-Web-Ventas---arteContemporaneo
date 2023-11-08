
<div class="list">
<?php
    while($producto = mysqli_fetch_assoc($producto)){
?> 

     <div class="card">
        <div class="card-img"><img src="uploads/<?php echo $row["imagen"];?>"></div>
        <div class="card-title"><?php echo $row["name"];?></div>
        <div class="card-subtitle"><?php echo $row["description"];?></div>
        <hr class="card-divider">
        <div class="card-footer">
            <div class="card-price"><span>$</span><?php echo $row["precio"];?></div>
            <button class="card-btn">
              <i class='bx bx-plus-medical'></i>
            </button>
        </div>
    </div>

    <?php
    }
    ?>  
    
</div>
   <div>
       <ul class="listPage">
       <li>1</li>
       </ul>
   </div>