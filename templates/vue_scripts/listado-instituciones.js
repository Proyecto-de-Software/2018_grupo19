var app = new Vue({
    el: '#general',
    data: {
        instituciones: [],
        partidos: [],
        selected: 0,
        regSanitariaid: -1,
        regSanitaria: "Todas"
    },
    created() {
        fetch('http://localhost/api/instituciones')
        .then(response => response.json())
        .then(json =>{
        this.instituciones = json
        })
        fetch('https://api-referencias.proyecto2018.linti.unlp.edu.ar/partido')
        .then(response => response.json())
        .then(json =>{
        this.partidos = json
        })
    },
    methods: {
        actualizar: function(){
            this.instituciones = [];
            if(this.selected == 0){
                this.regSanitaria = "Todas"
                this.regSanitariaid = -1
                fetch('http://localhost/api/instituciones')
                .then(response => response.json())
                .then(json =>{
                this.instituciones = json})
            } else {
            this.regSanitariaid = this.partidos[this.selected-1].region_sanitaria_id
            url = "https://api-referencias.proyecto2018.linti.unlp.edu.ar/region-sanitaria/" + this.regSanitariaid
            fetch(url)
                .then(response => response.json())
                .then(json =>{
                this.regSanitaria = json.nombre})
            url = "http://localhost/api/instituciones/region-sanitaria/" + this.regSanitariaid
            fetch(url)
                .then(response => response.json())
                .then(json =>{
                this.instituciones = json})
            }
        }
    }
})