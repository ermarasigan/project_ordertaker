<?php
	function showcart($cartuser) {
		
		echo '<h1>' . $cartuser . '\'s' . ' cart</h1>';

		if(isset($_POST['addtocart'])){
			
			$filename = 'json/ '. $_SESSION['groupcode'] . '_' . $_SESSION['username'] . '_cart.json';
  			
  			// Check if file exists
			fopen($filename,'a');
			$string = file_get_contents($filename);

			if($string != null) {
  				$cart = json_decode($string, true);
  			} else {
  				echo 'no cart';
  				$cart =[];
  				$fp = fopen($filename,'w');
  				fwrite($fp, json_encode($cart,JSON_PRETTY_PRINT));
  				fclose($fp);
  			}

		} else {
			echo 'meow';
		}
	}
?>