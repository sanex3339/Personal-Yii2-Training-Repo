$(document).ready(function(){
	var id, imagesCount = 0, images, imagesLength, imageName;

	init();

	function init()
	{
		id = 1;

		//get images array from server
		getImages();
	}

	function getImages()
	{
		var url = '/get-images/';
 		$.ajax({
	       url: url,
	       type: 'POST',
	       data: {
	       		_csrf: yii.getCsrfToken(),
	       		path: AssetsPath+'/img/hexal',
	       },
           dataType: 'json',
	       success: function(data) {
	           images = data.files;
	           imagesLength = images.length;

	           drawRows();
	           drawControlButtons();
	       }
	    });
	}

	function drawRows()
	{
		drawRow($('.hexagon-row'), 1, 4, true);	
		drawRow($('.hexagon-row'), 2, 5, false);
		drawRow($('.hexagon-row'), 3, 4, true);
	}

	function updateRows(rowsClass)
	{
		//remove hexagons in rows
		rowsClass.children().remove();

		//clear variables and redraw raws
		init();
	}

	function drawRow(rowsClass, rowPos, num, border)
	{
		var row = rowsClass.eq(rowPos-1);

		//append borders
		if (border == true)
		{
			appendBorders(row);
		}

		//append 
		for (i = 0; i < num; i++)
		{
			//append elements into row
			row.append('<div class="hexagon-wrapper" id="hexagon-wrapper-'+id+'"><div class="hexagon" id="hexagon-'+id+'"></div></div>');

			//set random image
			var random_id = Math.floor(Math.random()*images.length);
			imageName = images[random_id];
			images.splice(random_id, 1);
			$('#hexagon-'+id).css('background-image', 'url('+AssetsPath+'/img/hexal/'+imageName+')');

			//animate
			$('#hexagon-wrapper-'+id).delay(i+'10').animate({
				opacity: 1
			});

			id++;
		}
	}

	function appendBorders(row)
	{
		row.append('<div class="hexagon-border-l"></div>');
		row.append('<div class="hexagon-border-r"></div>');

		//animate borders
		$('.hexagon-border-l').animate({
			opacity: 1
		});
		$('.hexagon-border-r').delay('300').animate({
			opacity: 1
		});
	}

	function drawControlButtons()
	{
		var numButtons = Math.floor(imagesLength/13);

		if (numButtons > 1 && $('.slider-control').length == 0)
		{
			for (i = 0; i < numButtons; i++) 
			{
				$('.slider-controls>ul').append('<li class="slider-control"></li>');
			}

			$('.slider-control').eq(0).addClass('slider-control-active');
		}
	}

	//control button click
	$('.slider-controls').on('click', '.slider-control', function(){
		var controlArray = $(this);
		var controlID = controlArray.index();

		//cange active class on controll button click
		$('.slider-control.slider-control-active').removeClass('slider-control-active');
		$(this).addClass('slider-control-active');
		
		updateRows($('.hexagon-row'));
	});

	//checkbox label click
	$('.filters-wrapper').find('input:checkbox').each(function(index){
		var name = $(this).attr('name');
		var id = name+'-gid-'+index;
		$(this).attr('id', id);
		$(this).next('label').attr('for', id);
	});


	//MODALS
	//modal create new post button click
	$('.createNewPostButton').click(function(){
		$('#modalCreateNewPost').modal('show')
		.find('#modalCreateNewPostContent')
		.load($(this).attr('value'));
	});

	//modal update post button click
	$('.updatePostButton').click(function(){
		$('#modalUpdatePost').modal('show')
		.find('#modalUpdatePostContent')
		.load($(this).attr('value'));
	});
});