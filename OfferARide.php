<?php

include 'dbconnect.php'; 

$sql = "SELECT * FROM users";
$result = mysqli_query($dbConn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer A Ride</title>
    <link rel="stylesheet" href="css/OfferARide.css">
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
    <div style="display: flex; justify-content: center;
    align-items: center;" class="small-white-space">
    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="#000000"><path d="M240-200v40q0 17-11.5 28.5T200-120h-40q-17 0-28.5-11.5T120-160v-320l84-240q6-18 21.5-29t34.5-11h440q19 0 34.5 11t21.5 29l84 240v320q0 17-11.5 28.5T800-120h-40q-17 0-28.5-11.5T720-160v-40H240Zm-8-360h496l-42-120H274l-42 120Zm-32 80v200-200Zm100 160q25 0 42.5-17.5T360-380q0-25-17.5-42.5T300-440q-25 0-42.5 17.5T240-380q0 25 17.5 42.5T300-320Zm360 0q25 0 42.5-17.5T720-380q0-25-17.5-42.5T660-440q-25 0-42.5 17.5T600-380q0 25 17.5 42.5T660-320Zm-460 40h560v-200H200v200Z"/></svg>
    </div>
    <div style="margin-bottom: 2rem; text-align: center; font-size: 32px;"> Please select a car</div>
    
    <div class="main-body">
    <div class ="under-block">
        
    </div>
    <div style="margin-bottom: 2rem; text-align: center; font-size: 32px;"> This is how your post will look</div>
        
        <div class="above-block">
        <select class="dropdown" name="SC" required onchange="displayCarInfo(this.value)"> 
            <option value="">Select a Car</option> 
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($users = mysqli_fetch_assoc($result)) {
                        $contacts = $users['contacts'];
                        $profile = $users['profile_picture'];
                        $username = $users['username']; 
                        $password = $users['user_password'];
                        $gender = $users['gender'];
                        $DOB = $users['DOB'];

                        echo "<option value='$contacts' 
                                data-username='$username' 
                                data-profile='$profile' 
                                data-password='$password' 
                                data-gender='$gender' 
                                data-dob='$DOB'>
                                $username
                            </option>";
                    }
                } else {
                    echo "<option value=''>No Cars Found!</option>";
                }
            ?>
            <option value="add_car">Add a Car+</option>
        </select>
        </div>
    </div>



<script>

    function displayCarInfo(value) {
        if (value === "add_car") {
            window.location.href = "AccountInformation.html"; // Redirect to account info page
        } else {
            
            let selectedOption = document.querySelector(`option[value='${value}']`);
            
            // Retrieve data attributes
            let username = selectedOption.getAttribute("data-username");
            let profile = selectedOption.getAttribute("data-profile");
            let password = selectedOption.getAttribute("data-password");
            let gender = selectedOption.getAttribute("data-gender");
            let dob = selectedOption.getAttribute("data-dob");

          
            document.querySelector(".under-block").innerHTML = `
                <div class='carRow'>
                    <div  class='carbox'>
                        <div style='height: 40%;' class='carLine'>
                            <div  class='carSeg'>
                                <div  class='circle'>
                                    <img src='${profile}' alt='Profile Image' style='max-width: 60%; max-height: 60%; object-fit: contain;'>
                                </div>
                            </div>
                            <div style='width: 40%; font-size:24px;'class='carSeg'>
                                 <strong>${username} </strong>
                            </div>
                        </div>
                        <div class='carLine'>
                            <div  class='carSeg'>
                                <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                            </div>
                            <div class='carSeg'>
                                 <strong>Max.${username} passengers</strong> 
                            </div>
                            
                        </div>
                        <div class='carLine'>
                            <div  class='carSeg'>
                               <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M346-140 100-386q-10-10-15-22t-5-25q0-13 5-25t15-22l230-229-106-106 62-65 400 400q10 10 14.5 22t4.5 25q0 13-4.5 25T686-386L440-140q-10 10-22 15t-25 5q-13 0-25-5t-22-15Zm47-506L179-432h428L393-646Zm399 526q-36 0-61-25.5T706-208q0-27 13.5-51t30.5-47l42-54 44 54q16 23 30 47t14 51q0 37-26 62.5T792-120Z"/></svg>
                            </div>
                            <div class='carSeg'>
                                 <strong>Colors: ${username}</strong> 
                            </div>
                            
                        </div>
                        <div class='carLine'>
                            <div  class='carSeg'>
                               <svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#000000"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-40-84v-120q-60-12-102-54t-54-102H164q12 109 89.5 185T440-164Zm80 0q109-12 186.5-89.5T796-440H676q-12 60-54 102t-102 54v120ZM164-520h116l120-120h160l120 120h116q-15-121-105-200.5T480-800q-121 0-211 79.5T164-520Z"/></svg>
                            </div>
                            <div class='carSeg'>
                                 <strong>Brand: ${username}</strong> 
                            </div>
                            
                        </div>
                
                    </div>
                    <div class='carbox'>
                        <img src='${profile}' alt='Profile Image' style='max-width: 80%; max-height: 80%; object-fit: contain;'>
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
                                    <button type='submit' class='subButton'>PUBLISH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
    }
</script>

