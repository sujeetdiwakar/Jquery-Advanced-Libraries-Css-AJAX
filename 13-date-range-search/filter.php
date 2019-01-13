<?php
$conn = mysqli_connect('localhost', 'root', '', 'testing');

$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

if (!empty($from_date) && !empty($to_date)) {

    $q = "select * from orders where order_date between '".$from_date."' and '".$to_date."'";
    $qr = mysqli_query($conn, $q);
    $output = '';
    $output .= "
    <table class='table table-bordered'>
            <thead>
            <tr>
                <th>Name</th>
                <th>Order Item</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
            </thead>
    ";
    if (mysqli_num_rows($qr) > 0) {
        while ($r = mysqli_fetch_object($qr)) {

            $output .= " <tr>
                            <td>$r->order_customer_name</td>
                            <td>$r->order_item</td>
                            <td>$r->order_value</td>
                            <td>$r->order_date</td>
                         </tr>
                            ";
        }
    } else {
        $output .= "<tr><td colspan='5'>No Order Found</td></tr>";
    }
    $output .= '</table>';
    echo $output;
}
?>