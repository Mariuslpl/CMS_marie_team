//*************************************************************************************
//******************************** PORT début ********************/
//*************************************************************************************
//*******************************  LOAD PORT
//*************************************************************************************
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
//*************************************************************************************
//******************************** ADD PORT
//*************************************************************************************
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
//*************************************************************************************
//******************************** UPDATE PORT
//*************************************************************************************
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
//*************************************************************************************
//******************************** DELETE PORT
//*************************************************************************************
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
//*************************************************************************************
//******************************** PORT fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** SECTEUR début ********************/
//*************************************************************************************
//*******************************  LOAD SECTEUR
//*************************************************************************************
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
//*************************************************************************************
//******************************** ADD SECTEUR 
//*************************************************************************************
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
//*************************************************************************************
//******************************** UPDATE SECTEUR
//*************************************************************************************
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
//*************************************************************************************
//******************************** DELETE SECTEUR
//*************************************************************************************
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
//*************************************************************************************
//******************************** SECTEUR fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** LIAISON début ********************/
//*************************************************************************************
//*******************************  LIAISON DROPDOWN
//*************************************************************************************
function logIdPort($id) {
    console.log("l'id du port séléctionné est :" + $id);
};

function logIdPortDep($id) {
    console.log("l'id du port de départ est :" + $id);
};

function logIdPortArr($id) {
    console.log("l'id du port d'arrivée est :" + $id);
};

function logIdSectCon($id) {
    console.log("l'id du secteur séléctionné est :" + $id);
};
//*************************************************************************************
//*******************************  LOAD LIAISON
//*************************************************************************************
// clique boutton LIAISON 
$('#get_all_liaison').click(function() {
    //vide le contenu html des éléments concernés
    $('#add_button').html('');
    $('#table_data').html('');
    //appel le chargement des secteurs
    get_all_liaison();
});
function get_all_liaison() {
    //ADD button
    button_string = '<button id="add_liaison" type="button" name="add_liaison" class="btn btn-success btn-xs">Ajouter une liaison </button>';
    //appel au fichier PHP
    $.ajax({
        url:'php_request/get_all_liaison.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
        error:function() {
            console.log("erreur dans l'appel de get_all_liaison.php");
        }
    })
};
//*************************************************************************************
//******************************** ADD LIAISON
//*************************************************************************************
// clique boutton id=add_liaison
$(document).on('click', '#add_liaison', function() {
    
    var action = 'drop_add_liaison';
    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{action_php: action},
        success:function(data) {
            $('#drop_add_liaison').html(data);

            $('.modal-title').html('Ajouter une liaison');
            //remise à blanc du formulaire ==> suffis pour tout les champ du modal body
            $('#modale_liaison_contenu')[0].reset();
            //passe l'action php // input id=request_php_liaison
            $('#request_php_liaison').val("add_liaison");
            //ajouter la visibilité du boutton id=btn_add_liaison
            $('#btn_add_liaison').attr('hidden', false);
            //ajouter la visibilité du boutton id=btn_update_liaison
            $('#btn_update_liaison').attr('hidden', true);
            $('#modale_liaison').modal();
        }
    });
});
// validation du formulaire // button id=form_add_liaison
$(document).on('click', '#btn_add_liaison', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_liaison_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_liaison').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_liaison').attr('hidden', true);
            $('#message_bdd_liaison').modal();
            get_all_liaison();
        },
        error:function() {
            console.log("erreur dans l'appel de main_request.php");
        }
    }); 
});
//*************************************************************************************
//******************************** UPDATE LIAISON
//*************************************************************************************
// clique boutton class=edit_liaison
$(document).on('click', '.edit_liaison', function() {

    //récupére la valeur de la prop id (code_liaison) du boutton Modifier // Et distance 
    var id = $(this).attr('id');
    var distance = $(this).attr('distance');
    var action = 'get_one_liaison';
    console.log(id);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, action_php:action},
        //callback qui permet d'alimenter le champ
        success:function(data) {
            //remise à blanc du formulaire
            $('#modale_liaison_contenu')[0].reset();

            $('.modal-title').html('Modifier une liaison');
            //passage de la valeur dans l'input
            $('#drop_add_liaison').html(data);
            $('#code_liaison').val(id);
            $('#distance').val(distance);

            //passe l'action php // input id=request_php_liaison
            $('#request_php_liaison').val("update_liaison");
            //ajouter la visibilité du boutton id=btn_add_liaison
            $('#btn_add_liaison').attr('hidden', true);
            //ajouter la visibilité du boutton id=btn_update_liaison
            $('#btn_update_liaison').attr('hidden', false);
            //ajout de l'hidden id
            $('#hidden_id_liaison').val(id);
            $('#modale_liaison').modal();
        }
    });
});
// validation du formulaire // button id=btn_update_liaison
$(document).on('click', '#btn_update_liaison', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_liaison_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_liaison').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_liaison').attr('hidden', true);
            $('#message_bdd_liaison').modal();
            get_all_liaison();
        }
    });
});
//*************************************************************************************
//******************************** DELETE LIAISON
//*************************************************************************************
// clique boutton class=delete_liaison
$(document).on('click', '.delete_liaison', function() {
    //récupére la valeur de la prop id du boutton Supprimer
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression de cette LIAISON ?</p>"

    $('#message_modale_liaison').html(message);
    //boutton de confirmation de suppression ==> visible 
    $('#btn_conf_liaison').attr('hidden', false);
    $('#message_bdd_liaison').modal();

    $('#btn_delete_liaison').click(function() {
        var action = 'delete_liaison';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_liaison();
            }
        });
    });
});
//*************************************************************************************
//******************************** LIAISON fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** TRAVERSEE début ********************/
//*************************************************************************************
//*******************************  TRAVERSEE DROPDOWN
//*************************************************************************************
function logIdCodLia($id) {
    console.log("l'id du code liaison séléctioné est :" + $id);
};

function logIdBatEff($id) {
    console.log("l'id du bateau séléctionné est :" + $id);
};
//*************************************************************************************
//*******************************  LOAD TRAVERSEE
//*************************************************************************************
$('#get_all_traversee').click(function() {
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_traversee();
});
function get_all_traversee() {
    button_string = '<button id="add_traversee" type="button" name="add_traversee" class="btn btn-success btn-xs">Ajouter une traversée</button>';

    $.ajax({
        url:'php_request/get_all_traversee.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
    });
};
//*************************************************************************************
//******************************** ADD TRAVERSEE
//*************************************************************************************
$(document).on('click', '#add_traversee', function() {
    var action = 'drop_add_traversee';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{action_php: action},
        success:function(data) {
            $('#drop_add_traversee').html(data);

            $('.modal-title').html('Ajouter une traversee');
            $('#modale_traversee_contenu')[0].reset();
            $('#request_php_traversee').val("add_traversee");

            $('#btn_add_traversee').attr('hidden', false);
            $('#btn_update_traversee').attr('hidden', true);
            $('#modale_traversee').modal();
        }
    });
});
// validation du formulaire // button id=form_add_traversee
$(document).on('click', '#btn_add_traversee', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_traversee_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_traversee').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_traversee').attr('hidden', true);
            $('#message_bdd_traversee').modal();
            get_all_traversee();
        },
    }); 
});
//*************************************************************************************
//******************************** UPDATE TRAVERSEE
//*************************************************************************************
// clique boutton class=edit_traversee
$(document).on('click', '.edit_traversee', function() {
    var id = $(this).attr('id');
    var date = $(this).attr('date');
    var time = $(this).attr('time');
    var action = 'get_one_traversee';

    console.log("numéro de traversée" + id);
    console.log("date de la treversée" + date);
    console.log("heure de la treversée" + time);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, action_php:action},
        success:function(data) {
            $('#modale_traversee_contenu')[0].reset();
            $('.modal-title').html('Modifier une traversee');

            $('#drop_add_traversee').html(data);
            $('#num_traversee').val(id);
            $('#date_traversee').val(date);
            $('#heure_traversee').val(time);

            $('#request_php_traversee').val("update_traversee");
            $('#btn_add_traversee').attr('hidden', true);
            $('#btn_update_traversee').attr('hidden', false);

            $('#hidden_id_traversee').val(id);
            $('#modale_traversee').modal();
        }
    });
});
// validation du formulaire // button id=btn_update_traversee
$(document).on('click', '#btn_update_traversee', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_traversee_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_traversee').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_traversee').attr('hidden', true);
            $('#message_bdd_traversee').modal();
            get_all_traversee();
        }
    });
});
//*************************************************************************************
//******************************** DELETE TRAVERSEE
//*************************************************************************************
// clique boutton class=delete_traversee
$(document).on('click', '.delete_traversee', function() {
    //récupére la valeur de la prop id du boutton Supprimer
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression de cette TRAVERSEE ?</p>"

    $('#message_modale_traversee').html(message);
    $('#btn_conf_traversee').attr('hidden', false);
    $('#message_bdd_traversee').modal();

    $('#btn_delete_traversee').click(function() {
        var action = 'delete_traversee';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_traversee();
            }
        });
    });
});
//*************************************************************************************
//******************************** TRAVERSEE fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** BATEAUX début ********************/
//*************************************************************************************
//*******************************  LOAD BATEAUX
//*************************************************************************************
$('#get_all_bateau').click(function() {
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_bateau();
});
function get_all_bateau() {
    button_string = '<button id="add_bateau" type="button" name="add_bateau" class="btn btn-success btn-xs">Ajouter un bateau</button>';

    $.ajax({
        url:'php_request/get_all_bateau.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
        error:function() {
            console.log("erreur dans l'appel de get_all_bateau.php");
        }
    })
};
//*************************************************************************************
//******************************** ADD BATEAUX
//*************************************************************************************
$(document).on('click', '#add_bateau', function() {
    $('.modal-title').html('Ajouter un bateau');

    $('#modale_bateau_contenu')[0].reset();
    $('#request_php_bateau').val("add_bateau");

    $('#btn_add_bateau').attr('hidden', false);
    $('#btn_update_bateau').attr('hidden', true);
    $('#modale_bateau').modal();
});
// validation du formulaire // button id=form_add_bateau
$(document).on('click', '#btn_add_bateau', function() {
    var form_data = $('#modale_bateau_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_bateau').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_bateau').attr('hidden', true);
            $('#message_bdd_bateau').modal();
            get_all_bateau();
        },
        error:function() {
            console.log("erreur dans l'appel de main_request.php");
        }
    });
});
//*************************************************************************************
//******************************** UPDATE BATEAUX
//*************************************************************************************
$(document).on('click', '.edit_bateau', function() {
    var id = $(this).attr('id');
    var nom_bat = $(this).attr('nom_bat');
    console.log(id);

    $('#modale_bateau_contenu')[0].reset();
    $('.modal-title').html('Modifier un bateau');
    $('#nom_bateau').val(nom_bat);

    $('#request_php_bateau').val("update_bateau");

    $('#btn_add_bateau').attr('hidden', true);
    $('#btn_update_bateau').attr('hidden', false);

    $('#hidden_id_bateau').val(id);
    $('#modale_bateau').modal();
    
});
// validation du formulaire // button id=btn_update_bateau
$(document).on('click', '#btn_update_bateau', function() {
    var form_data = $('#modale_bateau_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_bateau').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_bateau').attr('hidden', true);
            $('#message_bdd_bateau').modal();
            get_all_bateau();
        }
    });
});
//*************************************************************************************
//******************************** DELETE BATEAUX
//*************************************************************************************
$(document).on('click', '.delete_bateau', function() {
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression du BATEAU ?</p>"

    $('#message_modale_bateau').html(message);
    $('#btn_conf_bateau').attr('hidden', false);
    $('#message_bdd_bateau').modal();

    $('#btn_delete_bateau').click(function() {
        var action = 'delete_bateau';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_bateau();
            }
        });
    });
});
//*************************************************************************************
//******************************** BATEAUX fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** CATEGORIE début ********************/
//*************************************************************************************
//*******************************  LOAD CATEGORIE
//*************************************************************************************
$('#get_all_categorie').click(function() {
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_categorie();
});
function get_all_categorie() {
    button_string = '<button id="add_categorie" type="button" name="add_categorie" class="btn btn-success btn-xs">Ajouter une catégorie</button>';

    $.ajax({
        url:'php_request/get_all_categorie.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
        error:function() {
            console.log("erreur dans l'appel de get_all_categorie.php");
        }
    })
};
//*************************************************************************************
//******************************** ADD CATEGORIE
//*************************************************************************************
$(document).on('click', '#add_categorie', function() {
    $('.modal-title').html('Ajouter une catégorie');

    $('#modale_categorie_contenu')[0].reset();
    $('#request_php_categorie').val("add_categorie");

    $('#btn_add_categorie').attr('hidden', false);
    $('#btn_update_categorie').attr('hidden', true);
    $('#modale_categorie').modal();
});
// validation du formulaire // button id=form_add_categorie
$(document).on('click', '#btn_add_categorie', function() {
    var form_data = $('#modale_categorie_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_categorie').html(data);
            $('#btn_conf_categorie').attr('hidden', true);
            $('#message_bdd_categorie').modal();
            get_all_categorie();
        }
    });
});
//*************************************************************************************
//******************************** UPDATE CATEGORIE
//*************************************************************************************
$(document).on('click', '.edit_categorie', function() {
    var id = $(this).attr('id');
    var lib_cat = $(this).attr('libelle');

    $('#modale_categorie_contenu')[0].reset();
    $('.modal-title').html('Modifier un catégorie');
    $('#lettre_categorie').val(id);
    $('#libelle_categorie').val(lib_cat);

    $('#request_php_categorie').val("update_categorie");

    $('#btn_add_categorie').attr('hidden', true);
    $('#btn_update_categorie').attr('hidden', false);

    $('#hidden_id_categorie').val(id);
    $('#modale_categorie').modal();
});
// validation du formulaire // button id=btn_update_categorie
$(document).on('click', '#btn_update_categorie', function() {
    var form_data = $('#modale_categorie_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_categorie').html(data);
            $('#btn_conf_categorie').attr('hidden', true);
            $('#message_bdd_categorie').modal();
            get_all_categorie();
        }
    });
});
//*************************************************************************************
//******************************** DELETE CATEGORIE
//*************************************************************************************
$(document).on('click', '.delete_categorie', function() {
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression de cette CATEGORIE ?</p>"

    $('#message_modale_categorie').html(message);
    $('#btn_conf_categorie').attr('hidden', false);
    $('#message_bdd_categorie').modal();

    $('#btn_delete_categorie').click(function() {
        var action = 'delete_categorie';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_categorie();
            }
        });
    });
});
//*************************************************************************************
//******************************** CATEGORIE fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** TYPE début ********************/
//*************************************************************************************
//*******************************  TYPE DROPDOWN
//*************************************************************************************
function logIdCat($id) {
    console.log("l'id de la catégorie séléctionnée est :" + $id);
};
//*************************************************************************************
//*******************************  LOAD TYPE
//*************************************************************************************
$('#get_all_type').click(function() {
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_type();
});
function get_all_type() {
    button_string = '<button id="add_type" type="button" name="add_type" class="btn btn-success btn-xs">Ajouter un type</button>';

    $.ajax({
        url:'php_request/get_all_type.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
    });
};
//*************************************************************************************
//******************************** ADD TYPE
//*************************************************************************************
$(document).on('click', '#add_type', function() {
    var action = 'drop_add_type';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{action_php: action},
        success:function(data) {
            $('#drop_add_type').html(data);

            $('.modal-title').html('Ajouter un type');
            $('#modale_type_contenu')[0].reset();
            $('#request_php_type').val("add_type");

            $('#btn_add_type').attr('hidden', false);
            $('#btn_update_type').attr('hidden', true);
            $('#modale_type').modal();
        }
    });
});
// validation du formulaire // button id=form_add_type
$(document).on('click', '#btn_add_type', function() {
    var form_data = $('#modale_type_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_type').html(data);
            $('#btn_conf_type').attr('hidden', true);
            $('#message_bdd_type').modal();
            get_all_type();
        },
    }); 
});
//*************************************************************************************
//******************************** UPDATE TYPE
//*************************************************************************************
// clique boutton class=edit_type
$(document).on('click', '.edit_type', function() {
    var id = $(this).attr('id');
    var lib = $(this).attr('libelle');
    var action = 'get_one_type';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, action_php:action},
        success:function(data) {
            $('#modale_type_contenu')[0].reset();
            $('.modal-title').html('Modifier un type');

            $('#drop_add_type').html(data);
            $('#num_type').val(id);
            $('#libelle_type').val(lib);

            $('#request_php_type').val("update_type");
            $('#btn_add_type').attr('hidden', true);
            $('#btn_update_type').attr('hidden', false);

            $('#hidden_id_type').val(id);
            $('#modale_type').modal();
        }
    });
});
// validation du formulaire // button id=btn_update_type
$(document).on('click', '#btn_update_type', function() {
    var form_data = $('#modale_type_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_type').html(data);
            $('#btn_conf_type').attr('hidden', true);
            $('#message_bdd_type').modal();
            get_all_type();
        }
    });
});
//*************************************************************************************
//******************************** DELETE TYPE
//*************************************************************************************
// clique boutton class=delete_type
$(document).on('click', '.delete_type', function() {
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression de ce TYPE ?</p>"

    $('#message_modale_type').html(message);
    $('#btn_conf_type').attr('hidden', false);
    $('#message_bdd_type').modal();

    $('#btn_delete_type').click(function() {
        var action = 'delete_type';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_type();
            }
        });
    });
});
//*************************************************************************************
//******************************** TYPE fin ********************/
//*************************************************************************************




//*************************************************************************************
//******************************** RESERVATION début ********************/
//*************************************************************************************
//*******************************  RESERVATION DROPDOWN
//*************************************************************************************
function logNumTrav($id) {
    console.log("le numéro de la traversée est :" + $id);
};
//*************************************************************************************
//*******************************  LOAD RESERVATION
//*************************************************************************************
$('#get_all_reservation').click(function() {
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_reservation();
});
function get_all_reservation() {
    button_string = '<button id="add_reservation" type="button" name="add_reservation" class="btn btn-success btn-xs">Ajouter une réseravtion </button>';

    $.ajax({
        url:'php_request/get_all_reservation.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
    });
};
//*************************************************************************************
//******************************** ADD RESERVATION
//*************************************************************************************
$(document).on('click', '#add_reservation', function() {
    var action = 'drop_add_reservation';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{action_php: action},
        success:function(data) {
            $('#drop_add_reservation').html(data);

            $('.modal-title').html('Ajouter une réservation');
            $('#modale_reservation_contenu')[0].reset();
            $('#request_php_reservation').val("add_reservation");

            $('#btn_add_reservation').attr('hidden', false);
            $('#btn_update_reservation').attr('hidden', true);
            $('#modale_reservation').modal();
        }
    });
});
// validation du formulaire // button id=form_add_reservation
$(document).on('click', '#btn_add_reservation', function() {
    var form_data = $('#modale_reservation_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_reservation').html(data);
            $('#btn_conf_reservation').attr('hidden', true);
            $('#message_bdd_reservation').modal();
            get_all_reservation();
        },
    }); 
});
//*************************************************************************************
//******************************** UPDATE RESERVATION
//*************************************************************************************
// clique boutton class=edit_reservation
$(document).on('click', '.edit_reservation', function() {
    var id = $(this).attr('id');
    var nom = $(this).attr('nom');
    var adresse = $(this).attr('adresse');
    var cp = $(this).attr('cp');
    var ville = $(this).attr('ville');
    var action = 'get_one_reservation';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, action_php:action},
        success:function(data) {
            $('#modale_reservation_contenu')[0].reset();
            $('.modal-title').html('Modifier une reservation');

            $('#drop_add_reservation').html(data);
            $('#nom').val(nom);
            $('#adresse').val(adresse);
            $('#cp').val(cp);
            $('#ville').val(ville);

            $('#request_php_reservation').val("update_reservation");
            $('#btn_add_reservation').attr('hidden', true);
            $('#btn_update_reservation').attr('hidden', false);

            $('#hidden_id_reservation').val(id);
            $('#modale_reservation').modal();
        }
    });
});
// validation du formulaire // button id=btn_update_reservation
$(document).on('click', '#btn_update_reservation', function() {
    var form_data = $('#modale_reservation_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_reservation').html(data);
            $('#btn_conf_reservation').attr('hidden', true);
            $('#message_bdd_reservation').modal();
            get_all_reservation();
        }
    });
});
//*************************************************************************************
//******************************** DELETE RESERVATION
//*************************************************************************************
// clique boutton class=delete_reservation
$(document).on('click', '.delete_reservation', function() {
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression de cette RESERVATION ?</p>"

    $('#message_modale_reservation').html(message);
    $('#btn_conf_reservation').attr('hidden', false);
    $('#message_bdd_reservation').modal();

    $('#btn_delete_reservation').click(function() {
        var action = 'delete_reservation';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_reservation();
            }
        });
    });
});
//*************************************************************************************
//******************************** RESERVATION fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** PERIODE début ********************/
//*************************************************************************************
//*******************************  LOAD PERIODE
//*************************************************************************************
$('#get_all_periode').click(function() {
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_periode();
});
function get_all_periode() {
    button_string = '<button id="add_periode" type="button" name="add_periode" class="btn btn-success btn-xs">Ajouter une période</button>';

    $.ajax({
        url:'php_request/get_all_periode.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
    });
};
//*************************************************************************************
//******************************** ADD PERIODE
//*************************************************************************************
$(document).on('click', '#add_periode', function() {
    var action = 'drop_add_periode';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{action_php: action},
        success:function(data) {
            $('#drop_add_periode').html(data);

            $('.modal-title').html('Ajouter une période');
            $('#modale_periode_contenu')[0].reset();
            $('#request_php_periode').val("add_periode");

            $('#btn_add_periode').attr('hidden', false);
            $('#btn_update_periode').attr('hidden', true);
            $('#modale_periode').modal();
        }
    });
});
// validation du formulaire // button id=form_add_periode
$(document).on('click', '#btn_add_periode', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_periode_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_periode').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_periode').attr('hidden', true);
            $('#message_bdd_periode').modal();
            get_all_periode();
        },
    }); 
});
//*************************************************************************************
//******************************** UPDATE PERIODE
//*************************************************************************************
// clique boutton class=edit_periode
$(document).on('click', '.edit_periode', function() {
    var id = $(this).attr('id');
    var date_fin = $(this).attr('date_fin');

    $('#modale_periode_contenu')[0].reset();
    $('.modal-title').html('Modifier une periode');

    $('#date_deb_periode').val(id);
    $('#date_fin_periode').val(date_fin);

    $('#request_php_periode').val("update_periode");
    $('#btn_add_periode').attr('hidden', true);
    $('#btn_update_periode').attr('hidden', false);

    $('#hidden_id_periode').val(id);
    $('#modale_periode').modal();

});
// validation du formulaire // button id=btn_update_periode
$(document).on('click', '#btn_update_periode', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_periode_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_periode').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_periode').attr('hidden', true);
            $('#message_bdd_periode').modal();
            get_all_periode();
        }
    });
});
//*************************************************************************************
//******************************** DELETE PERIODE
//*************************************************************************************
// clique boutton class=delete_periode
$(document).on('click', '.delete_periode', function() {
    //récupére la valeur de la prop id du boutton Supprimer
    var id = $(this).attr('id');
    var message = "<p>Confirmez la suppression de cette PERIODE ?</p>"

    $('#message_modale_periode').html(message);
    $('#btn_conf_periode').attr('hidden', false);
    $('#message_bdd_periode').modal();

    $('#btn_delete_periode').click(function() {
        var action = 'delete_periode';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, action_php: action},
            success:function() {
                get_all_periode();
            }
        });
    });
});
//*************************************************************************************
//******************************** PERIODE fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** CONTENIR début ********************/
//*************************************************************************************
//*******************************  CONTENIR DROPDOWN
//*************************************************************************************
function logIdBatCont($id) {
    console.log("l'id du bateau séléctioné est :" + $id);
};

function logLetCatCont($id) {
    console.log("la lettre de catégorie séléctionnée est :" + $id);
};
//*************************************************************************************
//*******************************  LOAD CONTENIR
//*************************************************************************************
$('#get_all_contenir').click(function() {
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_contenir();
});
function get_all_contenir() {
    button_string = '<button id="add_contenir" type="button" name="add_contenir" class="btn btn-success btn-xs">Ajouter une capacité</button>';

    $.ajax({
        url:'php_request/get_all_contenir.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
    });
};
//*************************************************************************************
//******************************** ADD CONTENIR
//*************************************************************************************
$(document).on('click', '#add_contenir', function() {
    var action = 'drop_add_contenir';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{action_php: action},
        success:function(data) {
            $('#drop_add_contenir').html(data);

            $('.modal-title').html('Ajouter une capacité pour un bateau');
            $('#modale_contenir_contenu')[0].reset();
            $('#request_php_contenir').val("add_contenir");

            $('#btn_add_contenir').attr('hidden', false);
            $('#btn_update_contenir').attr('hidden', true);
            $('#modale_contenir').modal();
        }
    });
});
// validation du formulaire // button id=form_add_contenir
$(document).on('click', '#btn_add_contenir', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_contenir_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_contenir').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_contenir').attr('hidden', true);
            $('#message_bdd_contenir').modal();
            get_all_contenir();
        },
    }); 
});
//*************************************************************************************
//******************************** UPDATE CONTENIR
//*************************************************************************************
// clique boutton class=edit_contenir
$(document).on('click', '.edit_contenir', function() {
    var id = $(this).attr('id');
    var lettre = $(this).attr('lettre');
    var capacite = $(this).attr('capacite');
    var action = 'get_one_contenir';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, lettre:lettre, action_php:action},
        success:function(data) {
            $('#modale_contenir_contenu')[0].reset();
            $('.modal-title').html('Modifier une capacité pour un bateau');

            $('#drop_add_contenir').html(data);
            $('#capacite').val(capacite);

            $('#request_php_contenir').val("update_contenir");
            $('#btn_add_contenir').attr('hidden', true);
            $('#btn_update_contenir').attr('hidden', false);

            $('#hidden_id_contenir').val(id);
            $('#hidden_lettre_contenir').val(lettre);
            $('#modale_contenir').modal();
        }
    });
});
// validation du formulaire // button id=btn_update_contenir
$(document).on('click', '#btn_update_contenir', function() {
    //!!! reprend tout les tag avec une propriété name et associe la valeur !!!!
    var form_data = $('#modale_contenir_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        //callback après requetage du fichier php
        success:function(data) {
            $('#message_modale_contenir').html(data);
            //boutton de confirmation de suppression ==> hidden
            $('#btn_conf_contenir').attr('hidden', true);
            $('#message_bdd_contenir').modal();
            get_all_contenir();
        }
    });
});
//*************************************************************************************
//******************************** DELETE CONTENIR
//*************************************************************************************
// clique boutton class=delete_contenir
$(document).on('click', '.delete_contenir', function() {
    //récupére la valeur de la prop id du boutton Supprimer
    var id = $(this).attr('id');
    var lettre = $(this).attr('lettre');
    var message = "<p>Confirmez la suppression de cette CAPACITE ?</p>"

    $('#message_modale_contenir').html(message);
    $('#btn_conf_contenir').attr('hidden', false);
    $('#message_bdd_contenir').modal();

    $('#btn_delete_contenir').click(function() {
        var action = 'delete_contenir';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, lettre:lettre, action_php: action},
            success:function() {
                get_all_contenir();
            }
        });
    });
});
//*************************************************************************************
//******************************** CONTENIR fin ********************/
//*************************************************************************************




//*************************************************************************************
//******************************** TARIF début ********************/
//*************************************************************************************
//*******************************  TARIF DROPDOWN
//*************************************************************************************
function logTarifPeriode($id) {
    console.log("la date de début séléctionnée:" + $id);
};

function logTarifCode($id) {
    console.log("le code de liaison est : " + $id);
};

function logTarifType($id) {
    console.log("le Type séléctionné est : " + $id);
};
//*************************************************************************************
//*******************************  LOAD TARIF
//*************************************************************************************
$('#get_all_tarif').click(function() {
    //vide le contenu html des éléments concernés
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_tarif();
});
function get_all_tarif() {
    button_string = '<button id="add_tarif" type="button" name="add_tarif" class="btn btn-success btn-xs">Ajouter un tarif</button>';
    $.ajax({
        url:'php_request/get_all_tarif.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
        error:function() {
            console.log("erreur dans l'appel de get_all_tarif.php");
        }
    })
};
//*************************************************************************************
//******************************** ADD TARIF
//*************************************************************************************
// clique boutton id=add_tarif
$(document).on('click', '#add_tarif', function() {
    var action = 'drop_add_tarif';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{action_php: action},
        success:function(data) {
            $('#drop_add_tarif').html(data);

            $('.modal-title').html('Ajouter un tarif pour une période sur une liaison');
            $('#modale_tarif_contenu')[0].reset();
            $('#request_php_tarif').val("add_tarif");

            $('#btn_add_tarif').attr('hidden', false);
            $('#btn_update_tarif').attr('hidden', true);
            $('#modale_tarif').modal();
        }
    });
});
// validation du formulaire // button id=form_add_tarif
$(document).on('click', '#btn_add_tarif', function() {
    var form_data = $('#modale_tarif_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_tarif').html(data);
            $('#btn_conf_tarif').attr('hidden', true);
            $('#message_bdd_tarif').modal();
            get_all_tarif();
        },
        error:function() {
            console.log("erreur dans l'appel de main_request.php");
        }
    }); 
});
//*************************************************************************************
//******************************** UPDATE TARIF
//*************************************************************************************
// clique boutton class=edit_tarif
$(document).on('click', '.edit_tarif', function() {
    var id = $(this).attr('cleTar1');
    var code = $(this).attr('cleTar2');
    var num = $(this).attr('cleTar3');
    var tarif = $(this).attr('tarif');
    var action = 'get_one_tarif';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, code:code, num:num, action_php:action},
        success:function(data) {
            $('#modale_tarif_contenu')[0].reset();
            $('.modal-title').html('Modifier un tarif');

            $('#drop_add_tarif').html(data);
            $('#tarif').val(tarif);

            $('#request_php_tarif').val("update_tarif");
            $('#btn_add_tarif').attr('hidden', true);
            $('#btn_update_tarif').attr('hidden', false);

            $('#hidden_id_tarif').val(id);
            $('#hidden_cdeliai_tarif').val(code);
            $('#hidden_type_tarif').val(num);
            $('#modale_tarif').modal();
        }
    });
});
// validation du formulaire // button id=btn_update_tarif
$(document).on('click', '#btn_update_tarif', function() {
    var form_data = $('#modale_tarif_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_tarif').html(data);
            $('#btn_conf_tarif').attr('hidden', true);
            $('#message_bdd_tarif').modal();
            get_all_tarif();
        }
    });
});
//*************************************************************************************
//******************************** DELETE TARIF
//*************************************************************************************
// clique boutton class=delete_tarif
$(document).on('click', '.delete_tarif', function() {
    var id = $(this).attr('cleTar1');
    var code = $(this).attr('cleTar2');
    var num = $(this).attr('cleTar3');
    var message = "<p>Confirmez la suppression de ce TARIF ?</p>"

    $('#message_modale_tarif').html(message);
    $('#btn_conf_tarif').attr('hidden', false);
    $('#message_bdd_tarif').modal();

    $('#btn_delete_tarif').click(function() {
        var action = 'delete_tarif';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id:id, code:code, num:num, action_php:action},
            success:function() {
                get_all_tarif();
            }
        });
    });
});
//*************************************************************************************
//******************************** TARIF fin ********************/
//*************************************************************************************



//*************************************************************************************
//******************************** ENREGISTRE début ********************/
//*************************************************************************************
//*******************************  ENREGISTRE DROPDOWN
//*************************************************************************************
function logNumResEnr($id) {
    console.log("le numéro de résa séléctionné est :" + $id);
};

function logTypEnr($id) {
    console.log("le type séléctionnée est :" + $id);
};
//*************************************************************************************
//*******************************  LOAD ENREGISTRE
//*************************************************************************************
$('#get_all_enregistre').click(function() {
    $('#add_button').html('');
    $('#table_data').html('');
    get_all_enregistre();
});
function get_all_enregistre() {
    button_string = '<button id="add_enregistre" type="button" name="add_enregistre" class="btn btn-success btn-xs">Ajouter un enregistrement</button>';

    $.ajax({
        url:'php_request/get_all_enregistre.php',
        method:'POST',
        success:function(data) {
            $('#add_button').html(button_string);
            $('#table_data').html(data);
        },
    });
};
//*************************************************************************************
//******************************** ADD ENREGISTRE
//*************************************************************************************
$(document).on('click', '#add_enregistre', function() {
    var action = 'drop_add_enregistre';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{action_php: action},
        success:function(data) {
            $('#drop_add_enregistre').html(data);

            $('.modal-title').html('Ajouter un enregistrement');
            $('#modale_enregistre_contenu')[0].reset();
            $('#request_php_enregistre').val("add_enregistre");

            $('#btn_add_enregistre').attr('hidden', false);
            $('#btn_update_enregistre').attr('hidden', true);
            $('#modale_enregistre').modal();
        }
    });
});
// validation du formulaire // button id=form_add_enregistre
$(document).on('click', '#btn_add_enregistre', function() {
    var form_data = $('#modale_enregistre_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_enregistre').html(data);
            $('#btn_conf_enregistre').attr('hidden', true);
            $('#message_bdd_enregistre').modal();
            get_all_enregistre();
        },
    }); 
});
//*************************************************************************************
//******************************** UPDATE ENREGISTRE
//*************************************************************************************
// clique boutton class=edit_enregistre
$(document).on('click', '.edit_enregistre', function() {
    var id = $(this).attr('id');
    var type_enr = $(this).attr('type_enr');
    var quantite = $(this).attr('quantite');
    var action = 'get_one_enregistre';

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data:{id:id, type_enr:type_enr, action_php:action},
        success:function(data) {
            $('#modale_enregistre_contenu')[0].reset();
            $('.modal-title').html('Modifier un enregistrement');

            $('#drop_add_enregistre').html(data);
            $('#quantite').val(quantite);

            $('#request_php_enregistre').val("update_enregistre");
            $('#btn_add_enregistre').attr('hidden', true);
            $('#btn_update_enregistre').attr('hidden', false);

            $('#hidden_id_enregistre').val(id);
            $('#hidden_type_enregistre').val(type_enr);
            $('#modale_enregistre').modal();
        }
    });
});
// validation du formulaire // button id=btn_update_enregistre
$(document).on('click', '#btn_update_enregistre', function() {
    var form_data = $('#modale_enregistre_contenu').serialize();
    console.log(form_data);

    $.ajax({
        url:'php_request/main_request.php',
        method:'POST',
        data: form_data,
        success:function(data) {
            $('#message_modale_enregistre').html(data);
            $('#btn_conf_enregistre').attr('hidden', true);
            $('#message_bdd_enregistre').modal();
            get_all_enregistre();
        }
    });
});
//*************************************************************************************
//******************************** DELETE ENREGISTRE
//*************************************************************************************
// clique boutton class=delete_enregistre
$(document).on('click', '.delete_enregistre', function() {
    var id = $(this).attr('id');
    var type_enr = $(this).attr('type_enr');
    var message = "<p>Confirmez la suppression de cet ENREGISTREMENT ?</p>"

    $('#message_modale_enregistre').html(message);
    $('#btn_conf_enregistre').attr('hidden', false);
    $('#message_bdd_enregistre').modal();

    $('#btn_delete_enregistre').click(function() {
        var action = 'delete_enregistre';
        $.ajax({
            url:'php_request/main_request.php',
            method:'POST',
            data:{id: id, type_enr:type_enr, action_php: action},
            success:function() {
                get_all_enregistre();
            }
        });
    });
});
//*************************************************************************************
//******************************** CONTENIR fin ********************/
//*************************************************************************************
