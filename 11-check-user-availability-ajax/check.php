<?php
$conn = mysqli_connect('localhost','root','','testing');
if(isset($_POST['user_name'])){
    $username = mysqli_real_escape_string($conn,$_POST['user_name']);
    $q = "select * from users where username='$username'";
    $r = mysqli_query($conn, $q);
    echo mysqli_num_rows($r);
}
?>