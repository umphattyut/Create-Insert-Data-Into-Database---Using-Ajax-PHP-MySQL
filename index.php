<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Data Into Table</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<form id="submit_form" enctype="multipart/form-data">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br><br>
    <label for="fistname">First Name:</label><br>
    <input type="text" id="firstname" name="f_name"><br><br>
    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="l_name"><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="Save">
</form>
<br>
<!-- To Show Message -->
<div id="response"></div>
<script>
$(document).ready(function(){
    $('#submit_form').on('submit', function(e) {
        e.preventDefault();
        var username = $('#username').val();
        var f_name = $('#firstname').val();
        var l_name = $('#lastname').val();
        var email = $('#email').val();
        $.ajax({
            url: 'sql.php',
            type: 'POST',
            data: {
                SubmitData: username,
                f_name: f_name,
                l_name: l_name,
                email: email
            },
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if(res.status == 422) {
                    $('#response').text(res.message);
                } else if(res.status == 500) {
                    $('#response').text(res.message);
                } else{
                    $('#response').text(res.message);
                    // Clear textbox after saved
                    $('#username').val('');
                    $('#firstname').val('');
                    $('#lastname').val('');
                    $('#email').val('');
                }
            }
        });
    });
});
</script>
</body>
</html>
