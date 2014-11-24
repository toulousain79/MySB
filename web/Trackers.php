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

function Form() {
	// Users trackers
	$trackers_datas = $database->get("trackers_users", "*", "");

	echo '<form method="post" action=""><table border="0">';
	
	foreach ( $trackers_datas as $tracker ) {
		echo '<tr>
				<td><input name="' . $tracker["id_trackers_users"] . '" type="text" value="' . $tracker["tracker_users"] . '" /></td>
				<td><input name="model" type="text" value="' . $renting_datas["model"] . '" /></td>
			</tr>';		
	}	

	echo '</table></form>';
}

if (isset($_POST['submit'])) {	
	$Model = $_POST['model'];
	$TVA = $_POST['tva'];
	$GlobalCost = $_POST['global_cost'];
	$TotalUsers = $_POST['nb_users'];
	$PricePerUsers = $_POST['price_per_users'];

	if ( ($Model != '') && ($TVA != '') && ($GlobalCost != '') ) {
		$result = update("renting", ["model" => $Model,
									"tva" => $TVA,
									"global_cost" => $GlobalCost,
									"nb_users" => $TotalUsers,
									"price_per_users" => $PricePerUsers],
									["id_renting" => 1]);
		
		Form();
			
		if( $result != 0 ){						
			echo '<p class="FontInGreen">Successfull !</p>';
		} else {
			echo '<p class="FontInRed">Failed !</p>';
		}
	} else {
		Form();
	
		echo '<p class="FontInRed">Please, complete all fields.</p>';
	}
} else {
	Form();
}

// -----------------------------------------
require  'inc/includes_after.php';
// -----------------------------------------
//#################### LAST LINE ######################################
?>