export const load_to_select = (select_id, api_route, apply_to_result = x => x, default_id = 0) => 
fetch(api_route).then(
    response => response.json().then(
        function (results) {
            add_options(document.getElementById(select_id), apply_to_result(results), default_id)
        }
    )
)

export const add_options = (select, options, default_id) => options.forEach(
    option => add_option(select, option.nombre, option.id, default_id)
)

export function add_option (select, text, value, default_id) {
    let option = document.createElement("option")
    option.text = text
    option.value = value
    option.selected = option.value == default_id ? true : false
    select.appendChild(option)
}