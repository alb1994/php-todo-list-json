const { createApp } = Vue;

createApp({
    data() {
        return {
            todoItem: '', // Variabile per memorizzare il nuovo elemento da aggiungere
            todoList: null, // Variabile per memorizzare la lista delle attività
            apiUrl: 'server.php' // URL dell'API per recuperare e aggiornare la lista
        }
    },
    mounted() {
        // Funzione eseguita dopo il caricamento dell'applicazione
        axios.get(this.apiUrl).then((response) => {
            console.log(response.data);
            this.todoList = response.data; // Assegna la lista delle attività alla variabile todoList
        });
    },
    methods: {
        updateList() {
            // Funzione per aggiornare la lista delle attività
            const data = {
                todoItem: this.todoItem // Oggetto contenente il nuovo elemento
            };

            axios.post(this.apiUrl, data, {
                headers: {
                    'Content-type': 'multipart/form-data' // Imposta l'header per la richiesta POST
                }
            }).then((response) => {
                this.todoItem = ''; // Resetta il campo dell'input
                this.todoList = response.data; // Aggiorna la lista delle attività con la risposta dal server
            });
        }
    },
}).mount('#app');