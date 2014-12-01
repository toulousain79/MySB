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

if(isset($_POST)==true && empty($_POST)==false) {
	$success = true;

	if (isset($_POST['submit'])) {
		for($i=0, $count = count($_POST['tracker_domain']);$i<$count;$i++) {
			$result = $database->update("trackers_list", ["is_active" => $_POST['is_active'][$i]], ["tracker_domain" => $_POST['tracker_domain'][$i]]);
			
			if ( $result != 1 ) {
				$success = false;
			}
		}		
	}
	
	if (isset($_POST['delete'])) {
		$count = count($_POST['delete']);
		
		foreach($_POST['delete'] as $key => $value) {
			$result = $database->delete("trackers_list", [
				"AND" => [
					"id_trackers_list" => $key
				]
			]);

			if ( $result = 0 ) {
				$success = false;
			}			
		}
	}

	if ( $success == true ) {
		?><script type="text/javascript">generate_message('success', 'Success !!');</script><?php
	} else {
		?><script type="text/javascript">generate_message('error', 'Failed !');</script><?php
	}	
}

$TrackersList = $database->select("trackers_list", "*", ["ORDER" => "trackers_list.tracker_domain ASC"]);
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

<form class="form_settings" method="post" action="">	
	<div align="center">
		<input class="submit" style="width:120px; margin-bottom: 10px;" name="submit" type="submit" value="Save Changes">
		
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;">Domain</th>
				<th style="text-align:center;">Address</th>
				<th style="text-align:center;">Origin</th>
				<th style="text-align:center;">IPv4</th>
				<th style="text-align:center;">SSL ?</th>
				<th style="text-align:center;">Active ?</th>
				<th style="text-align:center;">Delete ?</th>
			</tr>						
				
<?php
foreach($TrackersList as $Tracker) {
	switch ($Tracker["origin"]) {
		case 'users':
			$origin = '<input class="submit" name="delete['. $Tracker["id_trackers_list"] .']" type="submit" value="Delete" />';
			break;		
		default:
			$origin = '';
			break;
	}

	switch ($Tracker["is_ssl"]) {
		case '0':
			$is_ssl = '	<select name="is_ssl[]" style="width:60px; background-color:#FEBABC;" disabled>
							<option value="0" selected="selected">No</option>
						</select>';
			break;		
		default:
			$is_ssl = '	<select name="is_ssl[]" style="width:60px; background-color:#B3FEA5;" disabled>
							<option value="1" selected="selected">Yes</option>
						</select>';
			break;
	}
	
	switch ($Tracker["is_active"]) {
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
					<input style="width:150px;" type="hidden" name="tracker_domain[]" value="<?php echo $Tracker["tracker_domain"]; ?>" />
					<?php echo $Tracker["tracker_domain"]; ?>
				</td>
				<td>
					<input style="width:180px;" type="hidden" name="tracker[]" value="<?php echo $Tracker["tracker"]; ?>" />
					<?php echo $Tracker["tracker"]; ?>
				</td>
				<td>
					<input style="width:60px;" type="hidden" name="origin[]" value="<?php echo $Tracker["origin"]; ?>" />
					<?php echo $Tracker["origin"]; ?>
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
					<?php echo $is_ssl; ?>			
				</td>
				<td>
					<?php echo $is_active; ?>				
				</td>
				<td>
					<?php echo $origin; ?>
				</td>					
			</tr>
<?php
} // foreach($TrackersList as $Tracker) {
?>			

		</table>
	
		<input class="submit" style="width:120px; margin-top: 10px;" name="submit" type="submit" value="Save Changes">
	</div>
</form>

<?php
// -----------------------------------------
require  '/etc/MySB/web/inc/includes_after.php';
// -----------------------------------------
//#################### LAST LINE ######################################
?>