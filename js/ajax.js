const formularios_ajax = document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e) {
    e.preventDefaulf();

    let enviar = confirm("quieres enviar el formulario");

    if (enviar == true) {
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let actios = this.getAttribute("action");

        let encabezadoe = new Headers();

        let config = {
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };
    }
}

formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit",enviar_formulario_ajax);

});