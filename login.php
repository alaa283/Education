<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // var_dump($_SESSION);
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "./Backend/connection_database.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password,$role);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION["role"] = $role;
                            // echo $_SESSION["role"];                     
                            // header("location: index.php");
                            // echo $_SESSION["role"];
                            // Redirect user to welcome page
                            if($role == "student")
                            {header("location: index.php");}
                            else
                            {header("location: admin/index_ad.php");}
                            
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Start head -->
    <?php
            
        require_once "./head.php";

    ?>
<!-- end head -->
<body>
        <!-- Registration Start -->
            <div class="container py-5">
                <div class="row  justify-content-center">

                    <div class="col-lg-5">
                        <div class="card border-0 ">
                            <div class="card-header bg-secondary text-center p-4">
                                <h1 class="text-white m-0">	Login</h1>
                            </div>
                            <div class="card-body rounded-bottom bg-primary ">
                            <?php 
                                if(!empty($login_err)){
                                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                                }        
                            ?>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control border-0 p-4  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username" required="required" />
                                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control border-0 p-4 <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" required="required" />
                                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-secondary btn-block border-0 py-3" value="Login">
                                    </div>
                                    <p class="text-white text-center m-0">Don't have an account? <a class="text-secondary" href="./sign_up.php">Sign up now</a>.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Registration End -->
</body>
</html>