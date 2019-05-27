import { load_to_select } from './helpers/form_helpers.js'

const default_value = field => document.getElementById(`paciente-${field}-default`) ? parseInt(document.getElementById(`paciente-${field}-default`).innerHTML) : undefined

window.onload = function() {
    partidos_load(default_value('partido')).then(
        _ => {
            document.getElementById('paciente-partido').addEventListener("change", localidades_load)
            document.getElementById('paciente-partido').addEventListener("change", region_sanitaria_set)
            localidades_load(null, default_value('localidad'))
        }
    )
    tipo_documento_load(default_value('tipo-documento'))
    obra_social_load(default_value('obra-social'))
}

const partidos_load = def => load_to_select('paciente-partido', 'https://inicio.proyecto2018.linti.unlp.edu.ar/partido', undefined, def)

function localidades_load (event, def) {
    document.getElementById('paciente-localidad').innerHTML = ""
    load_to_select('paciente-localidad', 'https://inicio.proyecto2018.linti.unlp.edu.ar/localidad', localidades => localidades.filter(localidad => localidad.id === document.getElementById('paciente-partido').selectedOptions[0].value), def)
}

const tipo_documento_load = def => load_to_select('paciente-tipo-documento', 'https://inicio.proyecto2018.linti.unlp.edu.ar/tipo-documento', undefined, def)

const obra_social_load = def => load_to_select('paciente-obra-social', 'https://inicio.proyecto2018.linti.unlp.edu.ar/obra-social', undefined, def)

const region_sanitaria_set = () => document.getElementById('paciente-region-sanitaria').value = document.getElementById('paciente-partido').selectedOptions[0].value
