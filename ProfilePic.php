<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anchor</title>
    <link rel="stylesheet" href="ProfilePic.css">
</head>
<body>
        <header class="sticky">
            <a href="#" class="logo">Anchor</a>
            <ul class="nav">
                <li><a href="UserInterface.php#home">Home</a></li>
                <li><a href="UserInterface.php#about">About</a></li>
                <li><a href="UserInterface.php#events">Events</a></li>
                <li><a href="SignIn.php">Sign Out</a></li>
                <li><a href="UserInterface.php#contact">Contact</a></li>
            </ul>
            <div class="toggleMenu">

            </div>

        </header>

        <article>
                <div class="content">
                    <img src="<?php echo $_SESSION['profpic'];?>" alt="ProfPic">
                    <div class="buttons">
                        <button>Upload Photo</button>
                        <button onclick="location.href='UserInterface.php'">Sign out</button>
                    </div>
                </div>
                <div class="information" style="width: 100%">
                    <div class="space">
                        <div>
                            <span>User Name: </span>
                            <span> <?php echo $_SESSION['Fname'] . " " . $_SESSION['Lname'] ;?></span>
                            <button id="button">Edit Name</button>
                        </div>
                        <div>
                            <span>Email: </span>
                            <span> <?php echo $_SESSION['email']  ;?></span>
                        </div>
                        <div class="hov">
                            <span id="changePass">If you want to change password click here</span>
                        </div>


                    </div>
                    <hr style="width: 100%; margin-top: 20px ;margin-bottom: 20px">
                    <div class="statics">
                        <table class="table">
                            <caption>Statistics of events that you announced</caption>
                            <tr>
                                <th>name of event</th>
                                <th>number of registers</th>
                                <th>about of registers</th>
                                <th>total money</th>
                                <th>Full?</th>
                            </tr>
                        </table>

                    </div>
                </div>

        </article>
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

</body>
</html>