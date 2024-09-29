<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php
    session_start();
    ?>

<form class="form-style-5">
    <?php if (isset($_SESSION["name"])) { ?>
        <div class="text">
            <h1>Registration Information</h1>
        </div>

        <div class="container">
            <div class="row mb-2">
                <div class="col-md-3">Name:</div>
                <div class="col-md-9"><?php echo $_SESSION["name"]; ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">Email:</div>
                <div class="col-md-9"><?php echo $_SESSION["email"]; ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">Password:</div>
                <div class="col-md-9"><?php echo $_SESSION["password"]; ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">Phone Number:</div>
                <div class="col-md-9"><?php echo $_SESSION["number"]; ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">Gender:</div>
                <div class="col-md-9"><?php echo $_SESSION["gender"]; ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">Country:</div>
                <div class="col-md-9"><?php echo $_SESSION["country"]; ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">Skills:</div>
                <div class="col-md-9"><?php echo implode(', ', $_SESSION["skill"]); ?></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">Biography:</div>
                <div class="col-md-9"><?php echo $_SESSION["bio"]; ?></div>
            </div>
        </div>
        <br><br>
        <div class="group">
    <a href="logout.php" class="logbutton">Logout</a>
</div>

    <?php
    } else {
        echo "<p>No user data found.</p>";
    }
    ?>
</form>
</body>
</html>
