import { load_to_select } from './helpers/API_loaders.js'

const default_value = field => document.getElementById(`consulta-${field}-default`) ? parseInt(document.getElementById(`consulta-${field}-default`).innerHTML) : undefined

window.onload = function() {
    derivacion_load(default_value('derivacion'))
}

const derivacion_load = def => load_to_select('consulta-derivacion', 'http://192.168.10.10/api/instituciones', undefined, def)
