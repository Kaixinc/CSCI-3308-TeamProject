<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Form</title>
		<link href="Style/Add_Form.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#99CC66" background="Images/MyBackground.png">
<div class="img"><img src="Images/auditoria.png" /></div>
<div class="ii"><center><img src="Images/Edit_Yes.png" style="margin-top:20px"/></center></div>
<div id="topbar">
    	<center><h1 style="color:#939">Welcome to Add Form</h1>
    </div>
<div id="form">
		<table>
        	<form method="post" action="">
            	<tr>
                
                <?php
					include ("connect.php");
					$g = mysql_query("select max(txtid) from wishlist");
					while($id=mysql_fetch_array($g))
					{
				?>
                
                	<th>ID:</th>
                    <td><input type="text" name="txtid" value="<?php echo $id[0]+1; ?>" readonly="readonly" /></td>
                </tr>
                <?php
					}
				?>
                <tr>
                	<th>Name:</th>
                    <td><input type="text" name="txtname" placeholder="Type Name"  /></td>
                </tr>
                <tr>
                	<th>Onsale:</th>
                    <td><select name="txtonsale">
                    		<option>Is it on sale?</option>
                       		<option>Yes</option>
                            <option>No</option>
                       </select>
                    </td>
                </tr>
                <tr>
                	<th>Price:</th>
                    <td><input type="text" name="txtprice" placeholder="Type Price"  /></td>
                </tr>
                <tr>
                	<th>Description:</th>
                    <td><textarea cols="19px" rows="3" name="txtdescription" placeholder="Type Description of Good In Your Wishlist"  /></textarea></td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td>
                    	<select name="txtcategory">
                        	<option>Select Category</option>
                            <?php
                            	$s=array("Clothing","Appliance","Makeup","Decoration","Stationery","Furniture","Food","Daliy Supplies","Other");
								for($i=0;$i<count($s);$i++)
								{
									echo "<option>".$s[$i]."</option>";	
								}
                            ?>
                        </select>
                    </td>
        		</tr>
                <tr>
                	<th>Register Date:</th>
                    <td><input type="text" name="txtdate" value="<?php echo date("d/M/Y"); ?>" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="cmdadd" value="Add" /></td>
                    <td><input type="reset" name="cmdreset" value="Clear"/></td>
                </tr>
        	</form>
        </table>
    	</div>
        <?php   
        $id = $_POST['txtid'];
        $name = trim($_POST['txtname']);
        $onsale = trim($_POST['txtonsale']);
        $price = trim($_POST['txtprice']);
        $description = trim($_POST['txtdescription']);
        $category = trim($_POST['txtcategory']);
        $date = trim($_POST['txtdate']);
        if(isset($_POST['cmdadd'])){
        if(empty($name) || $onsale=="Is it on sale?" || empty($price) || $category=="Select Category")
        {
            echo "<center>Sorry please input data</center>";
        }else{
        include "connect.php";
        $i = mysql_query("insert into wishlist values('".$id."','".$name."','".$onsale."','".$price."','".$description."','".$category."','".$date."')");
        if($i==true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
        }
        //if($i==true){
        //header('Location:index.php');
        //exit;
        //mysql_close();
        //}
        }
    }
    ?>
</body>
</html>
