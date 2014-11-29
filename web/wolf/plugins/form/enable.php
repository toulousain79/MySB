<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Form
 *
 * The Form plugin is a third-party plugin that lets you create and display forms on your installation of Wolf CMS.
 */

Plugin::setAllSettings(array(
    'success_message' => '<p>The form has been submitted succesfully.</p>',
    'invalid_message' => '<p>The form has not been submitted.</p>',
    'error_message' => '<p>An error has ocurred and the email has not been sent. Please try again.</p>',
    'copy_message' => '<p>We have recieved your submission. This is a copy of the data you have sent to us.</p>'
), 'form');

$permissions = array(
    'form_builder_view',
    'form_add',
    'form_edit',
    'form_delete'
);

$roles = array(
    'administrator',
    'editor'
);

$new_perms = array();

foreach ($permissions as $permission_name) {
    if (!$perm = Permission::findByName($permission_name)) {
        $perm = new Permission();
        $perm->name = $permission_name;
        $perm->save();
    }

    $new_perms[] = $perm;
}

foreach ($roles as $role_name) {
    if ($role = Role::findByName($role_name)) {
        $perms = array_merge(RolePermission::findPermissionsFor($role->id), $new_perms);

        RolePermission::savePermissionsFor($role->id, $perms);
    }
}

$PDO = Record::getConnection();
$driver = strtolower($PDO->getAttribute(Record::ATTR_DRIVER_NAME));

if($driver == 'mysql'){
$sql = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."form` (
  `id` int(1) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `mail_to` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by_id` int(1) NOT NULL,
  `updated_by_id` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;";


$PDO->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."form_field` (
  `id` int(1) NOT NULL auto_increment,
  `label` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `required` tinyint(1) DEFAULT 0,
  `form_id` int(1) NOT NULL,
  `position` int(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `form_id` (`form_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;";

$PDO->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."form_field_option` (
  `id` int(1) NOT NULL auto_increment,
  `label` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `field_id` int(1) NOT NULL,
  `position` int(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;";

$PDO->exec($sql);

} elseif($driver == 'sqlite'){
   
    
    $sql = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."form` (
  `id` INTEGER NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `mail_to` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by_id` int(1) NOT NULL,
  `updated_by_id` int(1) NOT NULL 
  );";
    $PDO->exec($sql);
    
$sql = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."form_field` (
  `id`  INTEGER NOT NULL PRIMARY KEY,
  `label` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `required` tinyint(1) DEFAULT 0,
  `form_id` int(1) NOT NULL,
  `position` int(1) DEFAULT 0 );";

$PDO->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."form_field_option` (
  `id` INTEGER NOT NULL PRIMARY KEY,
  `label` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `field_id` int(1) NOT NULL,
  `position` int(1) DEFAULT 0);";

 $PDO->exec($sql);   
    
}
