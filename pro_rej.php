<?php
// Include database configuration
include 'config.php';
session_start();

// Step 2: Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 3: Retrieve Form Data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["cpassword"];
    $job_name = $_POST["job_name"];
    $description = $_POST["description"];
    $company_name = $_POST["company_name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Handle File Upload
    $target_directory = "uploads/"; // Change this to your desired directory
    $target_file = $target_directory . basename($_FILES["profile_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if($check === false) {
        echo "Error: File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Error: Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_image"]["size"] > 100000000) {
        echo "Error: Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_formats = array("jpg", "jpeg", "png", "gif");
    if(!in_array($imageFileType, $allowed_formats)) {
        echo "Error: Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Error: Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["profile_image"]["name"])). " has been uploaded.";
        } else {
            echo "Error: Sorry, there was an error uploading your file.";
        }
    }

    // Validate password match
    if ($password != $confirm_password) {
        echo "Error: Passwords do not match.";
        exit;
    }

    // Step 4: Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Step 5: Sanitize and Validate Form Data
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $username = mysqli_real_escape_string($conn, $username); // New field
    $job_name = mysqli_real_escape_string($conn, $job_name);
    $description = mysqli_real_escape_string($conn, $description);
    $company_name = mysqli_real_escape_string($conn, $company_name);
    $address = mysqli_real_escape_string($conn, $address);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);

    // Step 6: Insert Form Data into Database
    $sql = "INSERT INTO prof (name, username, email, job_tit, description, company_name, address, phone, password, profile_image) 
            VALUES ('$firstname $lastname', '$username', '$email', '$job_name', '$description', '$company_name', '$address', '$phone', '$hashed_password', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        $user_id = mysqli_insert_id($conn);

        // Set the user ID in the session
        $_SESSION['user_id'] = $user_id;
        header('Location: plans.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

// Close Connection
$conn->close();
?>



