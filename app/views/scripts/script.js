$(document).ready(function () {	
	
	var $matrix = [];
	$.ajax({
		type: 'POST',
		url: 'app/models/matrix_adjacency.php',
		data: {message: 'matrixA'},
		success: function(data) {
			$matrix = JSON.parse(data);
			drawRoads();			
		}
	});

	$imgMap = $('.map > .imgMap');
	var imgHeight = $imgMap.outerHeight();
	var imgWidth = $imgMap.outerWidth();

	$('#myCanvas').attr('width', imgWidth + 'px');
	$('#myCanvas').attr('height', imgHeight + 'px');

	var canvas = document.getElementById("myCanvas");		
	var context = canvas.getContext('2d');
	
	var arr_btnWidth = [];
	var arr_btnHeight = [];

	var tmpWidth = 50 / imgWidth;
	var tmpHeight = 50 / imgHeight;

	for ($i = 0; $i < $('button.city').length; $i++)
	{
		arr_btnWidth[$i] = Math.ceil(tmpHeight * $('.imgMap > button#city' + ($i + 1)).offset().left);
		arr_btnHeight[$i] = Math.ceil(tmpHeight * $('.imgMap > button#city' + ($i + 1)).offset().top);
	}



	$('button#size-plus').click( function (){
		if ( $imgMap.outerHeight() < (imgHeight + 600) ) {
			$imgMap.css('height', '+=50px');
			$imgMap.css('width', '+=50px');
			
			for ($i = 0; $i < $('button.city').length; $i++)
			{
				$('.imgMap > button#city' + ($i + 1)).css('top', '+=' + arr_btnHeight[$i] +'px');
				$('.imgMap > button#city' + ($i + 1)).css('left', '+=' + arr_btnWidth[$i] +'px');
			}


			drawRoads();

		}	else {
				alert('Больше увеличивать нельзя');
			}		
	});

	$('button#size-minus').click( function (){		
		if( $imgMap.outerHeight() > imgHeight) {
			$imgMap.css('height', '-=50px');
			$imgMap.css('width', '-=50px');

			for ($i = 0; $i < $('button.city').length; $i++)
			{
				$('.imgMap > button#city' + ($i + 1)).css('top', '-=' + arr_btnHeight[$i] +'px');
				$('.imgMap > button#city' + ($i + 1)).css('left', '-=' + arr_btnWidth[$i] +'px');
			}

			drawRoads();

		}	else {
				alert('Больше нельзя уменьшать');
			}			
	});

	var positionX = 0;
	var positionY = 0;
	var clicking = false;

	$('.map-box > .map').on('mousedown', function( event ) {
		positionX = event.pageX;
		positionY = event.pageY;
		clicking = true;
		
	});

	$('.map-box > .map').on('mousemove', function( event ) {	
		if (clicking == false) return;
		$(this).scrollLeft( $(this).scrollLeft() + (positionX - event.pageX) );		
		$(this).scrollTop( $(this).scrollTop() + (positionY - event.pageY) );	
		positionY = event.pageY;
		positionX = event.pageX;
	});

	$('.map-box > .map').on('mouseup', function( event ) { 				
		clicking = false;
	});	

	function drawRoad ($nodeArr) {

		var ob1X = 0;	var ob2X = 0;
		var ob1Y = 0;	var ob2Y = 0;	
		var scrollT = $('.map-box > .map').scrollTop();
		var scrollL = $('.map-box > .map').scrollLeft();

		canvas.width = canvas.width;

		$('#myCanvas').attr('width', $imgMap.outerWidth() + 'px');
		$('#myCanvas').attr('height', $imgMap.outerHeight() + 'px');

		for ($i = 0; $i < $matrix.length; $i++) { 

			for($j = 0; $j < $matrix[$i].length - 1; $j++)
			{
				$buttonObj1 = $( '.map > .imgMap > button#city' + ($nodeArr[$i][$j] + 1) ).offset();
				ob1X = $buttonObj1.left + scrollL;
				ob1Y = $buttonObj1.top + scrollT;

				$buttonObj2 = $('.map > .imgMap > button#city' + ($nodeArr[$i][$j + 1] + 1) ).offset();

				ob2X = $buttonObj2.left + scrollL;
				ob2Y = $buttonObj2.top + scrollT;

				context.beginPath();
				context.moveTo(ob1X, ob1Y);
				context.lineTo(ob2X, ob2Y);
				context.lineWidth = 3;
				context.strokeStyle = "#880000";
				context.lineCap = "round";
				context.stroke();
				context.closePath();
			}

		}
	}

	function drawRoads () {
		var ob1X = 0;	var ob2X = 0;
		var ob1Y = 0;	var ob2Y = 0;	
		var scrollT = $('.map-box > .map').scrollTop();
		var scrollL = $('.map-box > .map').scrollLeft();	
		
		canvas.width = canvas.width;

		$('#myCanvas').attr('width', $imgMap.outerWidth() + 'px');
		$('#myCanvas').attr('height', $imgMap.outerHeight() + 'px');

		

		for ($i = 0; $i < $matrix.length; $i++) {
			$buttonObj1 = $( '.map > .imgMap > button#city' + ($i + 1) ).offset();

			ob1X = $buttonObj1.left + scrollL;
			ob1Y = $buttonObj1.top + scrollT;
			console.log('elm#' + ($i + 1) + ' left = ' + ob1X + ' top = ' + ob1Y);

			for($j = 0; $j < $matrix[$i].length; $j++) {
				
				if($matrix[$i][$j] > ($i + 1)) {
					console.log('elm[' + ($i + 1) + '][' + ($j + 1) + '] ' + ' = ' + $matrix[$i][$j]);
					$buttonObj2 = $('.map > .imgMap > button#city' + ($matrix[$i][$j]) ).offset();

					ob2X = $buttonObj2.left + scrollL;
					ob2Y = $buttonObj2.top + scrollT;

					context.beginPath();
					context.moveTo(ob1X, ob1Y);
					context.lineTo(ob2X, ob2Y);
					context.lineWidth = 1;
					context.strokeStyle = "#000";
					context.lineCap = "round";
					context.stroke();
					context.closePath();
				} 					
			}			
		}
	}

	/*$(document).on('mousemove', function(event) {
		$('p.cursorPos').text('top = ' + event.pageY + ' left = ' + event.pageX + ' scroll = ' + $(this).scrollTop() );
	});*/


$dataArray = [];
	$('button.city').click(function() {
		$id = $(this).attr('id');		

		for($i = 0; $i < $('.roadTrace form .roads label').length; $i++) {
			if ($('.roadTrace form .roads label:eq(' + $i + ') .neonInput input').val() == '') {

				$('.roadTrace form .roads label:eq(' + $i + ') .neonInput input').val($(this).text());
				$('.roadTrace form .roads label:eq(' + $i + ') .neonInput span').text(parseInt($id.match(/\d+/)));
				$dataArray[$i] = parseInt($id.match(/\d+/));
					break;		

			}	else {
					$('#lastNodeBox input').val($(this).text());
					$('#lastNodeBox span').text(parseInt($id.match(/\d+/)));
					$dataArray[$('.roadTrace form .roads label').length] = parseInt($id.match(/\d+/));
				}
		}

	});
	

	$('#addButton').click(function (e) {
		e.preventDefault();
		$('.roadTrace > form > .roads').append('<label><span>Выбирите промежуточный город</span><div class="neonInput"><input type="text"><span></span></div></label>');
	});

	$('#searchRoad').click(function (e) {
		e.preventDefault();	
		
		$.ajax({
			type: 'POST',
			url: 'app/models/dijkstra.php',
			data: {nodeArray: $dataArray },
			success: function(data) {				
				$matrix = JSON.parse(data);
				$rez = '';
				for($i = 0; $i < $matrix.length; $i++) {
					$rez += $('#city' + ($matrix[$i] + 1)).text() + ' ';
				}
				drawRoad($matrix);

				$.ajax({
					type: 'POST',
					url: 'app/models/trackInfo.php',
					data: {trackArray: $matrix },
					success: function(data) {
						$track = JSON.parse(data);
						var totalDistance = 0;

						$('.track-box').html('');						
						$('.track-box').append( 'Оптимальный маршрут: ' + $( '#city' + ($matrix[0][0] + 1) ).text() );	

						for (var i = 0; i < $track.length; i++) {
							for (var j = 0; j < $track[i].length; j++) {
								$('.track-box').append(
									'<span class="distance">-( ' + $track[i][j] + 'km )-</span>' + $( '#city' + ($matrix[i][j + 1] + 1) ).text()
									);
								totalDistance += $track[i][j];
							}
						}

						$('.track-box').append( '<br>Общая длинна маршрута: <span class="distance">' + totalDistance + 'km </span>' );	
						$('.track-box').append( '<br>Примерный расход бензина: <span class="distance">' + (18 * totalDistance / 100) + 'л </span>' );	
						var h = parseInt(totalDistance / 75);
						var m = parseInt( (totalDistance / 75 - h) * 100 );
						$('.track-box').append( ' Примерное время в пути: <span class="distance">' + h + 'ч. ' + m + 'мин.</span>' );				
					}
				});


			}
		});


	});

	
});