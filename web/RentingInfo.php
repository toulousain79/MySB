<?php
// ---------------------------
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

error_reporting(E_ALL);

if(isset($_SERVER['PHP_AUTH_USER'])) {
	function getScriptVersion() {
		$data = file("/etc/MySB/infos/version.info");
		return $data[0];
	}

	function Form() {
		$filename = '/etc/MySB/inc/renting';
		$formula = '';
		$tva = '';
		$unit_price = '';

		if (file_exists($filename)) {
			$data = file($filename);
			
			foreach($data as $index=>$line) {
				$column = explode('=', $line, 2);
				
				if ( isset($column[1]) ) {
					$column[1] = str_replace('"', '', $column[1]);
				}
				
				if ( (isset($column[0])) && (isset($column[1])) && ((substr($column[0], 0, 1) != '#')) ) {
		
					switch ($column[0]) {
						case 'FORMULA':
							$formula = $column[1];
							break;
						case 'TVA':
							$tva = $column[1];
							break;
						case 'PU':
							$unit_price = $column[1];
							break;					
					}
				}
			}
		}	
	
		echo '<form method="post" action="">
			<table border="0">	
				<tr>
					<td><span class="Title">Formula :</span></td>
					<td><input name="formula" type="text" value="' . $formula . '" /></td>
					<td><span class="Comments"><em>Example:	Serveur Dedibox XC</em></span></td>
				</tr>
				<tr>
					<td><span class="Title">TVA (%)  :</span></td>
					<td><input name="tva" type="text" value="' . $tva . '" /></td>
					<td><span class="Comments"><em>Example:	20</em></span></td>
				</tr>
				<tr>
					<td><span class="Title">Unit price (per month)   :</span></td>
					<td><input name="unit_price" type="text" value="' . $unit_price . '" /></td>
					<td><span class="Comments"><em>Example:	19.99 (value without tax)</em></span></td>
				</tr>				
				<tr>
					<td colspan="3" align="center"><input name="submit" type="submit" value="Submit" /></td>
				</tr>						
			</table>
		</form>';
	
	}
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
		<title>MySB <?php echo getScriptVersion() .' - Renting'; ?></title>
		<!-- non indexation moteur de recherche -->
		<meta name="robots" content="noindex, nofollow">
		<meta name="robots" content="noarchive">
		<meta name="googlebot" content="nosnippet">
		<style>	
			.Global {font-family: Verdana, Arial, Helvetica, sans-serif; text-align: center;}
			.FontInRed {color: #FF0000}
			.FontInGreen {color: #00CC33}
			.Comments {font-size: 11px;}
			.Title {color: #0000FF;}
        </style>			
</head>

<body class="Global">
	<h1>Hello <?php echo $_SERVER['PHP_AUTH_USER']; ?> !</h1>		

	<div align="center">

<?php
	if (isset($_POST['submit'])) {	
		$formula=$_POST['formula'];
		$tva=$_POST['tva'];
		$unit_price=$_POST['unit_price'];
	
		if ( ($formula != '') && ($tva != '') && ($unit_price != '') ) {
			exec("sudo /bin/bash /etc/MySB/scripts/MakeRenting.sh '".$_POST['formula']."' '".$_POST['tva']."' '".$_POST['unit_price']."'", $output, $result);
			
			Form();
		
			foreach ($output as $item){
				echo $item.'<br>';
			}
				
			if( $result == 0 ){						
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
?>
		</div>		

	</body>
</html>

<?php
} else {
	echo '<p><h1 class="FontInRed">You must login in to continue !</h1></p>';
}
?>