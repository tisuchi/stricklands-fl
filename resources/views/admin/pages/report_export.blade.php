<style type="text/css">
	.body{
		/*border: 3px solid #000000;*/
	}
	.text-left{
		text-align: left;
	}
	.text-center{
		text-align: center;	
	}
	.text-right{
		text-align: right;
	}
	.font-xsmall{
		font-size: 10px
	}
	.font-title{
		font-size: 40px; font-weight: bold;
	}
	.font-subtitle{
		font-size: 14px; font-weight: bold;
	}
	.border_bottom{
		border-bottom: 1px solid #000000;
	}

	.data-table{
		border:1px solid #000000 ;
	}

	.data-td{
		border-bottom: 1px solid #000000;
	}

	
</style>

<table class="body " width="100%" cellpadding="0" cellspacing="0" style="text-align: center;">
	<tr>
		<td width="5%"></td>
		<td width="90%">
			<table width="100%" border="0" cellpadding="0" cellspacing="5px" style="text-align: center;">
				<tr>
					<td class="font-title border_bottom"><p><?php echo $title;?></p></td>
				</tr>

				<tr>
					<td>
						<table class="data-table" width="100%" colspan="0">
							<tr class="data-tr">
								<?php 
									for($i = 0; $i < count($subtitleinfo); $i++){
										echo '<th class="data-td">'.$subtitleinfo[$i].'</th>';
									}
								?>
							</tr>

							<?php 

								for($i = 0; $i < count($datainfo);$i ++){
									echo '<tr>';
									$tmp_row = $datainfo[$i];
									for($j =0; $j < count($tmp_row); $j ++){
										echo '<td class="data-td">'.$tmp_row[$j].'</td>';
									}
									echo '</tr>';

								}

							?>
							
						</table>
					</td>

				</tr>
				

			</table>
		</td>
		<td width="5%"></td>
	</tr>
</table>
<p class="text-center font-xsmall">
	Printed by Vision Board. <?php echo date('Y-m-d');?>
</p>