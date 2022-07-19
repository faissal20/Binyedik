<?php 
    
    require './../dbcon.php';
    
    $msg = '';
    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['username']) || empty($_POST['pwd'])){
            $msg = '<div class="alert alert-danger">all the field required !</div>';
        }
        else{
            $username = $_POST['username'];
            $password = $_POST['pwd'];
            $sql = 'SELECT * FROM users WHERE username = "'.$username.'"';
            $res = $con->query($sql);
            $row = $res->fetch_assoc();
            
            if( strcmp( $row['pwd'],$password ) ){
                session_start();
                $_SESSION['user'] = $username;
                header('location: index.php');
            }else{
                $msg = '<div class="alert alert-danger">incorrect password!</div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login-dashbord</title>
    <style>
        body{
            background-image: linear-gradient(to right top, #530757, #e6c7e8);
            background-size: 100%;
            height: 100vh;
        }
        h1{
            color: white;
        }
        input[type ='text'], input[type ='password']{
            background: rgb(243 212 243 / 76%);
            backdrop-filter: blur(2px) brightness(1.2);
            border: none;
            border-radius: 25px !important;
            padding: 0px 20px;
            
        }
        input[type='submit']{
            border-radius: 25px !important;
        }
        form{
            border-radius: 12px;
            background-color: #9c27b036;
            backdrop-filter: blur(5px);
            padding: 20px;
            border: 1px solid;
            border-top-color:  #e6c7e8;
            border-right-color:  #e6c7e8;
            border-left-color:  #530757;
            border-bottom-color: #530757;
            
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white !important;
            opacity: 1; /* Firefox */
            }
        ::-ms-input-placeholder { /* Microsoft Edge */
            color: white !important;
            }

    </style>
</head>
<body>
    <div class="container">
        <div class="row my-5">
            <h1>
                Login to Binyedik Dashboard
            </h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post' class="col-md-6 col-12 my-5">

            <?php echo $msg ?>
            <div class="col-12 my-4">
                <input type="text" class="form-control form-control-lg my-2 rounded-0" name='username' id='username' placeholder="username" > 
            </div>
            <div class=" col-12 my-4">
                <input type="password" class="form-control form-control-lg my-2 rounded-0" name='pwd' id='pwd' placeholder="password" > 
            </div>
            <div class=" col-12 d-flex justify-content-center">
                <input type='submit' class="btn btn-light btn-lg rounded-0" value='Login'>
            </div>
        </form>
        </div>
    </div>
</body>
</html>