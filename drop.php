<?php
require_once('config.php');
?>
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
<?php
$id = $_GET['id'];

$query = mysql_query("SELECT * FROM droplist WHERE mobId = '{$id}'");
while($row = mysql_fetch_assoc($query))
{
	if ($config['show_drop_min_max'] == 1)
	{
		$min_max = "class='info' title='min: {$row['min']} | max: {$row['max']}'";
	}
	else
	{
		$min_max = '';
	}
	
	echo "<img src='images/items/{$row['itemId']}.png' {$min_max}> ";
}
?>