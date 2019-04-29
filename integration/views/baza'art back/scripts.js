//Getting value from "ajax.php".

function fill(Value) {
    //Assigning value to "search" div in "search.php" file.
    $('#search').val(Value);
    //Hiding "display" div in "search.php" file.
    $('#display').hide();

 }
 $(document).ready(function() {
            // $("#afficher").hide();
    $("#search").keyup(function() {
         $("#afficher").hide();
        var id = $('#search').val();
        var sel = $('#select').val();
        //Validating, if "name" is empty.
        if (id == "") {
            //Assigning empty value to "display" div in "search.php" file.
             $("#afficher").show();
            $("#display").html("");
        }
        //If name is not empty.
        else {
            //AJAX is called.
            $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "ajax.php",
                //Data, that will be sent to "ajax.php".
                data: {
                    
                    search: id,
                    select: sel
                },
                //If result found, this funtion will be called.
                success: function(html) {
                    //Assigning result to "display" div in "search.php" file.
                    $("#display").html(html).show();

                }
            });
        }
    });
 });