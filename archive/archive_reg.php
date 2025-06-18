<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DIVS Registration</title>
    <!-- <link rel="icon" href="/img/nav-logo.png"> -->
    <link rel="icon" href="/img/favicon/favicon-96x96.png" sizes="96x96">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .header-logo {
            height: 80px;
            width: auto;
        }

        .registration-card {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
        }

        .btn-submit {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-submit:hover {
            background-color: #c82333;
        }

        footer {
            margin-top: 60px;
            padding: 20px 0;
            text-align: center;
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>

    <!-- Header Logo -->
    <header>
        <div class="container-fluid">
            <div class="row align-items-center" style="margin-left: 10px;">
                <!-- Logo -->
                <div class="col-md-4 col-sm-12">
                    <img style="height: 80px; width: 250px;" src="/img/nav-logo.png" alt="Andrew Fuller" />
                </div>

                <!-- Title -->
                <div class="col-md-8 col-sm-12">
                    <h1 style="margin-top: 18px; font-weight: bold; font-size: 32px;">
                        Document Integrity Verification System (DIVS)
                    </h1>
                </div>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 mb-0 rounded">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="archive_home.html">
                    <i class="fas fa-home"></i>&nbsp;Home
                </a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ml-1">
                            <a class="nav-link active fs-5" href="archive_reg.php">
                                <i class="fas fa-user-plus"></i>&nbsp; Registration
                            </a>
                        </li>
                        <li class="nav-item ml-1">
                            <a class="nav-link active fs-5" href="archive_login.php">
                                <i class="fas fa-sign-in-alt"></i>&nbsp; Login
                            </a>
                        </li>
                        <!-- <li class="nav-item ml-1">
                            <a class="nav-link active fs-5" href="/DVS/DocumentVerification">
                                <i class="fas fa-search"></i>&nbsp; Document Verification
                            </a>
                        </li>
                        <li class="nav-item ml-1">
                            <a class="nav-link active fs-5" href="/Home/firmCompanyAudited">
                                <i class="fas fa-check"></i>&nbsp; Identify Auditor
                            </a>
                        </li>
                        <li class="nav-item ml-1">
                            <a class="nav-link active fs-5" href="/User/Support">
                                <i class="fas fa-hands-helping"></i>&nbsp; Support
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>



    <!-- Registration Form -->
    <div class="container">
        <div class="registration-card">
            <h2 class="text-center mb-4">Document Verification and Registration</h2>
            <form action="process_reg.php" method="POST">
                <div class="mb-3">
                    <label for="EnNo" class="form-label">Enrollment Number</label>
                    <input type="text" class="form-control" id="EnNo" name="EnNo" maxlength="4" pattern="^[0-9]{4}$"
                        required placeholder="Enter 4-digit Enrollment No">
                </div>

                <div class="mb-3">
                    <label for="DOB" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="DOB" name="DOB" required>
                </div>

                <div class="mb-3">
                    <label for="Cell_Phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="Cell_Phone" name="Cell_Phone" maxlength="11"
                        pattern="01[0-9]{9}" required placeholder="e.g. 01XXXXXXXXX">
                </div>

                <div class="mb-3">
                    <label for="Email_id" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="Email_id" name="Email_id" required
                        placeholder="email@domain.com">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-submit">Send OTP</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 Designed by BNRC
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>