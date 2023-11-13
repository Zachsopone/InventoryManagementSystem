<?php
if (isset($_POST['add_employee'])) {
  include('includes/dbconnect.php');
  $employeename = mysqli_real_escape_string($conn, $_POST['employeename']);
  $contactnumber = mysqli_real_escape_string($conn, $_POST['contactnumber']);
  $emailaddress = mysqli_real_escape_string($conn, $_POST['emailaddress']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $dobirth = mysqli_real_escape_string($conn, $_POST['dobirth']);
  $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
  $civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
  $department = mysqli_real_escape_string($conn, $_POST['department']);
  $designation = mysqli_real_escape_string($conn, $_POST['designation']);
  $employeestatus = mysqli_real_escape_string($conn, $_POST['employeestatus']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "insert into employees(Employee_Name,Contact_Number,Email_Address,Address,Gender,Date_of_Birth,Nationality,Civil_Status,Department,Designation,Employee_Status,Password)
    values('$employeename','$contactnumber', '$emailaddress', '$address','$gender','$dobirth', '$nationality', '$civilstatus','$department','$designation', '$employeestatus','$password')";
  mysqli_query($conn, $sql);

  include('includes/dbclose.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/productstyle.css">
  <title>Employee Manager</title>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
</head>

<body>
  <div class="container">
    <form action="#" method="post" class="px-5 py-4 mt-4 product_tbl" id="productadd">
      <img src="images/logo.png" alt="" class="img-fluid" style="width: 200px; margin: 2em;">
      <div class="row">
        <div class="col-5">
          <a href="Dashboard.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="col">
          <h4 class="font-weight-bold">Employees</h4>
        </div>
      </div>
      <br />
      <div class="form-group row">
        <div class="mb-3 col-sm">
          <label for="employeename" class="form-label" style="font-size:large;"><b>Employee Name:</b></label>
          <input type="text" class="form-control input_fields" id="employeename" placeholder="" name="employeename" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="contactnumber" class="form-label" style="font-size:large;"><b>Contact Number:</b></label>
          <input type="text" class="form-control input_fields" id="contactnumber" placeholder="" name="contactnumber" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="emailaddress" class="form-label" style="font-size:large;"><b>Email Address:</b></label>
          <input type="email" class="form-control input_fields" id="emailaddress" placeholder="" name="emailaddress" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="address" class="form-label" style="font-size:large;"><b>Address:</b></label>
          <input type="text" class="form-control input_fields" id="address" placeholder="" name="address" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="gender" class="form-label" style="font-size:large;"><b>Gender:</b></label>
          <input type="text" class="form-control input_fields" id="gender" placeholder="" name="gender" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="dobirth" class="form-label" style="font-size:large;"><b>Date of Birth:</b></label>
          <input type="text" class="form-control input_fields" id="dobirth" placeholder="" name="dobirth" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="nationality" class="form-label" style="font-size:large;"><b>Nationality:</b></label>
          <input type="text" class="form-control input_fields" id="nationality" placeholder="" name="nationality" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="civilstatus" class="form-label" style="font-size:large;"><b>Civil Status:</b></label>
          <input type="text" class="form-control input_fields" id="civilstatus" placeholder="" name="civilstatus" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="department" class="form-label" style="font-size:large;"><b>Department:</b></label>
          <input type="text" class="form-control input_fields" id="department" placeholder="" name="department" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="designation" class="form-label" style="font-size:large;"><b>Designation:</b></label>
          <input type="text" class="form-control input_fields" id="designation" placeholder="" name="designation" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="employeestatus" class="form-label" style="font-size:large;"><b>Employee Status:</b></label>
          <input type="text" class="form-control input_fields" id="employeestatus" placeholder="" name="employeestatus" autocomplete="off">
        </div>
        <div class="mb-3 col-sm">
          <label for="password" class="form-label" style="font-size:large;"><b>Password:</b></label>
          <input type="password" class="form-control input_fields" id="password" placeholder="" name="password" autocomplete="off">
        </div>
      </div>
      <button type="submit" class="btn btn-primary add" name="add_employee" style="font-size:large;"><b>Add</b></button>
      <div class="form-group mt-4">
        <div class="input-group">
          <input type="search" class="form-control rounded" placeholder="" aria-label="Search" aria-describedby="search-addon" name="search" autocomplete="off" />
          <button type="submit" class="btn btn-outline-primary" name="search_product" style="font-size:large;"><b>Search</b></button>
        </div>
      </div>
      <div class="form-group table_holder mt-4">
        <table class="table table-bordered ">
          <thead>
            <tr>
              <th style="font-size:large;">Employee ID</th>
              <th style="font-size:large;">Employee Name</th>
              <th style="font-size:large;">Contact Number</th>
              <th style="font-size:large;">Email Address</th>
              <th style="font-size:large;">Address</th>
              <th class="table_btn" style="font-size:large;">Update</th>
              <th class="table_btn" style="font-size:large;">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('includes/dbconnect.php');
            $sql = "select * from employees";
            if (isset($_POST['search_product'])) {
              $search = mysqli_real_escape_string($conn, $_POST['search']);
              if ($search == "") {
                $sql = "select * from employees";
              } else {
                $sql = "select * from employees where Employee_ID like '%" . $search . "%' or Employee_Name like '%" . $search . "%'";
              }
            }
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><b><?php echo $row['Employee_ID']; ?></b></td>
                <td><b><?php echo $row['Employee_Name']; ?></b></td>
                <td><b><?php echo $row['Contact_Number']; ?></b></td>
                <td ><b><?php echo $row['Email_Address']; ?></b></td>
                <td><b><?php echo $row['Address']; ?></b></td>
                <td class="table_btn" ><a href="employeeupdate.php?cid=<?php echo $row['Employee_ID']; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td class="table_btn"><i class="fas fa-trash" onclick="getsetdata(<?php echo $row['Employee_ID']; ?>)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></td>
              </tr>
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Delete Employee</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h4 id="modal_message"></h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      <a id="modal_href" href="" class="btn btn-primary">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            include('includes/dbclose.php');
            ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>

  <script type="text/javascript">
    function getsetdata(idval) {
      document.querySelector('#modal_message').innerHTML = 'Do you really want to delete?';
      document.querySelector('#modal_href').href = 'delete.php?id=' + idval + '&status=employee';
    }
  </script>
  <script src="https://kit.fontawesome.com/662a41ec0f.js" crossorigin="anonymous"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>