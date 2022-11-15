$(document).ready(function() {
    $('#search-book-ip').on('keyup', function(event) {
       event.preventDefault();
       /* Act on the event */
       var tukhoa = $(this).val().toLowerCase();
       $('#tiles-id .style').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
       });
    });
 });