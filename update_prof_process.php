<!-- update_prof_process.php -->

<?php
include 'config.php';

if (isset($_POST['update_prof'])) {
    $proId = mysqli_real_escape_string($conn, $_POST['pro_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $jobTit = mysqli_real_escape_string($conn, $_POST['job_tit']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Update the professional's information in the database
    $updateQuery = "UPDATE prof SET 
        name='$name',
        email='$email',
        job_tit='$jobTit',
        description='$description',
        address='$address',
        phone='$phone'
        WHERE pro_id=$proId";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Professional information updated successfully!";
    } else {
        echo "Error updating professional information: " . mysqli_error($conn);
    }
}
?>
