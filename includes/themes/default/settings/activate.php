<div class="activate">

	<?php
		$account = db_single_read( DB_NAME, 'users', 'username="'. $_SESSION['login_user'] . '"' );
		$site = db_single_read( DB_NAME, 'sites', 'id="'. $account['site_id']. '"' );
	?>
	<div id="form">
		<div id="title">وضعیت طرح فعال</div>
		<div id="container">
			<table style="direction: rtl; height: 100%;">
				<tr>
					<td colspan="2">
						هم اکنون برای شما طرح زیر فعال می باشد.
					</td>
				</tr>
				<tr>
					<td class="separator" colspan="2"><hr></td>
				</tr>
				<tr>
					<td class="title">عنوان طرح:</td>
					<td class="title"><?php echo $site['plan']; ?></td>
				</tr>
				<tr>
					<td class="host">فضای میزبانی:</td>
					<td class="host"><?php echo (int)substr( $site['plan'], 3, 3 ). 'مگابایت'; ?></td>
				</tr>
				<tr>
					<td class="title">ترافیک ماهیانه:</td>
					<td class="title"><?php echo ((int)substr( $site['plan'], 3, 3 ))/100 . 'گیگابایت'; ?></td>
				</tr>
				<tr>
					<td class="title">تاریخ انقضاء:</td>
					<td class="title" style="color: rgba(235, 85, 5, 1);"><?php echo $site['expire_date']; ?></td>
				</tr>
			</table>
		</div>
	</div>

</div>
