<?php
// ----------------------------------
//  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
//   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
//	_\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
//	 _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
//	  _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
//	   _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
//		_\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
//		 _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
//		  _\///______________\///___\////__________\///////////_____\/////////////_____
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
require_once(WEB_INC . '/languages/' . $_SESSION['Language'] . '/' . basename(__FILE__));

$ConfigValues = $MySB_DB->get("dnscrypt_config", ["require_nolog", "require_dnssec", "require_nofilter", "lb_strategy", "force_tcp", "ephemeral_keys", "tls_disable_session_tickets"], ["id_dnscrypt_config" => 1]);
$NoLogs_DB = $ConfigValues['require_nolog'];
$DNSSec_DB = $ConfigValues['require_dnssec'];
$NoFilter_DB = $ConfigValues['require_nofilter'];
$LoadBalancing_DB = $ConfigValues['lb_strategy'];
$ForceTcp_DB = $ConfigValues['force_tcp'];
$EphemeralKeys_DB = $ConfigValues['ephemeral_keys'];
$TlsDisableTickets_DB = $ConfigValues['tls_disable_session_tickets'];
$NoLogs_POST = $_POST['NoLogs'];
$DNSSec_POST = $_POST['DNSSec'];
$NoFilter_POST = $_POST['Namecoin'];
$LoadBalancing_POST = $_POST['Lb_strategy'];
$ForceTcp_POST = $_POST['force_tcp'];
$EphemeralKeys_POST = $_POST['ephemeral_keys'];
$TlsDisableTickets_POST = $_POST['tls_disable_session_tickets'];
$Change = 0;
$Command = 'message_only';
$type = 'information';
$message = Global_NoChange;
$LoadBalancingList = array('p2', 'ph', 'fastest', 'random');


if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case Global_SaveChanges:
            $NoLogs_DB = $ConfigValues['require_nolog'];
            $DNSSec_DB = $ConfigValues['require_dnssec'];
            $NoFilter_DB = $ConfigValues['require_nofilter'];
            $LoadBalancing_DB = $ConfigValues['lb_strategy'];
            $ForceTcp_DB = $ConfigValues['force_tcp'];
            $EphemeralKeys_DB = $ConfigValues['ephemeral_keys'];
            $TlsDisableTickets_DB = $ConfigValues['tls_disable_session_tickets'];

            if (($NoLogs_POST != $NoLogs_DB) || ($DNSSec_POST != $DNSSec_DB) || ($NoFilter_POST != $NoFilter_DB) || ($LoadBalancing_POST != $LoadBalancing_DB) || ($ForceTcp_POST != $ForceTcp_DB) || ($EphemeralKeys_POST != $EphemeralKeys_DB) || ($TlsDisableTickets_POST != $TlsDisableTickets_DB)) {
                $Change++;
                $Command = 'DNScrypt';
                $type = 'success';
                $NoLogs_DB = $NoLogs_POST;
                $DNSSec_DB = $DNSSec_POST;
                $NoFilter_DB = $NoFilter_POST;
                $LoadBalancing_DB = $LoadBalancing_POST;
                $ForceTcp_DB = $ForceTcp_POST;
                $EphemeralKeys_DB = $EphemeralKeys_POST;
                $TlsDisableTickets_DB = $TlsDisableTickets_POST;
            }

            if ($Change >= 1) {
                $result = $MySB_DB->update("dnscrypt_config", [
                    "require_nolog" => "$NoLogs_POST",
                    "require_dnssec" => "$DNSSec_POST",
                    "require_nofilter" => "$NoFilter_POST",
                    "lb_strategy" => "$LoadBalancing_POST",
                    "force_tcp" => "$ForceTcp_POST",
                    "ephemeral_keys" => "$EphemeralKeys_POST",
                    "tls_disable_session_tickets" => "$TlsDisableTickets_POST"
                ], ["id_dnscrypt_config" => 1]);

                if ($result >= 0) {
                    $type = 'success';
                    unset($message);
                }
            }
            break;
        default:
            $Command = 'DNScrypt';
            $type = 'success';
            break;
    }

    GenerateMessage($Command, $type, $message);
}

$ResolversList = $MySB_DB->select("dnscrypt_resolvers", ["name", "url", "require_dnssec", "require_nolog", "require_nofilter", "resolver_address", "provider_name", "certificate", "pid", "speed"], ["ORDER" => ["name" => "ASC"]]);
$SelectedResolver = $MySB_DB->get("dnscrypt_resolvers", "name", ["AND" => ["forwarder[!]" => '', "pid[!]" => 0]]);
?>

<form class="form_settings" method="post" action="">
    <div align="center" style="margin-top: 10px; margin-bottom: 20px;">
        <fieldset>
            <legend><?php echo MainUser_DNScrypt_Title_Config; ?></legend>

            <table>
                <tr>
                    <td class="tooltip" title="<?php echo Main_DNScrypt_TT_NoLogs; ?>" style="cursor: help;"><?php echo MainUser_DNScrypt_NoLogs; ?></td>
                    <td>
                        <?php switch ($NoLogs_DB) {
                            case 'true':
                                $class = 'greenText';
                                $options = '<option selected="selected" value="true" class="greenText">' . Global_Yes . '</option>';
                                $options .= '<option value="false" class="redText">' . Global_No . '</option>';
                                break;
                            default:
                                $class = 'redText';
                                $options = '<option value="true" class="greenText">' . Global_Yes . '</option>';
                                $options .= '<option selected="selected" value="false" class="redText">' . Global_No . '</option>';
                                break;
                        } ?>
                        <select name="NoLogs" style="width:60px; height: 28px;" class="<?php echo $class; ?>" onchange="this.className=this.options[this.selectedIndex].className"><?php echo $options; ?></select>
                    </td>
                    <td class="tooltip" title="<?php echo Main_DNScrypt_TT_DNSSec; ?>" style="cursor: help;"><?php echo MainUser_DNScrypt_DNSSec; ?></td>
                    <td>
                        <?php switch ($DNSSec_DB) {
                            case 'true':
                                $class = 'greenText';
                                $options = '<option selected="selected" value="true" class="greenText">' . Global_Yes . '</option>';
                                $options .= '<option value="false" class="redText">' . Global_No . '</option>';
                                break;
                            default:
                                $class = 'redText';
                                $options = '<option value="true" class="greenText">' . Global_Yes . '</option>';
                                $options .= '<option selected="selected" value="false" class="redText">' . Global_No . '</option>';
                                break;
                        } ?>
                        <select name="DNSSec" style="width:60px; height: 28px;" class="<?php echo $class; ?>" onchange="this.className=this.options[this.selectedIndex].className"><?php echo $options; ?></select>
                    </td>
                    <td class="tooltip" title="<?php echo Main_DNScrypt_TT_NoFilter; ?>" style="cursor: help;"><?php echo MainUser_DNScrypt_NoFilter; ?></td>
                    <td>
                        <?php switch ($NoFilter_DB) {
                            case 'true':
                                $class = 'greenText';
                                $options = '<option selected="selected" value="true" class="greenText">' . Global_Yes . '</option>';
                                $options .= '<option value="false" class="redText">' . Global_No . '</option>';
                                break;
                            default:
                                $class = 'redText';
                                $options = '<option value="true" class="greenText">' . Global_Yes . '</option>';
                                $options .= '<option selected="selected" value="false" class="redText">' . Global_No . '</option>';
                                break;
                        } ?>
                        <select name="Namecoin" style="width:60px; height: 28px;" class="<?php echo $class; ?>" onchange="this.className=this.options[this.selectedIndex].className"><?php echo $options; ?></select>
                    </td>
                    <td class="tooltip" title="<?php echo Main_DNScrypt_TT_LoadBalancing; ?>" style="cursor: help;"><?php echo MainUser_DNScrypt_LoadBalancing; ?></td>
                    <td>
                        <select name="Lb_strategy" style="width:80px; height: 28px;">';
                            <?php foreach ($LoadBalancingList as $Strategy) {
                                if ($LoadBalancing_DB == $Strategy) {
                                    echo '<option selected="selected" value="' . $Strategy . '">' . $Strategy . '</option>';
                                } else {
                                    echo '<option value="' . $Strategy . '">' . $Strategy . '</option>';
                                }
                            } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="tooltip" title="<?php echo Main_DNScrypt_TT_ForceTcp; ?>" style="cursor: help;"><?php echo MainUser_DNScrypt_ForceTcp; ?></td>
                    <td>
                        <?php
                        switch ($ForceTcp_DB) {
                            case 'true':
                                $options = '<option selected="selected" value="true">' . Global_Yes . '</option>';
                                $options .= '<option value="false">' . Global_No . '</option>';
                                break;
                            default:
                                $options = '<option value="true">' . Global_Yes . '</option>';
                                $options .= '<option selected="selected" value="false">' . Global_No . '</option>';
                                break;
                        } ?>
                        <select name="force_tcp" style="width:60px; height: 28px;" disabled><?php echo $options; ?></select>
                    </td>
                    <td class="tooltip" title="<?php echo Main_DNScrypt_TT_EphemeralKeys; ?>" style="cursor: help;"><?php echo MainUser_DNScrypt_EphemeralKeys; ?></td>
                    <td>
                        <?php switch ($EphemeralKeys_DB) {
                            case 'true':
                                $options = '<option selected="selected" value="true">' . Global_Yes . '</option>';
                                $options .= '<option value="false">' . Global_No . '</option>';
                                break;
                            default:
                                $options = '<option value="true">' . Global_Yes . '</option>';
                                $options .= '<option selected="selected" value="false">' . Global_No . '</option>';
                                break;
                        } ?>
                        <select name="ephemeral_keys" style="width:60px; height: 28px;" disabled><?php echo $options; ?></select>
                    </td>
                    <td class="tooltip" title="<?php echo Main_DNScrypt_TT_TlsDisableTickets; ?>" style="cursor: help;"><?php echo MainUser_DNScrypt_TlsDisableTickets; ?></td>
                    <td>
                        <?php switch ($TlsDisableTickets_DB) {
                            case 'true':
                                $options = '<option selected="selected" value="true">' . Global_Yes . '</option>';
                                $options .= '<option value="false">' . Global_No . '</option>';
                                break;
                            default:
                                $options = '<option value="true">' . Global_Yes . '</option>';
                                $options .= '<option selected="selected" value="false">' . Global_No . '</option>';
                                break;
                        } ?>
                        <select name="tls_disable_session_tickets" style="width:60px; height: 28px;" disabled><?php echo $options; ?></select>
                    </td>
                </tr>
            </table>
        </fieldset>

        <input class="submit" style="width:<?php echo strlen(Global_SaveChanges) * 10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo Global_SaveChanges; ?>" />

    </div>

    <div align="center">
        <input class="submit" style="width:<?php echo strlen(MainUser_DNScrypt_Restart) * 10; ?>px; margin-bottom: 10px;" name="submit" type="submit" value="<?php echo MainUser_DNScrypt_Restart; ?>">
        <table style="border-spacing:1;">
            <tr>
                <th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Name; ?></th>
                <th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_DNSsec; ?></th>
                <th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_NoLog; ?></th>
                <th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Filters; ?></th>
                <th style="text-align:center;"><?php echo MainUser_DNScrypt_Table_Speed; ?></th>
            </tr>
            <?php
            foreach ($ResolversList as $Resolver) {
                $Name = $Resolver["name"];
                $URL = $Resolver["url"];
                $DnssecVal = $Resolver["require_dnssec"];
                $NoLogs = $Resolver["require_nolog"];
                $Namecoin = $Resolver["require_nofilter"];
                $ResolverAddress = $Resolver["resolver_address"];
                $ProviderName = $Resolver["provider_name"];
                $IsWished = $Resolver["is_wished"];
                $IsActivated = $Resolver["is_activated"];
                $Certificate = $Resolver["certificate"];
                $Pid = $Resolver["pid"];
                $Speed = $Resolver["speed"];

                if ($Pid != '') {
                    $style = "style=\"background-color:#00FF66\"";
                    $PidValue = $Pid;
                } else {
                    $style = '';
                    $PidValue = '';
                }

                if (!strpos($Name, 'ipv6')) {
                    switch ($DnssecVal) {
                        case 'false':
                            $DnssecVal = '<select name="DnssecVal[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="false" selected="selected">' . Global_No . '</option>
								</select>';
                            break;
                        default:
                            $DnssecVal = '<select name="DnssecVal[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="true" selected="selected">' . Global_Yes . '</option>
								</select>';
                            break;
                    }
                    switch ($NoLogs) {
                        case 'false':
                            $NoLogs = '<select name="NoLogs[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="false" selected="selected">' . Global_No . '</option>
								</select>';
                            break;
                        default:
                            $NoLogs = '<select name="NoLogs[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="true" selected="selected">' . Global_Yes . '</option>
								</select>';
                            break;
                    }
                    switch ($Namecoin) {
                        case 'false':
                            $Namecoin = '<select name="Namecoin[]" style="width:60px; background-color:#FEBABC;" disabled>
									<option value="false" selected="selected">' . Global_No . '</option>
								</select>';
                            break;
                        default:
                            $Namecoin = '<select name="Namecoin[]" style="width:60px; background-color:#B3FEA5;" disabled>
									<option value="true" selected="selected">' . Global_Yes . '</option>
								</select>';
                            break;
                    }
                    switch ($Certificate) {
                        case '0':
                            $Certificate = 'OK';
                            break;
                        default:
                            $Certificate = 'KO';
                            break;
                    }
                    ?>
            <tr>
                <td <?php echo $style ?>>
                    <div style="text-align: center;"><a target="_blank" href="<?php echo $URL; ?>"><?php echo $Name; ?></a></div>
                </td>
                <td <?php echo $style ?>>
                    <div style="text-align: center;"><?php echo $DnssecVal; ?></div>
                </td>
                <td <?php echo $style ?>>
                    <div style="text-align: center;"><?php echo $NoLogs; ?></div>
                </td>
                <td <?php echo $style ?>>
                    <div style="text-align: center;"><?php echo $Namecoin; ?></div>
                </td>
                <td <?php echo $style ?>>
                    <div style="text-align: center;"><?php echo $Speed; ?></div>
                </td>
            </tr>
            <?php
                }
            } // foreach($TrackersList as $Tracker) {
            ?>
        </table>
        <input class="submit" style="width:<?php echo strlen(MainUser_DNScrypt_Restart) * 10; ?>px; margin-top: 10px;" name="submit" type="submit" value="<?php echo MainUser_DNScrypt_Restart; ?>">
    </div>
</form>

<?php
//#################### LAST LINE ######################################
