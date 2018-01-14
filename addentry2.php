<xml version = "1.0" encoding = "utf-8">
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 //EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	<html xmlns = "http://www.w3.org/1999/xhtml">
	<head> <title> addentry.php </title>
		<link rel="stylesheet" type="text/css" href="maincss.css" media = "all"/>
	</head>
	<body>
		<script type = "text/javascript">
		function clearFunction()
		{
			confirm("Clear the form?");
			var ask = confirm("Clear the form?");
			if(ask)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	</script>
	<?php
	$host   =   "dbprojects.eecs.qmul.ac.uk"  ;
	$user   =   "tr303"  ;
	$pass   =   "XWH0z6SgAzMUQ"  ;
	$db   =   "tr303"  ;

	$link  =  mysql_connect ( $host ,  $user ,  $pass );
	if (! $link ) {
		die( 'Could not connect: '  .  mysql_error ());
	}
	echo  'Connected successfully' ;

	$db_selected  =  mysql_select_db ( $db ,  $link );
	if (! $db_selected ) {
		die ( 'Can\'t use $db : '  .  mysql_error ());
	}

	$query = "CREATE TABLE entries (id INTEGER,Title_id TEXT, Body TEXT, Date DATE)";
	mysql_query($query);

	$date = "DATE_FORMAT(NOW(), '%a, %b %D, %Y, %l:%i %p')";
	$query = "INSERT INTO entries (id, Title_id, Date) VALUES ()";
	mysql_close ( $link );

	?>
	<?php
	$titleInput = $_POST['title'];
	$bodyInput = $_POST['body'];
	if(!(empty($titleInput) && empty($bodyInput)))
	{
		$titlename= "-title";
		$bodyname = "-body";
		$datename = "-date";
		if (file_exists("filecount.txt"))
		{
			$filenumber = file_get_contents("filecount.txt");
			$Titlefilename = $filenumber . $titlename;
			$Bodyfilename = $filenumber . $bodyname;
			$Datefilename = $filenumber . $datename;
		}
		else
		{
			$filenumber = 1;
			$Titlefilename = $filenumber . $titlename;
			$Bodyfilename = $filenumber . $bodyname;
			$Datefilename = $filenumber . $datename;
			$fCount = fopen("filecount.txt", "w");
			fwrite($fCount);
			fclose($fCount);
		}

		date_default_timezone_set('UTC');
		$dateTime = date('D, M jS, Y, g:i a e');

		if (!((file_exists("$Titlefilename.txt")) && (file_exists("$Bodyfilename.txt")) && (file_exists("$Datefilename.txt"))))
		{
			$t = fopen("$Titlefilename.txt", "w");
			$b = fopen("$Bodyfilename.txt", "w");
			$d = fopen("$Datefilename.txt", "w");

			fwrite($t, $titleInput);
			fwrite($b, $bodyInput);
			fwrite($d, $dateTime);

			fclose($t);
			fclose($b);
			fclose($d);

			$countFile = fopen("filecount.txt", "w");
			fwrite($countFile, (++$filenumber));
			fclose($countFile);
		}
		else
		{
			echo "Couldn't save your message: File name already exists!";
		}
		header('LOCATION:viewBlog.php');
		die();
	}

	elseif((empty($titleInput) || empty($bodyInput)))
	{
		$error = "Please enter text into the title and body space to add an entry.";
	}
	?>

	<?php if(isset($error)):?>


		<div id="headerTop">
		</div>
		<div id = "headerMid">
		</div>
		<div id="wrap">
			<div id = "header2">
				<header>
				</header>
			</div>
			<div id = "main">
				<p>
					<h3 id = "h3">Add an entry to Tamanna Rahman's Blog!</h3>
					<br/>
					Instructions: Enter a title and body for your blog entry. In the body, you can use simple HTML formatting elements, such as &lt;b&gt; (bold) and &lt;I&gt; (Italic) as well as the hyperlink "anchor" element &lt;a&gt;. Then press submit once finished.
					<br/>
					<span style = "color:red"><strong><?php echo $error;?></strong></span><?php endif;?>
				</p>
				<form action = "addentry.php" method = "post" >
					<table border = "0">
						<tr>
							<td><label>Title: </label></td><td><input type="text" id= "title" name="title"></td>
						</tr>
						<tr>
							<td style = "vertical-align: top"><label for= "body">Body: </label></td>
							<td><textarea id = "body"  name = "body" placeholder = "Add text here"></textarea></td>
						</tr>
						<tr>
							<td></td><td><input type = "submit" value = "Add entry" name = "submit"/><input type = "reset" value = "Clear" name = "clear" onclick = "return clearFunction()"/></td>
						</tr>
					</table>
				</form>
			</div>
			<div id = "sidebar">
				<ul>
					<li><a href = "viewBlog.php">HOME</a></li><br/>
					<li><a href = "login.html">ADD ENTRY</a></li>
				</ul>
			</div>
			<div id = "footer">
				Copyright &copy;
			</div>
		</div>
	</body>
	</html>
