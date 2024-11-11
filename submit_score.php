<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = $_POST['score']; // Get score from POST request
    
    // Here, you can either save the score to a database or a file
    // For simplicity, let's save it to a text file

    $file = 'scores.txt';
    $currentScores = file_get_contents($file); // Read the current scores
    $currentScores .= "Score: " . $score . " - " . date("Y-m-d H:i:s") . "\n"; // Add new score with timestamp

    file_put_contents($file, $currentScores); // Write updated scores to the file

    echo "Score saved successfully!";
} else {
    echo "No score to save.";
}
?>
