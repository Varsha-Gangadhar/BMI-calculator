<?php
require_once('conn.php');
$query="select * from dietician";
$result=mysqli_query($conn,$query);
$query1="select * from subcat";
$result1=mysqli_query($conn,$query1);
$query2="select * from food";
$result2=mysqli_query($conn,$query2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style3.css">
    <style>
      /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#" onclick="showDietitianForm()">Modify Dietitian Information</a></li>
            <li><a href="#" onclick="showfoodForm()">Modify Food Category Information</a></li>
            <li><a href="#" onclick="showfoodinsForm()">Modify Food Information</a></li>
            <li><a class="a2" href="mainpagenutri.html">Logout</a></li>
        </ul>
    </div>

    <div class="main-content" id="main">
        <section id="dietitian" class="section" style="display: none;">
            <h1>Dietitian Update</h1>
            <header>
                <nav>
                    <div class="container1">
                        <button onclick="showForm('insertForm')">Insert</button>
                        <button onclick="showForm('updateTable')">Modify</button>
                    </div>
                </nav>
            </header><br>
            <div id="insertForm" class="form-section">
                <form method="post" action="diet_insert.php" enctype="multipart/form-data">
                    <label for="dname">Name:</label>
                    <input type="text" id="dname" name="dname" required><br>
                    <label for="pno">Phone No:</label>
                    <input type="text" id="pno" name="pno" pattern="[0-9]{10}" required><br>
                    <label for="loc">Location:</label>
                    <input type="text" id="loc" name="loc" required><br><br>
                    <label for="profilePic">Profile Picture:</label>
                    <input type="file" id="pic" name="pic"><br><br>
                    <input type="submit" id="submit" name="submit" value="Submit">
                </form>
            </div>  <br>

            <div id="updateTable" class="form-section" style="display: none;">
                <div class="container2">
                    <table class="table5" id="myTable">
                        <thead>
                            <tr>
                                <th class="tdth_calorietable header">Doc_id</th>
                                <th class="tdth_calorietable header">Name</th>
                                <th class="tdth_calorietable header">Phone No</th>
                                <th class="tdth_calorietable header">Location</th>
                                <th class="tdth_calorietable header">Image</th>
                                <th class="tdth_calorietable header"></th>
                                <th class="tdth_calorietable header"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $result contains fetched data
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="tdth_calorietable"><?php echo $row['doc_id']; ?></td>
                                    <td class="tdth_calorietable"><?php echo $row['Name']; ?></td>
                                    <td class="tdth_calorietable"><?php echo $row['ph_no']; ?></td>
                                    <td class="tdth_calorietable"><?php echo $row['loc']; ?></td>
                                    <td class="tdth_calorietable"><?php echo $row['file_name']; ?></td>
                                    <td class="tdth_calorietable">
                                    <button onclick="showUpdateForm('<?php echo $row['doc_id']; ?>','<?php echo $row['Name']; ?>','<?php echo $row['ph_no']; ?>','<?php echo $row['loc']; ?>')">Update</button>
                                    </td>
                                    <td class="tdth_calorietable">
                                    <button onclick="confirmDelete('<?php echo $row['doc_id']; ?>')">Delete</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
    
                        </tbody>
                    </table>
                    
                </div>
            </div>

            <div id="updateForm" class="form-section" style="display: none;">
                <h2>Update Dietitian Information</h2>
                <form method="post" action="diet_update.php" enctype="multipart/form-data">
                    <input type="hidden" id="updateDocId" name="updateDocId">
                    <label for="updateDname">Name:</label>
                    <input type="text" id="updateDname" name="updateDname" required><br>
                    <label for="updatePno">Phone No:</label>
                    <input type="text" id="updatePno" name="updatePno" pattern="[0-9]{10}" required><br>
                    <label for="updateLoc">Location:</label>
                    <input type="text" id="updateLoc" name="updateLoc" required><br><br>
                    <label for ="updatepic">Profile picture:</label>
                    <input type="file" id="updatepic" name="updatepic"><br><br>
                    <input type="submit" id="updateSubmit" name="updateSubmit" value="Update">
                </form>
            </div>
        </section>
    </div>

<!--food cat information update-->
    <div class="main-content" id="main">
        <section id="food" class="section" style="display: none;">
            <h1>Food Category Update</h1>
            <header>
                <nav>
                    <div class="container1">
                        <button onclick="showForm('foodcatinsertform')">Insert</button>
                        <button onclick="showForm('foodcatupdate')">Modify</button>
                    </div>
                </nav>
            </header><br>
            <!--food cat insert form-->
            <div id="foodcatinsertform" class="form-section">
                <form method="post" action="cat_insert.php" enctype="multipart/form-data">
                    <label for="catname">Category Name:</label>
                    <input type="text" id="catname" name="catname" required><br>
                    <label for="catid">Category Id:</label>
                    <select name="catid" id="catid" required>
                        <option value="M1">Non veg</option>
                        <option value="M2">Veg</option>
                    </select>
                    <br><br>
                    <input type="submit" id="submit" name="submit" value="Submit">
                </form>
            </div>
<!--food cat update -->

<div id="foodcatupdate" class="form-section" style="display: none;">
                <div class="container2">
                    <table class="table5" id="myTable">
                        <thead>
                            <tr>
                                <th class="tdth_calorietable header">Main Category ID</th>
                                <th class="tdth_calorietable header">Category ID</th>
                                <th class="tdth_calorietable header">Category Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $result contains fetched data
                            while ($row = mysqli_fetch_assoc($result1)) {
                            ?>
                                <tr>
                                    <td class="tdth_calorietable"><?php echo $row['cat_id']; ?></td>
                                    <td class="tdth_calorietable"><?php echo $row['subcat_id']; ?></td>
                                    <td class="tdth_calorietable"><?php echo $row['food_cat']; ?></td>
                                    <td class="tdth_calorietable">
                                    <button onclick="showcatUpdateForm('<?php echo $row['cat_id']; ?>','<?php echo $row['subcat_id']; ?>','<?php echo $row['food_cat']; ?>')">Update</button>
                                    </td>
                                    <td class="tdth_calorietable">
                                    <button onclick="confirmcatDelete('<?php echo $row['subcat_id']; ?>')">Delete</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
    
                        </tbody>
                    </table>
                    
                </div>
            </div>

            <!--food cat update form-->

            <div id="catupdateForm" class="form-section" style="display: none;">
                <h2>Update Food Category Information</h2>
                <form method="post" action="cat_update.php" enctype="multipart/form-data">
                    <input type="hidden" id="updatesubcatid" name="updatesubcatid">
                    <label for="updatecatid">Category Id:</label>
                    <input type="text" id="updatecatid" name="updatecatid" required><br>
                    <label for="updatecatname">Category Name:</label>
                    <input type="text" id="updatecatname" name="updatecatname" required><br>
                    <br><br>
                    <input type="submit" id="updateSubmit" name="updateSubmit" value="Update">
                </form>
            </div>
        </section>
    </div>

    <!--food information update-->
    <div class="main-content" id="main">
        <section id="food2" class="section" style="display: none;">
            <h1>Food Information Update</h1>
            <header>
                <nav>
                    <div class="container1">
                        <button onclick="showForm('foodinsertform')">Insert</button>
                        <button onclick="showForm('foodinfoupdate')">Modify</button>
                    </div>
                </nav>
            </header><br>

<!--food insert form-->
<div id="foodinsertform" class="form-section">
                <form method="post" action="food_insert.php" enctype="multipart/form-data">
                    <label for="subcatid2">Category:</label>
                    <select name="subcatid2" id="subcatid2" required>
                    <?php
                        mysqli_data_seek($result1, 0);
                        while ($row = mysqli_fetch_assoc($result1))
                        {
                        ?>
                        <option value="<?php echo $row['subcat_id']; ?>"> <?php echo $row['food_cat']; ?></option>
                        <?php
                        }
                        ?>
                    </select><br><br>
                    <label for="foodname">Food Name:</label>
                    <input type="text" id="foodname" name="foodname" required><br>
                    <label for="cal">Calories:</label>
                    <input type="text" id="cal" name="cal" required><br>
                    <br><br>
                    <input type="submit" id="submit" name="submit" value="Submit">
                </form>
            </div>
<!--food information update table-->
<div id="foodinfoupdate" class="form-section" style="display: none;">
                <div class="container2">
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for names..">
                    <table class="table5" id="myTable3">
                        <thead>
                            <tr>
                                <th class="tdth_calorietable header">Category ID</th>
                                <th class="tdth_calorietable header">Food Name</th>
                                <th class="tdth_calorietable header">Calories</th>
                                <th class="tdth_calorietable header"></th>
                                <th class="tdth_calorietable header"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $result contains fetched data
                            while ($row = mysqli_fetch_assoc($result2)) {
                            ?>
                                <tr>
                                    <td class="tdth_calorietable"><?php echo $row['subcat_id']; ?></td>
                                    <td class="tdth_calorietable"><?php echo $row['food_name']; ?></td>
                                    <td class="tdth_calorietable"><?php echo $row['calories']; ?></td>
                                    <td class="tdth_calorietable">
                                    <button onclick="showinfoUpdateForm('<?php echo $row['food_id']; ?>','<?php echo $row['subcat_id']; ?>','<?php echo $row['food_name']; ?>','<?php echo $row['calories']; ?>')">Update</button>
                                    </td>
                                    <td class="tdth_calorietable">
                                    <button onclick="confirminfoDelete('<?php echo $row['food_id']; ?>')">Delete</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
    
                        </tbody>
                    </table>
                    
                </div>
            </div>
<!--food info update form-->

            <div id="infoupdateForm" class="form-section" style="display: none;">
                <h2>Update Food Information</h2>
                <form method="post" action="food_update.php" enctype="multipart/form-data">
                    <input type="hidden" id="updatefoodid" name="updatefoodid">
                    <label for="updatecatid1">Category:</label>
                    <select name="updatecatid1" id="updatecatid1" required>
                    <?php
                        mysqli_data_seek($result1, 0);
                        while ($row = mysqli_fetch_assoc($result1))
                        {
                        ?>
                        <option value="<?php echo $row['subcat_id']; ?>"> <?php echo $row['food_cat']; ?></option>
                        <?php
                        }
                        ?>
                    </select><br><br>
                    <label for="updatefoodname">Food Name:</label>
                    <input type="text" id="updatefoodname" name="updatefoodname" required><br>
                    <label for="updatecal">Food Name:</label>
                    <input type="text" id="updatecal" name="updatecal" required><br>
                    <br><br>
                    <input type="submit" id="updateSubmit" name="updateSubmit" value="Update">
                </form>
            </div>
        </section>
    </div>

    <script>
        // JavaScript functions
        function showForm(formId) {
            // Hide all form sections
            const formSections = document.querySelectorAll('.form-section');
            formSections.forEach(section => {
                section.style.display = 'none';
            });

            // Show the selected form section
            const selectedForm = document.getElementById(formId);
            selectedForm.style.display = 'block';
        }

        function showDietitianForm() {
            document.getElementById("food").style.display = "none";
            document.getElementById("food2").style.display = "none";
            document.getElementById("dietitian").style.display = "block";
            showForm('insertForm'); // Show Insert Form by default
        }

        function showfoodForm() {
            // Hide the Dietitian Update section
            document.getElementById("dietitian").style.display = "none";
            document.getElementById("food2").style.display = "none";
            // Show the Food Category Update section
            document.getElementById("food").style.display = "block";
            
            // Show the Insert Form by default
            showForm('foodcatinsertform');
        }

        function showfoodinsForm() {
            // Hide the Dietitian Update section
            document.getElementById("dietitian").style.display = "none";
            // Show the Food Category Update section
            document.getElementById("food").style.display = "none";
            // Show the Insert Form by default
            document.getElementById("food2").style.display = "block";
            showForm('foodinsertform');
        }

        function showUpdateForm(docId, name, phone, loc) {
    // Hide all form sections
    const formSections = document.querySelectorAll('.form-section');
    formSections.forEach(section => {
        section.style.display = 'none';
    });

    // Show the update form
    const updateForm = document.getElementById('updateForm');
    updateForm.style.display = 'block';

    // Populate the update form fields
    document.getElementById("updateDocId").value = docId;
            document.getElementById("updateDname").value = name;
            document.getElementById("updatePno").value = phone;
            document.getElementById("updateLoc").value = loc;
}

function showcatUpdateForm(cat_id, subcat_id, food_cat) {
    // Hide all form sections
    const formSections = document.querySelectorAll('.form-section');
    formSections.forEach(section => {
        section.style.display = 'none';
    });

    // Show the update form
    const updateForm = document.getElementById('catupdateForm');
    updateForm.style.display = 'block';

    // Populate the update form fields
    document.getElementById("updatesubcatid").value = subcat_id;
            document.getElementById("updatecatid").value = cat_id;
            document.getElementById("updatecatname").value = food_cat;

}

function showinfoUpdateForm(food_id, subcat_id, food_name, calories) {
    // Hide all form sections
    const formSections = document.querySelectorAll('.form-section');
    formSections.forEach(section => {
        section.style.display = 'none';
    });

    // Show the update form
    const updateForm = document.getElementById('infoupdateForm');
    updateForm.style.display = 'block';

    // Populate the update form fields
    document.getElementById("updatefoodid").value = food_id;
    document.getElementById("updatecatid1").value = subcat_id;
            document.getElementById("updatefoodname").value = food_name;
            document.getElementById("updatecal").value = calories;

}
function confirmDelete(docId) {
    var confirmation = confirm("Are you sure you want to delete this record?");
    if (confirmation) {
        // If user confirms, redirect to diet_delete.php with docId
        window.location.href = "diet_delete.php?doc_id=" + docId;
    } else {
        // If user cancels, do nothing
        return false;
    }
}

function confirmcatDelete(subcat_id) {
    var confirmation = confirm("Are you sure you want to delete this record?");
    if (confirmation) {
        // If user confirms, redirect to diet_delete.php with docId
        window.location.href = "cat_delete.php?subcat_id=" + subcat_id;
    } else {
        // If user cancels, do nothing
        return false;
    }
}

function confirminfoDelete(food_id) {
    var confirmation = confirm("Are you sure you want to delete this record?");
    if (confirmation) {
        // If user confirms, redirect to diet_delete.php with docId
        window.location.href = "food_delete.php?food_id=" + food_id;
    } else {
        // If user cancels, do nothing
        return false;
    }
}

function searchTable() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable3");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Column index for name
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
