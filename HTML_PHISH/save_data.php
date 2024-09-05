<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Create or open the Excel file
    $excelFile = 'userdata.xlsx';
    $headers = array("Name", "Email", "Phone");

    if (!file_exists($excelFile)) {
        $file = fopen($excelFile, 'w');
        fputcsv($file, $headers);
    } else {
        $file = fopen($excelFile, 'a');
    }

    // Append user data to the Excel file
    $data = array($name, $email, $phone);
    fputcsv($file, $data);

    // Close the file
    fclose($file);

    echo "Redirecting...To Your Dashboard";
    echo '<script>window.location.replace("https://www.flipkart.com/");</script>';
    exit(); // Stop further execution
} else {
    echo "Error: Form submission method not allowed!";
}
?>
