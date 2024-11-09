<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facemash Style Voting Game</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #f4f4f9; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .images { display: flex; justify-content: space-around; }
        .image-container { cursor: pointer; }
        img { width: 100px; height: auto; border-radius: 10px; }
        .vote-count { font-size: 1.2em; }
    </style>
</head>
<body>

<div class="container">
    <h1>Facemash Voting</h1>
    <p>Click on the image you think is better!</p>
    
    <?php
    // Initialize or retrieve vote counts
    if (!isset($_COOKIE['image1_votes'])) { setcookie('image1_votes', 0, time() + (86400 * 30)); }
    if (!isset($_COOKIE['image2_votes'])) { setcookie('image2_votes', 0, time() + (86400 * 30)); }

    // Handle voting
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['vote'])) {
            $vote = $_POST['vote'];
            if ($vote == 'image1') {
                setcookie('image1_votes', ++$_COOKIE['image1_votes'], time() + (86400 * 30));
            } elseif ($vote == 'image2') {
                setcookie('image2_votes', ++$_COOKIE['image2_votes'], time() + (86400 * 30));
            }
        }
    }
    ?>

    <div class="images">
        <div class="image-container">
            <form method="POST">
                <input type="hidden" name="vote" value="image1">
                <button type="submit" style="border: none; background: none;">
                    <img src="https://via.placeholder.com/150" alt="Image 1">
                </button>
            </form>
            <p class="vote-count">Votes: <?= $_COOKIE['image1_votes'] ?? 0; ?></p>
        </div>
        
        <div class="image-container">
            <form method="POST">
                <input type="hidden" name="vote" value="image2">
                <button type="submit" style="border: none; background: none;">
                    <img src="https://via.placeholder.com/150" alt="Image 2">
                </button>
            </form>
            <p class="vote-count">Votes: <?= $_COOKIE['image2_votes'] ?? 0; ?></p>
        </div>
    </div>
</div>

<script>
// Optional JavaScript for dynamic effects
console.log('Facemash voting game loaded!');
</script>

</body>
</html>
