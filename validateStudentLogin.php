<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Welcome Page</title>
</head>
<body>
    <?php
        $registrationNo=$_POST["regno"];
        $password=$_POST["pass"];
        require_once "login.php";
		$con = new mysqli($hn, $un, $pw, $db);
		if ($con->connect_error) {die("Connection Error");}		
		$query = "select * from student";
		$result = $con->query($query);
		if(!$result){die("query error");}
        $c=0;
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
                if(strcasecmp(trim($row["Password"]),trim($password))==0 && $row["RegNo"]==$registrationNo){    
                    include 'studentDashboard.html';
                        $c++;
                        break;
                    }
				}
                if($c==0){
                            echo "Sorry, Login is invalid! Kindly contact the faculty/administrator for getting the correct details!";
                        }
		} 
    ?>
</body>
</html>