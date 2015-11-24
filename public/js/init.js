/**
 * Use me to init the printers and materials on the site.
 * 
 *  
 */


function initPage() {
    // get the printers
    // get the materials
    
    //set the list, just the names, and the types to the 2 different list windows.
    function foo() {
        var httpRequest = new XMLHttpRequest();
        httpRequest.open('GET', "http://intercept.localhost.com/api/get/suppliers/PRINTER");
        httpRequest.send();
        return httpRequest.responseText;
    }

    var result = foo(); // always ends up being 'undefined'
    
    
    $.get('http://intercept.localhost.com/api/get/suppliers/PRINTER', function( resp ) {
        console.log( resp ); // server response
    });
    
    
    $.getJSON( 'api/get/suppliers/PRINTER', function( data ) {
        $.each( data, function( key, val ) {
            $("#printers").append("<li>" +  val.companyName +  "</li>");
        });
      });
    
    $.getJSON('api/get/suppliers/MATERIAL', function(data) {
        $.each( data[0], function( key, val ) {
            $("#printers").append("<li>" +  val.companyName +  "</li>");
        });
               
    })
    .error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    });
}
