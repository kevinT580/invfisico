<?php
include('include/config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($con,"select operadorName,id from operadors where specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Seleccionar Medico </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['operadorName']); ?></option>
  <?php
}
}


if(!empty($_POST["operador"])) 
{

 $sql=mysqli_query($con,"select docFees from operadors where id='".$_POST['operador']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['docFees']); ?>"><?php echo htmlentities($row['docFees']); ?></option>
  <?php
}
}

?>

