var localhost = 'http://127.0.0.1:8000';

// Realiza la búsqueda de una CURP al backend mediante Ajax
import {search} from './export_search.js';

const mysearchp = document.querySelector("#search_participante");
const ul_add_lip = document.querySelector("#ul_result_participantes");
const myurlp = '/participantes/buscar';
const searchparticipante = new search(myurlp, mysearchp, ul_add_lip);

searchparticipante.InputSearch();
//----------------------------------------------------------

window.addEventListener("load", function(){    

    // Recarga el listado de aspirantes al cambiar el valor del select de los tipos de valoración.
    $('#select_valoracion_id').on('change', function() {
        let new_url = localhost + '/participantes/' + $('#select_proceso_id').val() + '/' + $('#select_ciclo').val() + '/list/' + $('#select_valoracion_id').val();
        
        $("#form_valoracion_id").attr('action', new_url);
        $('#form_valoracion_id').submit();
    });

});