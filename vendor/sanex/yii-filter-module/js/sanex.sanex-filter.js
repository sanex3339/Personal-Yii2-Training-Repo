$(document).ready(function() {
	var filter = {};

	getCheckStateByUrlParams(); //get checkbox state from GET

	$('.fltr-wrapper .fltr-check').click(function() {
		createUrl($(this));
		createFilter();
	});

    function getCheckStateByUrlParams() {
    	//get GET params array from url
    	var urlParams;
		(window.onpopstate = function () {
		    var match,
		        pl     = /\+/g,
		        search = /([^&=]+)=?([^&]*)/g,
		        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
		        query  = decodeURIComponent(window.location.search.substring(1));

		    urlParams = {};
		    while (match = search.exec(query)) {
		    	if (urlParams[decode(match[1])]) {
		    		urlParams[decode(match[1])] += ','+decode(match[2]);
		    	} else {
		    		urlParams[decode(match[1])] = decode(match[2]);
		    	}
		    }   
		})();
		
		delete urlParams['filter']; //delete "filter" GET param

		//ищем все параметры, их значения
		//для каждого значения ищем соответствующий ему чекбокс, присваиваем ему класс 'check'
		for (params in urlParams) {
			var category = params.split('[', 1);
			var properties = urlParams[params];
			var element = $('.fltr-wrapper .fltr-cat#'+category);
			
			element.find('.fltr-check[value="'+properties+'"]').addClass('active');
		}
    }

    function createUrl(elem) {
    	var category = elem.parent().attr('id');
		var url;
		if (!elem.hasClass('active')) {
			url = $.query.SET('filter', '1').SET(category+'[]', elem.attr('value')).toString();
			elem.addClass('active');
		} else {
			url = $.query.REMOVE(category, elem.attr('value'));
			elem.removeClass('active');
		}
		window.history.pushState('', '', url);
    }

	function createFilter() {
		//create json array with filter
		$('.fltr-wrapper .fltr-cat').each(function() {
			var array = [];
			var category = $(this).attr('id');
			
			//Ищем все элементы внутри категории
			$(this).find('.fltr-check.active').each(function(index) {
				array[index] = $(this).attr('value'); //По каждому найденому элементу добавляем его значение в массив
			});

			var property = array.join(); //Делаем из полученного массива строку

			//Делаем новый объект, с ключом - имя категории, значение - другой элемент... 
			//...с ключом properties, значение - сформированная строка
			if (property.length > 0) {
				filter[category] = {
					properties: property
				};
			} else {
				delete filter[category]; //Удаляем все пустые элементы из объекта
			}
		});

		var json = JSON.stringify(filter);
		sendFilter(json);
	}

	function sendFilter(filter) {
		$.ajax({
	       url: '/show-data-ajax/',
	       type: 'POST',
	       data: {
	       		_csrf: yii.getCsrfToken(),
	       		filter: filter		
	       },
           dataType: 'html',
	       success: function(data) {
	       	   $('.fltr-data-wrapper').children().remove();
	           $('.fltr-data-wrapper').html(data);
	       }
	    });
	}
});
