<?php
// ----------------------------------
require  'inc/includes_before.php';
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

function TrackersList() {
	$database = new medoo();
	// Users table
	$TrackersList = $database->select("trackers_list", "*", "");
	
	echo '
	<form action="process" class="register" method="POST">
		<fieldset class="row1">
			<legend>Global trackers list (ruTorrent + Users)</legend>
			<div align="center">
				<table id="dataTable" class="form" border="1">
					<tbody>
						<tr>
							<th scope="col">Domain</th>
							<th scope="col">Origin</th>
							<th scope="col">IPv4</th>
							<th scope="col">Is SSL ?</th>
							<th scope="col">Is activated ?</th>
						</tr>
	';
	
	foreach($TrackersList as $Tracker) {
		$IsSSL = $Tracker["is_ssl"];
		$IsActivated = $Tracker["is_active"];
	
		switch ($IsSSL) {			
			case '0':
				$SSLChecked = '';
				break;
			case '1':
				$SSLChecked = 'checked="checked"';
				break;
		}
		switch ($IsActivated) {			
			case '0':
				$ActiveChecked = '';
				break;
			case '1':
				$ActiveChecked = 'checked="checked"';
				break;
		}		
	
		echo '
						<tr>
							<td><div align="left"><input type="text" required="required" name="BX_NAME[$a]" style="width: 140px;" value="' . $Tracker["tracker_domain"] . '" /></div></td>
							<td><div align="left"><input type="text" required="required" name="BX_NAME[$a]" style="width: 60px;" value="' . $Tracker["origin"] . '" /></div></td>
							<td><div align="left"><input type="text" required="required" name="BX_NAME[$a]" style="width: 200;" value="' . $Tracker["ipv4"] . '" /></div></td>
							<td><div align="center"><input type="checkbox" required="required" name="chk[]" ' . $SSLChecked . ' /></div></td>
							<td><div align="center"><input type="checkbox" required="required" name="chk[]" ' . $ActiveChecked . ' /></div></td>
						</tr>
		';
	}
	
	echo '
					</tbody>
				</table>
			</div>
		</fieldset>
		<div class="clear"></div	
	</form>
	';
}

function FormUsersTrackers() {
	echo '	<form action="process" class="register" method="POST">
				<fieldset class="row1">
					<legend>Users trackers list</legend>
					<div align="center">
						<table id="dataTable" class="form" border="1">
							<tbody>
								<tr>
									<p>
										<td><div align="left"><label>Tracker domain</label><input type="text" required="required" name="BX_NAME[$a]" /></div></td>
										<td><div align="center"><label>Is activated ?</label><input type="checkbox" required="required" name="chk[]" checked="checked" /></div></td>
									</p>
								</tr>
							</tbody>
						</table>
					</div>
				</fieldset>
				<div class="clear"></div>

				<fieldset class="row1">
					<legend></legend>
					<div align="center">
						<p>
							<input type="button" value="Add tracker" onClick="addRow(\'dataTable\')" /> 
							<input type="button" value="Remove tracker" onClick="deleteRow(\'dataTable\')" /> 
						</p>
						<p>(All acions apply only to entries with check marked check boxes only.)</p>				
						<p><input class="submit" type="submit" value="Confirm &raquo;" /></p>
					</div>
				</fieldset>
			</form>
';
}
?>



<?php
//FormUsersTrackers();
TrackersList();

// -----------------------------------------
require  'inc/includes_after.php';
// -----------------------------------------
//#################### LAST LINE ######################################
?>