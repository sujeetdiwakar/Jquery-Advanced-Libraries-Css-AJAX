<?php
$conn = mysqli_connect('localhost', 'root', '', 'testing');
if (isset($_POST['country_name'])) {
    $country = mysqli_real_escape_string($conn, $_POST['country_name']);
    $q = "select * from countries where country like '$country%'";
    //$q = "select * from countries where country like '%$country%'";
    $qr = mysqli_query($conn, $q);
    $output = '';
    $output .= "<ul class='list-unstyled'>";
    if (mysqli_num_rows($qr) > 0) {
        while ($r = mysqli_fetch_object($qr)) {
            $output .= "<li>$r->country</li>";
        }
    } else {
        $output .= "<li>County Not Found</li>";
    }
   $output .= '</ul>';
    echo $output;
}
?>