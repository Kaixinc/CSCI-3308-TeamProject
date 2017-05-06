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
    <table>
    <form method="post" action="">
        <tr>
            <?php
                session_start();
                $id = $_GET['txtid'];
                include ("connect.php");
                $h= mysqli_query($link,"select * from `".$_SESSION['fku']."` where txtid=".$id);
                while($tr=mysqli_fetch_array($h))
                {
            ?>
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
      </form>
    </table>
    </div>
    </center>
    <?php
        if (isset($_POST['txtid'])) {
        $id = $_POST['txtid'];
        }
        if (isset($_POST['txtname'])) {
        $name = trim($_POST['txtname']);
        }
        if (isset($_POST['txtonsale'])) {
        $onsale = trim($_POST['txtonsale']);
        }
        if (isset($_POST['txtprice'])) {
        $price = trim($_POST['txtprice']);
        }
        if (isset($_POST['txtdescription'])) {
        $description = trim($_POST['txtdescription']);
        }
        if (isset($_POST['txtcategory'])) {
        $category = trim($_POST['txtcategory']);
        }
        if (isset($_POST['txtdate'])) {
        $date = trim($_POST['txtdate']);
        }
        if(isset($_POST['cmdedit'])){
        if(empty($name) || $onsale=="Is it on sale?" || empty($price) || $category=="Select Category")
        {
            echo "<center>Sorry please input data</center>";
        }else{
           $sql = "UPDATE `".$_SESSION['fku']."` Set name = '$_POST[txtname]', WHERE id = '$_POST[txtid]' ";
if(mysqli_query($link, $sql))
   header("refresh:1; url = index.php");
 else
   echo "Not Update";


        }
      }
    ?>
</body>
</html>