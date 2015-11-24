/**
 * Use me to init the printers and materials on the site.
 * 
 * 
 */

function initPage() {
    // get the printers
    // get the materials

    // set the list, just the names, and the types to the 2 different list windows.
    $.getJSON('api/printers', function(data) {
        $.each(data, function(key, val) {
            $("#printers").append("<li id=" + val.printerId + ">" + val.name + "</li>");
        });
    }).error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    });

    $.getJSON('api/filament', function(data) {
        $.each(data, function(key, val) {
            $("#filament").append("<li id=" + val.filamentId + ">" + val.companyName + "</li>");
        });

    }).error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    });
}
