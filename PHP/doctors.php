<?php
require_once('conn.php');
$query="select * from dietician";
$result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dieticians</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #111;
      color: #fff;
      margin: 0;
      padding: 0;
    }
    .header {
      background-color: #111;
      padding: 50px 0;
      text-align: center;
    }
    .header h1 {
      margin: 0;
      color: #fff;
      font-size: 50px;
    }
    .container {
      max-width: 1600px;
      margin: 30px auto;
      padding: 0 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .doctor-card {
      background-color: #2b322f;
      padding: 40px;
      border-radius: 10px;
      margin-bottom: 20px;
      width: calc(25% - 20px);
      box-sizing: border-box;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .doctor-card:hover {
      transform: translateY(-5px);
    }
    .doctor-card img {
      width: 200px;
      height: 190px;
      border-radius: 50%;
      margin-bottom: 20px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .doctor-card h2 {
      margin: 0 0 10px 0;
      color: #fff;
      font-size: 20px;
      text-align: center;
    }
    .doctor-card p {
      margin: 0;
      color: #ccc;
      text-align: center;
      line-height: 21px;
    }

    .appointment-section {
  text-align: center;
  margin-top: 50px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0d5e11;
}

/* Modal styles */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #abababea;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
  border-radius: 5px;
  position: relative;
}

/* Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Form Styling */
form {
  margin-top: 20px;
}

label {
  font-weight: bold;
  color: #111;
}

input[type="text"],
input[type="number"],
select,
input[type="date"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

@keyframes filling {
	from{
	  background-position: center 25%;
	}
	to {
	  background-position: center 50%;
	}
  }
.abstract{
	text-align: center;
	background-image:  url(https://static.pexels.com/photos/4827/nature-forest-trees-fog.jpeg);
		-webkit-text-fill-color: transparent;
		background-clip: text;
		color:  #FFFFFF;
		padding-top: 20px;
		padding-bottom: 50px;
		font-size: 90px;
		font-family: sans-serif;
		font-weight: 990;
		animation: filling 3s ease forwards ;
}
  </style>
</head>
<body>
  <div class="header">
    <h1 class="abstract">MEET OUR TEAM OF DIETICIANS</h1>
  </div>
  <div class="container">
    <div class="doctor-card">
      <img src="drsjosh.jpg" alt="Dr. Suresh Joshi">
      <h2>Dr. Suresh Joshi</h2>
      <p>Phone no.: 9877898765</p>
      <p>Location: Mangalore</p>
    </div>
    <div class="doctor-card">
      <img src="drabhijeet.jpg"  alt="Dr. Abhijit Dey">
      <h2>Dr. Abhijit Dey</h2>
      <p>Phone no.: 9765678987</p>
      <p>Location: Manipal</p>
    </div>

    <div class="doctor-card">
        <img src="drsamarth.jpg"  alt="Dt. Samarth Patil">
        <h2>Dt. Samarth Patil</h2>
        <p>Phone no.: 8789887656</p>
        <p>Location: Udupi</p>
      </div>

      <div class="doctor-card">
        <img src="dranuradha.jpg" alt="Dt. Anuradha Vijay">
        <h2>Dt. Anuradha Vijay</h2>
        <p>Phone no.: 9877889899</p>
        <p>Location: Malpe</p>
      </div>

      <div class="doctor-card">
        <img src="drkiran.jpg" alt="Dr. Kiran Reddy">
        <h2>Dr. Kiran Reddy</h2>
        <p>Phone no.: 9566545655</p>
        <p>Location: Mangalore</p>
      </div>

      
      <div class="doctor-card">
        <img src="drdisha.jpg" alt="Dr. Disha Mathur">
        <h2>Dr. Disha Mathur</h2>
        <p>Phone no.: 9456754343</p>
        <p>Location: Manipal</p>
      </div>

      <div class="doctor-card">
        <img src="drswathi.png" alt="Dt. Swathi Bhatt">
        <h2>Dt. Swathi Bhatt</h2>
        <p>Phone no.: 9767874434</p>
        <p>Location: Udupi</p>
      </div>

      <div class="doctor-card">
        <img src="dralvin.jpg" alt="Dt. Alvin Joy">
        <h2>Dt. Alvin Joy</h2>
        <p>Phone no.: 9345667765</p>
        <p>Location: Malpe</p>
      </div>
  </div>
  <div class="appointment-section">
    <button onclick="showAppointmentForm()">Book an Appointment</button>
  </div>
  
  <div id="appointment-modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2 style="color: #111;">Book an Appointment</h2>
      <form id="appointment-form" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>
        <label for="doctor">Doctor:</label>
        <select id="doctor" name="doctor" required>

          <option value="" disabled selected>Select Doctor</option>
          <?php
                        while ($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <option value="<?php $row['doc_id'];?>"><?php echo $row['Name']?></option>
                        <?php
                        }
                        ?>
        </select><br><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required><br><br>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
  
  <script>
     function showAppointmentForm() {
      var modal = document.getElementById("appointment-modal");
      modal.style.display = "block";
    }
  
    function closeModal() {
      var modal = document.getElementById("appointment-modal");
      modal.style.display = "none";
    }
  
    window.onclick = function(event) {
      var modal = document.getElementById("appointment-modal");
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    function validateForm() {
      var form = document.getElementById("appointment-form");
      var dateInput = form.elements["date"];
      var selectedDate = new Date(dateInput.value);
      var currentDate = new Date();

      // Check if selected date is before the current date
      if (selectedDate < currentDate) {
        alert("Please select a future date for your appointment.");
        return false; // Prevent form submission
      }

      // If form data is valid, show success message
      alert("Appointment booked successfully. Check your email for updates.");
      return true; // Allow form submission
    }
  </script>
</body>
</html>
