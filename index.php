<!DOCTYPE html>
<html>
    <head>
        <!--Main head content-->
        <title>Login</title>
        <!--Boostrap Requirements-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      

        <script>
            function login() {
                var staffID = document.getElementById("staffID").value;
                var passInp = document.getElementById("passInp").value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("returnValue").innerHTML = this.responseText;
                }
                };
                xhttp.open("POST", "login.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("passInp="+passInp+"&staffID="+staffID);
            }
        </script>

    </head>
    <body>
        <br />
        <br />
        <div class="container">
            <form>
                <div class="form-group">
                    <input required type="text" class="form-control" id="staffID" name="staffID" aria-describedby="emailHelp" placeholder="Enter Staff ID" data-kwimpalastatus="alive" data-kwimpalaid="1570094752647-4"> 
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="passInp" name="passInp" placeholder="Password"> 
                </div>
                <button onclick="login()" type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>

        <br />

        <div class="container" id="returnValue">
            <?php
                if (isset($_SESSION["login"])) {
                    echo '<p>Error logging in</p>';
                }
                if ($_SESSION["login"] == TRUE) {
                    header("Location: home.php");
                }
            ?>
        </div>

        <?php include "./footer.html"?>

    <!--Boostrap Requirements-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>