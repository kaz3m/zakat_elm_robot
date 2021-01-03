<?php



class zakatElmCipher 
{

	public function returnHashArray($string) 
	{	
		$arr = array();
		$arr['md5'] = hash('md5',$string);
		$arr['sha1'] = hash('sha1',$string);
		$arr['sha256'] = hash('sha256',$string);
		$arr['sha512'] = hash('sha512',$string);
		$arr['crc32'] = hash('crc32',$string);
		return $arr;
	}
	public function returnEncodedArray($string) 
	{
		$arr = array();
		$arr['base64'] = base64_encode($string);
		$arr['uuencode'] = convert_uuencode($string);
		$arr['rotate 13'] = str_rot13($string);
		return $arr;
	}
	public function shift($num, $string) 
	{
		$shiftedString = "";
		for ($i = 0; $i < strlen($string); $i++)
		{
		    $ascii = ord($string[$i]);
		    $shiftedChar = chr($ascii + $num);

		    $shiftedString .= $shiftedChar;
		}

		return "shifted: $num ~> " . $shiftedString;
	}
}


?>
<html>
	<head>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
		   <style>
      html,
      body {
        height: 100%;
      }

      body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      pre#result
      {
      	background: #121212;
      	color:white;
      	padding: 10px;
      }
      img {
      	    width: 250px;
    /* float: none; */
    clear: both;
    margin: 0 auto;
    text-align: center;
    border-radius: 250px;
    display: block;
      }
    </style>
	</head>
	<body style="display: block;">
		<div class="row">

			<div class="container" style="width:960px;">


				<img src="https://cdn.pixabay.com/photo/2014/09/10/23/40/enigma-441280_960_720.jpg" alt="">
				<form class="form-signin" id="timeForm" method="POST" action="">
					<p style="text-align: center">
					simple cipher tool 
					<br>
					</p>
					<hr>
					<br>


					<label for="textInput">text input:</label>
					<input type="text" name="text" id="textInput" class="form-control" placeholder="" required autofocus label="Payam"><br>
					<div class="alert alert-info" role="alert" style="text-align:center;font-size:12px">
						<p><b>example:</b>
					ABCDEFGHIJKLMNOPQRSTUVWXYZ</p>
					</div>
					<br>
					<label for="textInput">cipher value:</label>
					
					<input type="number" name="cipher" min="0" max="26"class="form-control" aria-label="cipher" data-bind="value:replyNumber" value="3">

					<br>
					<br>
			      <button class="btn btn-lg btn-warning btn-block" type="submit" id="btn_telegram">Cipher</button>

			      <div class="info" style="display:none">

      			</div>
 			 </form>

 			 			<?php
			if ( isset($_POST['text']) && !empty($_POST['text']) && isset($_POST['cipher']) && is_numeric($_POST['cipher']) ) 
			{
				echo '<pre id="result">'.PHP_EOL;
				$c = new zakatElmCipher();

				print_r($c->returnHashArray($_POST['text']));

				echo PHP_EOL;echo "===============";echo PHP_EOL;

				print_r($c->shift($_POST['cipher'], $_POST['text']));

				echo PHP_EOL;echo "===============";echo PHP_EOL;

				print_r($c->returnEncodedArray($_POST['text']));

			echo PHP_EOL . '</pre>';

			}

			?>

			</div>
		</div>
	    




	</body>
</html>