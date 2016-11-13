<!-- ===========================Select page=========================== -->
<?php
include 'inc/header.php';
include "config.php";
include "Database.php";
?>

<?php
 $db = new Database();
 $query = "SELECT * FROM tbl_user";
 $read = $db->select($query);
?>

<?php
if(isset($_GET['msg'])){
 echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>

<table class="tblone">
<tr>
 <th width="10%">Serial</th>
 <th width="35%">Name</th>
 <th width="25%">Email</th>
 <th width="15%">Skill</th>
 <th width="15%">Action</th>
</tr>
<?php if($read){?>
<?php
$i=1;
while($row = $read->fetch_assoc()){
?>
<tr>
 <td><?php echo $i++ ?></td>
 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['email']; ?></td>
 <td><?php echo $row['skill']; ?></td>
 <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">
  Edit</a></td>
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
</table>
<a href="create.php">Create</a>
<?php include 'inc/footer.php'; ?>
<!-- ===========================Insert page=========================== -->
<?php
include 'inc/header.php';
include "config.php";
include "Database.php";
?>

<?php
 $db = new Database();
if(isset($_POST['submit'])){
 $name  = mysqli_real_escape_string($db->link, $_POST['name']);
 $email = mysqli_real_escape_string($db->link, $_POST['email']);
 $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
 if($name == '' || $email == '' || $skill == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "INSERT INTO tbl_user(name, email, skill)
   Values('$name', '$email', '$skill')";
  $create = $db->insert($query);
 }
}
?>

<?php
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="create.php" method="post">
<table>
 <tr>
  <td>Name</td>
  <td><input type="text" name="name" placeholder="Please enter
   name"/></td>
 </tr>
 <tr>
  <td>Email</td>
  <td><input type="text" name="email" placeholder="Please enter
   email"/></td>
 </tr>

 <tr>
  <td>Skill</td>
  <td><input type="text" name="skill" placeholder="Please enter
  Skill"/></td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  <input type="reset" Value="Cancel" />
  </td>
 </tr>

</table>
</form>
<a href="index.php">Go Back</a>
<?php include 'inc/footer.php'; ?>
<!-- ===========================Delete page=========================== -->
<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM tbl_user WHERE id=$id";
 $deleteData = $db->delete($query);
}
?>

<!-- ===========================update page=========================== -->
<?php
include 'inc/header.php';
include "config.php";
include "Database.php";
?>

<?php
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM tbl_user WHERE id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
 $name  = mysqli_real_escape_string($db->link, $_POST['name']);
 $email = mysqli_real_escape_string($db->link, $_POST['email']);
 $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
 if($name == '' || $email == '' || $skill == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE tbl_user
  SET
  name  = '$name',
  email = '$email',
  skill = '$skill'
  WHERE id = $id";

  $update = $db->update($query);
 }
}
?>


<?php
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="update.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td>Name</td>
  <td><input type="text" name="name"
  value="<?php echo $getData['name'] ?>"/></td>
 </tr>
 <tr>
  <td>Email</td>
  <td><input type="text" name="email"
  value="<?php echo $getData['email'] ?>"/></td>
 </tr>

 <tr>
  <td>Skill</td>
  <td><input type="text" name="skill"
  value="<?php echo $getData['skill'] ?>"/></td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Update"/>
  <input type="reset" Value="Cancel" />
  <input type="submit" name="delete" Value="Delete" />
  </td>
 </tr>

</table>
</form>
<a href="index.php">Go Back</a>
<?php include 'inc/footer.php'; ?>
<!-- ====================================================== -->