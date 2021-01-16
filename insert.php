<?php
$mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bulk = new MongoDB\Driver\BulkWrite;

if($_POST){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobileno=$_POST["mobileno"];
    $location=$_POST["location"];
    $password=$_POST["password"];
    
    echo $email;
   
    $doc = ['name' => $name,'email'=>$email,'mobileno'=>$mobileno, 'location'=>$location,'password'=>$password];
    $qry=new MongoDB\Driver\Query(['email'=>$email]);
    $rows=$mongo->executeQuery("pack.user",$qry);
    $v="";
    foreach($rows as $row){
       $v=$row->name;
   
    }
    if($v==""){
        $bulk->insert($doc);
        $mongo->executeBulkWrite('pack.user', $bulk);
        header("Location: login.php");
    }
    else{
        echo"Your email is already registered";
    }
}
else{
    echo "no data inserted";
}
?>