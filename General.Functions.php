<?php
/**
 * 
 *
 * @author EpicDewd
 * @version 1.0
 * @copyright HalpMeh, 11 November, 2010
 * @package 4chan
 **/

$settings = array();

$settingResult = $db->query("SELECT * FROM settings;");
while($setting = mysql_fetch_array($settingResult, MYSQL_ASSOC))
{
	$settings[$setting['name']] = $setting['value'];
}
	
function settings($setting) {
	global $settings;
	return $settings[$setting];
}

function upload_path($file_name)
{
	return (settings("upload_folder") . $file_name);
}
function full_upload_path($file_name)
{
	return (settings("site_url") . upload_path($file_name));
}

# Compressing & Uncompressing files for upload system
function compress($file, $dest)
{
	$fp = fopen($file, "r");
	$data = fread($fp, filesize($file));
	fclose($fp);
	
	$zp = gzopen($dest, "w9");
	gzwrite($zp, $data);
	gzclose($zp);	
}
function uncompress($file, $dest)
{
	
}
?>
