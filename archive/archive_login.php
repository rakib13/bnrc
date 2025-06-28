<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DIVS Login</title>
    <!-- <link rel="icon" href="/Image/banner-2.png"> -->
    <link rel="icon" href="/img/favicon/favicon-96x96.png" sizes="96x96">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .login-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 500px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2),
                0 2px 4px rgba(0, 0, 0, 0.1),
                0 0 0 1px inset rgba(255, 255, 255, 0.05);
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            height: 35px;
        }

        .login-form button {
            background-color: #2D59A0;
            font-weight: bold;
        }

        .login-form .send-otp {
            background-color: #dc3545;
            color: white;
            margin-top: 20px;
            font-weight: bold;
        }

        .login-form .avatar {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
        }

        footer {
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Header & Navbar -->
    <header class="mb-4">
        <div class="container-fluid">
            <div class="row align-items-center px-3">
                <div class="col-md-4">
                    <img src="/img/nav-logo.png" alt="Logo" style="height:80px; width:250px;">
                </div>
                <div class="col-md-8">
                    <h1 class="mb-0" style="font-size:32px;"> Document Integrity Verification System (DIVS)</h1>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 mb-0 rounded">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <a class="navbar-brand" href="/"><i class="fas fa-home"></i>&nbsp;Home</a> -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item"><a class="nav-link active fs-5" href="archive_reg.php"><i class="fas fa-user-plus"></i> Registration</a></li> -->
                        <li class="nav-item"><a class="nav-link active fs-5" href="archive_login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                        <!-- <li class="nav-item"><a class="nav-link active fs-5" href="/DVS/DocumentVerification"><i class="fas fa-search"></i> Document Verification</a></li>
                        <li class="nav-item"><a class="nav-link active fs-5" href="/Home/firmCompanyAudited"><i class="fas fa-check"></i> Identify Auditor</a></li>
                        <li class="nav-item"><a class="nav-link active fs-5" href="/User/Support"><i class="fas fa-hands-helping"></i> Support</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Login Area -->
    <div class="container login-container">
        <div class="card login-card">
            <div class="card-body">
                <form method="post" action="process_login.php" class="login-form">
                    <div class="text-center mb-3">

                        <!-- <i class="fas fa-user-circle fa-6x"></i> -->
                        <i class="far fa-user fa-6x" aria-hidden="true"></i>
                    </div>

                    <div class="mb-3">
                        <label for="EnNo"><strong>Enrl. No/ User Id :</strong></label>
                        <input type="text" name="EnNo" id="EnNo" placeholder="Enrl. No. (4 Digits)/ User Id" class="form-control" required>
                        <span class="text-danger field-validation-valid" data-valmsg-for="EnNo"></span>
                    </div>

                    <div class="mb-3">
                        <label for="SetPassword"><strong>Password:</strong></label>
                        <input type="password" name="SetPassword" id="SetPassword" placeholder="***********************" class="form-control" required>
                        <span class="text-danger field-validation-valid" data-valmsg-for="SetPassword"></span>
                    </div>

                    <button type="submit" class="btn send-otp w-100">Send OTP</button>

                    <div class="text-center mt-3">
                        <h6><a href="/ForgotPassword" style="color: Highlight;">Forgot Your Password?</a></h6>
                    </div>

                    <input type="hidden" name="__RequestVerificationToken" value="YOUR_VERIFICATION_TOKEN_HERE" />
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 Designed by BNRC
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function handleLogin(event) {
            event.preventDefault(); // Stop form from submitting normally

            const username = document.getElementById("EnNo").value;
            const password = document.getElementById("SetPassword").value;

            if (username === "1234" && password === "pass") {
                alert("Login successful!");
                // window.location.href = "dashboard.html";
            } else {
                alert("Invalid credentials.");
            }

            return false;
        }
    </script>

</body>

</html>