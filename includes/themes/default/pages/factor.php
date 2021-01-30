<?php
	if( !isset( $_SESSION ) )
		session_start();

	if( !isset( $_SESSION['plan-title'] ) && !isset( $_SESSION['num-modules'] ) ){
		echo '<script> $("#btnfactor").attr({"status": "empty"}); </script>';
	}else{
		echo '<script> $("#btnfactor").attr({"status": "full"}); </script>';
	}
?>
<div class="factor">
	<div style="width: 100%; text-align: center; color: rgba(235, 85, 5, 1); font: bold 25px titr; text-shadow: 0px 0px 2px rgba(0, 0, 0, 1); margin-bottom: 10px;">
		« پیش فاکتور »
	</div>
	<table id="plan">
		<tr>
			<td colspan="8" class="title">
				طرح اصلی استفاده از سامانه سایت ساز « چل تیکه »
			</td>
		</tr>
		<tr style="background-color: rgba(235, 185, 50, 0.5)">
			<td>کد طرح</td>
			<td>مدت اعتبار طرح</td>
			<td>فضای میزبانی</td>
			<td>ترافیک ماهیانه</td>
			<td>قیمت طرح</td>
			<td>میزان تخفیف</td>
			<td>قیمت با احتساب تخفیف</td>
			<td width="50px">حذف</td>
		</tr>
		<?php
			if( isset( $_SESSION['plan-title'] ) && !empty( $_SESSION['plan-title'] ) ){
				echo '<tr style="background-color: rgba(50, 185, 235, 0.25)">';
				echo '<td class="code">'. $_SESSION['plan-title']. '</td>';
				$time = substr( $_SESSION['plan-title'], 1, 2 );
				if( $time < 10 )
					$time = substr( $time, 1, 1 );
				echo '<td>'. $time. ' ماه</td>';
				echo '<td>'. $_SESSION['plan-host']. ' مگابایت</td>';
				echo '<td>'. $_SESSION['plan-bandwidth']. ' گیگابایت</td>';
				echo '<td>'. $_SESSION['plan-price']. ' ریال</td>';
				echo '<td>'. $_SESSION['plan-off']. ' %</td>';
				echo '<td>'. $_SESSION['plan-last-price']. ' ریال</td>';
				echo '<td><button class="neg-icon" id="btnremoveplan"></button></td>';
				echo '</tr>';
			}else{
				echo '<tr style="background-color: rgba(50, 185, 235, 0.25)">';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td></td>';
				echo '</tr>';
			}
		?>
	</table>
	<br>
	<table id="template">
		<tr>
			<td colspan="5" class="title">
				قالب آماده جهت استفاده در سامانه سایت ساز « چل تیکه »
			</td>
		</tr>
		<tr style="background-color: rgba(235, 185, 50, 0.5)">
			<td>کد قالب آماده</td>
			<td>قیمت قالب آماده</td>
			<td>میزان تخفیف</td>
			<td>قیمت با احتساب تخفیف</td>
			<td width="50px">حذف</td>
		</tr>
		<?php
			if( isset( $_SESSION['template-title'] ) && !empty( $_SESSION['template-title'] ) ){
				echo '<tr style="background-color: rgba(50, 185, 235, 0.25)">';
				echo '<td class="code">'. $_SESSION['template-title']. '</td>';
				echo '<td>'. $_SESSION['template-price']. ' ریال</td>';
				echo '<td>'. $_SESSION['template-off']. ' %</td>';
				echo '<td>'. $_SESSION['template-last-price']. ' ریال</td>';
				echo '<td><button class="neg-icon" id="btnremovetemplate"></button></td>';
				echo '</tr>';
			}else{
				echo '<tr style="background-color: rgba(50, 185, 235, 0.25)">';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td></td>';
				echo '</tr>';
			}
		?>
	</table>
	<br>
	<table id="modules">
		<tr>
			<td colspan="6" class="title">
				المان های انتخابی برای استفاده در سامانه سایت ساز « چل تیکه »
			</td>
		</tr>
		<tr style="background-color: rgba(235, 185, 50, 0.5)">
			<td width="50px">ردیف</td>
			<td>کد المان</td>
			<td>قیمت المان</td>
			<td>میزان تخفیف</td>
			<td>قیمت با احتساب تخفیف</td>
			<td width="50px">حذف</td>
		</tr>
		<?php
			if( isset( $_SESSION['num-modules'] ) && !empty( $_SESSION['num-modules'] ) ){
				for( $c = 1; $c <= $_SESSION['num-modules']; $c++ ){
					if( $c&1 ){
						echo '<tr style="background-color: rgba(50, 185, 235, 0.25)">';
					}else{
						echo '<tr style="background-color: rgba(235, 185, 50, 0.25)">';
					}
					echo '<td>'. $c. '</td>';
					echo '<td class="code">'. $_SESSION['module'. $c. '-title']. '</td>';
					echo '<td>'. $_SESSION['module'. $c. '-price']. ' ریال</td>';
					echo '<td>'. $_SESSION['module'. $c. '-off']. ' %</td>';
					echo '<td>'. $_SESSION['module'. $c. '-last-price']. ' ریال</td>';
					echo '<td><button class="neg-icon" id="btnremovemodule'. $c. '"></button></td>';
					echo '</tr>';
				}
			}else{
				echo '<tr style="background-color: rgba(50, 185, 235, 0.25)">';
				echo '<td></td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td> - </td>';
				echo '<td></td>';
				echo '</tr>';
			}
		?>
	</table>
	<br>
	<table id="final">
		<tr>
			<td colspan="3" class="title">
				هزینه نهایی فاکتور موجود
			</td>
		</tr>
		<tr style="background-color: rgba(235, 185, 50, 0.5)">
			<td>هزینه نهایی بدون احتساب تخفیف</td>
			<td>تخفیف کل به ریال</td>
			<td>هزینه نهایی با احتساب تخفیف</td>
		</tr>
		<?php
			$_SESSION['final-price'] = 0;
			$_SESSION['final-last-price'] = 0;
			$_SESSION['final-off'] = 0;
			if( isset( $_SESSION['plan-price'] ) ){
				$_SESSION['final-price'] +=  $_SESSION['plan-price'];
				$_SESSION['final-last-price'] +=  $_SESSION['plan-last-price'];
			}
			
			if( isset( $_SESSION['num-modules'] ) && $_SESSION['num-modules'] > 0 ){
				for( $c = 1; $c <= $_SESSION['num-modules']; $c++ ){
					$_SESSION['final-price'] += $_SESSION['module'. $c. '-price'];
					$_SESSION['final-last-price'] += $_SESSION['module'. $c. '-last-price'];
				}
			}
			
			$_SESSION['final-off'] = $_SESSION['final-price'] - $_SESSION['final-last-price'];
			echo '<tr style="background-color: rgba(50, 185, 235, 0.25)">';
			echo '<td>'. $_SESSION['final-price']. ' ریال</td>';
			echo '<td>'. $_SESSION['final-off']. ' ریال</td>';
			echo '<td>'. $_SESSION['final-last-price']. ' ریال</td>';
			echo '</tr>';
		?>
	</table>
	<br>
	<div style="width: 100%; text-align: left; direction: ltr;">
		<?php if( !isset( $_SESSION['login_user'] ) || !isset( $_SESSION['accept'] ) || ( $_SESSION['accept'] === "false" ) ): ?>
			<?php if( ( isset( $_SESSION['plan-title'] ) && !empty( $_SESSION['plan-title'] ) ) || ( isset( $_SESSION['num-modules'] ) && !empty( $_SESSION['num-modules'] ) ) ): ?>
				<button class="text" id="btnacceptshopping">تایید سبد خرید</button>
			<?php endif; ?>
		<?php else: ?>
			<div class="input ltr" style="width: 250px;"><input id="txtpassword" type="password" placeholder="رمز عبور فعلی"><hr></div>
			<button class="text" id="btnpayshopping">پرداخت از اعتبار</button>
		<?php endif; ?>
	</div>
</div>
