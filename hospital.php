<?php

include 'config.php';



if (isset($_GET['city']) && !empty($_GET['city'])) {
    $city = $_GET['city'];

    
    $stmt = $connection->prepare("SELECT * FROM hospitals WHERE city LIKE :city");
    $stmt->bindValue(':city', '%' . $city . '%'); 
    $stmt->execute();
    $hospitals = $stmt->fetchAll();
} else {
    
    $stmt = $connection->prepare("SELECT * FROM hospitals");
  
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital List</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet"href="./css/css.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> 
     <style>


.navbar {
    display: flex;
    justify-content: center;
    background:linear-gradient(90deg,#7f00ff,#e100ff);
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
    padding:0 2px;
}

      p{
               font-family:Comic Sans MS;
               font-size:18px;
              }
     
      .img{
               list-style-image:url('hospital.PNG');
               float: right;
               width: 450px;
              }

  .search-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    padding: 10px;
}

.search-container form {
    display: flex;
    gap: 10px; 
}

.search-container input[type="text"] {
    padding: 8px 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 250px; 
}

.search-container button {
    padding: 8px 16px;
    font-size: 16px;
    color: #fff;
    background-color: #7f00ff; 
    border: none;
    border-radius: 4px;
    cursor: pointer;
   
}

.search-container button:hover {
    background-color: #5e00cc; 
}

.search-container i {
    font-size: 1.5em;
    color: #7f00ff; 
    margin-left: 5px; 
}

      
      th{
              font-size: 15px;
              font-family:cambria;
      }
          
      td{
             font-size: 15px;
             font-family:Arial;
      }

</style>
</head>
<body>
<nav class="navbar">
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA4lJREFUSEvFlk1oHVUUx89/3oczL+/dSQxRBBOxoGgjQiHduomhi24EEa2tH4i4EIUWFxYVRMSVmlYoflVBsBZ3LkRBqXThTqTVRTYRUiVEYzFpZm7IzLzXmb/O63thXmbmvXm1kNnN/Ti/+z/n3HsOZJc+7BJXhgKTLHmuOyPklAHcGh86IlcJ/FFT6gKAsKiQQmDf9/dIEBwT4CBF7CzjEFkX4BtevXrSGhv7fdAB+oJJWoHWr1PkGREpDTIWzwNoMgxPLa2svD09Pd3M25ML3lpbm0Sl8qWI3FMEmFpDXjSBx6DUPzkeSg/7rnu3iHxLkbHrgnY2QeSvqFw+UKvVVnbaSSmm1hMBeZ4it/0faGLvotlozALYStpLgT3X/VREHrpB0K6ZjyylXskFB1rvjcgf+yTEqgCXSd4nIkZnXQhggWR8vdpXLOVWILgJ2Id6/e/uXI9iz3HeF+DRjL2hkMcs2/4invOuXLlDSqWzEAmjVutwbXx8uT3uOE8K8E7mDYiieWt09K0UeGFhobpncnJRRBoZGXrUsu3Pk+PU+hZNhkqpteR4B34ipZq8ZNr2TArsaf2AkF9lQC9Ytj03TMx9rc+TvD8Fr1b3m6a5FI9vuzrY3DwURdGpjLT/xFTq5aHArvsuRZ7OUP24advf9YB9x3mBwBsZmfGz1WgcGAqco1hEjltKne4Fa/38f0XgzUyAYbxo1etni8A9x3lCgJM52f2a2Wh80APe0vphkB/nbGgSOGLV6z/0g3ubm7Mgz5CsZq2jyLM1pdp5tB3j5sbGTGgYbf9nfkALYXjEHB09lzXvb2w8yFLpjJCVPBMlw5it1uu/9IBJItB6kSI357ORqXyQ0o69y2ajsRcAe8Dxj++68xR5qm8sgZYAh7tuL6K0AzptKnW8a7v35fK8O6XV+inxHOZ4/ZrytsE+MU1sDlku70tWqVSR8LX+kOQjgzIYQMD4ve4T04S6z0ylXkraTIFd1x2vAudITg2CF5z/zQyCOUxM6L7gdqzjHqvZ/P4GNAKrYak0NzIy8ufOQ+a2Pt76+pSUy/GjcW9BZTuX/WoaxqFkKRyouLuAZM3X+lUReW5Qwm3HM272yPeWlpfnr6vZS57Od5y7IpGjAA5mls1rL9G6iHwdtVonuvW5n6cK9dUJD5Q9rfdLFN2ebOjLlcqlSq12EUBUNCxDgYsaLbJu18D/AhpUdi7hVbBXAAAAAElFTkSuQmCC">
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Pet List</a></li>
            <li><a href="hospital.php">Hospital List</a></li>
            <li><a href="#">Donation</a></li>
        </ul>
    </nav>
  </br>

    <p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Veterinary hospital</b> is a specialized medical facility where animals, primarily pets likes doges, cats, birds and other small animals, receive professional Veterinary care.</br>
    Services offered include preventive care such as vaccinations, dental care, diagnostics,surgical procedures, emergency Services, and treatment for various illnesses or injuries. Staffed by verinarians and Veterinary techniciancs, the hospital is equipped to handle both routine health maintenance and complex medical issues, ensuring the health and</br>
    well-being of pets.Sometimes specialized departments such as oncology, dentistry, or orthopedics. Veterinary hospitals may also provide rehailitation, nutritional counseling, and behavioral consultations.Additionally , these hospitals may offer boarding and grooming services, as well as preventative care like vaccinations and health check-ups.</br>            
   </p>
    
    <div class="img">
      <img src="./image/hospital.PNG"height="300"width="400">
    </div>
    </br></br></br> </br></br></br> </br></br></br>

    <div class="search-container">
    <form method="GET" action="">
        <input type="text" name="city" id="searchInput" placeholder="Search">
        <button type="submit">Search</button>
        <i class="fa fa-search"></i>
    </form>
</div>


    <table class="table table-light table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Type</th>
            <th scope="col">Email</th>
            <th scope="col">Website</th>
            <th scope="col">Services</th>
            <th scope="col">Open-Close Time</th>
            
          </tr>
        </thead>
        <?php if (empty($hospitals)) : ?>
            <p>No hospitals found for the specified city.</p>
        <?php else : ?>

        <tbody>
        <?php foreach ($hospitals as $hospital) : ?>
                <tr>
                    <td><?= $hospital['id']; ?></td>
                    <td><?= $hospital['name']; ?></td>
                    <td><?= $hospital['address']; ?></td>
                    <td><?= $hospital['city']; ?></td>
                    <td><?= $hospital['phone_number']; ?></td>
                    <td><?= $hospital['type']; ?></td>
                    <td><?= $hospital['email']; ?></td>
                    <td><a href="<?= $hospital['website']; ?>">Visit</a></td>
                    <td><?= $hospital['service']; ?></td>
                    <td><?= $hospital['open_close_time']; ?></td>
                </tr>
            <?php endforeach; 
            ?>
          <tr>
            <th scope="row">001</th>
            <th scope="row">Veterinary Hospital Peradeniya</th>
            <td>Colombo-Kandy Hwy,Kandy</td>
            <td>Kandy</td>
            <td>+94 81 2 388056</td>
            <td>Government</td>
            <td>info@vet.pdn.ac.lk</td>
            <td>https://vet.pdn.ac.lk/vth/</td>
            <td>Comprehensive veterinary care,</br>including surgery, radiology,</br>and laboratory services.
            <td>Monday-Friday: 8:00 AM - 4:00 PM</td>
            </tr>
          <tr>
            <th scope="row">002</th>
            <th scope="row">Universal Vets Animal Hospital</th>
            <td>Minuwangoda Road, Udugampola</td>
            <td>Gampaha</td>
            <td>+94 77 3 368757</td>
            <td>Private</td>
            <td>info@universalvets.lk</td>
            <td>https://universalvets.lk/</td>
            <td>Universal Vets Animal Hospital provides full-service veterinary care for pets,including exams, vaccinations, and emergency care.</td>
            <td>Daily: 9:00 AM - 12:30 PM,</br>5:00 PM - 8:00 PM</td>
          </tr>
          <tr>
            <th scope="row">003</th>
            <th scope="row">Kegalu Animal Clinic</th>
            <td>Kegalle Bypass Road, Kegalle</td>
            <td>Kegalle</td>
            <td>+94 76 9 162363</td>
            <td>Government</td>
            <td><center>-</center></td>
            <td>Department of Animal</br>Production and Health</br> Website: www.daph.gov.lk</td>
            <td>Kegalu Animal Clinic offers a range</br> of veterinary services, including health check-ups, vaccinations, treatments, and emergency care, dedicated to the well-being of pets.</td>
            <td>Monday-Friday: 8:30 AM - 8:00 PM</td>
          </tr>
          <tr>
            <th scope="row">004</th>
            <th scope="row">The Veterinary Hospital Kurunegala</th>
            <td>No. 114 Bauddhaloka Mawatha, Kurunegala</td>
            <td>Kurunegala</td>
            <td>+94 37 2 223435</td>
            <td>Government</td>
            <td><center>-</center></td>
            <td><center>-</center></td>
            <td>The Veterinary Hospital Kurunegala provides essential pet healthcare services, including medical check-ups, vaccinations, treatments, and emergency care, focused on supporting pet health and wellness.</td>
            <td>Everyday: 8:00 AM - 10:00 PM</td>
          </tr>
          <tr>
            <th scope="row">005</th>
            <th scope="row">Rover Veterinary Hospital</th>
            <td>123, 4 Battaramulla - Pannipitiya Rd,</br>Battaramulla</td>
            <td>Colombo</td>
            <td>+94 77 0 844753</td>
            <td>Private</td>
            <td>info@rovervets.com</td>
            <td>https://rovervets.com</td>
            <td>Rover Veterinary Hospital offers full-service veterinary care, including wellness exams, vaccinations, surgeries, and emergency treatment, dedicated to keeping pets healthy and happy.</td>
            <td>Open 24 hours, seven days a week for emergency and critical care services.Regular operating hours for non-emergancy</br>services are from 8:00 AM - 10:00 PM</td>
          </tr>
          <tr>
            <th scope="row">006</th>
            <th scope="row">Rambukkana Animal Hospital</th>
            <td>Mihindu mawatha, Rambukkana</td>
            <td>Rambukkana</td>
            <td>+94 71 3 385378</td>
            <td>Government</td>
            <td><center>-</center></td>
            <td><center>-</center></td>
            <td>Rambukkana Animal Hospital provides veterinary care services, including routine check-ups, vaccinations, treatments, and emergency care, focused on promoting pet health and well-being.</td>
            <td>Monday-Thursday: 3:30 PM - 7:30 PM,</br>Friday hours</td>
          </tr>
          <tr>
            <th scope="row">007</th>
            <th scope="row">Best Pet Veterinary Hospital</th>
            <td>370/1, Colombo Road, Gampaha</td>
            <td>Gampaha</td>
            <td>+94 77 7 708292</br>+94 33 2 222434</td>
            <td>Private</td>
            <td>brstcareanimalhospital@gmail.com</td>
            <td>https://WWW.bestcareanimalhospital.com</td>
            <td>Best Pet Veterinary Hospital offers comprehensive pet care, including wellness exams, vaccinations, surgical services, and emergency care, all aimed at ensuring pets' health and happiness.</td>
            <td>Monday-Thursday: 10:00 AM - 7:30 PM,</br>It's closed on Fridays and Poya days</td>
          </tr>
          <tr>
            <th scope="row">008</th>
            <th scope="row">Pet Care Animal Clinic and Surgery</th>
            <td>Naranbedda Road, Dewalegama</td>
            <td>Kegalle</td>
            <td>+94 77 3 580486</td>
            <td>Private</td>
            <td> petcarecliniccolombo@gmail.com</td>
            <td> http://petcare.lk</td>
            <td>Pet Care Animal Clinic and Surgery provides full veterinary services, including health check-ups, vaccinations, surgical procedures, and emergency care, focused on comprehensive pet health.</td>
            <td>Monday-Thursday: 9:00 AM - 10:00 PM</br>Friday hours</td>
          </tr>
          <tr>
            <th scope="row">009</th>
            <th scope="row">Animal SOS Sri Lanka</th>
            <td>Puwakwatta, Kongalahena, Midigama,<br> Ahangama, Matara, Sri Lanka</td>
            <td>Mathara</td>
            <td>+94 41 228 0016</td>
            <td>Private</td>
            <td>info@animalsos-sl.com </td>
            <td>WWW.animalsos-sl.com</td>
            <td>Rescue, rehabilitation, vaccinations, sterilizations, and emergency care.</td>
            <td>daily: 9:00 AM - 5:00 PM</td>
          </tr>
          <tr>
            <th scope="row">010</th>
            <th scope="row">District Veterinary Office - Ratnapura</th>
            <td>Veterinary Office, New Town,</br> Ratnapura, Sri Lanka</td>
            <td>Rathnapura</td>
            <td>+94 45 222 2264</td>
            <td>Government</td>
            <td><center>-</center></td>
            <td>The District Veterinary Office does not have a specific website, but more information may be available on the Department of Animal Production and Health website: www.daph.gov.lk</td>
            <td>Focuses on livestock and production animals but also offers services for household pets.</td>
            <td>Monday to Friday: 8:30 AM – 4:15 PM</br>
            Closed on Saturdays, Sundays, and Public Holidays</td>
          </tr>
        </tbody>
          <?php endif; ?>
      </table>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>