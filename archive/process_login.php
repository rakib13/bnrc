 <?php
    //if ($_SERVER["REQUEST_METHOD"]==="POST" ) {
    // $username=$_POST["EnNo"] ?? '' ;
    // $password=$_POST["SetPassword"] ?? '' ;

    // Example: validate credentials
    // if ($username==="1234" && $password==="pass" ) {
    // Redirect or show dashboard
    // header("Location: archive_home.html");
    // header(" Successful login");
    // exit;
    // } else {
    // echo "Invalid credentials." ;
    // }
    //}

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["EnNo"] ?? '';
        $password = $_POST["SetPassword"] ?? '';

        // Example: validate credentials
        if ($username === "1234" && $password === "pass") {
            // Output HTML and show popup
            echo "<script>alert('Login successful!'); window.location.href='archive_home.html';</script>";
            exit;
        } else {
            echo "<script>alert('Invalid credentials.'); window.history.back();</script>";
        }
    }
    ?>
