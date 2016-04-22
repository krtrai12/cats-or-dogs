$(document).ready(function() {
        
        // Arrange to suggest country names as we type
        $('#people').on('keyup click', function() {
          var input = $(this);
          var search = $(this).val().trim();
          var dropdown = $('#people-dropdown');
          
          // Send an AJAX request to get country names
          $.post('searchdb.php', {people: search}, function(response) {
            var peopleList = $(response);
            
            // Make the countries hoverable and selectable
            peopleList.on('mouseenter', highlight);
            peopleList.on('mouseleave', unhighlight);
            peopleList.on('click', select);
            
            // Fill and show the dropdown menu
            dropdown.empty();
            dropdown.append(peopleList);
            if (dropdown.is(':hidden')) {
              input.dropdown('toggle');
            }
          });
          
          // Utility functions for making dropdown items responsive
          function highlight() { $(this).addClass('bg-primary'); }
          function unhighlight() { $(this).removeClass('bg-primary'); }
          function select() { input.val( $(this).html() ); }
        });
      });