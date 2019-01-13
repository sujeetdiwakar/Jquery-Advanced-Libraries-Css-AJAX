<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title> User Availability</title>
    <meta name="description" content="DataTables is a plug-in for the jQuery JavaScript library.">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

<body style="margin:20px auto">
<div class="container">
    <div class="text-center">
        <h1>User availability using ajax php</h1>
        <h2>Register form</h2>
    </div>
    <form class="form-horizontal" action="/action_page.php">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Username:</label>
            <div class="col-sm-10">
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
                <span id="availability"></span>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button name="register" id="register" type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>

</body>
<script>
    $('document').ready(function () {
        $('#register').attr('disabled', true);
        $('#username').blur(function () {
            var username = $(this).val();

            $.ajax({
                url: 'check.php',
                type: "POST",
                data: {user_name: username},
                success: function (data) {
                    //alert(data);
                    if (data != '0') {
                        $('#availability').html('<span class="text-danger">Username not available</span>');
                        $('#register').attr('disabled', true);
                    } else {
                        $('#availability').html('<span class="text-success">Username Available</span>');
                        $('#register').attr('disabled', false);
                    }
                }
            });
        });
    });
</script>
</html>