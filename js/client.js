let text = document.getElementById('text');
let but = document.getElementById('button');
let content = document.getElementById('content');
let ws = new WebSocket("ws://localhost:8000");
but.onclick = function () {
        //Отправляем сообщение на сервер
        ws.send(text.value);
        text.value = '';
};

ws.onclose = function(event) {
    if (event.wasClean) {
        console.log(`[close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
    } else {
        console.log("Disconnect");
    }
};
//Получаем ответ от сервера
ws.onmessage = response => {
    //Создаем элемент
    let newElement = document.createElement('p');
    //Добавляем в новый элемент текст
    newElement.append(response.data);
    //Добавляем новый элемент на страницу
    content.append(newElement);
}

ws.onerror = function(error) {
    console.log('error');
};