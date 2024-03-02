<?php
	//Проверяем, заполнено ли обязательное поле с ID Инстанса
	if (!empty($_POST['idInstanceInput'])) {
		$idInstance = $_POST['idInstanceInput'];
	} else {
		echo "Введите ID Инстанса!";
	}

	//Проверяем, заполнено ли обязательное поле с API Токеном
	if (!empty($_POST['apiTokenInput'])) {
		$apiToken = $_POST['apiTokenInput'];
	} else {
		echo "Введите API Token";
	}

	//Формируем одну из составных частей URL, к которому будет отправлять запрос
	$url = "https://api.green-api.com/waInstance";

	//Функция запроса настроек инстанса
	function getSettings($url, $idInstance, $apiToken) {
		//Готовим опции для функции stream_context_create, реализацию данной функции подсмотрел в оф. документации
		$options = array(
	    	'http' => array(
	        	'header' => "Content-Type: application/json\r\n",
	        	'method' => 'GET'
	     		)
			);

		//Формируем конечный URL для данной функции
		$urlGetSettings = $url . $idInstance . "/getSettings/" . $apiToken;

		//Открываем поток и делаем запрос к API
	 	$context = stream_context_create($options);
	 	$response = file_get_contents($urlGetSettings, false, $context);

	 	//Красиво выводим полученный JSON в textarea индексной страницы
	 	echo json_encode(json_decode($response), JSON_PRETTY_PRINT);
	}

	//Функция запроса состояния инстанса
	function getStateInstance($url, $idInstance, $apiToken) {
		//Готовим опции для функции stream_context_create
		$options = array(
	    	'http' => array(
		        'header' => "Content-Type: application/json\r\n",
		        'method' => 'GET'
	     		)
			);

		//Формируем конечный URL для данной функции
		$urlGetStateInstance = $url . $idInstance . "/getStateInstance/" . $apiToken;

		//Открываем поток и делаем запрос к API
		$context = stream_context_create($options);
		$response = file_get_contents($urlGetStateInstance, false, $context);

		//Красиво выводим полученный JSON в textarea индексной страницы
		echo json_encode(json_decode($response), JSON_PRETTY_PRINT);
	}

	function sendMessage($url, $idInstance, $apiToken) {

		//Проверяем, заполнено ли поле с номером телефона
		if (!empty($_POST['userNumber'])) {
			//Regex'ом приводим введенный номер к формату 77XXXXXXXXX, убирая +7 и 8 вначале
			$userNumber = preg_replace('/^\+7|^8/', '7', $_POST['userNumber']);
		} else {
			echo "Укажите номер телефона!";
			die();
		}

		//Проверяем, заполнено ли поле с сообщением для пользователя
		if (!empty($_POST['userMessage'])) {
			$userMessage = $_POST['userMessage'];
		} else {
			echo "Сообщение не может быть пустым";
			die();
		}

		//Формируем конечный URL для данной функции
		$urlSendMessage = $url . $idInstance . "/sendMessage/" . $apiToken;

		//Формируем массив с номером телефона и сообщением, приводим к нужному формату, добавляя @c.us
		$data = array(
		    'chatId' => $userNumber . "@c.us",
		    'message' => $userMessage
		);

		//Готовим опции для функции stream_context_create
		//Декодируем массив $data в JSON
		$options = array(
			'http' => array(
				'header' => "Content-Type: application/json\r\n",
		        'method' => 'POST',
		        'content' => json_encode($data)
			)
		);

		//Открываем поток и делаем запрос к API
		$context = stream_context_create($options);
		$response = file_get_contents($urlSendMessage, false, $context);

		//Красиво выводим полученный JSON в textarea индексной страницы
		echo json_encode(json_decode($response), JSON_PRETTY_PRINT);
	}


	function sendFileByUrl($url, $idInstance, $apiToken) {

		//Проверяем, заполнено ли поле с номером телефона
		if (!empty($_POST['userNumber'])) {
			//Regex'ом приводим введенный номер к формату 77XXXXXXXXX, убирая +7 и 8 вначале
			$userNumber = preg_replace('/^\+7|^8/', '7', $_POST['userNumber']);
		} else {
			echo "Укажите номер телефона!";
			die();
		}

		//Проверяем, заполнено ли поле с URL картинки, которую будем отправлять
		if (!empty($_POST['pictureUrl'])) {
			$pictureUrl = $_POST['pictureUrl'];
		} else {
			echo "Укажите ссылку на изображение!";
			die();
		}

		//Формируем конечный URL для данной функции
		$urlSendFileByUrl = $url . $idInstance . "/sendFileByUrl/" . $apiToken;

		//Определяем расширение файла изображения (*.jpg, *.png и т.д.)
		$ext = pathinfo($pictureUrl, PATHINFO_EXTENSION);
		//Уникализируем имя файла, в дальнейшем будем отправлять его в запросе
		$filename = uniqid() . $ext;

		//Формируем массив с номером телефона, URL отправляемого изображения и его именем
		$data = array(
		    'chatId' => $userNumber . "@c.us",
		    'urlFile' => $pictureUrl,
		    'fileName'=> $filename
		);

		//Готовим опции для функции stream_context_create
		$options = array(
			'http' => array(
				'header' => "Content-Type: application/json\r\n",
		        'method' => 'POST',
		        'content' => json_encode($data)
			)
		);

		//Открываем поток и делаем запрос к API
		$context = stream_context_create($options);
		$response = file_get_contents($urlSendFileByUrl, false, $context);
		//Красиво выводим полученный JSON в textarea индексной страницы
		echo json_encode(json_decode($response), JSON_PRETTY_PRINT);
	}

	//Проверяем, какое название функции приходит через Ajax, в зависимости от названия - запускаем нужную функцию.
	if ($_POST['functionName'] == "getSettings") {
		getSettings($url, $idInstance, $apiToken);
	}

	if ($_POST['functionName'] == "getStateInstance") {
		getStateInstance($url, $idInstance, $apiToken);
	}

	if ($_POST['functionName'] == "sendMessage") {
		sendMessage($url, $idInstance, $apiToken);
	}

	if ($_POST['functionName'] == "sendFileByUrl") {
		sendFileByUrl($url, $idInstance, $apiToken);
	}
?>