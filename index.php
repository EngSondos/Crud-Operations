<?php
$title = "Crud";

include_once("layout/header.php");

use Models\Employee;

$employee = new  Employee;


if (isset($_GET['Action'])) {
  $employee->setName($_GET['name'])->setSalary($_GET['salary'])->setPhone($_GET['phone'])->setCity($_GET['city']);
  $employee->create();
}

if(isset($_GET['edit'])){
$employeedata=$employee->getemployeedata($_GET['edit'])->fetch_assoc();
}
if(isset($_GET['editsubmit'])){
  $employee->setName($_GET['name'])->setSalary($_GET['salary'])->setPhone($_GET['phone'])->setCity($_GET['city']);
   $employee->update( $_GET['id']);
}
if(isset($_GET['delete'])){
  $employee->delete($_GET['delete']);
}
?>
<div class="container">
  <div class="row">
    <div class="offset-3 col-6 mt-5">
      <form method="get">
      <div class="mb-3">
          <label class="form-label">id</label>
          <input type="text" class="form-control " readonly  name="id" value="<?= $employeedata['id'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="<?= $employeedata['name'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="" class="form-control" name="phone" value="<?= $employeedata['phone'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Salary</label>
          <input type="" class="form-control" name="salary" value="<?= $employeedata['salary'] ?? "" ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">City</label>
          <input type="" class="form-control" name="city" value="<?= $employeedata['city'] ?? "" ?>">
        </div>
        <?php if(isset($_GET['edit'])){?>
                  <button name="editsubmit" class="btn btn-primary w-100" >Edit</button>
       <?php } else {?>
        <button name="Action" class="btn btn-primary w-100">Add Employee</button>
        <?php }?> 
      </form>
    </div>
    <div class="offset-2 col-8 mt-5">
<table class="table">

<?php 
$result=$employee->read()->fetch_all();

foreach($result as $employeeData){
   ?> 
   <tr>
    <?php 
    foreach($employeeData as $data){
      
      ?>
      <td><?=$data?></td>
      <?php 
    }
    ?>
    <form>
    <td> 
      <button class="btn btn-warning" name="edit" value="<?=$employeeData[0] ?>">edit</button>
  <button class="btn btn-danger" name = "delete" value="<?=$employeeData[0] ?>">delete</button>
  </td>
    </form>
   </tr>
   <?php 
}
?>
</table>
<?php


include_once("layout/scripts.php");
?>