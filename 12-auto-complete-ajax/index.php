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
    <style>
        ul{
            background-color: #eee;
            cursor: pointer;
        }
        li{
            padding: 12px;
        }
    </style>
</head>

<body style="margin:20px auto">
<div class="container">
    <div class="text-center">
        <h2>Autocomplete textbox using jQuery, php and MySQL</h2>
    </div>
    <form class="form-horizontal" action="action_page.php">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Enter Country name:</label>
            <div class="col-sm-10">
                <input type="text" name="country" id="country" class="form-control" placeholder="Enter County Name">
                <div id="countryList"></div>
            </div>
        </div>

    </form>
</div>

</body>
<script>
    $('document').ready(function () {

        $('#country').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: 'search.php',
                    type: "POST",
                    data: {country_name: query},
                    success: function (data) {
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });
            }else{
                $('#countryList').fadeOut();
                $('#countryList').html("");
            }
        });
        $(document).on('click','li',function () {
            $('#country').val($(this).text());
            $('#countryList').fadeOut();
        });
    });
</script>
</html>