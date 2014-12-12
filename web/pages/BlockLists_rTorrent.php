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

global $MySB_DB;

if (isset($_POST['submit'])) {
	$success = true;
	
	for($i=0, $count = count($_POST['id_rtorrent_blocklists']);$i<$count;$i++) {
		$result = $MySB_DB->update("rtorrent_blocklists", ["is_active" => $_POST['is_active'][$i]], ["id_rtorrent_blocklists" => $_POST['id_rtorrent_blocklists'][$i]]);
		
		if ( $result != 1 ) {
			$success = false;
		}
	}

	if ( $success == true ) {
		$type = 'success';
	} else {
		$type = 'error';
		$message = 'Failed ! It was not possible to update tracker in the MySB database.';	
	}
	
	GenerateMessage('FirewallAndSecurity.sh', $type, $message);
}

$BlockList = $MySB_DB->select("rtorrent_blocklists", "*");
?>

<form class="form_settings" method="post" action="">	
	<div align="center">
		<input class="submit" style="width:120px; margin-bottom: 10px;" name="submit" type="submit" value="Save Changes">
		
		<table style="border-spacing:1;">
			<tr>
				<th style="text-align:center;">Name</th>
				<th style="text-align:center;">Blocklist</th>
				<th style="text-align:center;">Default ?</th>
				<th style="text-align:center;">Active ?</th>
			</tr>						
				
<?php
foreach($BlockList as $List) {
	switch ($List["default"]) {
		case '0':
			$default = '<select name="default[]" style="width:60px; background-color:#FEBABC;" disabled>
							<option value="0" selected="selected">No</option>
						</select>';
			break;		
		default:
			$default = '<select name="default[]" style="width:60px; background-color:#B3FEA5;" disabled>
							<option value="1" selected="selected">Yes</option>
						</select>';
			break;
	}
	
	switch ($List["is_active"]) {
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
					<input style="width:120px;" type="hidden" name="name[]" value="<?php echo $List["name"]; ?>" />
					<?php echo $List["name"]; ?>
				</td>			
				<td>
					<input style="width:180px;" type="hidden" name="blocklists[]" value="<?php echo $List["blocklists"]; ?>" />
					<?php echo '<a target="_blank" href="' . $List["url_info"] . '">' . $List["blocklists"] . '</a>'; ?>
				</td>
				<td>
					<?php echo $default; ?>			
				</td>
				<td>
					<?php echo $is_active; ?>				
				</td>					
			</tr>
			<input type="hidden" name="id_rtorrent_blocklists[]" value="<?php echo $List["id_rtorrent_blocklists"]; ?>" />
<?php
} // foreach($BlockList as $List) {
?>			

		</table>
	
		<input class="submit" style="width:120px; margin-top: 10px;" name="submit" type="submit" value="Save Changes">
	</div>
</form>

<?php
//#################### LAST LINE ######################################
?>