<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-signin-client_id" content="842627369246-3vnte9rk9njailk387v934tln1rgkmg9.apps.googleusercontent.com">
<title>Wishlist</title>
<link rel="stylesheet" type="text/css" href="Style/viewtablesearch.css" />
</head>
<body>
<center><h1>Make Your Wish Lists Come True</h1></center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="addnew" href="Add_Form.php" style="font-face:Khmer OS Battambang; font-size:16px;">Add Form</a></font>
    <div class="search">
    <form method="post" action="searchidandname.php">
    <select name="cbosearch">
        <option>ID</option>
        <option>Name</option>
        <option>On Sale</option>
        <option>Category</option>
    </select>
    <input type="text" name="txtsearch" placeholder="Type to Search" /><input type="submit" name="cmdsearch" value="Search" />
    </form>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>On Sale</th>
            <th>Price</th>
            <th>URL</th>
            <th>Category</th>
            <th>Registered Date</th>
            <th>Option</th>
            <th>Go to the website</th>
        </tr>
        <?php
               $link = mysqli_connect('mysql.hostinger.com', 'u370150055_chen', 'abcd1234', 'u370150055_test');

              if (!$link) {
              die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

              echo 'Success... ' . mysqli_get_host_info($link) . "\n";
            $h = mysqli_query($link , "select * from wishlist");
            while($tr=mysqli_fetch_array($h))
            {
        ?>
        <tr>
        <td><?php echo $tr[0]; ?></td>
            <td><?php echo $tr[1]; ?></td>
            <td><?php echo $tr[2]; ?></td>
            <td><?php echo $tr[3] ?></td>
            <td><?php echo $tr[4]; ?></td>
            <td><?php echo $tr[5]; ?></td>
            <td><?php echo $tr[6]; ?></td>
            <td align="center"><a href="Delete_Form.php? txtid=<?php echo $tr[0];?>">Delete</a> / <a href="Edit_Form.php? txtid=<?php echo $tr[0];?>">Edit</a> </td>
            <td align="center"><a href="<?php echo $tr[4]; ?>">Click me</a></td>
        </tr>
        <?php
            }
              mysqli_close($link);
        ?>
}
    </table>
}
        <div id="my-signin2"></div>
        <script>
            function onSuccess(googleUser) {
                console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
            }
            function onFailure(error) {
                console.log(error);
            }
            function renderButton() {
                gapi.signin2.render('my-signin2', {
                    'scope': 'profile email',
                    'width': 240,
                    'height': 50,
                    'longtitle': true,
                    'theme': 'dark',
                    'onsuccess': onSuccess,
                    'onfailure': onFailure
                });
            }
        </script>

        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</body>
</html>