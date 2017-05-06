<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-signin-client_id" content="842627369246-3vnte9rk9njailk387v934tln1rgkmg9.apps.googleusercontent.com">
<title>Wishlist</title>
<link rel="stylesheet" type="text/css" href="Style/viewtablesearch.css" />
</head>
        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
        <?php
        //Include GP config file && User class
        include_once 'gpConfig.php';
        include_once 'User.php';

        if(isset($_GET['code'])){
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }

        if ($gClient->getAccessToken()) {
            //Get user profile data from google
            $gpUserProfile = $google_oauthV2->userinfo->get();

            //Initialize User class
            $user = new User();

            //Insert or update user data to the database
            $gpUserData = array(
                'oauth_provider'=> 'google',
                'oauth_uid'     => $gpUserProfile['id'],
                'first_name'    => $gpUserProfile['given_name'],
                'last_name'     => $gpUserProfile['family_name'],
                'email'         => $gpUserProfile['email'],
                'gender'        => $gpUserProfile['gender'],
                'locale'        => $gpUserProfile['locale'],
                'picture'       => $gpUserProfile['picture'],
                'link'          => $gpUserProfile['link']
            )
;
            $userData = $user->checkUser($gpUserData);

            //Storing user data into session
            $_SESSION['userData'] = $userData;

            //Render facebook profile data
            if(!empty($userData)){
                $output = '<h1>Google+ Profile Details </h1>';
                $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
                $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
                $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
                $output .= '<br/>Email : ' . $userData['email'];
                $output .= '<br/>Gender : ' . $userData['gender'];
                $output .= '<br/>Locale : ' . $userData['locale'];
                $output .= '<br/>Logged in with : Google';
                $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
                $output .= '<br/><a href="logout.php"><img src="Images/logout.png" alt=""/></a>';
                $diu = $userData['email'];
                $_SESSION['fku'] = $diu;
                include "connect.php";
                mysqli_query($link, "CREATE TABLE `".$diu."` ( txtid int(10), name varchar(50), onsale varchar(10), price text, description text, category text, date text)");
            }else{
                $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
            }
        } else {
            $authUrl = $gClient->createAuthUrl();
            $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="Images/sign-in-button.png" alt=""/></a>';
        }
        ?>

        <div><?php echo $output; ?></div>
<body>
<center><h1><div style ='font:45px Comic Sans MS,tahoma,sans-serif;color:#021c0b'> Make Your Wish Lists Come True</div></h1><center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="addnew" href="Add_Form.php" style ='font:16px Comic Sans MS,tahoma,sans-serif;color:#001916'">Add Form</a></font>
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
       
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> ID</div></th>
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> Name</div></th>
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> On Sale</div></th>
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> Price</div></th>
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> URL</div></th>
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> Category</div></th>
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> Registered Date</div></th>
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> Option</div></th>
<th><div style ='font:17px Comic Sans MS,tahoma,sans-serif;color:#f4f7f7'> Go To The Website</div></th>
        </tr>
        <?php
               $link = mysqli_connect('mysql.hostinger.com', 'u370150055_chen', 'abcd1234', 'u370150055_test');

              if (!$link) {
              die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
        if(!empty($userData)){
            $h = mysqli_query($link , "select * from `".$diu."`");
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
            <td align="center"><a href="<?php echo $tr[4]; ?>">Go to the Website</a></td>
        </tr>
        <?php
            }
            }
              mysqli_close($link);
        ?>
    </table>
</body>
</html>