<?php

session_start();
if(isset( $_SESSION['profpic']))
   {
        $_SESSION['profpic'] = str_replace('\\', '/', $_SESSION['profpic']);
        $_SESSION['profpic'] = str_replace('C:', '', $_SESSION['profpic']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anchor</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="UserInterface.css">

</head>



<body>
<header class="sticky" >
    <a href="#" class="logo">Anchor</a>
    <ul class="nav">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="#" class="<?php

            if(isset($_SESSION['idaccount'])){
                echo "addevent";
            }
            else echo "mustsign";

            ?>">
                Add Events</a></li>
        <li><a href="SignIn.php"><?php  if(isset($_SESSION['idaccount'])) { ?>Sign Out <?php } else {?>Sign In <?php }   ?></a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="action">
        <div class="searchBox">
            <a href="#"><i class='bx bx-search'></i></a>
            <input type="text" placeholder="search events">
        </div>
    </div>
    <div>
        <a href="ProfilePic.php" class="user">
            <img src="image/profImg.jpg" class="user-img" id="profpic">
                 <?php
                 if (isset($_SESSION['profpic']))
                 {
                     ?>
                     <script>
                         document.getElementById('profpic').src="<?php echo $_SESSION['profpic']?>";
                     </script>
                     <?php
                 }
                 ?>

        </a>

    </div>
    <div class="toggleMenu">

    </div>
    <div class="toggleMenu" onclick="toggleMenu();"></div>

</header>

    <!-- Home banner-->
    <div class="banner" id="home">
        <div class="bg">
            <div class="content">
                <h2>Join our family</h2>
                <p> <br>Here you will find your <br>interests and things to join. </p>
                <a href="#" class="btn"> join now </a>
            </div>
            <img src="image/anchor1.jpg">
        </div>
    </div>
    <!-- about-->
    <div class="about" id="about">
        <div class="contentBx">
            <h2>About Us </h2>
            <p>we will right here introduction about the web site ( موقع للاعلان و التسجيل )in the final part it will be ready </p>
            <a href="#">Read more</a>
        </div>
        <img src="image/about-us.png">
    </div>
    <!--ads-->
    <div class="ads" id="events">
        <h2>Popular Ads</h2>
        <ul>
            <li class="list active" data-filter="all" >All Events</li>
            <li class="list" data-filter="course">Courses</li>
            <li class="list" data-filter="tournament">Tournament</li>
            <li class="list" data-filter="sports">Sports</li>

        </ul>
        <div class="cardBx">

        <?php
        try {
            $db=new mysqli('localhost','root','','Anchor');
            $qryString="select * from event" ;
            $res=$db->query($qryString);
            while ($row= $res->fetch_assoc()){

//                  echo "<script> alert(".$row['Type']."); </script>";
            ?>
            <div id="<?php echo $row['Id'];?>" class="card" data-item="<?php echo $row['Type'];?>">
                <img src=<?php echo $row['EventPic'];?>>
                <div class="content">
                    <h4> <?php echo $row['EventName'];?> </h4>
                    <div class="progress-line"> <span class="proline" style="width: <?php $width=($row['NumberOfParticipants']/$row['MaxNumberOfParticipant'])*100; echo $width ?>% ; <?php if($row['NumberOfParticipants']==$row['MaxNumberOfParticipant']){?> background-color: red; box-shadow:0 0 10px red; <?php } ?>  " ></span> </div>
                    <div class="info">
                        <p>Pricing <br><span>$ <?php echo $row['EventPrice'];?></span></p>
                        <a href="#" class="joinNow">Join Now</a>
                        <a href="#" class="button" onclick="showdesc(this)">Description</a>
                    </div>
                </div>
            </div>


              <?php
            }
            $db->close();
        }

        catch (Exception $e){

        }

        ?>
            <div class="popup">
                <div class="popup-content">
                    <img src="image/icons8-close-32.png" id="close" >
                        <pre id="desc">
<!--                            --><?php //echo $row['EventDescription'];?>
                        </pre>

                </div>
            </div>

            <div class="popupjoin">
                <div class="popup-contentjoin">

                    <img src="image/icons8-close-32.png" id="close1" >

                    <span>
                    <label>Full Name:</label>
                    <input style="position: relative; left: 92px;" type="text" required>
                    </span>


                    <span>
                    <label>Email:</label>
                    <input style="position: relative; left: 110px;" type="email" required>
                    </span>

                    <span>
                    <label>Cridit card to pay the event price:</label>
                    <input  type="text" required>
                    </span>
                    <span>
                        <input type="submit" value="regester">
                    </span>
                </div>
            </div>




            <div class="popupmustsign">
                <div class="popup-contentmustsign">
                    <img src="image/icons8-close-32.png" id="close2" >
                    <p> you must sign in </p>
                    <div> <span><input onclick="window.location.href='SignIn.php'" type="submit" value="Sing In"></span> <span><input   onclick="document.querySelector('.popupmustsign').style.display = 'none';
        document.body.style.overflow = 'auto'; " type="submit" value="cancel"></span> </div>

                </div>
            </div>


            <div class="popupaddevent">
                <div class="popup-contentaddevent">
                    <img src="image/icons8-close-32.png" id="close3" >

                </div>
            </div>


            <script>
                var buttons = document.querySelectorAll(".button");

                for (var i = 0; i < buttons.length; i++) {

                    buttons[i].addEventListener("click", function(event) {
                        event.preventDefault();
                        var popup = document.querySelector(".popup");
                        popup.style.display = "flex";
                        popup.style.top = window.pageYOffset + "px";
                        popup.style.left = window.pageXOffset + "px";

                        document.body.style.overflow = "hidden";
                    });
                }

                document.getElementById("close").addEventListener("click", function() {
                    document.querySelector(".popup").style.display = "none";
                    document.body.style.overflow = "auto";
                });


            </script>


            <script>
                var buttons1 = document.querySelectorAll(".joinNow");

                for (var i = 0; i < buttons1.length; i++) {

                    buttons1[i].addEventListener("click", function(event) {
                        event.preventDefault();
                        var popup1 = document.querySelector(".popupjoin");
                        popup1.style.display = "flex";
                        popup1.style.top = window.pageYOffset + "px";
                        popup1.style.left = window.pageXOffset + "px";

                        document.body.style.overflow = "hidden";
                    });
                }

                document.getElementById("close1").addEventListener("click", function() {
                    document.querySelector(".popupjoin").style.display = "none";
                    document.body.style.overflow = "auto";
                });


            </script>


            <script>
                var buttons2 = document.querySelectorAll(".mustsign");

                for (var i = 0; i < buttons2.length; i++) {

                    buttons2[i].addEventListener("click", function(event) {
                        event.preventDefault();
                        var popup2 = document.querySelector(".popupmustsign");
                        popup2.style.display = "flex";
                        popup2.style.top = window.pageYOffset + "px";
                        popup2.style.left = window.pageXOffset + "px";

                        document.body.style.overflow = "hidden";
                    });
                }

                document.getElementById("close2").addEventListener("click", function() {
                    document.querySelector(".popupmustsign").style.display = "none";
                    document.body.style.overflow = "auto";
                });


            </script>



            <script>
                var buttons3 = document.querySelectorAll(".addevent");

                for (var i = 0; i < buttons3.length; i++) {

                    buttons3[i].addEventListener("click", function(event) {
                        event.preventDefault();
                        var popup3 = document.querySelector(".popupaddevent");
                        popup3.style.display = "flex";
                        popup3.style.top = window.pageYOffset + "px";
                        popup3.style.left = window.pageXOffset + "px";

                        document.body.style.overflow = "hidden";
                    });
                }

                document.getElementById("close3").addEventListener("click", function() {
                    document.querySelector(".popupaddevent").style.display = "none";
                    document.body.style.overflow = "auto";
                });


            </script>














            <script>

                function showdesc(button){
                    var rootDiv = button.closest('.card');
                    var rootDivId = rootDiv.id;
                    var myArray=[];
                    var decription=[];
                    <?php
                    $db=new mysqli('localhost','root','','Anchor');
                    $qryString="select Id,EventDescription from event";
                    $res=$db->query($qryString);
                    while ($row= $res->fetch_assoc()){
                    ?>
                    myArray.push("<?php echo $row['Id'];?>");
                    decription.push("<?php echo $row['EventDescription'];?>");
                    <?php
                    }
                    ?>

                    for (var i=0 ; i < myArray.length ; i++){
                        if(myArray[i]==rootDivId)
                            document.getElementById('desc').innerText=decription[i];
                    }
                }

            </script>



        </div>
    </div>



<!--    <script>-->
<!--        // Get all span elements with class "proline"-->
<!--        var spans = document.querySelectorAll('span.proline');-->
<!---->
<!--        // Loop through all spans and add event listener to each one-->
<!--        for (var i = 0; i < spans.length; i++) {-->
<!--            var parentWidth = spans[i].parentElement.offsetWidth; // Get the parent element's width-->
<!--            if (spans[i].offsetWidth === parentWidth) {-->
<!--                spans[i].style.backgroundColor = 'red'; // Change background color to red-->
<!--                spans[i].style.boxShadow='0 0 10px red';-->
<!--            }-->
<!---->
<!--            spans[i].addEventListener('resize', function() {-->
<!--                // Check if span's width is equal to its parent's width-->
<!--                if (this.offsetWidth === parentWidth) {-->
<!--                    this.style('backgroundColor: red;'); // Change background color to red-->
<!--                } else {-->
<!--                    this.style.backgroundColor = ''; // Reset background color-->
<!--                }-->
<!--            });-->
<!--        }-->
<!---->
<!---->
<!---->
<!---->
<!--    </script>-->

    <!--Contact -->

    <div class="contact" id="contact">
        <img src="image/contact.jpg">
        <div class="form">
            <h1>Contact Us</h1>
            <div class="inputBx">
                <p>Enter Name</p>
                <input type="text" placeholder="Full Nama">

            </div>
            <div class="inputBx">
                <p>Enter Email</p>
                <input type="email" placeholder="Full Nama">

            </div>
            <div class="inputBx">
                <p>Message</p>
                <textarea placeholder="Type here...."></textarea>
            </div>
            <div class="inputBx">
                <input type="submit" name="Submit">
            </div>
        </div>






</div>




</article>
<!-- Footer -->
<footer>
    <div class="info">
        <a href="#" class="logo">Anchor</a>
        <p><i class='bx bx-copyright'></i>2023 all rights reserved</p>
        <ul>
            <li><a href="#"><i class='bx bxl-facebook' ></i></a></li>
            <li><a href="#"><i class='bx bxl-instagram' ></i></a></li>
            <li><a href="#"><i class='bx bxl-twitter' ></i></a></li>
            <li><a href="#"><i class='bx bxl-youtube' ></i></a></li>
        </ul>
    </div>
</footer>






<script>
    /*steaky navbar*/
    window.addEventListener('scroll',function(){
        var header =document.querySelector('header');
        header.classList.toggle('sticky',window.scrollY >0);
    });
    /*responsive nav bar*/
    function toggleMenu(){
        const toggleMenu =document.querySelector('.toggleMenu');
        const nav =document.querySelector('.nav');
        toggleMenu.classList.toggle('active')
        nav.classList.toggle('active')
    }
    /*Filterable Cards*/
    let list =document.querySelectorAll('.list');
    let card=document.querySelectorAll('.card');
    for(let i=0;i<list.length;i++){
        list[i].addEventListener('click',function (){
            for (let j=0;j<list.length;j++){
                list[j].classList.remove('active');
            }
            this.classList.add('active');

            let dataFilter=this.getAttribute('data-filter');

            for(let k=0;k<card.length;k++){
                card[k].classList.remove('active');
                card[k].classList.add('hide');
                if(card[k].getAttribute('data-item').toLowerCase().indexOf(dataFilter.toLowerCase())!==-1 ||dataFilter=='all'){
                    card[k].classList.remove('hide');
                    card[k].classList.add('active');
                }

            }
        })
    }
</script>
</body>
</html>