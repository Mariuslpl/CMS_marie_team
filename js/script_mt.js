//******************************** PORT début ********************/
//*******************************  LOAD PORT
// clique boutton PORT 
$('#get_all_port').click(function() {
    //vide le contenu html des éléments concernés
    $('#add_button').html('');
    $('#table_data').html('');
    //appel le chargement des ports
    get_all_port();
});

function get_all_port() {
    //ADD button
    button_string = '<button id="add_port" type="button" name="add_port" class="btn btn-success btn-xs">Ajouter un port</button>';
    //appel au fichier PHP
    $.ajax({
        url:'php_request/get_all_port.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
        error:function() {
            console.log("erreur dans l'appel de get_all_port.php");
        }
    })
};

//******************************** ADD PORT
// clique boutton id=add_port
$(document).on('click', '#add_port', function() {
    $('.modal-title').html('Ajouter un port');
    //remise à blanc du formulaire
    $('#modale_port_contenu')[0].reset();
    //passe l'action php // input id=request_php_port
    $('#request_php_port').val("add_port");
    //ajouter la visibilité du boutton id=btn_add_port
    $('#btn_add_port').attr('hidden', false);
    //ajouter la visibilité du boutton id=btn_update_port
    $('#btn_update_port').attr('hidden', true);
    $('#modale_port').modal();
});

// validation du formulaire // button id=form_add_port
$(document).on('click', '#btn_add_port', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_port_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_port').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_port').attr('hidden', true);
            $('#message_bdd_port').modal();
            get_all_port();
        }
    });
});

//******************************** UPDATE PORT
// clique boutton class=edit_port
$(document).on('click', '.edit_port', function() {
    //récupére la valeur de la prop id du boutton Modifier
    var id = $(this).attr('id');
    var action = 'get_one_port';
    console.log(id);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, action_php:action},
        dataType:'json',
        //callback qui permet d'alimenter le champ
        success:function(data) {
            //remise à blanc du formulaire
            $('#modale_port_contenu')[0].reset();

            $('.modal-title').html('Modifier un port');
            //passage de la valeur dans l'input
            $('#nom_port').val(data.nom_port);

            //passe l'action php // input id=request_php_port
            $('#request_php_port').val("update_port");
            //ajouter la visibilité du boutton id=btn_add_port
            $('#btn_add_port').attr('hidden', true);
            //ajouter la visibilité du boutton id=btn_update_port
            $('#btn_update_port').attr('hidden', false);
            //ajout de l'hidden id
            $('#hidden_id_port').val(id);
            $('#modale_port').modal();
        }
    });
});

// validation du formulaire // button id=btn_update_port
$(document).on('click', '#btn_update_port', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_port_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_port').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_port').attr('hidden', true);
            $('#message_bdd_port').modal();
            get_all_port();
        }
    });
});

//******************************** DELETE PORT
// clique boutton class=delete_port
$(document).on('click', '.delete_port', function() {
    //récupére la valeur de la prop id du boutton Supprimer
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression du PORT ?</p>"

    $('#message_modale_port').html(message);
    //boutton de confirmation de suppression ==> visible 
    $('#btn_conf_port').attr('hidden', false);
    $('#message_bdd_port').modal();

    $('#btn_delete_port').click(function() {
        var action = 'delete_port';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_port();
            }
        });
    });
});

//******************************** PORT fin ********************/


//******************************** SECTEUR début ********************/
//*******************************  LOAD SECTEUR
// clique boutton SECTEUR 
$('#get_all_secteur').click(function() {
    //vide le contenu html des éléments concernés
    $('#add_button').html('');
    $('#table_data').html('');
    //appel le chargement des secteurs
    get_all_secteur();
});

function get_all_secteur() {
    //ADD button
    button_string = '<button id="add_secteur" type="button" name="add_secteur" class="btn btn-success btn-xs">Ajouter un secteur </button>';
    //appel au fichier PHP
    $.ajax({
        url:'php_request/get_all_secteur.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
        error:function() {
            console.log("erreur dans l'appel de get_all_secteur.php");
        }
    })
};

//******************************** ADD SECTEUR 
// clique boutton id=add_secteur
$(document).on('click', '#add_secteur', function() {
    $('.modal-title').html('Ajouter un secteur');
    //remise à blanc du formulaire
    $('#modale_secteur_contenu')[0].reset();
    //passe l'action php // input id=request_php_secteur
    $('#request_php_secteur').val("add_secteur");
    //ajouter la visibilité du boutton id=btn_add_secteur
    $('#btn_add_secteur').attr('hidden', false);
    //ajouter la visibilité du boutton id=btn_update_secteur
    $('#btn_update_secteur').attr('hidden', true);
    $('#modale_secteur').modal();
});

// validation du formulaire // button id=form_add_secteur
$(document).on('click', '#btn_add_secteur', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_secteur_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_secteur').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_secteur').attr('hidden', true);
            $('#message_bdd_secteur').modal();
            get_all_secteur();
        },
        error:function() {
            console.log("erreur dans l'appel de main_request.php");
        }
    });
});

//******************************** UPDATE SECTEUR
// clique boutton class=edit_secteur
$(document).on('click', '.edit_secteur', function() {
    //récupére la valeur de la prop id du boutton Modifier
    var id = $(this).attr('id');
    var action = 'get_one_secteur';
    console.log(id);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, action_php:action},
        dataType:'json',
        //callback qui permet d'alimenter le champ
        success:function(data) {
            //remise à blanc du formulaire
            $('#modale_secteur_contenu')[0].reset();

            $('.modal-title').html('Modifier un secteur');
            //passage de la valeur dans l'input
            $('#nom_secteur').val(data.nom_secteur);

            //passe l'action php // input id=request_php_secteur
            $('#request_php_secteur').val("update_secteur");
            //ajouter la visibilité du boutton id=btn_add_secteur
            $('#btn_add_secteur').attr('hidden', true);
            //ajouter la visibilité du boutton id=btn_update_secteur
            $('#btn_update_secteur').attr('hidden', false);
            //ajout de l'hidden id
            $('#hidden_id_secteur').val(id);
            $('#modale_secteur').modal();
        }
    });
});

// validation du formulaire // button id=btn_update_secteur
$(document).on('click', '#btn_update_secteur', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_secteur_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_secteur').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_secteur').attr('hidden', true);
            $('#message_bdd_secteur').modal();
            get_all_secteur();
        }
    });
});

//******************************** DELETE SECTEUR
// clique boutton class=delete_secteur
$(document).on('click', '.delete_secteur', function() {
    //récupére la valeur de la prop id du boutton Supprimer
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression du SECTEUR ?</p>"

    $('#message_modale_secteur').html(message);
    //boutton de confirmation de suppression ==> visible 
    $('#btn_conf_secteur').attr('hidden', false);
    $('#message_bdd_secteur').modal();

    $('#btn_delete_secteur').click(function() {
        var action = 'delete_secteur';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_secteur();
            }
        });
    });
});

//******************************** SECTEUR fin ********************/