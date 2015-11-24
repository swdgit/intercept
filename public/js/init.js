/**
 * Use me to init the printers and materials on the site.
 * 
 *  
 */


function initPage() {
    // get the printers
    // get the materials
    
    //set the list, just the names, and the types to the 2 different list windows.
    
    $.ajax({
        url: 'api/get/suppliers/PRINTER',
      })
      .done(function(data) {
        alert(data)
      })
      .fail(function() {
        alert("Ajax failed to fetch data")
      })
    
    $.getJSON( "api/get/suppliers/PRINTER", function( data ) {
        $.each( data, function( key, val ) {
            $("#printers").append("<li>" +  val.companyName +  "</li>");
        });
      });
    
    $.getJSON("api/get/suppliers/MATERIAL", function(data) {
        $.each( data[0], function( key, val ) {
            $("#printers").append("<li>" +  val.companyName +  "</li>");
        });
               
    });
}
