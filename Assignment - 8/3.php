<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the upload directory
    $uploadDir = 'uploads/';

    // Get the uploaded file details
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];

    // Check if the uploaded file is an image
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($fileType, $allowedTypes)) {
        // Check if the file size is less than 2MB (2 * 1024 * 1024 bytes)
        if ($fileSize < 2097152) {
            // Generate a unique name for the uploaded file
            $uniqueName = uniqid() . '_' . $fileName;

            // Move the uploaded file to the upload directory with the unique name
            if (move_uploaded_file($fileTmpName, $uploadDir . $uniqueName)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File size should be less than 2MB.";
        }
    } else {
        echo "Only JPEG, PNG, and GIF images are allowed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        Select image to upload (Max 2MB):
        <input type="file" name="image" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>