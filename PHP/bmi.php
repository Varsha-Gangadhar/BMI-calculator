<?php
require_once('conn.php');
$query="select * from food";
$result=mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">

<style>
    .text-right{
                text-align: right;
            }
            
    body{
            font-family: Inter;
            font-size:40px;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #f7f2f2;
            margin: auto;
            display: block;
  }
        

     table,th,td{
            border-bottom: solid #b5a9a8 1px;
            border-collapse: collapse;
            font-size:16px;
        }

     table{
                width:30%;
                height:100%
                
        }


     td,th{
                padding:10px;
        }

    .box {
         width: 10px;
         height: 10px;
        }

    .blue {
         background: #3b79e3;
        }

    .green{
         background: #8cd158;
        }

    .yellow{
            background: #d9cd2e;
        }

    .red{
            background: #d42522;
        }

    .my-table1 tbody tr:nth-child(1) {
         background-color: #5E90AF;
         color: #000000;
        }

    .my-table2 tbody tr:nth-child(2) {
         background-color: #dfd;
         color: #000000;
        }

    .my-table3 tbody tr:nth-child(3) {
         background-color: #f6edc3;
         color: #000000;
        }

    .my-table4 tbody tr:nth-child(4) {
         background-color: #ffdfd5;
         color: #000000;
        }

    .container {
        width:60%;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 05px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top:3%;
  }

    .table5 {
    width:100%;
    border-collapse: collapse;
    background-color: rgba(0, 0, 0, 0.2);
  }

  .tdth_calorietable{
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  .header {
    background-color: rgba(255, 255, 255, 0.1);
  }

  tr:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.05);
  }

  tr:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }
  
  .pagination {
    display: flex;
    justify-content: center;
  }

  .pagination button {
    margin: 0 5px;
    padding: 5px 10px;
    background-color: rgba(255, 255, 255, 0.3);
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .pagination button:hover {
    background-color: rgba(255, 255, 255, 0.5);
  }

  .pagination button.active {
    background-color: rgba(255, 255, 255, 0.7);
  }

  .add-button {
    background-color: rgba(255, 255, 255, 0.5);
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
  }

  .add-button:hover {
    background-color: rgba(255, 255, 255, 0.7);
  }

  .box1 {
  flex: 1;
  margin: 10px;
  padding: 25px;
  background-color: rgba(255, 255, 255, 0.2); /* Transparent white */
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Glass morphism effect */
  line-height: 50px;
}

.box1 h4 {
  color: #5cb25d;
}

.box1 p {
  color: #000000;
  font-weight: 600;
  font-size: 30px;
}

.container1 {
  display: flex;
}

.toggle-container {
  width: 40%; /* Set fixed width */
  border: 3px solid #121212;
  border-radius: 50px;
  overflow: hidden; /* Ensure children don't overflow */
}

.toggle-group {
  display: flex;
  width: 100%; /* Ensure the group fills the container */
}

input[type="radio"] {
  display: none;
}

input[type="radio"] + label {
  cursor: pointer;
  padding: 8px 16px;
  background-color: rgba(255, 255, 255, 0.4);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  border: none; /* Remove individual borders */
  flex: 1; /* Fill available space */
  text-align: center; /* Center text */
  font-size:18px;
}

input[type="radio"]:checked + label {
  background-color: #5cb25d;
  color: #121212;
  font-weight:bold;
}

.search{
  background-color: rgba(255, 255, 255, 0.5);
    border: none;
    border-radius: 5px;
    width: 50%;
    height:30px;
}

</style>
</head>
    
<body>
<center>
<br><h4>Personal Result</h4><br>
<div style="font-size:20px;">
<?php
if ($_POST['login']) { 
    $mass = $_POST['weight'];
    $height = $_POST['height'];
    $gender= $_POST['gender'];
    $age= $_POST['age'];
    $activity= $_POST['activity'];

    $height2 = ($height*$height);
    $bmi = ($mass/$height2)*10000;
    $bmi_final = number_format((float)$bmi, 2, '.', '');
    
    echo "Your BMI value is  " . $bmi_final;
  
}
?>
  </div>
<br>
<table class="<?php if($bmi_final <= 18.5) {echo'my-table1';}
elseif ($bmi_final > 18.5 AND $bmi_final <= 24.9) {echo 'my-table2';}
elseif ($bmi_final > 24.9 AND $bmi_final <= 29.9) {echo 'my-table3';}
else{ echo 'my-table4';}?>">
<tbody>
<tr>
    <td style="width:20px;"><div class="box blue"></div></td>
    <td style="width:300px;"> Underweight </td>
    <td style="width:90px; text-align:center;"><= 18.5</td>
</tr>
<tr>
    <td><div class="box green"></div></td>
    <td> Normal Weight </td>
    <td style="text-align:center;">18.6-24.9</td>
</tr>
<tr>
    <td><div class="box yellow"></div></td>
    <td>Overweight</td>
    <td style="text-align:center;">25-29.9</td>
</tr>
<tr>
    <td><div class="box red"></div></td>
    <td> Obese </td>
    <td style="text-align:center;">>30.0</td>
</tr>
</tbody>
</table><br>
<h5>Your daily calorie intake:</h5><br>
<?php if($gender=="male")
{
    $BMR = (66 + (13.7*$mass) + (5*$height) - (6.8*$age));
}
elseif($gender=="female"){
    $BMR = (655.1  + (9.563*$mass) + (1.850*$height) - (4.676*$age));
}

if($activity=="Sedentary")
{
    $BMR_final=($BMR*1.2);
}
elseif($activity=="Moderate")
{
    $BMR_final=($BMR*1.55);
}
else
{
    $BMR_final=($BMR*1.725);
}
?>

<div class="container1">
  <div class="box1">
    <h4>Lose weight</h4>
    <p><?php
    echo round(($BMR_final-650),0)." - ".round(($BMR_final-550),0);?></p>

  </div>
  <div class="box1">
    <h4>Maintain weight</h4>
    <p><?php
echo round(($BMR_final-400),0)." - ".round(($BMR_final-200),0);?></p>
  </div>
  <div class="box1">
    <h4>Gain weight</h4>
    <p><?php
echo round(($BMR_final-10),0)." - ".round(($BMR_final+100),0);?></p>
  </div>
  </div>
</div>

<br>
<p style="font-size: 22px;">Pick ingredients from the table below to see which items align with your calorie count for your diet plan</p>
<br>

<h5><br> Current Calorie: </h5>
<div id="rowIndexDisplay"></div>
<div id="sumcalorieDisplay"></div>
<div style="font-size:20px;">
<p id="selectedItems"></p></div>
<input class="search" type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for names..">
<div class="container">
  <table id="myTable" class="table5">
    <thead>
      <tr>
        <th class="tdth_calorietable header">Product Name</th>
        <th class="tdth_calorietable header">Calories (in 100g)</th>
        <th class="tdth_calorietable header"> </th>
      </tr>
    </thead>
    <tbody>
    <tr>
                            <?php
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    ?>
                                    <td class="tdth_calorietable"><?php echo $row['food_name'];?></td>
                                    <td class="tdth_calorietable"><?php echo $row['calories']; ?></td>
                                    <td class="tdth_calorietable"><button class="add-button" onclick="sumcalorie(this)">Add</button></td>
                                </tr>
                                <?php
                                }
                                ?>
                        </tbody>

  </table>
</div>
                            </div>
<br>
<div class="pagination" id="pagination"></div>

</div>
<br>
<script>
  // Pagination logic
  const table = document.getElementById('myTable');
  const rowsPerPcalorie = 15; // Adjust as needed
  let currentPcalorie = 1;

  function displayTableRows(pcalorie) {
    const rows = table.getElementsByTagName('tbody')[0].rows;
    const startIndex = (pcalorie - 1) * rowsPerPcalorie;
    const endIndex = startIndex + rowsPerPcalorie;

    for (let i = 0; i < rows.length; i++) {
      if (i >= startIndex && i < endIndex) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  }

  function generatePaginationButtons() {
    const totalRows = table.getElementsByTagName('tbody')[0].rows.length;
    const totalPcalories = Math.ceil(totalRows / rowsPerPcalorie);

    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    for (let i = 1; i <= totalPcalories; i++) {
      const button = document.createElement('button');
      button.innerText = i;
      button.addEventListener('click', function() {
        currentPcalorie = i;
        displayTableRows(currentPcalorie);
        updatePaginationButtons();
      });
      pagination.appendChild(button);
    }

    updatePaginationButtons();
  }

  function updatePaginationButtons() {
    const buttons = document.querySelectorAll('.pagination button');
    buttons.forEach(button => {
      if (parseInt(button.innerText) === currentPcalorie) {
        button.classList.add('active');
      } else {
        button.classList.remove('active');
      }
    });
  }

  displayTableRows(currentPcalorie);
  generatePaginationButtons();

  //add calories
function sumcalorie(button) {
    const row = button.parentNode.parentNode; // Get the row containing the clicked button
    const rowIndex = row.rowIndex; // Get the index of the row

    // Display the row index on the screen
    //document.getElementById("rowIndexDisplay").innerText = "Row index: " + rowIndex;

    // Get the calorie from the row based on rowIndex
    const calorie = parseInt(row.cells[1].innerText);
    const itemName = row.cells[0].innerText;
    if (!isNaN(calorie)) {
      let totalcalorie = parseInt(document.getElementById("sumcalorieDisplay").innerText.replace(/\D/g, '')) || 0;
      totalcalorie += calorie;
      document.getElementById("sumcalorieDisplay").innerText = `${totalcalorie}`;
      const selectedItems = document.getElementById("selectedItems");
      selectedItems.innerHTML += `<br>${itemName} (${calorie} calories)`; 
    }

    // Display the calorie on the screen
    //document.getElementById("sumcalorieDisplay").innerText = "calorie: " + calorie;
}

function searchTable() {
    // Declare variables
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows
    for (i = 0; i < tr.length; i++) {
        if (tr[i].getElementsByTagName("td").length > 0) { // Exclude header row
            var found = false; // Flag to track if search query is found in any cell
            td = tr[i].getElementsByTagName("td");
            // Loop through all cells in the row
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break; // Exit inner loop if match found
                    }
                }
            }
            // Show or hide row based on search result
            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}



</script>
</center>

</body>
</html>
