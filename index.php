<?php
require_once('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Raidboss map</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="raidboss map" />
<meta name="keywords" content="L2, Lineage 2 server, Lineage 2, private L2. l2servers, l2servers.eu" />
<meta name="author" content="Prodzect" />

<link rel='stylesheet' href='style/hint.css' type='text/css' />
<link rel='stylesheet' href='style/jquery-ui.css' type='text/css' />

<script type="text/javascript" src="js/jquery.js"></script>   
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/raidboss.js"></script>
<script>
$(document).ready(function() 
{
	$('.info').tipsy({gravity: 'n',  fade: true, html: true});
});
</script>
</head>
<body bgcolor="#fff" text="lime" link="#009933" vlink="#009933" leftmargin="0">
<?php
$query = mysql_query("SELECT boss_id, loc_x, loc_y, respawn_time FROM raidboss_spawnlist");

$map_size_converted = $config['map_size'] / 100;

$ow = 1809;
$oh = 2619;

$pw = $ow * $map_size_converted;
$ph = $oh * $map_size_converted;

$fpw = $ow - $pw;
$fph = $oh - $ph;

echo "<div style=position: absolute; top: 0px; left: 0px;><img src='images/interlude_map.jpg' width='{$fpw}' height='{$fph}'></div>";

while ($row = mysql_fetch_array($query))
{
	$id = $row['boss_id'];
	
	$query2 = mysql_query("SELECT name, level FROM npc WHERE id = '{$id}'");
	$data = mysql_fetch_array($query2);
 
	$x1 = 116 + ($row['loc_x'] + 107823) / 200;
	$y1 = 2580 + ($row['loc_y'] - 255420) / 200;
	
	$x2 = $x1 * $map_size_converted;
	$y2 = $y1 * $map_size_converted;
	
	$x = $x1 - $x2;
	$y = $y1 - $y2;
	
	$exts = array(1 => '.jpg', '.gif', '.png');
	
	foreach ($exts as $ext)
	{
		if (file_exists("images/rb_images/". $id . $ext))
		{
			list($width, $height) = getimagesize('images/rb_images/'. $id . $ext);
			$w = $width + 40;
			$h = $height + 40;
			
			if ($config['show_rb_foto'] == 1 && $config['show_drop'] == 0)
			{
				$onclick = "onclick=\"showBigImage('{$w}', '{$h}', '{$data['name']}', '{$id}{$ext}'); return false;\"";
				$title = "<br /><img src='images/rb_images/{$id}{$ext}' width='100' height='100' /><br />";
			}
			else
			{
				$onclick = "";
				$title = "<br />";
			}
			
			break;
		}
		else
		{
			$onclick = "";
			$title = "<br />";
		}
	}
	
	if ($config['show_rb_foto'] == 0 && $config['show_drop'] == 1)
	{
		$onclick = "onclick=\"showDrop('{$data['name']} - drop', 'drop.php?id={$id}', 'dialog', '200', '350'); return false;\"";
		$title = "<br />";
	}
	
	if ($config['show_rb_id'])
		$rb_id = '| ID: '.$id;
	else
		$rb_id = '';
	
	if($row['respawn_time'] == 0)
		echo "<div style='position:absolute;top:{$y}px;left:{$x}px'>
				<img src='images/on.png' {$onclick} class='info' title=\"<font color='#d1e691'><b>{$data['name']} {$rb_id}</b>
				{$title}
				LVL: {$data['level']}</font>\" />
		</div>";  
	else
		echo "<div style='position:absolute;top:{$y}px;left:{$x}px'>
			<img src='images/off.png' {$onclick} class='info' title=\"<font color='#e69193'><b>{$data['name']} {$rb_id}</b>
				{$title}
				LVL: {$data['level']}</font>\" />
		</div>";
}   
?>

<div id='dialog'></div>
</body>
</html> 