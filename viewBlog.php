<xml version = "1.0" encoding = "utf-8">
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 //EN""http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title> viewBlog.php </title>
    <link rel="stylesheet" type="text/css" href="maincss.css" media = "all" />
  </head>
  <body>
    <div id="fb-root">
    </div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
      fjs.parentNode.insertBefore(js, fjs);	}(document, 'script', 'facebook-jssdk'));
      </script>
      <div id="fb-root">
      </div>
      <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);	}(document, 'script', 'facebook-jssdk'));
        </script>
        <script>!function(d,s,id){
          var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
          if(!d.getElementById(id)){
            js=d.createElement(s);js.id=id;
            js.src=p+'://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js,fjs);
          }
        }
        (document, 'script', 'twitter-wjs');
        </script>
        <div id="headerTop">
        </div>
        <div id = "headerMid"> 
          Tamanna's Blog
        </div>
        <div id="wrap">
          <div id = "header2">
          </div>
          <div id = "main2">
            <?php	
            $titlename= "-title.txt";
            $bodyname = "-body.txt";
            $datename = "-date.txt";
            if (file_exists("filecount.txt")){
              $count = fopen("filecount.txt", "r");
              $counter = fgets($count);
              fclose($count);
              $count = $counter -1;
              echo "<hr class = 'style2' >";
              for($i = 1; $i<=$count; $count--){
                $date = $count . $datename;
                $dh = fopen($date, "r");
                $dData = fgets($dh);
                fclose($dh);
                echo $dData; 
                $title = $count . $titlename;
                $th = fopen($title, "r");
                $tData = fgets($th);
                fclose($th);
                echo "<p id = entry><strong>" . $tData . "</strong></p>";
                $body = $count . $bodyname;
                $bData = file($body);
                foreach($bData as $b){
                  echo $b."<br>";
                }
                echo "<hr class = 'style2' >";
                echo "</p>";
              }
            }
            ?>
            <div class="fb-like" data-href="http://webprojects.eecs.qmul.ac.uk/tr303/Blog/viewBlog.php" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://webprojects.eecs.qmul.ac.uk/tr303/Blog/viewBlog.php">Tweet</a>
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
            <div id ="footer">
            </div>
            <div class="fb-comments" data-href="http://webprojects.eecs.qmul.ac.uk/tr303/Blog/viewBlog.php" data-numposts="5" data-colorscheme = "light" data-width = "1000px"></div>
            <div id = "footer">
              Copyright &copy;
            </div>
          </div>
        </body>
        </html>
