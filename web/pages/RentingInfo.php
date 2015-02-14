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

function Form() {
	global $MySB_DB;

	// Users table
	$renting_datas = $MySB_DB->get("renting", [
												"model",
												"tva",
												"global_cost",
												"nb_users",
												"price_per_users"
											], [
												"id_renting" => 1
											]);

	$TotalUsers = $renting_datas["nb_users"];
	$PricePerUser = $renting_datas["price_per_users"];
	$Model = $renting_datas["model"];
	$TVA = $renting_datas["tva"];
	$GlobalCost = $renting_datas["global_cost"];

	echo '<form class="form_settings" method="post" action="">
		<div align="center"><table border="0">
			<tr>
				<td>Model :</td>
				<td><input class="text_normal" name="model" type="text" value="' . $Model . '" required="required" /></td>
				<td><span class="Comments">Example:	Serveur Dedibox XC</span></td>
			</tr>
			<tr>
				<td>TVA (%) :</td>
				<td><input class="text_small" name="tva" type="text" value="' . $TVA . '" required="required" /></td>
				<td><span class="Comments">Example:	20</span></td>
			</tr>
			<tr>
				<td>Unit price (per month) :</td>
				<td><input class="text_small" name="global_cost" type="text" value="' . $GlobalCost . '" required="required" /></td>
				<td><span class="Comments">Example:	19.99 (value without tax)</span></td>
			</tr>
			<tr>
				<td>Total users :</td>
				<td><input class="text_extra_small" readonly="readonly" type="text" value="' . $TotalUsers . '" /></td>
				<td><span class="Comments">Readonly, only for information.</span></td>
			</tr>
			<tr>
				<td>Price per user :</td>
				<td><input class="text_extra_small" readonly="readonly" type="text" value="' . $PricePerUser . '" /></td>
				<td><span class="Comments">Readonly, only for information.</span></td>
			</tr>
			<tr>
				<td colspan="3"><input class="submit" name="submit" type="submit" value="Submit" /></td>
			</tr>
		</table></div>
	</form>';

}

if (isset($_POST['submit'])) {
	$Model = $_POST['model'];
	$TVA = $_POST['tva'];
	$GlobalCost = $_POST['global_cost'];
	$TotalUsers = CountingUsers();

	if ( (isset($GlobalCost)) && (isset($TVA)) && (isset($TotalUsers)) && (isset($Model)) ) {
		$X = $GlobalCost / $TotalUsers;
		$Y = ($X * $TVA) / 100;
		$PricePerUsers = $X + $Y;
		$PricePerUsers = ceil($PricePerUsers);

		global $MySB_DB;

		$result = $MySB_DB->update("renting", ["model" => "$Model",
										"tva" => "$TVA",
										"global_cost" => "$GlobalCost",
										"nb_users" => "$TotalUsers",
										"price_per_users" => "$PricePerUsers"],
										["id_renting" => 1]);

		if( $result == 1 ) {
			$type = 'success';
		} else {
			$type = 'error';
			$message = 'Failed ! It was not possible to update the MySB database.';
		}
	} else {
		$type = 'information';
		$message = 'Please, complete all fields.';
	}

	GenerateMessage('message_only', $type, $message);
}

Form();

//#################### LAST LINE ######################################
?>