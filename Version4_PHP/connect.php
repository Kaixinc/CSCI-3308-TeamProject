<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connect</title>
</head>

<body>
        <?php
               $link = mysqli_connect('mysql.hostinger.com', 'u370150055_chen', 'abcd1234', 'u370150055_test');

              if (!$link) {
              die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

				?>
</body>
</html>