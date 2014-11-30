<?php
// ----------------------------------
require  '/etc/MySB/web/inc/includes_before.php';
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
$TrackersList = $database->select("trackers_list", "*", ["origin" => "users"]);
?>

<form class="form_settings" method="post" action="">	
	<div style="width:450px; margin-left: auto; margin-right: auto;">
		<div style="margin-bottom:10px;" align="center"><input onclick="addRow(this.form);" type="button" value="Add tracker domain" style="cursor: pointer;" /></div>
		<div id="itemRows">
			<div style="margin-bottom:10px;">Tracker domain: <input style="width:150px;" type="text" required="required" readonly="readonly" name="tracker_domain" /> Is active ? <select style="width:60px;"><option value="1">Yes</option><option value="0">No</option></select></div>
		</div>
		<div style="margin-bottom:10px;" align="center"><input style="cursor: pointer;" type="submit" name="ok" value="Save Changes"></div>
	</div>
		
	<div align="center">
		<table style="border-spacing:1;">
			<tr>
				<th scope="col">Domain</th>
				<th scope="col">Address</th>
				<th scope="col">Origin</th>
				<th scope="col">IPv4</th>
				<th scope="col">SSL ?</th>
				<th scope="col">Active ?</th>
				<th scope="col">Delete ?</th>
			</tr>						
				
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
			$ssl = 'checked';
			break;		
		default:
			$ssl = ' ';
			break;
	}
	
	switch ($Tracker["is_active"]) {
		case '1':
			$active = 'checked';
			$value = '0';
			break;		
		default:
			$active = ' ';
			$value = '1';
			break;
	}
?>				
			<tr>
				<td>
					<input style="width:150px;" type="text" required="required" readonly="readonly" name="tracker_domain" value="<?php echo $Tracker["tracker_domain"]; ?>" />
				</td>
				<td>
					<input style="width:180px;" type="text" required="required" readonly="readonly" value="<?php echo $Tracker["tracker"]; ?>" />
				</td>
				<td>
					<input style="width:60px;" type="text" required="required" readonly="readonly" value="<?php echo $Tracker["origin"]; ?>" />
				</td>					
				<td>
					<select style="width:140px;">
<?php
						foreach(array_map('trim', explode(" ",$Tracker["ipv4"])) as $IPv4) {					
							echo '<option>' .$IPv4. '</option>';
						}
?>								
					</select>
				</td>
				<td>
					<input style="width:60px;" type="checkbox" disabled <?php echo $ssl; ?> />
				</td>
				<td>
					<input style="width:60px; cursor: pointer;" type="checkbox" name="is_active" <?php echo $active; ?> />
				</td>
				<td>
					<input style="width:60px;" class="submit" name="delete" type="submit" value="Del" />
				</td>					
			</tr>
<?php
} // foreach($TrackersList as $Tracker) {
?>			

		</table>
	</div>
</form>


<script type="text/javascript">
var rowNum = 0;
function addRow(frm) {
	rowNum ++;

	var row = '<p id="rowNum'+rowNum+'" style="margin-bottom:10px;">Tracker domain: <input style="width:150px;" type="text" required="required" name="tracker_domain[]" value="'+frm.tracker_domain.value+'" /> Is active ? <select style="width:60px;" name="is_active[]" value="'+frm.is_active.value+'"><option value="1">Yes</option><option value="0">No</option></select><input type="button" value="Remove" onclick="removeRow('+rowNum+');" style="margin-left:5px; cursor: pointer;"></p>';
		
//	var row = '<p id="rowNum'+rowNum+'">Item quantity: <input type="text" name="qty[]" size="4" value="'+frm.add_qty.value+'"> Item name: <input type="text" name="name[]" value="'+frm.add_name.value+'"> <input type="button" value="Remove" onclick="removeRow('+rowNum+');"></p>';
	jQuery('#itemRows').append(row);
	frm.tracker_domain.value = '';
	frm.is_active.value = '';
}

function removeRow(rnum) {
	jQuery('#rowNum'+rnum).remove();
}
</script>

<?php
// -----------------------------------------
require  '/etc/MySB/web/inc/includes_after.php';
// -----------------------------------------
//#################### LAST LINE ######################################
?>