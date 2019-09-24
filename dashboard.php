<!DOCTYPE html>
<html>
    <head>
        <!--Main head content-->
        <title>Home</title>
        <!--Boostrap Requirements-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      
        <script>
             function showDashboard() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mainContent").innerHTML = this.responseText;
                }
                };
                xhttp.open("POST", "dashboardView.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send();
             }
        </script>
    </head>
    <body>
        <?php include "./header.html"?>
        <br />
        <!--Main Content-->
        <!--Sub Nav Bar-->
        <nav>
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col">
                        <button type="button" class="btn btn-outline-primary" onclick="showDashboard()">Dashboard</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-primary" onclick="">Employees</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-primary" onclick="">Positions</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-primary" onclick="">Tags</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-primary" onclick="">Settings</button>
                    </div>
                </div>
            </div>
        </nav>

        <div id="mainContent"></div>
 
        <?php include "./footer.html"?>

    <!--Boostrap Requirements-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>