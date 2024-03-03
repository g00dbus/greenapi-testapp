//Ajax запрос настроек инстанса
$(document).ready(function() {
  $('#getSettings').click(function(e) {
    e.preventDefault();

    $.ajax({
      method: "POST",
      url: "./handler.php",
      dataType: "html",
      data: {
        'idInstanceInput': $('#idInstanceInput').val(),
        'apiTokenInput': $('#apiTokenInput').val(),
        'functionName': 'getSettings'
      },
      success: function(data) {
        console.log(data);
        $('#serverAnswer').val(data);
      },
      error: function(er) {
        console.log(er);
      }
    });
  })

//Ajax запрос состояния инстанса
  $('#getStateInstance').click(function(e) {
    e.preventDefault();

    $.ajax({
      method: "POST",
      url: "./handler.php",
      dataType: "html",
      data: {
        'idInstanceInput': $('#idInstanceInput').val(),
        'apiTokenInput': $('#apiTokenInput').val(),
        'functionName': 'getStateInstance'
      },
      success: function(data) {
        console.log(data);
        $('#serverAnswer').val(data);
      },
      error: function(er) {
        console.log(er);
      }
    });
  })

  //Ajax запрос отправки сообщения
  $('#sendMessage').click(function(e) {
    e.preventDefault();

    $.ajax({
      method: "POST",
      url: "./handler.php",
      dataType: "html",
      data: {
        'idInstanceInput': $('#idInstanceInput').val(),
        'apiTokenInput': $('#apiTokenInput').val(),
        'userNumber': $('#userNumSendMessageInput').val(),
        'userMessage': $('#helloWorldArea').val(),
        'functionName': 'sendMessage'
      },
      success: function(data) {
        console.log(data);
        $('#serverAnswer').val(data);
      },
      error: function(er) {
        console.log(er);
      }
    });
  })

  //Ajax запрос отправки файла
  $('#sendFileByUrl').click(function(e) {
    e.preventDefault();

    $.ajax({
      method: "POST",
      url: "./handler.php",
      dataType: "html",
      data: {
        'idInstanceInput': $('#idInstanceInput').val(),
        'apiTokenInput': $('#apiTokenInput').val(),
        'userNumber': $('#userNumSendFileInput').val(),
        'pictureUrl': $('#pictureUrlInput').val(),
        'functionName': 'sendFileByUrl'
      },
      success: function(data) {
        console.log(data);
        $('#serverAnswer').val(data);
      },
      error: function(er) {
        console.log(er);
      }
    });
  })


});