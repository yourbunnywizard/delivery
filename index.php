<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Document</title>
	<link rel="stylesheet" href="app/views/styles/general.css">	
	<link rel="stylesheet" href="app/views/styles/page-view.css">
	<link rel="stylesheet" href="app/views/styles/neon-style.css">

	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

	<!--<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>-->

	<script src="https://kit.fontawesome.com/9ea1653bd2.js" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<script src="app/views/scripts/script.js"></script>

</head>
<body>

	<p class="cursorPos"></p>

	<section class="map-container" id="#map-container">
		<div class="map-box">
			<div class="map">
				<div class="imgMap">
					<canvas id="myCanvas" width="500px" height="500px"></canvas>
					<button class="city main" id="city1"><span>Київ</span></button>
						<button class="city" id="city26">Іванків</button>
						<button class="city" id="city27">Чорнобиль</button>
						<button class="city" id="city28">Біла Церків</button>
						<button class="city" id="city29">Миронівка</button>

					<button class="city main" id="city2"><span>Харків</span></button>
						<button class="city" id="city30">Ізюм</button>
						<button class="city" id="city31">Лозова</button>
						<button class="city" id="city32">Красноград</button>

					<button class="city main" id="city3"><span>Полтава</span></button>
						<button class="city" id="city33">Кременчук</button>
						<button class="city" id="city34">Чутове</button>
						<button class="city" id="city35">Лубни</button>

					<button class="city main" id="city4"><span>Кропивницький</span></button>
						<button class="city" id="city36">Олександрія</button>
						<button class="city" id="city37">Новоархангельськ</button>
						<button class="city" id="city38">Олександівка</button>

					<button class="city main" id="city5"><span>Чернігів</span></button>
						<button class="city" id="city39">Козелець</button>
						<button class="city" id="city40">Ніжин</button>
						<button class="city" id="city41">Прилуки</button>
						<button class="city" id="city42">Батурин</button>

					<button class="city main" id="city6"><span>Суми</span></button>
						<button class="city" id="city43">Конотоп</button>
						<button class="city" id="city44">Ромни</button>
						<button class="city" id="city45">Охтирка</button>
						
					<button class="city main" id="city7"><span>Черкаси</span></button>
						<button class="city" id="city46">Умань</button>
						<button class="city" id="city47">Жашків</button>
						<button class="city" id="city48">Канів</button>
						<button class="city" id="city49">Драбів</button>

					<button class="city main" id="city8"><span>Дніпро</span></button>
						<button class="city" id="city50">Кривий ріг</button>
						<button class="city" id="city51">Павлоград</button>
						<button class="city" id="city52">Покровське</button>

					<button class="city main" id="city9"><span>Луганськ</span></button>
						<button class="city" id="city53">Алчевськ</button>
						<button class="city" id="city54">Сєвєродонецьк</button>

					<button class="city main" id="city10"><span>Донецьк</span></button>
						<button class="city" id="city55">Маріуполь</button>
						<button class="city" id="city56">Чистякове</button>
						<button class="city" id="city57">Краматорськ</button>
						<button class="city" id="city58">Бахмут</button>
						<button class="city" id="city59">Покровськ</button>
						<button class="city" id="city60">Єнакієве</button>

					<button class="city main" id="city11"><span>Запоріжжя</span></button>
						<button class="city" id="city61">Мелітополь</button>
						<button class="city" id="city62">Бердянськ</button>
						<button class="city" id="city63">Пологи</button>


					<button class="city main" id="city12"><span>Херсон</span></button>
						<button class="city" id="city64">Новая Каховка</button>
					
					<button class="city main" id="city13"><span>Миколаїв</span></button>
						<button class="city" id="city65">Первомайск</button>
						<button class="city" id="city66">Нов.Буг</button>

					<button class="city main" id="city14"><span>Одеса</span></button>
						<button class="city" id="city67">Измаил</button>
						<button class="city" id="city68">Любашевка</button>

					<button class="city main" id="city15"><span>Вінниця</span></button>
						<button class="city" id="city69">Могилів<br>-<br>Подільский</button>
						<button class="city" id="city70">Гайсин</button>

					<button class="city main" id="city16"><span>Хмельницький</span></button>
						<button class="city" id="city71">Кам'янець<br>-<br>Подільский</button>
						<button class="city" id="city72">Волочиськ</button>
						<button class="city" id="city73">Шепетівка</button>

					<button class="city main" id="city17"><span>Житомир</span></button>
						<button class="city" id="city74">Бердичев</button>
						<button class="city" id="city75">Новоград<br>-<br>Волинський</button>
						<button class="city" id="city76">Коростень</button>

					<button class="city main" id="city18"><span>Рівне</span></button>
						<button class="city" id="city77">Дубно</button>
						<button class="city" id="city78">Сарни</button>

					<button class="city main" id="city19"><span>Луцьк</span></button>
						<button class="city" id="city79">Ковель</button>
						<button class="city" id="city80">Ратне</button>
						<button class="city" id="city81">Горохів</button>

					<button class="city main" id="city20"><span>Львів</span></button>
						<button class="city" id="city82">Червоноград</button>
						<button class="city" id="city83">Стрий</button>

					<button class="city main" id="city21"><span>Тернопіль</span></button>
						<button class="city" id="city84">Кременець</button>
						<button class="city" id="city85">Бережани</button>
						<button class="city" id="city86">Чортків</button>

					<button class="city main" id="city22"><span>Чернівці</span></button>
						<button class="city" id="city87">Заліщики</button>
						<button class="city" id="city88">Кельменці</button>
						<button class="city" id="city89">Вижниця</button>

					<button class="city main" id="city23"><span>Івано-Франківськ</span></button>
						<button class="city" id="city90">Рогатин</button>
						<button class="city" id="city91">Долина</button>
						<button class="city" id="city92">Коломия</button>

					<button class="city main" id="city24"><span>Ужгород</span></button>
						<button class="city" id="city93">Мукачево</button>						

					<button class="city main" id="city25"><span>Сімферополь</span></button>	
						<button class="city" id="city94">Севастополь</button>
						<button class="city" id="city95">Феодосія</button>


				</div>
				<!--<img src="app/views/images/map.png" alt="ukrMap.png">	-->			
			</div>

			<div class="button-bar">
				<button class="sizeButton" id="size-plus">+</button>
				<button class="sizeButton" id="size-minus">-</button>
			</div>	

			<div class="map-navigation">
				<div class="track-box">					
				</div>
			</div>
		</div>
		
	</section>


	<section class="roadTrace">
		<form action="">
			<div class="roads">
				<label for='checbox1'>
					<span>Выбирите начальный город</span>
					<div class="neonInput">
						<input type="text">
						<span></span>
					</div>
				</label>
			</div>
			
			<label class="addButton" id="addButton">
				<button class="addInput">+</button>
				<span>Добавить город в маршрут</span>
			</label>
			<label>
				<span>Выбирите город назначения</span>
				<div class="neonInput" id="lastNodeBox">
					<input type="text">
					<span></span>
				</div>				
			</label>
			
			<a class="neonBtn btnBlue searchRoad" id="searchRoad">Построить маршрут
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</a>	

		</form>
	</section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>