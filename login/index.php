<?php
require_once '../connection/connect.php';
// Define variables and initialize with empty values
$username = $password = $category= $user_type = "";
$username_err = $password_err = $category_err = $user_type_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_type=$_POST['user_type'];

    // Validate credentials
    if(!empty($user_type)){
        // Prepare a select statement
        if($user_type=='Admin') 
        {
            $username='admin@admin.com';
            $password=mysqli_real_escape_string($db,trim($_POST['password']));
            $category=mysqli_real_escape_string($db,trim($_POST['category']));
        }
        else if($user_type=='User')
        {
            $username=mysqli_real_escape_string($db,$_POST['username']);
            $password=mysqli_real_escape_string($db,trim($_POST['password']));
            $category=mysqli_real_escape_string($db,trim($_POST['category']));
        }

        $class=$_POST['class'];
        $session=$_POST['session'];


        $sql = "SELECT * FROM login WHERE `id`='$username'";

        if($res = mysqli_query($db,$sql)){


            $result=mysqli_fetch_array($res);
            $data_pass=$result['password'];
            $role = $result['role'];
            $active = $result['active'];
            // Store result
            $row=$res -> num_rows;


            // Check if username exists, if yes then verify password
            if($row==1){                    


                if($password==$data_pass){
                    /* Password is correct, so start a new session and
                            save the username to the session */
                    session_start();
                    $_SESSION['role']=$role;
                    $_SESSION['id']=$username;
                    $_SESSION['active']=$active;
                    $_SESSION['class']=$class;
                    $_SESSION['session']=$session;
                    $_SESSION['category']=$category;
                    if($category=="eff")
                        redirect("../eff");
                    if($category=="esif")
                        redirect("../esif");
                } else{
                    // Display an error message if password is not valid
                    $password_err = 'The password you entered was not valid.';
                }

            } else{
                // Display an error message if username doesn't exist
                $username_err = 'No account found with that username.';
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }


    // Close connection
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; 
            background:;
            }
            .wrapper{padding-right: 100px;padding-top: 100px; background: white}
            form {border: 3px solid #f1f1f1;padding: 30px;padding-top: }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4" style="padding-top:60px;">
                <div class="wrapped">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <h2>Login</h2>

                        <p>Please fill in your credentials to login.</p>

                        <div class="form-group">
                            <select class="form-control" name="user_type" id="user_type" onchange="myFunction()" required>
                                <option value="">--SELECT USER--</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                            <select name='category' onchange='myFunction2()' id='category' style="visibility:hidden" class='form-control'>
                                <option value=''>--SELECT ITEM--</option>
                                <option value='esif'>ESIF</option>
                                <option value='eff'>Exam & Result</option>
                                <p id="demo2"></p>
                            </select>
                        <div class="form-group">
                            <br>
                            <select name="session" onchange='myFunction3()' class="form-control" style="width:150px ;visibility:hidden"  id="session">
                                <option value="">--SESSION--</option>
                                <?php
                                $result=mysqli_query($db,"SELECT * FROM session ORDER BY session_name DESC");
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo "<option value='".$row['session_name']."'>".$row['session_name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <br>
                            <select name="class" onchange='myFunction4()' class="form-control" style="visibility:hidden"  id="class">
                                <option value="">--SELECT CLASS--</option>
                                <?php
                                $result=mysqli_query($db,"SELECT * FROM class");
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo "<option value='".$row['class_id']."'>Class ".$row['class_name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" id="username" name="username" placeholder="Enter User ID" style="visibility:hidden" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" id="password" type="password" name="password" placeholder="Enter Password" style="visibility:hidden" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Login" id="login" style="visibility:hidden">
                        </div>
                      
                    </form>
            </div> 
        </div> 
        </div> 
    <script>
        function myFunction() {
            var x = document.getElementById("user_type").value;
            if(x=='Admin')
            {
                document.getElementById("category").style.visibility ="visible"; 
                document.getElementById("session").style.visibility ="hidden";   
                document.getElementById("class").style.visibility ="hidden";
                document.getElementById("username").style.visibility ="hidden";
                document.getElementById("password").style.visibility ="hidden";
                document.getElementById("login").style.visibility ="hidden";
                
                //document.getElementById("password").required= false;
                //document.getElementById("username").required= false;
                //document.getElementById("demo").innerHTML = "<input type='password' placeholder='Password' class='form-control' name='password' required> <br><input type='submit' class='btn btn-primary' value='Login' name='submit'>";    
            }
            else if(x=='User')
            {
                document.getElementById("category").style.visibility ="visible";
                document.getElementById("session").style.visibility ="hidden";   
                document.getElementById("class").style.visibility ="hidden";
                document.getElementById("username").style.visibility ="hidden";
                document.getElementById("password").style.visibility ="hidden";
                document.getElementById("login").style.visibility ="hidden";
                
                //document.getElementById("demo").innerHTML = "";
     
            }
            else if(x=='')
            {
                //document.getElementById("demo").innerHTML = "";
                document.getElementById("category").style.visibility ="hidden"; 
                document.getElementById("session").style.visibility ="hidden"; 
                document.getElementById("class").style.visibility ="hidden";
                document.getElementById("username").style.visibility ="hidden";
                document.getElementById("password").style.visibility ="hidden";
                document.getElementById("login").style.visibility ="hidden";
            }

        }

        function myFunction2() {
            var x = document.getElementById("category").value;
            if(x!='')
            {
                document.getElementById("session").style.visibility ="visible"; 
            }
            else
            {
                document.getElementById("session").style.visibility ="hidden"; 
                document.getElementById("class").style.visibility ="hidden";
                document.getElementById("username").style.visibility ="hidden";
                document.getElementById("password").style.visibility ="hidden";
                document.getElementById("login").style.visibility ="hidden";
            }

        }

        function myFunction3() {
            var x = document.getElementById("session").value;
            if(x!='')
            {
                document.getElementById("class").style.visibility ="visible";
            }
            else
            {
                document.getElementById("class").style.visibility ="hidden";
                document.getElementById("username").style.visibility ="hidden";
                document.getElementById("password").style.visibility ="hidden";
                document.getElementById("login").style.visibility ="hidden";
            }

        }

        function myFunction4() {
            var x = document.getElementById("class").value;
            var y = document.getElementById("user_type").value;
            if(x!=''&&y=='User')
            {
                document.getElementById("username").style.visibility ="visible";
                document.getElementById("password").style.visibility ="visible";
                document.getElementById("login").style.visibility ="visible";
                document.getElementById("password").required= true;
                document.getElementById("username").required= true;
            }
            else if(x!=''&&y=='Admin')
            {
                document.getElementById("password").style.visibility ="visible";
                document.getElementById("username").style.visibility ="hidden";
                document.getElementById("login").style.visibility ="visible";
                document.getElementById("password").required= true;
                document.getElementById("username").required= false;
            }
            else
                {
                document.getElementById("username").style.visibility ="hidden";
                document.getElementById("password").style.visibility ="hidden";
                document.getElementById("login").style.visibility ="hidden";                
                }

        }

    </script>

    </body>
</html>

<?php
function redirect($url){
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
    }
    else
    {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
?>