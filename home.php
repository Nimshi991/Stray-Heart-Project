<?php


include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> 
    <style>
    
* {
    margin: 0;
    padding: 0;
   }

body {
    background-color:rgb(238, 212, 238);
}

.navbar {
    display: flex;
    align-items: center;
    justify-content: center;
    background:linear-gradient(90deg,#7f00ff,#e100ff);
    padding: 15px 30px;
}

.nav-links {
    display: flex;
    font-size: 20px;
    gap: 20px;
    list-style: none;
}

.nav-links li a {
    color: white;
    text-decoration: none;
    font-family:Arial;
}

.hero-section {
    background: url('image/360_F_635084035_npVqkr7DYFWaqzIx04OnV4S5GYTqB7Mg.jpg') no-repeat center center/cover;
    background-attachment: fixed;
    color: white;
    padding: 100px;
    text-align: center;
}

.hero-section h1 {
    font-size: 3rem;
    margin-bottom: 10px;
}

.hero-section p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.hero-section .btn {
    display: inline-block;
    padding: 12px 20px;
    background-color: rgb(243, 114, 243);
    color:black;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    font-size: 15px;
}

.hero-section .btn:hover {
    background-color:white;
}

.about-section {
    padding: 50px 20px;
    text-align: center;
    background-color: #fff;
    margin-top: 30px;
}

.about-section h2 {
    font-size: 27px;
    color: #333;
    margin-bottom: 20px;
}

.about-section p {
    font-size: 18px;
    color:black;
    max-width: 600px;
    margin: 0 auto 30px;
}

.pet-images {
    display: flex;
    gap: 20px;
    justify-content: center;
}

.pet-images img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.footer-section {
    background:linear-gradient(90deg,#7f00ff,#e100ff);
    color: white;
    text-align: center;
    padding: 20px 0;
}

.footer-section p {
    margin: 5px 0;
    font-size:15px ;
}

.socials {
             font-size: 1.5em;
        }

.socials a{
    color: white;
}

.socials a:hover{
    background-color:purple;
}

    </style>
</head>
<body>
    <nav class="navbar">
         <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA4lJREFUSEvFlk1oHVUUx89/3oczL+/dSQxRBBOxoGgjQiHduomhi24EEa2tH4i4EIUWFxYVRMSVmlYoflVBsBZ3LkRBqXThTqTVRTYRUiVEYzFpZm7IzLzXmb/O63thXmbmvXm1kNnN/Ti/+z/n3HsOZJc+7BJXhgKTLHmuOyPklAHcGh86IlcJ/FFT6gKAsKiQQmDf9/dIEBwT4CBF7CzjEFkX4BtevXrSGhv7fdAB+oJJWoHWr1PkGREpDTIWzwNoMgxPLa2svD09Pd3M25ML3lpbm0Sl8qWI3FMEmFpDXjSBx6DUPzkeSg/7rnu3iHxLkbHrgnY2QeSvqFw+UKvVVnbaSSmm1hMBeZ4it/0faGLvotlozALYStpLgT3X/VREHrpB0K6ZjyylXskFB1rvjcgf+yTEqgCXSd4nIkZnXQhggWR8vdpXLOVWILgJ2Id6/e/uXI9iz3HeF+DRjL2hkMcs2/4invOuXLlDSqWzEAmjVutwbXx8uT3uOE8K8E7mDYiieWt09K0UeGFhobpncnJRRBoZGXrUsu3Pk+PU+hZNhkqpteR4B34ipZq8ZNr2TArsaf2AkF9lQC9Ytj03TMx9rc+TvD8Fr1b3m6a5FI9vuzrY3DwURdGpjLT/xFTq5aHArvsuRZ7OUP24advf9YB9x3mBwBsZmfGz1WgcGAqco1hEjltKne4Fa/38f0XgzUyAYbxo1etni8A9x3lCgJM52f2a2Wh80APe0vphkB/nbGgSOGLV6z/0g3ubm7Mgz5CsZq2jyLM1pdp5tB3j5sbGTGgYbf9nfkALYXjEHB09lzXvb2w8yFLpjJCVPBMlw5it1uu/9IBJItB6kSI357ORqXyQ0o69y2ajsRcAe8Dxj++68xR5qm8sgZYAh7tuL6K0AzptKnW8a7v35fK8O6XV+inxHOZ4/ZrytsE+MU1sDlku70tWqVSR8LX+kOQjgzIYQMD4ve4T04S6z0ylXkraTIFd1x2vAudITg2CF5z/zQyCOUxM6L7gdqzjHqvZ/P4GNAKrYak0NzIy8ufOQ+a2Pt76+pSUy/GjcW9BZTuX/WoaxqFkKRyouLuAZM3X+lUReW5Qwm3HM272yPeWlpfnr6vZS57Od5y7IpGjAA5mls1rL9G6iHwdtVonuvW5n6cK9dUJD5Q9rfdLFN2ebOjLlcqlSq12EUBUNCxDgYsaLbJu18D/AhpUdi7hVbBXAAAAAElFTkSuQmCC">&nbsp;&nbsp;&nbsp;&nbsp;
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Pet List</a></li>
            <li><a href="hospital.php">Hospital List</a></li>
            <li><a href="#">Donation</a></li>
        </ul>
    </nav>

    <header class="hero-section" id="home">
        <h1>Welcome to StaryHearts</h1>
        <p>Helping pets find a loving forever home</p>
        <a href="hospital.php"class="btn">Learn More About Pets</br>Throught The Pet List</a>
    </header>

    <section class="about-section" id="about">
        <h2>Why Adopt a Pet?</h2>
        <p>Adopting a pet means saving a life and giving a homeless animal a second chance.
            Adopting a pet saves a life and brings endless joy and companionship to your home.
            By adopting, you’re giving a homeless animal a second chance, reducing overpopulation, 
            and gaining a loyal friend who will fill your life with love and gratitude. Choose adoption and make a difference!.</p>
        <div class="pet-images">
            <img src="image/istockphoto-1069531070-170667a.jpg">
            <img src="image/kittenswhite.jpg">
            <img src="image/ai-generated-lovebirds-agapornis-fischeri-captured-together-in-isolation-on-a-clean-white-backdrop-ai-generated-photo.jpg">
        </div>
    </section>

    <footer class="footer-section" id="contact">
        <p> &copy; 2024 Pet Adoption Center | Designed with ❤ for Pets</p>
    </br>
        <div class="socials">
            <i><a href="#" class="fab fa-facebook"></i></a>
            &nbsp&nbsp<i><a href="#" class="fab fa-whatsapp"></i></a>
            &nbsp&nbsp<i><a href="#" class="fab fa-instagram"></i></a>
      </div>
    </footer>

</body>
</html>
