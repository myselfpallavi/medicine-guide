<?php
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="..........................................................................." />
    <meta name="description" content="........................................................................" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico..........................................." />
    <link rel="apple-touch-icon" type="image/x-icon" href="apple-touch-icon.png..............................." />
    <title>Find Pharmacy</title>
    <link rel="shortcut icon" href="img/Graphicloads-Medical-Health-Medicine-box-2.ico">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />

    <script type="text/javascript" src="js/modernizr.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    
</head>


<body class="cusfindphar">

    <div class="header-area">
        <div class="header-top">
            <div class="container">
                <a href="cupanel.php"><img src="img/client-1295901_960_720.png" style="max-height: 5%;max-width: 5%;margin-left: 50%;opacity:1.0;"></a>
                <label class="text-center" style="margin-left:51%;"><?php echo $_SESSION["uname"];?></label> 
                <div class="menu col-md-5" style="margin-left: 20%;margin-top: 2%">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="cushome.php">Home</a></li>
                        <li><a href="cart/index.php">Cart</a></li>
                        <li><a href="logout.php">Logout</a></li>

                    </ul>
                </div>

            </div>
        </div>


    </div>

    <div class="main-area">




        <div class="">
            <h2 class="text-center">Patient's Panel - Find Pharmacy</h2>
                <br>
<!--                <label style="margin-left:40px;">User Name<br><?php echo $_SESSION["uname"];?></label>-->

                <br>
            <form class="col-md-4 col-sm-offset-4 text-center" style="margin: 2%;text-align: center;margin-left: 35%;padding-top: 2%;padding-bottom: 2%;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                
                

                <div class="form-group center">
                    
                    <input style="width:250px;height:35px;background:transparent;border:1px solid black;" type="text" name="search" placeholder="Search Pharmacy">

                    <button type="submit" style="background:#56CDF0;border:1px solid #56CDF0;padding:6px 20px;border-radius:5px;" class="btn btn-default">Search</button>
                    <br>
                  </div>
    
		
		<div class="result_table" style="margin-left: 2%;text-align: center">
            <table style="background:white;border:1px solid black;" class="text-center">
                <thead>
                    <tr>
                        <th style="border:1px solid black">Name</th>
                        <th style="border:1px solid black">Mobile no.</th>
                        <th style="border:1px solid black">Address</th>
                        <th style="border:1px solid black">Region</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                         if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $str1=$_POST["search"];
                        $con=mysqli_connect("localhost","root","");
                        // Make sure we connected successfully
                        if(! $con)
                        {
                            die('Connection Failed'.mysql_error());
                        }

                        // Select the database to use
                        mysqli_select_db($con,'medicineguide');
                        //$row = mysqli_fetch_array($result);
                         $result = mysqli_query($con,"SELECT * FROM pharmacy where pRegion='".$str1."';") or die("Failed to fetch".mysql_error());
                             
                             if( mysqli_num_rows( $result)==0 ){
                             $result1 = mysqli_query($con,"SELECT * FROM pharmacy WHERE pName LIKE '%" . $str1 . "%' ") or die("Failed to fetch".mysql_error()); 
                                if( mysqli_num_rows( $result1)==0 ){
                                    echo '<tr><td colspan="4">Not Found</td></tr>';
                                }
                                
                                else{
                                    while( $row = mysqli_fetch_assoc( $result1) ){
                                        echo "<tr><td>{$row['pName']}</td><td>{$row['phMobile']}</td><td>{$row['phAddress']}</td><td>{$row['pRegion']}</td></tr>\n";
                                }
                                }
                             }
                        else{
                        while( $row = mysqli_fetch_assoc( $result) ){
                            echo "<tr><td>{$row['pName']}</td><td>{$row['phMobile']}</td><td>{$row['phAddress']}</td><td>{$row['pRegion']}</td></tr>\n";
                                }
                            }
                         } 
            ?>
                
                </tbody>
            </table>
                </div>
            </form>
                
            <br>


        
        <!--
		<div class="signup col-sm-offset-8 col-md-8"> 
			<p>Not a registered user. Please Sign Up...</p>
			<button type="submit" class="btn btn-success">  </button>
			<button type="submit" class="btn btn-success"></button>
			<a href="cussignup.html">As Customer</a>
			
		</div>
		-->










    </div>
    </div>

</body>

</html>
