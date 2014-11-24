<?php
function adminer_object() {
  
	class AdminerSoftware extends Adminer {
  
		function name() {
			// custom name in title and heading
			return 'MySB';
		}    
		
		function database() {
			// database name, will be escaped by Adminer
			return '../db/MySB.sq3';
		}
	
		function loginForm() {
			global $drivers;
?>
<table cellspacing="0">
<tr><th><?php echo lang('Username'); ?><td><input name="auth[driver]" id="driver" value="sqlite" type="hidden"><input name="auth[username]" id="username" value="<?php echo h($_GET["username"]); ?>" autocapitalize="off">
<tr><th><?php echo lang('Password'); ?><td><input type="password" name="auth[password]">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
focus(username);
username.form['auth[driver]'].onchange();
</script>
<?php
		echo "<p><input type='submit' value='" . lang('Login') . "'>\n";
		echo checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang('Permanent login')) . "\n";
	}

	function login($login, $password) {
      // validate user submitted credentials
      return ($login == 'admin' && $password == 'admin');
    }
	
  
  }
  return new AdminerSoftware;
}
include "./inc/editor-4.1.0.php";