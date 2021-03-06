/**
 * Use me to init the printers and materials on the site.
 * 
 * 
 */

function initPage() {
    // get the printers
    // get the materials

    // set the list, just the names, and the types to the 2 different list windows.
    $.getJSON('api/get/suppliers/PRINTER', function(data) {
        $.each(data, function(key, val) {
            $("#printers").append("<li>" + val.companyName + "</li>");
        });
    }).error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    });

    $.getJSON('api/get/suppliers/MATERIAL', function(data) {
        $.each(data, function(key, val) {
            $("#materials").append("<li>" + val.companyName + "</li>");
        });

    }).error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    });
}
