<?php
	if( !isset( $_SESSION ) )
		session_start();
	
	if( !defined( 'ROOT' ) )
		define( 'ROOT', dirname( __FILE__ ) );
	
	if( !function_exists( 'get_site_db' ) )
		require_once( ROOT. '/initialize.php' );

	function send( $url, $id, $amount, $callback, $resnum ){
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, array(
			'id'		=> $id,
			'amount'	=> $amount,
			'callback'	=> $callback,
			'resnum'	=> $resnum,
			'desc'		=> '',
		) );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$res = curl_exec( $ch );
		curl_close( $ch );
		return $res;
	}
	
	function get( $url, $id, $resnum, $refnum, $amount ){
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, array(
			'id'		=> $id,
			'resnum'	=> $resnum,
			'refnum'	=> $refnum,
			'amount'	=> $amount,
		) );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$res = curl_exec( $ch );
		curl_close( $ch );
		return $res;
	}

	if( isset( $_POST['send'] ) ){
		$url = 'http://bazpardakht.com/webservice/index.php';
		$id = '94209123';
		$amount = $_POST['amount'];
		$callback = 'http://cheltikkeh.com/bazpardakht.php';
		$resnum = (int) (float) date("ymdHis");
		
		$_SESSION['amount'] = $amount;
		
		$result = send( $url, $id, $amount, $callback, $resnum );
		
		unset( $_POST['send'] );
		if( $result > 1 && is_numeric( $result ) ){
			die( $result );
			/*
			$go = "http://bazpardakht.com/webservice/go.php?id=".$result;
			header( "Location: $go" );
			*/
		}
		
		switch( $result ){
			case( '-1' ):
				echo ' کد پذیرنده صحیح نمی باشد ';
				break;
			case( '-2' ):
				echo ' مقدار مبلغ صحیح نمی باشد ';
				break;
			case( '-3' ):
				echo ' آدرس بازگشت صحیح نمی باشد ';
				break;
			case( '-4' ):
				echo ' درگاه پذیرنده فعال نمی باشد ';
				break;
			case( '-5' ):
				echo ' شماره فاکتور صحیح نمی باشد ';
				break;
			case( '-6' ):
				echo ' شماره فاکتور تکراری است ';
				break;
			case( '-7' ):
				echo ' در شبکه بانکی خطا وجود دارد ';
				break;
		}
		
	}else{
		if( $_POST['status'] === "1" ){
			$url = 'http://bazpardakht.com/webservice/verify.php';
			$id = '94209123';
			$resnum = $_POST['resnum'];
			$refnum = $_POST['refnum'];
			$amount = $_SESSION['amount'];
			
			$result = get( $url, $id, $resnum, $refnum, $amount );
			
			switch( $result ){
			case( '-1' ):
				echo ' .پارامترهای ارسالی صحیح نمی باشد ';
				break;
			case( '0' ):
				echo ' .پرداخت با موفقیت انجام نشده است ';
				break;
			default:
				$site = get_site_db( $_SESSION['login_user'] );

				$last_transfer = num_objects( $site['DB_NAME'], 'balance', '' );
				$balance = db_single_read( $site['DB_NAME'], 'balance', 'id="'. $last_transfer. '"' );
				$credit = $balance['credit'];
				
				$credit += $_SESSION['amount'];
				
				db_write( DB_NAME, 'factors', array(
					'columns'	=> 'number, amount, username',
					'values'	=> '"'. $resnum. '", "'. $_SESSION['amount']. '", "'. $_SESSION['login_user']. '"',
				) );
				
				db_write( $site['DB_NAME'], 'balance', array(
					'columns'	=> 'id, transfer, credit, date, description',
					'values'	=> 'NULL, "'. $_SESSION['amount']. '", "'. $credit. '", "'. date("Y-m-d H:i:s"). '", "افزایش اعتبار"',
				) );
				
				echo 'پرداخت با موفقیت انجام شد. <br> در حال انتقال به صفحه تنظیمات';
				$go = "http://cheltikkeh.com/settings/";
				header( "Location: $go" );
				
				break;
			}
		}else{
			echo $_POST['status']. ' پرداخت نا موفق بوده است. لطفا مجددا تلاش نمایید. ';
		}
		
		unset( $_SESSION['amount'] );
		
	}
