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
	global $MySB_DB;

	// Users table
	$Rent_Payments = $MySB_DB->select("tracking_rent_payments", ["id_tracking_rent_payments", "id_users", "payment_date", "amount", "balance"]);

	if (!empty($Rent_Payments)) {
		echo '<div align="center">
				<form class="form_settings" method="post" action="">
					<table style="border-spacing:1;">
						<tr>
							<th style="text-align:center;">' . MainUser_Renting_TitleUser . '</th>
							<th style="text-align:center;">' . MainUser_Renting_TitleDate . '</th>
							<th style="text-align:center;">' . MainUser_Renting_TitleAmount . '</th>
							<th style="text-align:center;">' . MainUser_Renting_TitleBalance . '</th>
							<th style="text-align:center;">' . Global_Table_Delete . '</th>
						</tr>';

			foreach($Rent_Payments as $Payment) {
				$UserName = $MySB_DB->get("users", "users_ident", ["id_users" => $Payment["id_users"]]);
				$Date = $Payment["payment_date"];
				$Amount = $Payment["amount"];
				$Balance = $Payment["balance"];

				echo '	<tr>
							<td><div align="center">' . $UserName . '</div></td>
							<td><div align="center">' . $Date . '</div></td>
							<td><div align="center">' . $Amount . '</div></td>
							<td><div align="center">' . $Balance . '</div></td>
							<td><div align="center"><input class="submit" name="delete['.$Payment["id_tracking_rent_payments"].']" type="submit" value="' . Global_Delete . '" /></div></td>
						</tr>';
			}

			echo '	</table>
				</form>
			</div>';
	}

	echo '<script type="text/javascript" src="' . THEMES_PATH . 'MySB/js/jquery-dynamically-adding-form-elements.js"></script>';
}

Form();

//#################### LAST LINE ######################################
