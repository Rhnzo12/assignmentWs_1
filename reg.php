<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" class="form-style-4">
        <div class="text">
            <h1> REGISTER </h1>
        </div>

        <div class="group row mb-2">
        <div class="col-md-3">
                <label for="name">Name:</label>
            </div>
            <div class="col-md-9">
                <input class="form-text" type="text" id="name" name="name" placeholder="Enter Name">
            </div>
        </div>

        <div class="group row mb-2">
        <div class="col-md-3">
                <label for="email">Email:</label>
            </div>
            <div class="col-md-9">
                <input class="form-text" type="text" id="email" name="email" placeholder="Enter Email">
            </div>
        </div>

        <div class="group row mb-2">
            <div class="col-md-3">
                <label for="password">Password:</label>
            </div>
            <div class="col-md-9">
                <input class="form-password" type="password" id="password" name="password" placeholder="Enter Password">
            </div>
        </div>

        <div class="group row mb-2">
            <div class="col-md-3">
                <label for="cpass">Confirm Password:</label>
            </div>
            <div class="col-md-9">
                <input class="form-password" type="password" id="password2" name="password2" placeholder="Confirm Password">
            </div>
        </div>

        <div class="group row mb-2">
        <div class="col-md-3">
                <label for="num">Phone Number:</label>
            </div>
            <div class="col-md-9">
                <input class="form-number" type="text" id="number" name="number" placeholder="Enter Phone Number">
            </div>
        </div>

        <div class="group row mb-2">
            <div class="col-md-3">
                <label for="gender">Gender:</label>
            </div>
            <div class="col-md-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="Male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="other" name="gender" value="Others">
                    <label class="form-check-label" for="other">Others</label>
                </div>
            </div>
        </div>

        <div class="group row mb-2">
            <div class="col-md-3">
                <label for="country">Country:</label>
            </div>
            <div class="col-md-9">
                <select class="form_select-input form-select-sm" name="country" id="country">
                    <option value="" selected disabled hidden>SELECT</option>
                    <option value="Philippines">Philippines</option>
                    <option value="USA">USA</option>
                    <option value="Canada">Canada</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Taiwan">Taiwan</option>
                </select>
            </div>
        </div>

        <div class="group row mb-2">
            <div class="col-md-3">
                <label for="skills">Skills:</label>
            </div>
            <div class="col-md-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="skill1" name="skill[]" value="Creative">
                    <label class="form-check-label" for="skill1">Creative</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="skill2" name="skill[]" value="Leadership">
                    <label class="form-check-label" for="skill2">Leadership</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="skill3" name="skill[]" value="Adaptive">
                    <label class="form-check-label" for="skill3">Adaptive</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="skill4" name="skill[]" value="Active Listener">
                    <label class="form-check-label" for="skill4">Active Listener</label>
                </div>
            </div>
        </div>

        <div class="group row mb-2">
            <div class="col-md-3">
                <label for="bio">Biography:</label>
            </div>
            <div class="col-md-9">
                <textarea class="form-textarea" id="bio" name="bio" rows="5" cols="33" placeholder="Enter your Biography"></textarea>
            </div>
        </div>

        <div class="group">
                <input type="submit" class="button" name="submitBtn" value="Register">
        </div>
    </form>

        <?php
            // session_start();
            function sanitizeInputs($input) {
                $input= trim($input);
                $input= stripslashes($input);
                $input= htmlspecialchars($input);
                return $input;
            }
            //$message to store all alerts
            $message= "";

            // if(isset($_REQUEST["submitBTn"])){
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $name= sanitizeInputs($_POST["name"]);
                $email= sanitizeInputs($_POST["email"]);
                $password= sanitizeInputs($_POST["password"]);
                $password2= sanitizeInputs($_POST["password2"]);
                $number= sanitizeInputs($_POST["number"]);
                $gender= sanitizeInputs($_POST["gender"] ?? '');
                $country= sanitizeInputs($_POST["country"] ?? '');
                $bio= sanitizeInputs($_POST["bio"] ?? '');
                $skills= isset($_POST['skill']) ? $_POST['skill'] : [];

                $passpattern= "/[A-Z]/";
                $passpattern2= "/[a-zA-Z0-9]/";
                $namepattern= "/^[a-zA-Z\s]+$/";
                

                if (empty($name) || empty($email) || empty($password) || empty($password2)) {
                    $message= "Please fill out all fields.";
                } elseif (!preg_match($namepattern, $name)) {
                    $message= "Name is required and can only contain letters and spaces.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $message= "Invalid email format.";
                } elseif ($password !== $password2) {
                    $message= "Passwords did not match.";
                } elseif (!is_numeric($number)) {
                    $message = "Phone number must be valid number.";
                } elseif (strlen($password) < 8 || !preg_match($passpattern, $password) || !preg_match($passpattern2, $password)) {
                    $message= "Password must be 1 uppercase letter, 8 characters long, and include alphanumeric characters.";
                } elseif(empty($gender)){
                    $message= "Please select gender";
                } elseif(empty($country)){
                    $message= "Please select country";
                } elseif(empty($skills)){
                    $message= "Please select atleast 1 in the skills";
                } elseif(strlen($bio) < 200){
                    $message= "Enter your bio atleast 200 characters";
                }else {
                    // session_start();
                    $_SESSION["name"]=  $name;
                    $_SESSION["email"]= $email;
                    $_SESSION["password"]= $password;
                    $_SESSION["number"]= $number;
                    $_SESSION["gender"]= $gender;
                    $_SESSION["country"]= $country;
                    $_SESSION["bio"]= $bio;
                    $_SESSION["skill"]= $skills;

                    //showing success
                    echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Registered Successfully',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(() => {
                                location.href = 'about.php';
                            });
                        </script>";
                        exit;
                    // $message= "Registration successful!";
                    // header('location: about.php');
                    // echo "<script>alert('$message')location.href='about.php';</script>";
                }

                //showing error
                if ($message) {
                    echo "<script>
                        Swal.fire({
                            title: '<span style=\"font-size: 33px;\">Alert</span>',
                            html: '<span style=\"font-size: 25px;\">$message</span>',
                            icon: 'warning',
                            iconColor: 'red',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#061c64',
                        });
                    </script>";
                }
            }
        ?>
</body>
</html>