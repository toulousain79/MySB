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

// Users table
$MySB_DB = new medoo_MySB();

// Vars
$UserAddress = $_SERVER['REMOTE_ADDR'];
$UserName = $_SERVER['PHP_AUTH_USER'];
$UserID = $MySB_DB->get("users", "id_users", ["users_ident" => "$UserName"]);
$CurrentIP = $MySB_DB->get("users_addresses", "id_users_addresses", [
																	"AND" => [
																		"id_users" => "$UserID",
																		"address" => "$UserAddress"
																	]
																]);	


if(isset($_POST)==true && empty($_POST)==false) {
	if (isset($_POST['add_address'])) {
		$success = true;
		$count = count($_POST['input_id']);
		
		for($i=1; $i<=$count; $i++) {
			$last_id_trackers_list = ManageUsersAddresses($UserName, $_POST['address'][$i], $_POST['is_active'][$i]);
																		
			if ($last_id_trackers_list == false) {
				$success = false;
			}																		
		}
		
		if ( $success == true ) {
			?><script type="text/javascript">generate_message('success', 2000, 'Success !');</script><?php
		} else {
			?><script type="text/javascript">generate_message('error', 5000, 'Failed ! It was not possible to add addresses in the MySB database.');</script><?php
		}		
	}

	if (isset($_POST['delete'])) {
		$success = true;
		$count = count($_POST['delete']);
		
		foreach($_POST['delete'] as $key => $value) {
			$result = $MySB_DB->delete("users_addresses", [
				"AND" => [
					"id_users_addresses" => $key
				]
			]);
			
			if ( $result = 0 ) {
				$success = false;
			}			
		}
		
		if ( $success == true ) {
			?><script type="text/javascript">generate_message('success', 2000, 'Success !');</script><?php
		} else {
			?><script type="text/javascript">generate_message('error', 5000, 'Failed ! It was not possible to delete address.');</script><?php
		}			
	}	
}

$AddressesList = $MySB_DB->select("users_addresses", "*", ["id_users" => "$UserID"]);

if (isset($CurrentIP)) {
	
	$add_current_ip = 'value="'.$UserAddress.'"';
} else {
	$add_current_ip = '';
}
?>

<style>
.redText {
    background-color:#FEBABC;
}
.greenText {
    background-color:#B3FEA5;
}
</style>

<script type="text/javascript" >
	var select = document.getElementById('mySelect');
	select.onchange = function () {
		select.className = this.options[this.selectedIndex].className;
	}     
</script>

<div align="center" style="margin-top: 10px; margin-bottom: 20px;">
	<form id="myForm" class="form_settings" method="post" action="">
		<div id="input1" class="clonedInput">
			<input class="input_id" id="input_id" name="input_id[1]" type="hidden" value="1" />
			Address (IP or Dynamic DNS): <input class="input_address" id="address" name="address[1]" type="text" required="required" <?php echo $add_current_ip; ?> />
			Is active ?:	<select class="select_is_active" id="is_active" name="is_active[1]" style="width:60px; cursor: pointer;" required="required">
								<option value="0" selected="selected">No</option>
								<option value="1">Yes</option>
							</select>
		</div>
	 
		<div style="margin-top: 10px; margin-bottom: 20px;">
			<input type="button" id="btnAdd" value="Add address" style="cursor: pointer;" />
			<input type="button" id="btnDel" value="Remove last" style="cursor: pointer;" />
		</div>
		
		<input class="submit" style="width:180px; margin-top: 10px; margin-bottom: 10px;" name="add_address" type="submit" value="Add my addresses now !">
	</form>	
</div>	

<form class="form_settings" method="post" action="">	
	<div align="center">
	
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;">Address</th>
				<th style="text-align:center;">Active ?</th>
				<th style="text-align:center;">Delete ?</th>
			</tr>						
				
<?php
foreach($AddressesList as $Address) {
	switch ($Address["is_active"]) {
		case '0':
			$is_active = '	<select name="is_active[]" style="width:60px; cursor: pointer;" class="redText" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="0" selected="selected" class="redText">No</option>
								<option value="1" class="greenText">Yes</option>
							</select>';
			break;		
		default:
			$is_active = '	<select name="is_active[]" style="width:60px; cursor: pointer;" class="greenText" id="mySelect" onchange="this.className=this.options[this.selectedIndex].className">
								<option value="0" class="redText">No</option>
								<option value="1" selected="selected" class="greenText">Yes</option>
							</select>';
			break;
	}
?>				
			<tr>
				<td>
					<input style="width:150px;" type="hidden" name="address[]" value="<?php echo $Address["address"]; ?>" />
					<?php echo $Address["address"]; ?>
				</td>					
				<td>
					<?php echo $is_active; ?>	
				</td>
				<td>
					<input class="submit" name="delete[<?php echo $Address["id_users_addresses"]; ?>]" type="submit" value="Delete" />
				</td>					
			</tr>
<?php
} // foreach($AddressesList as $Address) {
?>			

		</table>
		
		<input class="submit" style="width:120px; margin-top: 10px;" name="submit" type="submit" value="Save Changes">
	</div>
</form>

<script type="text/javascript" src="<?php echo THEMES_PATH; ?>MySB/js/jquery-dynamically-adding-form-elements.js"></script>	
	
<?php
//#################### LAST LINE ######################################
?>