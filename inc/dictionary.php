<?php


function get_definition($word)
{
    require 'conn.php';


    if ($json_data !== false) {
        // Display an error message or perform some action




        $properWord = $dictionary->word; //Word
        $type = $dictionary->meanings[0]->partOfSpeech; //Type of word
        $phonetic = $dictionary->phonetic; //Phonetics
        $definition = $dictionary->meanings[0]->definitions[0]->definition; //Definition
        $example = $dictionary->meanings[0]->definitions[0]->example; //Example
        $audio = $dictionary->phonetics[0]->audio; //Audio


?>


        <div class="word">
            <h3><?php echo $properWord ?></h3>
            <button id="play-sound">
                <i class="fas fa-volume-up"></i>
            </button>
        </div>
        <div class="details">
            <p><?php echo $type ?></p>
            <p><?php echo $phonetic; ?></p>
        </div>
        <p class="word-meaning">
            <?php echo $definition; ?>
        </p>
        <p class="word-example">
            <?php echo $example; ?>
        </p>
        <audio id="sound" src="<?php echo $audio; ?>"></audio>




<?php
    } else {
        echo "Sorry, we couldn't find the word" . $word . ". Check your spelling and try again";
    }
}

// Get word from ajax
if (isset($_POST['word'])) {
    $usertWord = $_POST['word'];
    get_definition($usertWord);
}
