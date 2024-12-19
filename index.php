<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- FontAwesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>User Profile</title>
</head>
<style>
    body{
    background:#eee;
}

.card{
    border:none;

    position:relative;
    overflow:hidden;
    border-radius:8px;
    cursor:pointer;
}

.card:before{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#E1BEE7;
    transform:scaleY(1);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:after{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#8E24AA;
    transform:scaleY(0);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:hover::after{
    transform:scaleY(1);
}


.fonts{
    font-size:11px;
}

.social-list{
    display:flex;
    list-style:none;
    justify-content:center;
    padding:0;
}

.social-list li{
    padding:10px;
    color:#8E24AA;
    font-size:19px;
}


.buttons a:nth-child(1){
       border:1px solid #8E24AA !important;
       color:#8E24AA;
       height:40px;
}

.buttons a:nth-child(1):hover{
       border:1px solid #8E24AA !important;
       color:#fff;
       height:40px;
       background-color:#8E24AA;
}

.buttons a:nth-child(2){
       border:1px solid #8E24AA !important;
       background-color:#8E24AA;
       color:#fff;
        height:40px;
}
</style>
<body>
<div class="container mt-5">
    
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="form.php" class="btn btn-dark">Add New Profile</a>
            <h2 class="py-4 text-center fw-bold fw-bolder">User Profile</h2>
        </div>
    </div>
    
    <?php
    include 'db.php';
    $sql = "SELECT * FROM profile";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {?>
     
     <div class="row d-flex justify-content-center py-5">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="upload/<?php echo $row['image']; ?>" width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $row['position']; ?></span>
                    <h5 class="mt-2 mb-0"><?php echo $row['name']; ?></h5> 
                    <h6 class="mt-2" ><?php echo $row['designation']; ?></h6>   
                    
                    
                     <ul class="social-list">
                       <a href="<?php echo $row['fb_link']; ?>"><li><i class="fa fa-facebook"></i></li></a>
                        <a href="<?php echo $row['insta_link']; ?>"><li><i class="fa fa-instagram"></i></li></a>
                        <a href="<?php echo $row['linkedin_link']; ?>"><li><i class="fa fa-linkedin"></i></li></a>
                        <a href="mailto:<?php echo $row['email']; ?>"><li><i class="fa fa-regular fa-envelope"></i></li></a>
                    </ul>
                    
                    <div class="buttons">
                        
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary px-4">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-primary px-4 ms-3">Delete</a>
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
     
     <?php
    }
    ?>

    
    
</div>
<!-- Bootstrap Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Jquery link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>