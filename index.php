<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary - Raphael Duran</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/favicon-16x16.png">
    <link rel="mask-icon" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/safari-pinned-tab.svg" color="#1f487e">
</head>

<body>

    <div class="container">
        <div id="loading"></div>
        <h1 id="title">One word dictionary</h1>
        <form class="search-box">
            <input type="text" placeholder="&#128218; Write the word here.." id="inp-word" />
            <button id="search-btn">Search</button>
        </form>
        <div class="result" id="result">
        </div>
    </div>



    <script>
        $("#search-btn").on("click", function() {
            event.preventDefault();
            var userWord = 'word=' + $('#inp-word').val();
            console.log(userWord);
            $.ajax({
                url: 'inc/dictionary.php',
                type: 'POST',
                data: userWord,
                success: function(response) {
                    $('div#result').html(response);
                    console.log(response);
                },
                error: function() {
                    $('div#result').html("Sorry, we're having issues, try again later");

                }
            });

        });





        $(document).ajaxStart(function() {
            $('#loading').show(); // Show the loading animation when an AJAX request starts
        });

        $(document).ajaxStop(function() {

            $('#loading').hide(); // Hide the loading animation when all AJAX requests are complete
            $('#result').show(); // Show the content after the AJAX requests are complete


            //Check if there's audio
            if ($('#sound').attr('src') == '') {
                $('#play-sound').hide();
            } else {
                $('#play-sound').fadeIn();
                // Play sound function
                $("#play-sound").on("click", function() {
                    sound.play();
                });
            }








        });
    </script>

</body>



</html>