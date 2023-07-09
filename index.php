<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div id="app">
        <div>
            <ul>
                <li v-for="(item, index) 
                in todoList" :key="index">{{ item.text }}</li>
            </ul>
        </div>
        <div>
            <input type="text" @keyup.enter= "updateList"
            v-model="todoItem">
            <button type="button" @click="updateList" id="button-add"
            >aggiungi</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>