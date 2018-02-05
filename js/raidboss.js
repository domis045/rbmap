/**
 * -------------------------------------------
 * @author			Prodzect
 * @copyright		Copyright (c) l2servers.eu             
 * @author page http://l2servers.eu
 * --------------------------------------------
**/

function showBigImage(w, h, t, file)
{
	$(document).ready(function()
	{
		if (w > $(window).width())
			var wi = $(window).width() - 50;
		else
			var wi = w;
		
		if (h > $(window).height())
			var he = $(window).height() - 50;
		else
			var he = h;
		
		$('#dialog').dialog({
			modal: true,
			resizable: false, 
			title: t,
			open: function ()
      {
				$(this).html("<img src='images/rb_images/"+file+"' />");
      }, 
			width: wi,
			height: he,
			show: 'blind',
			hide: 'blind'
		});
	});
}

function showDrop(_title, file, id, _height, _weight)
{
	$(document).ready(function()
	{
		if (_height == '')
			_height = 250;
	
		if (_weight == '')
			_weight = 500;
		
		var dialogOpts = {
			title: _title,
			modal: true,
			height: _height,
			width: _weight,
			draggable: false,
			resizable: false
		};
		
		$("#"+id).dialog(dialogOpts);
   
		$("#"+id).load(file, [], function(){ $("#"+id).dialog("open"); });
	});
}