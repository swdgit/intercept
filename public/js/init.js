/**
 * Use me to init the printers and materials on the site.
 * 
 *  
 */


function initPage() {
    // get the printers
    // get the materials
    
    //set the list, just the names, and the types to the 2 different list windows.
    
    $.getJSON( "api/get/suppliers/PRINTER", function( data ) {
        alert(data);
        var items = [];
        $.each( data, function( key, val ) {
          items.push( "<li id='" + key + "'>" + val + "</li>" );
        });
       
        $( "<ul/>", {
          "class": "printers",
          html: items.join( "" )
        }).appendTo( "printerList" );
      });
    
    $.getJSON("api/get/suppliers/MATERIAL", function(data) {
        var items = [];
        $.each( data, function( key, val ) {
          items.push( "<li id='" + key + "'>" + val + "</li>" );
        });
       
        $( "<ul/>", {
          "class": "materials",
          html: items.join( "" )
        }).appendTo( "materialList" );
        
    });
}
