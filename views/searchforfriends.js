$(document).ready(function() {
        
        // Arrange to suggest country names as we type
        $('#people').on('keyup click', function(event) {
          var input = $(this);
          var search = $(this).val().trim();
          var dropdown = $('#people-dropdown');
          
          if (event.keyCode == 13) {
                event.preventDefault();
                
                // check if valid username (similar to AJAX request below)
                // if valid, send to that profile
                $.post('../searchdb.php', {people: search}, function(response) {
                        console.log("this is getting");
                        console.log(response);
                        var peopleList = $(response);
                        if (peopleList.size() == 1) {
                                console.log("this is getting here");
                                //onclick="location.href='http://www.website.com/search/'+document.getElementById('search').value;"
                                window.location="friendProfileController.php?friendUsername="+peopleList.text();  // redirect to friendProfileController
                                                                        // when we redirect, we're going to use a "Get" for the information and have that send
                                                                        // the information to the friend profile, and this will allow each user to have their own
                                                                        // link to their own profile
                                                                        //header("location:savefriendProfileController.php?friendUsername=".$pattern);
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