<?php


include 'dbconnect.php'; // Include your database connection


$region = isset($_GET['region']) ? htmlspecialchars($_GET['region']) : 'Default Region';

// Query the database for packages in the selected region
$sql = "SELECT * FROM users";
$result = mysqli_query($dbConn, $sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find A Ride</title>
    <link rel="stylesheet" href="css/FindARide.css">
    <link rel="stylesheet" href="css/navbar.css">

</head>
<body>
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#1f1f1f"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li><a href="#">Account Information</a></li>
            <li><a href="#">Account Information</a></li>
            
        </ul>
        <ul>
            
            <li class="hideOnMobile"><a href="FindARide.html">1</a></li>
            <li class="hideOnMobile"><a href="FindARide.html">Find A Ride</a></li>
            <li class="hideOnMobile"><a href="#">Account Information</a></li>
            <li class="hideOnMobile"><a href="#">Account Information</a></li>
            <li style="background-color: orange;" class="hideOnMobile"><a href="#"><font color="white">Login/Sign Up</font></a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#1f1f1f"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>
        
        
    </nav>
    <div class="small-white-space"></div>
    <div style="text-align: center; font-size: 32px;"> Where do you want to go?</div>
    <div class="small-white-space"></div>
    <div class="main-body">
        <div class="view">
            <?php

            if (mysqli_num_rows($result) > 0) {
                while ($users = mysqli_fetch_assoc($result)) {
                    $contacts = $users['contacts'];
                    $profile = $users['profile_picture'];
                    $username = $users['username']; 
                    $password = $users['user_password'];
                    $gender = $users['gender'];
                    $DOB = $users['DOB'];

                    echo" 
            <div class='under-block'>
                <div class='carRow'>
                    <div class='carbox'>
                        <div style='height: 40%;' class='carLine'>
                            <div  class='carSeg'>
                                <div  class='circle'>
                                    <img src='$profile' alt='Profile Image' style='max-width: 60%; max-height: 60%; object-fit: contain;'>
                                </div>
                            </div>
                            <div style='width: 40%; font-size:24px;'class='carSeg'>
                                 <strong>$username </strong>
                            </div>
                        </div>
                        <div class='carLine'>
                            <div  class='carSeg'>
                                <svg xmlns='http://www.w3.org/2000/svg' height='26px' viewBox='0 -960 960 960' width='26px' fill='#000000'><path d='M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z'/></svg>
                            </div>
                            <div class='carSeg'>
                                 <strong>Max.$username passengers</strong>
                            </div>
                        </div>
                        <div class='carLine'>
                            <div  class='carSeg'>
                               <svg xmlns='http://www.w3.org/2000/svg' height='26px' viewBox='0 -960 960 960' width='26px' fill='#000000'><path d='M346-140 100-386q-10-10-15-22t-5-25q0-13 5-25t15-22l230-229-106-106 62-65 400 400q10 10 14.5 22t4.5 25q0 13-4.5 25T686-386L440-140q-10 10-22 15t-25 5q-13 0-25-5t-22-15Zm47-506L179-432h428L393-646Zm399 526q-36 0-61-25.5T706-208q0-27 13.5-51t30.5-47l42-54 44 54q16 23 30 47t14 51q0 37-26 62.5T792-120Z'/></svg>
                            </div>
                            <div class='carSeg'>
                                 <strong>Colors: ${username}</strong> 
                            </div>
                            
                        </div>
                        <div class='carLine'>
                            <div  class='carSeg'>
                               <svg xmlns='http://www.w3.org/2000/svg' height='26px' viewBox='0 -960 960 960' width='26px' fill='#000000'><path d='M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-40-84v-120q-60-12-102-54t-54-102H164q12 109 89.5 185T440-164Zm80 0q109-12 186.5-89.5T796-440H676q-12 60-54 102t-102 54v120ZM164-520h116l120-120h160l120 120h116q-15-121-105-200.5T480-800q-121 0-211 79.5T164-520Z'/></svg>
                            </div>
                            <div class='carSeg'>
                                 <strong>Brand: ${username}</strong> 
                            </div>
                            
                        </div>
                    </div>
                    <div class='carbox'>
                        <img src='$profile' alt = 'Car Image' style='max-width: 80%; max-height: 80%; object-fit: contain;'>
                    </div>
                    <div class='carbox'>
                        <div class='carprice'>
                            <div style='height: 30%; border-bottom: 3px solid; font-size: 24px;' class='carpriceRow'>
                                <strong>${username}</strong>
                            </div>
                            <div style='height: 70%;' class='carpriceRow'>
                                <div style='height: 40%; font-size:36px;' class='carpriceLines'>
                                    <strong>$${username}</strong>
                                </div>
                                 <div style='height: 20%;' class='carpriceLines'>
                                 For 1 passenger
                                </div>  
                                 <div style='height: 40%;' class='carpriceLines'>
                                    <button type='submit' class='subButton1'>BOOK NOW</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            "
            ;
            }
        } else {
            echo "<h1>No cars are available!</h1>";
        }
        ?>
        </div>
        

        <form action = "findCar.php" method = "POST">
            
            
        <div class="above-block">
            
        
            <div class="details-block">
                
                <div class="row">
                        <div class="details-box">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
                            <select class="dropdown" name="PUL" required="required">
                                
                                <option value = "">Pickup Location (City, Airport etc)</option>
                                <option value ="West_Malaysia">West Malaysia</option>
                                <option value ="East_Malaysia">East Malaysia</option>
                                <option value ="America">America</option>
                                <option value ="Europe">Europe</option>
                                <option value ="East_Asia">East Asia</option>  
                            </select>

                        
                        </div>
                        <div class="details-box">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg>
                            <select class="dropdown" name="PUL" required="required">
                                
                                <option value = "">Time </option>
                                <option value ="West_Malaysia">8:00</option>
                                <option value ="East_Malaysia">9:00</option>
                                <option value ="America">10:00</option>
                                <option value ="Europe">11:00</option>
                                <option value ="East_Asia">12:00</option>
                                <option value ="West_Malaysia">13:00</option>
                                <option value ="East_Malaysia">14:00</option>
                                <option value ="America">15:00</option>
                                <option value ="Europe">16:00</option>
                                <option value ="East_Asia">17:00</option>  
                                <option value ="West_Malaysia">18:00</option>
                                <option value ="East_Malaysia">19:00</option>
                                <option value ="America">20:00</option>
                                <option value ="Europe">21:00</option>
                                <option value ="East_Asia">22:00</option>  
                            </select>


                        </div>
                </div>
                <div class="row">
                    <div class="details-box">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
                        <select class="dropdown" name="PUL" required="required">
                            
                            <option value = "">Drop-off location (Your Destination)</option>
                            <option value ="West_Malaysia">West Malaysia</option>
                            <option value ="East_Malaysia">East Malaysia</option>
                            <option value ="America">America</option>
                            <option value ="Europe">Europe</option>
                        </select>



                    </div>
                    <div class="details-box">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                        <select class="dropdown" name="PUL" required="required">
                            
                            <option value = "">No. of passengers</option>
                            <option value ="1">1</option>
                            <option value ="2">2</option>
                            <option value ="3">3</option>
                            <option value ="4">4</option>  
                        </select>



                    </div>
                    
                </div>
                <div class="row">
                    <button type="submit" class="subButton"><font color="white"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>Search</font></button></div>
                </div>
                
            </div>
        

        </div>
        </form>
        
           
        
    </div>



















    <script>
        function showSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display='flex'
        }
        
        function hideSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display='none'
        }
    </script>
</body>
</html>