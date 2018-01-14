<xml version = "1.0" encoding = "utf-8">
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 //EN""http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title> September </title>
    <link rel="stylesheet" type="text/css" href="maincss.css" media = "all" />
  </head>
  <body>
    <div id="headerTop">
    </div>
    <div id = "headerMid">
    </div>
    <div id="wrap">
      <div id = "header2">
      </div>
      <div id = "main">
        <?php	
        $titlename= "-title.txt";
        $bodyname = "-body.txt";
        $datename = "-date.txt";
        echo "<hr class = 'style2' >";
        if (file_exists("filecount.txt")){
          $count = fopen("filecount.txt", "r");
          $counter = fgets($count);
          fclose($count);
          $count = $counter -1;
          for($i = 0; $i<=$count; $count--){
            $date = $count . $datename;
            $dh = fopen($date, "r");
            $dData = fgets($dh);
            fclose($dh);
            $month = strpos($dData, "Sep");
            $title = $count . $titlename;
            $th = fopen($title, "r");
            $tData = fgets($th);
            fclose($th);
            $body = $count . $bodyname;
            $bData = file($body);
            if($month !== false){
              echo $dData . "<br/>";
              echo "<p id = entry><strong>" . $tData . "</strong></p>";
              foreach($bData as $b){
                echo $b."<br>";
              }
              echo "<hr class = 'style2' >";
            }
          }
          if($month != "Sep" && $count == 0){
            echo "<span style = 'color:red'><b>No entries for this month.</b></span>";
            echo "<hr class = 'style2' >";
          }
        }
        ?>					
      </div>
      <div id = "sidebar" >
        <ul>
          <li><a href = "viewBlog.php">HOME</a></li><br/>
          <li><a href = "login.html">ADD ENTRY</li></a><br/>
          <li>
            <div class = "dropdown">
              <button class = "drop"><u>ARCHIVE<u></button>
                <div class = "drop-content">
                  <a href = "jan.php">January</a>
                  <a href = "feb.php">February</a>
                  <a href = "march.php">March</a>
                  <a href = "april.php">April</a>
                  <a href = "may.php">May</a>
                  <a href = "june.php">June</a>
                  <a href = "july.php">July</a>
                  <a href = "aug.php">August</a>
                  <a href = "sept.php">September</a>
                  <a href = "oct.php">October</a>
                  <a href = "nov.php">November</a>
                  <a href = "dec.php">December</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div id = "footer">
          Copyright &copy;
        </div>
      </div>
    </body>
    </html>
