/**
 * 
 */
/**
 * @param filamentId
 */
function getPrinters(filamentId) {
    // get the printers that this filament will support
    $.getJSON('api/printers', function(data) {
        $.each(data, function(key, val) {
            $("#printers").append("<li id=" + val.printerId + ">" + val.name + "</li>");
        });
    }).error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    });
}

/**
 * @param printerId
 */
function getFilaments(printerId) {
    // get the filaments that this printer will print with.
    $.getJSON('api/filament', function(data) {
        $.each(data, function(key, val) {
            var liValue = val.name + " " + val.color + " " + val.size;
            $("#filament").append("<li id=" + val.filamentId + ">" + liValue  + "</li>");
        });

    }).error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    });
}

/**
 * @param filamentId
 * @param printerId
 */
function getSpec(filamentId, printerId) {
    // if the filament id and the printer id are not null then pull up a spec that matches both.
    
    
}