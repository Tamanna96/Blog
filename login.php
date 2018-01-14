<xml version = "1.0" encoding = "utf-8">
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 //EN""http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title> login.php </title>
    <link rel="stylesheet" type="text/css" href="maincss.css" media = "all" />
  </head>
  <body>
    <?php		$uname = $_POST['username'];
    $pword = $_POST['password'];
    if($uname == "Tamanna" && $pword == "noonecanknow")	{
      header('LOCATION:add_entry.html');
      die();
    }
    elseif($uname != "Tamanna" && $pword != "1234")	{
      $error = "Invalid Username or Password. Please try again.";
    }?>
    <?php	if(isset($error)):?>
      <div id="headerTop">
      </div>
      <div id = "headerMid">
      </div>
      <div id="wrap">
        <div id = "header2">
        </div>
        <div id = "main">
          <h3 id = "h3">Log in to add an entry!</h3>
          <span style = "color: red"><?php echo $error; ?></span><?php endif; ?>
          <form action = "login.php" method = "post">
            <table border = "0">
              <tr>
                <td><label for = "Username">Username: </label></td>
                <td><input type="text" id= "username" name="username"/></td>
              </tr>
              <tr>
                <td><label for = "Password">Password: </label></td>
                <td><input type="password" id = "password" name="password" /></td>
              </tr>
              <tr>
                <td></td>
                <td><input class = "input1" type = "submit" value = "Login" /></td>
              </tr>
            </table>
          </form>
        </div>
        <div id = "sidebar">
          <ul>
            <li><a href = "viewBlog.php">HOME</a></li><br/>
            <li><a href = "login.html">LOGIN</a></li>
          </ul>
        </div>
        <div id = "footer">
          Copyright &copy;
        </div>
      </div>
    </body>
    </html>
