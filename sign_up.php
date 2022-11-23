<?php
// Include config file
require_once "./Backend/connection_database.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,role) VALUES (?, ?,'student')";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
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
                                <h1 class="text-white m-0">	Sign Up</h1>
                            </div>
                            <div class="card-body rounded-bottom bg-primary ">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control border-0 p-4 <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?php echo $username; ?>" required="required" />
                                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control border-0 p-4 <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password"  value="<?php echo $password; ?>" required="required" />
                                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" class="form-control border-0 p-4 <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" value="<?php echo $confirm_password; ?>" required="required" />
                                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-secondary btn-block border-0 py-3" value="Sign Up">
                                        <input type="reset" class="btn btn-secondary btn-block border-0 py-3" value="Reset">
                                        <!-- <button class="btn btn-secondary btn-block border-0 py-3" type="submit">Sign Up</button> -->
                                    </div>
                                    <!-- <div class="card-header bg-secondary text-center p-4">
                                        <h1 class="text-white m-0">Already have an account? <a href="login.php">Login here</a>.</h1>
                                    </div> -->
                                    <p class="text-white text-center m-0">Already have an account? <a class="text-secondary" href="login.php">Login here</a>.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Registration End -->
</body>
</html>