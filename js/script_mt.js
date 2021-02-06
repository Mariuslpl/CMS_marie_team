
$('#get_port').click(function() {
    //$('#admin_data').html('<p>le fichier JS fonctionne</p>');
    //vide le contenu html des éléments concernés
    $('#add_button').html('');
    $('#admin_data').html('');
    get_port();
});

function get_port() {
    //contenu du ADD button
    button_string = '<button id="add_port" type="button" name="add_port" class="btn btn-success btn-xs">Ajouter un port</button>';
    //appel des ports
    $.ajax({
        url:'php_request/get_port.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#admin_data').html(data);
        },
        error:function() {
            console.log("erreur dans l'appel de get_port.php");
        }
    })
};

