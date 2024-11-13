<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Baptiste Renneson">
    <meta name="description" content="TrysCode is an online platform to learn programming.">
    <title>TrysCode Fan Page</title>
    <link rel="stylesheet" href="static/styles/index.css">
</head>
<body>
    <h1>Welcome to the TrysCode Fan Page</h1>
    <p>Leave your comment below to share your thoughts about TrysCode!</p>

    <form action="submit_comment.php" method="post">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br>

        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" required></textarea><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
