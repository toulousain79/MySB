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

	$users_data = $MySB_DB->get("users", ["id_users", "treasury"], ["users_ident" => "$CurrentUser"]);
	$Rent_Payments = $MySB_DB->select("tracking_rent_payments", ["id_tracking_rent_payments", "payment_date", "amount", "balance"], ["id_users" => $users_data['id_users']]);
	$Rent_Status = $MySB_DB->select("tracking_rent_status", ["id_tracking_rent_status", "year", "month", "nb_days_used", "monthly_cost", "treasury"], ["id_users" => $users_data['id_users']]);
	$Treasury = $users_data['treasury'];
	if (is_numeric($Treasury) && $Treasury > 0) {
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
					<legend>Versements</legend>
						<table style="border-spacing:1;">
							<tr>
								<th style="text-align:center;">' . MainUser_Renting_TitleDate . '</th>
								<th style="text-align:center;">' . MainUser_Renting_TitleAmount . '</th>
								<th style="text-align:center;">' . MainUser_Renting_TitleBalance . '</th>
							</tr>';

		foreach($Rent_Payments as $Payment) {
			$Date = $Payment["payment_date"];
			$Amount = $Payment["amount"];
			$Balance = $Payment["balance"];

			echo '			<tr>
								<td><div align="center">' . $Date . '</div></td>
								<td><div align="center">' . $Amount . '</div></td>
								<td><div align="center">' . $Balance . '</div></td>
							</tr>';
		}

		echo '			</table>
				</fieldset>';
	}

	if (!empty($Rent_Status)) {
		echo '	<fieldset>
					<legend>Status</legend>
						<table style="border-spacing:1;">
							<tr>
								<th style="text-align:center;">Mois</th>
								<th style="text-align:center;">Nombre de jour</br>d\'utilisation</th>
								<th style="text-align:center;">Coût dela</br>période</th>
								<th style="text-align:center;">Trésorerie</th>
							</tr>';

			foreach($Rent_Status as $Status) {
				$Year = $Status["year"];
				$Month = $Status["month"];
				$DaysUsed = $Status["nb_days_used"];
				$MonthlyCost = $Status["monthly_cost"];
				$Treasury = $Status["treasury"];

				echo '		<tr>
								<td><div align="center">' . $Year.'/'.$Month . '</div></td>
								<td><div align="center">' . $DaysUsed . '</div></td>
								<td><div align="center">' . $MonthlyCost . '</div></td>
								<td><div align="center">' . $Treasury . '</div></td>
							</tr>';
			}

		echo '			</table>
				</fieldset>';
	}
	echo '</div>';
}

Form();

//#################### LAST LINE ######################################
