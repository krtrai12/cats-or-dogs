$(document).ready(function() {
        
        // Arrange to suggest country names as we type
        $('#people').on('keyup click', function(event) {
          var input = $(this);
          var search = $(this).val().trim();
          var dropdown = $('#people-dropdown');
          
          if (event.keyCode == 13) {
                // check if valid username (similar to AJAX request below)
                // if valid, send to that profile
                $.post('../searchdb.php', {people: search}, function(response) {
                        function select() { input.val( $(this).html() ); }
                        var peopleList = $(response);
                        if (peopleList != null) {
                                window.location="../views/profile.php";  
                        }
                });
                
          } else {
                // Send an AJAX request to get names
                $.post('../searchdb.php', {people: search}, function(response) {
                        // Utility functions for making dropdown items responsive
                        function select() { input.val( $(this).html() ); }
                        var peopleList = $(response);
                        
                        peopleList.on('click', select);
                        
                        // Fill and show the dropdown menu
                        dropdown.empty();
                        dropdown.append(peopleList);
                        if (dropdown.is(':hidden')) {
                          input.dropdown('toggle');
                        }
                });     
          }
        
        });
      });