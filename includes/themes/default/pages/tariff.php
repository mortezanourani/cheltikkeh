<?php
	if( !function_exists( 'db_multi_read' ) && file_exists( '../includes/functions/database.php' ) )
		include '../includes/functions/database.php';
?>

<div class="tariff" id="tariff">
<?php
	$plans = db_multi_read( DB_NAME, 'plans', '1' );
	for( $c = 1; $c <= $plans['nums']; $c++ ){
		echo '<button class="btnplan" id="'. $plans[$c]['id']. '" style="background-image: url( /includes/images/plans/'. $plans[$c]['image']. ' );">';
			echo '<br>';
			echo '<p id="price">'. $plans[$c]['price']. ' ریال </p>';
			
			if( $plans[$c]['off'] > 0 )
				echo '<p id="off">'. $plans[$c]['off']. '<font style="font-size: 18px;">%off</font></p>';
			
			if( $plans[$c]['off'] > 0 ){
				$price =  $plans[$c]['price'] * ( ( 100 - $plans[$c]['off'] ) / 100 );
				if( $price > 0 ){
					echo $price. ' ريال';
				}else{
					echo 'رایگان';
				}
			}else{
				echo $plans[$c]['price']. ' ريال';
			}
			
		echo '</button>';
	}
?>
</div>
