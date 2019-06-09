<?php
// ----------------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//	_\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//	 _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//	  _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//	   _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//		_\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//		 _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//		  _\///______________\///___\////__________\///////////_____\/////////////_____
//			By toulousain79 ---> https://github.com/toulousain79/
//
//#####################################################################
//
//	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
//	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
//	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
//	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
//	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
//	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
//
//#################### FIRST LINE #####################################

require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

function Form() {
	global $MySB_DB;

	// System table
	$renting_datas = $MySB_DB->get("system", ["rt_cost_tva", "rt_nb_users", "rt_price_per_users", "rt_method"], ["id_system" => 1]);
	$nTotalUsers = $renting_datas["rt_nb_users"];
	$GlobalCostTVA = $renting_datas["rt_cost_tva"];
	$Method = $renting_datas["rt_method"];
	$PricePerUser = $renting_datas["rt_price_per_users"];
	// Users table
	$AllUsers = $MySB_DB->select("users", ["id_users", "users_ident"], ["id_users[!]" => 1]);

	if ( ($GlobalCostTVA != 0.00) && ($nTotalUsers >= 1) && (isset($Method)) ) {
		echo '
		<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
			<form id="myForm" class="form_settings" method="post" action="">
				<fieldset>
				<legend>' . MainUser_RentingOptions_Title . '</legend>
						<div id="input1" class="clonedInput">
							<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />'
							. MainUser_RentingOptions_Amount . '&nbsp;
							<input class="input_amount" id="input_amount" name="input_amount[1]" type="text" style="width:60px;" pattern="^[+-]?\d+(\.\d{2})?" required />&nbsp;&nbsp;'
							. MainUser_RentingOptions_User . '&nbsp;
							<select class="select_user" id="select_user" name="select_user[1]" style="width:200px; height: 28px; cursor: pointer;" required>';

							foreach($AllUsers as $User) {
								echo '<option value="' . $User["id_users"] . '">' . $User["users_ident"] . '</option>';
							}

		echo '				</select>&nbsp;&nbsp;'
							 . MainUser_RentingOptions_Description . '&nbsp;
							 <input class="input_description" id="input_description" name="input_description[1]" type="text" style="width:200px; height: 28px; cursor: pointer;" required />
						</div>

						<div style="margin-top: 10px; margin-bottom: 20px;">
							<input type="button" id="btnAdd" value="' . MainUser_RentingOptions_AddOption . '" style="cursor: pointer;" />
							<input type="button" id="btnDel" value="' . MainUser_RentingOptions_DelOption . '" style="cursor: pointer;" />
						</div>

						<input class="submit" style="width:' . strlen(MainUser_RentingOptions_SaveOptions)*10 . 'px; margin-top: 10px; margin-bottom: 10px;" name="submit" type="submit" value="' . MainUser_RentingOptions_SaveOptions . '">
				</fieldset>
			</form>
		</div>';
	}

	echo '<div align="center"><table><tr align="center">';
	foreach($AllUsers as $User) {
		$Rent_Options = $MySB_DB->select("tracking_rent_options", ["id_tracking_rent_options", "id_users", "amount", "description"], ["id_users" => $User["id_users"]]);
		$OptionsPrice = 0;

		if (!empty($Rent_Options)) {
			echo '	<td style="margin:0; padding:5; border:0; outline:0; font-size:100%; vertical-align:top; background:transparent; display: inline-flex;">
					<form class="form_settings" method="post" action="">
					<fieldset><legend>'.$User["users_ident"].'</legend>
						<table style="border-spacing:1;">
							<tr>
								<th style="text-align:center;">' . MainUser_RentingOptions_TitleAmount . '</th>
								<th style="text-align:center;">' . MainUser_RentingOptions_TitleDescription . '</th>
								<th style="text-align:center;">' . Global_Table_Delete . '</th>
							</tr>';

			foreach($Rent_Options as $Option) {
				$OptionsPrice = $OptionsPrice + $Option["amount"];
				echo '	<tr>
							<td><div align="center">' . $Option["amount"] . '</div></td>
							<td><div align="center">' . $Option["description"] . '</div></td>
							<td><div align="center"><input class="submit" name="submit['.$Option["id_tracking_rent_options"].']" type="submit" value="' . Global_Delete . '" /></div></td>
						</tr>';
			}
			echo '	</table>';

			$UserPrice = $PricePerUser + $OptionsPrice;
			switch ($Method) {
				case '1':
					$UserPrice = round($UserPrice, 2);
					break;
				default:
					$UserPrice = ceil($UserPrice);
					break;
			}

			echo '  <div align="center"><table style="border-spacing:1; width="100%"">
						<tr>
							<th style="text-align:center;">' . MainUser_RentingOptions_TitleMonthly . '</th>
						</tr>
						<tr>
							<td><div align="center"><b>' . $UserPrice . '</b></div></td>
						</tr>
					</table></div>';

			echo '</fieldset></form></td>';
		}
	}
	echo '</tr></table></div>';
}

if (isset($_POST['submit'])) {
	global $MySB_DB;

	switch ($_POST['submit']) {
		case MainUser_RentingOptions_SaveOptions:
			$count = count($_POST['input_id']);
			for($i=1; $i<=$count; $i++) {
				$Amount = $_POST['input_amount'][$i];
				$IdUser = $_POST['select_user'][$i];
				$Description = $_POST['input_description'][$i];
				if ( (isset($Amount) && ($Amount != 0.00)) && (isset($IdUser)) && (isset($Description)) ) {
					$MySB_DB->insert("tracking_rent_options", ["id_users" => "$IdUser", "description" => "$Description", "amount" => "$Amount"]);
					$result = $MySB_DB->id();
					if ( $result >= 1 ) {
						$type = 'success';
					}
				} else {
					$type = 'information';
					$message = Global_CompleteAllFields;
				}
			}

			break;
		default: // delete
			foreach($_POST['submit'] as $key => $value) {
				$result = $MySB_DB->delete("tracking_rent_options", ["id_tracking_rent_options " => $key]);
				if ( $result >= 1 ) {
					$type = 'success';
				} else {
					$type = 'error';
					$message = Global_NoChange;
				}
			}
			break;
	}

	GenerateMessage('message_only', $type, $message);
}

Form();

//#################### LAST LINE ######################################
