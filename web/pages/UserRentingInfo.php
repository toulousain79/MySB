<?php
// ----------------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//    _\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//     _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//      _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//       _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//        _\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//         _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//          _\///______________\///___\////__________\///////////_____\/////////////_____
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
	global $MySB_DB, $CurrentUser;

	$Method = $MySB_DB->get("system", "rt_method", ["id_system" => 1]);
	$users_data = $MySB_DB->get("users", ["id_users", "period_price", "period_days", "treasury"], ["users_ident" => "$CurrentUser"]);
	$Rent_Payments = $MySB_DB->select("tracking_rent_payments", ["id_tracking_rent_payments", "payment_date", "amount"], ["id_users" => $users_data['id_users']]);
	$Rent_Status = $MySB_DB->select("tracking_rent_status", ["id_tracking_rent_status", "year", "month", "date", "nb_days_used", "period_cost", "already_payed"], ["id_users" => $users_data['id_users']]);

	$Treasury = $users_data['treasury'];
	// switch ($Method) {
		// case '1':
			// $Treasury = round($Treasury, 2);
			// break;
		// default:
			// $Treasury = round($Treasury,2);
			// break;
	// }
	$Treasury = round($Treasury, 2);
	if (is_numeric($Treasury) && $Treasury > 0.00) {
		$Color = 'color: #00DF00;';
	} else {
		$Color = 'color: #FF0000;';
	}

	echo '	<div align="center"><table style="border-spacing:1; width:300px;">
				<tr>
					<th style="text-align:center;">' . MainUser_Renting_TitleTreasury . '</th>
				</tr>
				<tr>
					<td style="text-align:center; height: 28px; font-size: 150%; '.$Color.'"><b>' . $Treasury . '</b></td>
				</tr>
			</table></div>';


	echo '<div align="center">';
	if (!empty($Rent_Payments)) {
		echo '	<fieldset>
					<legend>' . MainUser_Renting_TitleAmount . '</legend>
						<table style="border-spacing:1;">
							<tr>
								<th style="text-align:center;">' . MainUser_Renting_TitleDate . '</th>
								<th style="text-align:center;">' . MainUser_Renting_TitleAmount . '</th>
							</tr>';


		foreach($Rent_Payments as $Payment) {
			$Date = $Payment["payment_date"];
			$Amount = $Payment["amount"];
			switch ($Method) {
				case '1':
					$Amount = round($Amount, 2);
					break;
				default:
					$Amount = ceil($Amount);
					break;
			}

			echo '			<tr>
								<td><div align="center">' . $Date . '</div></td>
								<td><div align="center">' . $Amount . '</div></td>
							</tr>';
		}

		echo '			</table>
				</fieldset>';
	}

	if (!empty($Rent_Status)) {
		echo '	<fieldset>
					<legend>' . MainUser_Renting_TitleStatus . '</legend>
						<table style="border-spacing:1;">
							<tr>
								<th style="text-align:center;">' . MainUser_Renting_TitleYearMonth . '</th>
								<th style="text-align:center;">' . MainUser_Renting_TitleDaysUsed . '</th>
								<th style="text-align:center;">' . MainUser_Renting_TitleCostPeriod . '</th>
								<th style="text-align:center;">' . MainUser_Renting_AlreadyPayed . '</th>
								<th style="text-align:center;">' . MainUser_Renting_RemainingCost . '</th>
							</tr>';

			foreach(array_sort($Rent_Status, 'date', SORT_DESC) as $Status) {
				$Year = $Status["year"];
				$Month = $Status["month"];
				$DaysUsed = $Status["nb_days_used"];
				$MonthlyCost = $Status["period_cost"];
				$AlreadyPayed = $Status["already_payed"];
				$RemaingCost = $MonthlyCost - $AlreadyPayed;
				// switch ($Method) {
					// case '1':
						// $MonthlyCost = round($MonthlyCost, 2);
						// $AlreadyPayed = round($AlreadyPayed, 2);
						// $RemaingCost = round($RemaingCost, 2);
						// break;
					// default:
						// $MonthlyCost = ceil($MonthlyCost);
						// $AlreadyPayed = ceil($AlreadyPayed);
						// $RemaingCost = ceil($RemaingCost);
						// break;
				// }
				$MonthlyCost = round($MonthlyCost, 2);
				$AlreadyPayed = round($AlreadyPayed, 2);
				$RemaingCost = round($RemaingCost, 2);
				if ($AlreadyPayed > 0.00) {
					$ColorPayed = 'color: #00DF00;';
				} else {
					$ColorPayed = 'color: black;';
				}
				if ($RemaingCost > 0.00) {
					$ColorRemain = 'color: #FF0000;';
				} else {
					$ColorRemain = 'color: black;';
				}

				echo '		<tr>
								<td><div align="center">' . $Year.'/'.$Month . '</div></td>
								<td><div align="center">' . $DaysUsed . '</div></td>
								<td><div align="center">' . $MonthlyCost . '</div></td>
								<td style="'.$ColorPayed.'"><div align="center"><b>' . $AlreadyPayed . '</b></div></td>
								<td style="'.$ColorRemain.'"><div align="center"><b>' . $RemaingCost . '</b></div></td>
							</tr>';
			}

		echo '			</table>
				</fieldset>';
	}
	echo '</div>';
}

Form();

//#################### LAST LINE ######################################
