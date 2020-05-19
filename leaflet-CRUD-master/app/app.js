$(document).ready(function(){
  _attachTopNavMenu();
  _displayMapRead('app');
});
/* 
 * Fungsi untuk menampilkan ... 
 * */
function _attachTopNavMenu () {
  var adjacentTopNavMenuDOM = "" +
    "<nav class='navbar navbar-expand-md navbar-dark fixed-top bg-dark'>" +
      "<a class='navbar-brand' href=''>INIAP</a>" +
      "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'>" +
        "<span class='navbar-toggler-icon'></span>" +
      "</button>" +
      "<div class='collapse navbar-collapse' id='navbarCollapse'>" +
        "<ul class='navbar-nav mr-auto'>" +
          "<li class='nav-item'>" +
            "<a id='home' class='nav-link flat' href='#'><i class='fa fa-home'></i>&nbsp;INICIO</a>" +
          "</li>" +
          "<li class='nav-item'>" +
            "<a id='leaflet_crud_create' class='nav-link flat' href='#'><i class='fa fa-pencil'></i>&nbsp;Crear</a>" +
          "</li>" +
          "<li class='nav-item'>" +
            "<a id='leaflet_crud_read' class='nav-link flat' href='#'><i class='fa fa-map'></i>&nbsp;Terrenos</a>" +
          "</li>" +
          "<li class='nav-item dropdown'>" +
            "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdownUpdate' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-location-arrow'></i>&nbsp;Modificar</a>" +
            "<div class='dropdown-menu' aria-labelledby='navbarDropdownUpdate'>" +
              "<a id='leaflet_crud_update_point' class='dropdown-item' href='#'><i class='fa fa-pencil-square-o'></i>&nbsp;Point</a>" +
              "<a id='leaflet_crud_update_linestring' class='dropdown-item' href='#'><i class='fa fa-pencil-square-o'></i>&nbsp;Linea</a>" +
              "<a id='leaflet_crud_update_polygon' class='dropdown-item' href='#'><i class='fa fa-pencil-square-o'></i>&nbsp;Poligono</a>" +
            "</div>" +
          "</li>" +
          "<li class='nav-item'>" +
            "<a id='leaflet_crud_delete' class='nav-link flat' href='#'><i class='fa fa-trash'></i>&nbsp;Eliminar</a>" +
          "</li>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href=''></a>" +
          "<a class='navbar-brand' href='../app/pages/perfil.php'>Salir de Mapa</a>" +
        "</ul>" +
      "</div>" +
    "</nav>" +
    "";
  var baseObject = document.getElementById('app');
  baseObject.insertAdjacentHTML('beforebegin', adjacentTopNavMenuDOM);
  _attachTopNavMenuFunction();
}
function _attachTopNavMenuFunction () {
  $('#navbarCollapse a.nav-link.flat').on('click', function(e){
    e.stopImmediatePropagation();
    var menuid = $(this).attr('id');
    $('.navbar-collapse').collapse('hide');
    switch(menuid){
      case 'home':
      case 'leaflet_crud_read':
        _displayMapRead('app');
        break;
      case 'leaflet_crud_create':
        _displayMapCreate('app');
        break;
      case 'leaflet_crud_delete':
        _displayMapDelete('app');
        break;
      default:
        console.log('__undefined__');
        break;
    }
    return false;
  });
  $('#navbarCollapse a.dropdown-item').on('click', function(e){
    e.stopImmediatePropagation();
    var menuid = $(this).attr('id');
    $('.navbar-collapse').collapse('hide');
    $(this).closest('li.nav-item.dropdown').find('.nav-link.dropdown-toggle').dropdown('toggle');
    switch(menuid){
      case 'leaflet_crud_update_point':
        _displayMapUpdatePoint('app');
        break;
      // case 'leaflet_crud_update_linestring':
      //   _displayMapUpdateLinestring('app');
      //   break;
      case 'leaflet_crud_update_polygon':
        _displayMapUpdatePolygon('app');
        break;
      default:
        console.log('__undefined__');
        break;
    }
    return false;
  });
}
function _buildDigitiseModalBox (targetmodal,context,geometry) {
  targetmodal = typeof targetmodal !== 'undefined' ? targetmodal : 'modalbox';
  context = typeof context !== 'undefined' ? context : 'POINT';
  geometry = typeof geometry !== 'undefined' ? geometry : 'POINT (110.21766 -7.459129)';
  
  var htmlformcomponent = "" +
      "<input type='hidden' id='command' name='command' value='"+context+"'/>" +
      "<input type='hidden' id='geometry' name='geometry' value='"+geometry+"'/>" +
      "<table id='feature_data' class='table table-condensed table-bordered table-striped'>" +
        "<thead>" +
          "<tr>" +
            "<th colspan='2' class='text-center'>Detalles</th>" +
          "</tr>" +
        "</thead>" +
        "<tbody>" +
          "<tr>" +
            "<td class=''>Terreno</td>" +
            "<td class='text-center'><input type='text' id='notes' name='notes' class='form-control' value=''/></td>" +
          "</tr>" +
          "<tr>" +
            "<td class=''>Direcciones</td>" +
            "<td class='text-center'><textarea rows='5' style='width:100%;' readonly='true'>"+geometry+"</textarea></td>" +
          "</tr>" +
        "</tbody>" +
      "</table>" +
    "";
  var modalfooter = "" +
    "<button type='button' id='canceldigitize' class='btn btn-default' data-dismiss='modal'><i class='fa fa-power-off'></i>&nbsp;Cancelar</button>" +
    "<button type='button' id='savegeometrydata' class='btn btn-primary'><i class='fa fa-floppy-o'></i>&nbsp;Guardar</button>" +
    "";
  $("#form_modal_body").empty();
  $("#form_modal_footer").empty().html(modalfooter);
  $("#form_modal_body").removeClass().addClass('modal-body');
  $("#form_modal_size").removeClass().addClass('modal-dialog');
  $("#form_modal_body").html(htmlformcomponent);
  $("#form_modal_label").html("<i class='fa fa-pencil'></i>&nbsp;"+context+"");
  
  $('#'+targetmodal+'').modal({show:true, backdrop:'static', keyboard:false});
}
function _activateFeatureSave () {
  $("#savegeometrydata").on('click', function(evt){
    evt.stopImmediatePropagation();
    var commandContext = $('#command').val();
    var noteString = $('#notes').val();
    var geometry = $('#geometry').val();
    if (commandContext == "POINT") {
      $.ajax({
        url: "./dataservice/create_point.php",
        method: "GET",
        dataType: "json",
        data: $('#dynamicform').serialize(),
        success: function (data) {
          if (data.response=="200") {
            $("#modalform").modal('hide');
          } else {
            $("#modalform").modal('hide');
            console.log('Failed to save.');
          }
        },
        username: null,
        password: null
      });
    } else if (commandContext == "LINESTRING") {
      $.ajax({
        url: "./dataservice/create_linestring.php",
        method: "GET",
        dataType: "json",
        data: $('#dynamicform').serialize(),
        success: function (data) {
          if (data.response=="200") {
            $("#modalform").modal('hide');
          } else {
            $("#modalform").modal('hide');
            console.log('Failed to save.');
          }
        },
        username: null,
        password: null
      });
    } else if (commandContext == "POLYGON") {
      $.ajax({
        url: "./dataservice/create_polygon.php",
        method: "GET",
        dataType: "json",
        data: $('#dynamicform').serialize(),
        success: function (data) {
          if (data.response=="200") {
            $("#modalform").modal('hide');
          } else {
            $("#modalform").modal('hide');
            console.log('Failed to save.');
          }
        },
        username: null,
        password: null
      });
    } else {
      console.log('__undefined__');
    }
    return false;
  });
}
