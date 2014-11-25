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

// Users table
$database = new medoo();
$TrackersList = $database->select("trackers_list", "*");
?>

<form action="process" class="register" method="POST">
	<fieldset>
		<legend>Global Trackers List (ruTorrent + User)</legend>
		
		<table class="form" border="1">
			<tr>
				<p>
					<td><div class="delete"><label>Del ?</label></div></td>			
					<td><div class="domain"><label>Domain</label></div></td>
					<td><div class="address"><label for="BX_Address">Address</label></div></td>
					<td><div class="origin"><label for="BX_Origin">Origin</label></div></td>
					<td><div class="ipv4"><label for="BX_IPv4">IPv4</label></div></td>
					<td><div class="ssl"><label for="BX_IsSSL">SSL ?</label></div></td>
					<td><div class="active"><label for="BX_IsActive">Active ?</label></div></td>
				</p>
			</tr>
		</table>		
		
		<table id="dataTable" class="form" border="1">
			<tbody>
			
<?php
foreach($TrackersList as $Tracker) {
	switch ($Tracker["origin"]) {
		case 'rutorrent':
			$origin = 'disabled';
			break;		
		default:
			$origin = ' ';
			break;
	}

	switch ($Tracker["is_ssl"]) {
		case '1':
			$ssl = 'checked="checked"';
			break;		
		default:
			$ssl = ' ';
			break;
	}
	
	switch ($Tracker["is_active"]) {
		case '1':
			$active = 'checked="checked"';
			break;		
		default:
			$active = ' ';
			break;
	}
	
?>			
			
			<tr>
				<p>
					<td><input type="checkbox" required="required" class="delete" name="chk[]" <?php echo $origin; ?> /></td>
					<td>
						<input type="text" required="required" class="domain" name="BX_Domain[]" value="<?php echo $Tracker["tracker_domain"]; ?>" />
					</td>
					<td>
						<input type="text" required="required" class="address"  name="BX_Address[]" readonly="readonly" value="<?php echo $Tracker["tracker"]; ?>" />
					</td>
					<td>
						<input type="text" required="required" class="origin"  name="BX_Origin[]" readonly="readonly" value="<?php echo $Tracker["origin"]; ?>" />
					</td>					
					<td>
						<select id="BX_IPv4" name="BX_IPv4" class="ipv4">
<?php
						foreach(array_map('trim', explode(" ",$Tracker["ipv4"])) as $IPv4) {					
							echo '<option>' .$IPv4. '</option>';
						}
?>								
						</select>
					</td>
					<td>
						<input type="checkbox" class="ssl" name="BX_IsSSL" disabled <?php echo $ssl; ?> />
					</td>
					<td>
						<input type="checkbox" class="active" name="BX_IsActive" <?php echo $active; ?> />
					</td>						
				</p>
			</tr>
			
<?php
} // foreach($TrackersList as $Tracker) {
?>			
			
			</tbody>
		</table>
		<div class="clear"></div>               
	</fieldset>
	<fieldset>
		<legend>Add / Remove some user tracker</legend>
		<p> 
			<input type="button" value="Add tracker" onClick="addRow('dataTable')" /> 
			<input type="button" value="Remove tracker" onClick="deleteRow('dataTable')" /> 
			<p>(All acions apply only to entries with check marked check boxes only.)</p>
		</p>		
		<input class="submit" type="submit" value="Confirm &raquo;" />
		<div class="clear"></div>  
	</fieldset>
	<div class="clear"></div>
</form>

<?php
// -----------------------------------------
require  'inc/includes_after.php';
// -----------------------------------------
//#################### LAST LINE ######################################
?>