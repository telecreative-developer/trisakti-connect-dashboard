$( document ).ready(function() {
    // PrettyPrint
    $('pre').addClass('prettyprint');
    prettyPrint();
    
    
    $(document).ready(function() {
      $("#close_account").on("click", function(e) {
        var buttons = $('<div>')
        .append(createButton('Ok', function() {
           swal.close();
           console.log('ok'); 
        })).append(createButton('Later', function() {
           swal.close();
           console.log('Later'); 
        })).append(createButton('Cancel', function() {
           swal.close();
           console.log('Cancel');
        }));
        
        e.preventDefault();
        swal({
          title: "Are you sure?",
          html: buttons,
          type: "warning",
          showConfirmButton: false,
          showCancelButton: false
        });
      });
    });

    function createButton(text, cb) {
      return $('<button>' + text + '</button>').on('click', cb);
    }
    
});