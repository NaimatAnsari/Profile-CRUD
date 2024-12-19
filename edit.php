
<?php
include 'db.php';
$id = $_GET['id'];
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

    if ($imagename) {
        move_uploaded_file($imagetemname, 'upload/'.$imagename);

        $sql = "UPDATE profile SET name='$name',position='$postion',designation='$designation',fb_link='$facebook',insta_link='$instagram',linkedin_link='$linkedin',email='$email',image='$imagename' WHERE id = $id";

    } else {

        $sql = "UPDATE profile SET name='$name',position='$postion',designation='$designation',fb_link='$facebook',insta_link='$instagram',linkedin_link='$linkedin',email='$email', WHERE id = $id";

        echo '<h1>Data not insert</h1>';
    }




    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location:index.php?msg=Data Inserted Successfully');
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
    

    
}
?>

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
    <?php
    $sql = "SELECT * FROM profile WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
<div class="container py-5">
    <h2 class="text-center mb-4">User Profile Form</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Name -->
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" name="username" class="form-control" id="Name" value="<?php echo $row['name']; ?>" placeholder="Enter a name">
        </div>

        <!-- Designation -->
        <div class="mb-3">
            <label for="Designation" class="form-label">Designation</label>
            <input type="text" name="userdesignation" class="form-control" id="Designation" value="<?php echo $row['designation']; ?>" placeholder="Enter a designation">
        </div>

         <!-- Position Dropdown -->
    <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <select class="form-select" id="position" name="position" value="<?php echo $row['position']; ?>" required>
            <option value="" selected disabled>Choose Position</option>
            <option value="Pro" <?php echo ($row['position'] == 'Pro') ? 'selected' : ''; ?>>Pro</option>
            <option value="Senior" <?php echo ($row['position'] == 'Senior') ? 'selected' : ''; ?>>Senior</option>
            <option value="Junior" <?php echo ($row['position'] == 'Junior') ? 'selected' : ''; ?>>Junior</option>
        </select>
    </div>

        <!-- Facebook Link -->
        <div class="mb-3">
            <label for="facebookLink" class="form-label">Facebook Link</label>
            <input type="url" name="fb_link" class="form-control" id="facebookLink" value="<?php echo $row['fb_link']; ?>" placeholder="https://facebook.com/username">
        </div>

        <!-- Instagram Link -->
        <div class="mb-3">
            <label for="instagramLink" class="form-label">Instagram Link</label>
            <input type="url" name="insta_link" class="form-control" id="instagramLink" value="<?php echo $row['insta_link']; ?>" placeholder="https://instagram.com/username">
        </div>

        <!-- LinkedIn Link -->
        <div class="mb-3">
            <label for="linkedinLink" class="form-label">LinkedIn Link</label>
            <input type="url" name="linkedin_link" class="form-control" id="linkedinLink" value="<?php echo $row['linkedin_link']; ?>" placeholder="https://linkedin.com/in/username">
        </div>

        <!-- Gmail Mailto Link -->
        <div class="mb-3">
            <label for="gmailLink" class="form-label">Gmail</label>
            <input type="email" name="email" class="form-control" id="gmailLink" value="<?php echo $row['email']; ?>" placeholder="yourname@gmail.com">
        </div>

                <!-- Picture Upload -->
<div class="mb-3">
    <label for="uploadPicture" class="form-label">Upload Picture</label>
    <input class="form-control w-25" type="file" name="image" id="uploadPicture">
    <?php
     if (!empty($row['image'])){?>
        <div class="mt-2">
            <label class="form-label">Current Image</label>
            <img src="upload/<?php echo $row['image']; ?>" alt="Current Image" class="img-thumbnail" style="max-width: 150px;">
        </div>
  
  <?php  } ?>
</div>

        <!-- Submit Button -->
         <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>