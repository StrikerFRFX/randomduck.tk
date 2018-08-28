<?php
$files = glob('images/*');
if ($files) {
    $DUCK_NUM = count($files);

    if (!isset($_GET['i'])) {
        $random_duck_index = rand(1, $DUCK_NUM);
    } else if (ctype_digit($_GET['i'])) {
        $random_duck_index = $_GET['i'];
    }
} else {
    $DUCK_NUM = 0;
    $random_duck_index = 0;
}

?>

<html>
<head>
    <title>RandomDuck</title>
    <meta charset="utf-8">
    <meta type="author" content="xinitrc" />
    <meta type="description" content="Displaying pictures of random ducks with every click!" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#FF6600" />
	<meta http-equiv="Cache-Control" content="max-age=1" />

    <meta property="og:image" content="http://www.randomduck.tk/images/<?= $random_duck_index ?>.jpg" />
    <meta property="og:title" content="randomduck.tk" />
    <meta property="og:description" content="Random duck on every click!" />
    <meta property="og:url" content="http://www.randomduck.tk" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>
        $(document).ready(function () {
            var panel_width = document.getElementById('sidebar').offsetWidth;
            var image_width = document.getElementById('duck_full_link').offsetWidth;
            document.getElementById('footer').style.width = panel_width + image_width;
        });
    </script>

    <style type="text/css">
        body {
            margin: 0;
			padding: 5px;
            font-family: arial, verdana, tahoma, sans-serif;
            font-size: 14px;
        }
        #footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 75%;
            text-align: center;
        }
		#panel {
			display: flex;
			align-items: center;
			max-height: 100%;
		}
        #sidebar {
            float: left;
            width: 200px;
            padding: 5px;
        }
		#duck_full_link {
			max-width: calc(100% - 240px);
			max-height: 100%;
            background: transparent url('http://www.randomduck.tk/images/<?= $random_duck_index ?>.jpg') 0 0/contain no-repeat;
			margin: 10px;
		}
        #duck_img_link {
            float: left;
            margin: 10px;
			max-width: 100%;
            border: 2px solid #ccc;
        }
    </style>
</head>
<body>
<div id="panel">
	<div id="sidebar">
		<label for=shareButton><strong>Share this duck!</strong></label>
		<input type="text" id="shareButton" value="http://www.randomduck.tk/?i=<?= $random_duck_index ?>" onclick="this.select();" /><br />

		<p id="duck_count">Duck Count: <?= $DUCK_NUM ?><br />
			<a href="https://github.com/strikerrr/randomduck.tk">Add more quack!</a></p>

		<p>Submit more ducks?<br>Here: <a href="https://github.com/strikerrr/randomduck.tk" target="_blank">GitHub</a></p>

		<br /><br /><br />
		<p>API is Available: <a href="http://www.randomduck.tk/quack">http://www.randomduck.tk/quack</a></p>

	</div>

	<a href="http://www.randomduck.tk/quack?i=<?= $random_duck_index ?>" id="duck_full_link">
		<img src="http://www.randomduck.tk/quack<?= $random_duck_index ?>.jpg" alt="" title="" style="visibility: hidden;" id="duck_full_link" />
	</a>

    <div id="footer">
        <p>Made by: xinitrc, modified by Striker</p>
    </div>
</div>

</body>
</html>
