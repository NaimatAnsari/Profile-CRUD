<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="text-center mb-4">User Profile Form</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Name -->
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" name="username" class="form-control" id="Name" placeholder="Enter a name">
        </div>

        <!-- Designation -->
        <div class="mb-3">
            <label for="Designation" class="form-label">Designation</label>
            <input type="text" name="userdesignation" class="form-control" id="Designation" placeholder="Enter a designation">
        </div>

         <!-- Position Dropdown -->
    <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <select class="form-select" id="position" name="position" required>
            <option value="" selected disabled>Choose Position</option>
            <option value="Pro">Pro</option>
            <option value="Senior">Senior</option>
            <option value="Junior">Junior</option>
        </select>
    </div>

        <!-- Facebook Link -->
        <div class="mb-3">
            <label for="facebookLink" class="form-label">Facebook Link</label>
            <input type="url" name="fb_link" class="form-control" id="facebookLink" placeholder="https://facebook.com/username">
        </div>

        <!-- Instagram Link -->
        <div class="mb-3">
            <label for="instagramLink" class="form-label">Instagram Link</label>
            <input type="url" name="insta_link" class="form-control" id="instagramLink" placeholder="https://instagram.com/username">
        </div>

        <!-- LinkedIn Link -->
        <div class="mb-3">
            <label for="linkedinLink" class="form-label">LinkedIn Link</label>
            <input type="url" name="linkedin_link" class="form-control" id="linkedinLink" placeholder="https://linkedin.com/in/username">
        </div>

        <!-- Gmail Mailto Link -->
        <div class="mb-3">
            <label for="gmailLink" class="form-label">Gmail</label>
            <input type="email" name="email" class="form-control" id="gmailLink" placeholder="yourname@gmail.com">
        </div>

                <!-- Picture Upload -->
                <div class="mb-3">
            <label for="uploadPicture" class="form-label">Upload Picture</label>
            <input class="form-control w-25" type="file" name="image" id="uploadPicture">
        </div>

        <!-- Submit Button -->
         <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include 'db.php';
if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $designation = $_POST['userdesignation'];
    $postion = $_POST['position'];
    $facebook = $_POST['fb_link'];
    $instagram = $_POST['insta_link'];
    $linkedin = $_POST['linkedin_link'];
    $email = $_POST['email'];

    $image = $_FILES['image'];
    $imagename = $image['name'];
    $imagetemname = $image['tmp_name'];

    move_uploaded_file($imagetemname, 'upload/'.$imagename);

    $sql = "INSERT INTO profile(name, position, designation, fb_link, insta_link, linkedin_link, email, image) VALUES ('$name','$postion','$designation','$facebook','$instagram','$linkedin','$email','$imagename')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location:index.php?msg=Data Inserted Successfully');
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
    

    
}
?>