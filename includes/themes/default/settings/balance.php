<div class="balance">
	<div id="transfers">
		<div id="title">تراکنش ها و وضعیت اعتبار</div>
		<div id="container">
			<table>
				<tr>
					<td>
						<div class="input ltr"><input id="txtincrease" type="text" placeholder="مبلغ افزایش اعتبار به ریال"><hr></div>
					</td>
					<td>
						<button class="text" style="color: rgba(0, 0, 0, 1); width: 100%; text-align: center;">انتقال به صفحه ی بانک</button>
					</td>
				</tr>
			</table>
			<table border="1">
				<tr>
					<td>
						مبلغ تراکنش
					</td>
					<td>
						موجودی کنونی
					</td>
					<td>
						زمان تراکنش
					</td>
					<td>
						توضیحات
					</td>
				</tr>
				<?php
					$site = get_site_db( $_SESSION['login_user'] );
					$transfers = db_multi_read( $site['DB_NAME'], 'balance', '1' );
					for( $c = $transfers['nums']; $c >= 1; $c-- ){
						if( $transfers[$c]['transfer'] < 0 ){
							echo '<tr style="color: rgba( 235, 85, 5, 1);">';
						}else{
							echo '<tr style="color: rgba( 5, 185, 50, 1);">';
						}
						echo '<td>'. $transfers[$c]['transfer']. '</td>';
						echo '<td>'. $transfers[$c]['credit']. '</td>';
						echo '<td>'. $transfers[$c]['date']. '</td>';
						echo '<td>'. $transfers[$c]['description']. '</td>';
						echo '</tr>';
					}
				?>
			</table>
		</div>
	</div>
</div>