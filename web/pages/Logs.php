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

echo '<div id="jQ-menu">';

$path = "./logs/";

	function createDir($path = '.') {
		if ($handle = opendir($path)) {
			echo "<ul>";

			while (false !== ($file = readdir($handle))) {
				if (is_dir($path.$file) && $file != '.' && $file !='..')
					printSubDir($file, $path, $queue);
				else if ($file != '.' && $file !='..')
					$queue[] = $file;
			}

			printQueue($queue, $path);
			echo "</ul>";
		}
	}

	function printQueue($queue, $path) {
		foreach ($queue as $file) {
			printFile($file, $path);
		}
	}

	function printFile($file, $path) {
		$SudDirectory = preg_replace('/.\/logs\//', '', "$path");
		$SudDirectory = preg_replace('/\//', '', "$SudDirectory");
		echo "<li><a href=\"/?main-user/logs.html?dir=".$SudDirectory."&file=".$file."\">$file</a></li>";
	}

	function printSubDir($dir, $path) {
		echo "<li><span class=\"toggle\">$dir</span>";
		createDir($path.$dir."/");
		echo "</li>";
	}

	createDir($path);

echo '</div>';

if ( isset($_GET['dir']) && isset($_GET['file']) ) {
	echo '<div style="background-color:#404040;">';
	include_once('./logs/'.$_GET['dir'].'/'.$_GET['file']);
	echo $contenu;
	echo '</div>';
}

//#################### LAST LINE ######################################
