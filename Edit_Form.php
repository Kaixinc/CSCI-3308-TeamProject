<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Form</title>

	<link rel="stylesheet" type="text/css"  href="Style/Edit_Form.css" />

</head>

<body background="Images/MyBackground.png" bgcolor="#FFCC99">
	<div class="topbar"> <h1 style="color:#FFF"><center>Edit Form</center></h1></div>    
	<center>
    <div class="box">
    	<?php
		$id = $_GET['txtid'];
		include ("connect.php");
		$i ="select * from wishlist where txtid=".$id;
		$h= mysql_query($i);
		if($tr=mysql_fetch_array($h))
		{
	?>
    <table><form method="post" action="">
		<tr>
        	<th>ID:</th>
        	<td><input type="text" name="txtid" value="<?php echo $tr[0]; ?>"/></td>
        </tr>
        <tr>
        	<th>Name:</th>
        	<td><input type="text" name="txtname" value="<?php echo $tr[1]; ?>" /></td>
        </tr>
        <tr>
        	<th>Onsale:</th>
        	<td>
            	<input type="text" name="txtonsale" value="<?php echo $tr[2]; ?>" /></td>
            </td>
        </tr>
        <tr>
        	<th>Price:</th>
        	<td><input type="text" name="txtprice" value="<?php echo $tr[3]; ?>" /></td>
        </tr>
        <tr>
        	<th>Description:</th>
        	<td><textarea cols="16" rows="3" name="txtdescription"> <?php echo $tr[4];?> </textarea></td>
        </tr>
        <tr>
        	<th>Category:</th>
        	<td><input type="text" name="txtcategory" value="<?php echo $tr[5]; ?>" /></td>
        </tr>            
        <tr>
        	<th>Register Date:</th>
            <td><input type="text" name="txtdate" value="<?php echo $tr[6];?>"/></td>
        </tr>
            <?php
				}
			?>
        	<td colspan="2" align="center"><input type="submit" name="cmdedit" value="Save" />
            <a href="index.php"><img src="Images/Users_Group.png" title="Go Back"/></a>
            </td>
        </tr>
	</form></table>
    </div>
	</center>
    <?php
        if (isset($_POST['txtid'])) {   
        $id = $_POST['txtid'];
        }
        if (isset($_POST['txtname'])) {   
        $name = $_POST['txtname'];
        }
        if (isset($_POST['txtonsale'])) {  
        $onsale = $_POST['txtonsale'];
        }
        if (isset($_POST['txtprice'])) {
        $price = $_POST['txtprice'];
        }
        if (isset($_POST['txtdescription'])) {
        $description = $_POST['txtdescription'];
        }
        if (isset($_POST['txtcategory'])) {
        $category = $_POST['txtcategory'];
        }
        if (isset($_POST['txtdate'])) {
        $date = $_POST['txtdate'];
        }
        include ("connect.php");
        $p = mysql_query("update wishlist set name='".$_POST['txtname']."', onsale='".$_POST['txtonsale']."', price='".$_POST['txtprice']."', description='".trim($_POST['txtdescription'])."', category='".$_POST['txtcategory']."', date='".$_POST['txtdate']."' WHERE id='".$id."'");
        if($p==true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
        }
        //header('Location::index.php');
        //exit;
        //mysql_close();
    ?>
</body>
</html>
