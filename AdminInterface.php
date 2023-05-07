<?php

session_start();
if( isset($_SESSION['Fname']))
    echo $_SESSION['Fname'] . " " . $_SESSION['adminuser']." ".$_SESSION['profpic'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anchor</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="AdminInterface.css">
</head>
<body>
    <header class="sticky">
        <a href="#" class="logo">Anchor</a>
        <ul class="nav">
            <li><a href="#">Event Statics</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="#">Sign Out</a></li>
        </ul>

        <div class="toggleMenu">

        </div>

    </header>
    <article>
        <div class="content">
            <img src="image/profImg.jpg" alt="ProfPic">
            <div class="buttons">
                <button>Upload Photo</button>
                <button>Sign out</button>
            </div>
            <div class="admin-info">
                <div>
                    <span>User Name: </span>
                    <span> Name</span>
                    <button id="button">Edit Name</button>
                </div>
                <div>
                    <span>Email: </span>
                    <span> Email</span>
                </div>
                <div class="hov">
                    <span id="changePass">If you want to change password click here</span>
                </div>
            </div>
        </div>
            <div class="reorder">
                <div class="statics">
                    <table class="table">
                        <caption>Statistics of all events in the web site</caption>
                        <tr>
                            <th>name of event</th>
                            <th>number of reports</th>
                            <th>announcer name</th>
                            <th>announcer email</th>
                            <th>number of registers</th>
                            <th>Full?</th>
                        </tr>
                    </table>
                </div>

            <div class="statics">
                <table class="table">
                    <caption>Reports from users</caption>
                    <tr>
                        <th>from email</th>
                        <th>Feedback</th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="popup">
            <div class="popup-content">
                <img src="image/icons8-close-32.png" id="close" >
                <div>
                    <label>Enter The New Name</label>
                    <input type="text">
                </div>
                <input type="submit">

            </div>
        </div>


        <div class="popup2">
            <div class="popup-content2">
                <img src="image/icons8-close-32.png" id="close1" >
                <div>
                    <label for="password">Enter The New Password:</label>
                    <input type="password" id="password" name="password">
                    <!--                    <img src="image/icons8-eye-48.png" id="eyeold">-->
                </div>
                <div>
                    <label>Enter The New Password:</label>
                    <input type="password">
                    <!--                    <img src="image/icons8-eye-48.png" id="eyenew">-->
                </div>
                <input type="submit">

            </div>
        </div>
        <script>
            document.getElementById("button").addEventListener("click",function (){
                document.querySelector(".popup").style.display="flex";
            })
            document.getElementById("close").addEventListener("click",function (){
                document.querySelector(".popup").style.display="none";
            })



            document.getElementById("changePass").addEventListener("click",function (){
                document.querySelector(".popup2").style.display="flex";
            })
            document.getElementById("close1").addEventListener("click",function (){
                document.querySelector(".popup2").style.display="none";
            })

        </script>

    </article>
</body>
</html>