<?php
$conn = mysqli_connect('localhost', 'root', '', 'testing');
$q = "select * from orders order by id desc";
$qr = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title> Ajax Filter</title>
    <meta name="description" content="DataTables is a plug-in for the jQuery JavaScript library.">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
</head>

<body>
<div class="container" style="width: 900px;">
    <h2 align="center">Ajax PHP MySQL Date Search Using Jquery DatePicker Order Data</h2>
    <div class="col-md-3">
        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date">
    </div>
    <div class="col-md-3">
        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date">
    </div>
    <div class="col-md-5">
        <input type="button" name="filter" id="filter" value="Filter" class="btn btn-success">
    </div>
    <br/>
    <br/>
    <div id="order_table">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Order Item</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
            </thead>
            <?php while ($r = mysqli_fetch_object($qr)): ?>
                <tr>
                    <td><?php echo $r->order_customer_name; ?></td>
                    <td><?php echo $r->order_item; ?></td>
                    <td><?php echo $r->order_value; ?></td>
                    <td><?php echo $r->order_date; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>

</body>
<script>
    $('document').ready(function () {
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $('#from_date').datepicker();
        $('#to_date').datepicker();

        $('#filter').click(function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();

            if (from_date != '' && to_date != '') {
                $.ajax({
                    url: 'filter.php',
                    type: "POST",
                    data: {from_date: from_date, to_date: to_date},
                    success: function (data) {
                        $('#order_table').html(data);
                    }
                });
            } else {
                alert('Please Select date');
            }
        });

    });
</script>
</html>