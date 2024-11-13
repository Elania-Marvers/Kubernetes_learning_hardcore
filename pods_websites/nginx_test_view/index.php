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

    <h2>Comments:</h2>
    <?php
    // Database connection parameters
    $host = 'postgresql-service';
    $db = 'mydatabase';
    $user = 'admin';
    $pass = 'postgrespassword';

    try {
        // Connect to PostgreSQL
        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

        // Fetch all comments
        $stmt = $conn->query("SELECT firstname, lastname, comment, created_at FROM fan_page_comment ORDER BY created_at DESC");

        // Display comments
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='comment'>";
            echo "<p><strong>" . htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['lastname']) . "</strong> wrote on " . htmlspecialchars($row['created_at']) . ":</p>";
            echo "<p>" . nl2br(htmlspecialchars($row['comment'])) . "</p>";
            echo "</div>";
        }
    } catch (PDOException $e) {
        echo "Error fetching comments: " . $e->getMessage();
    }
    ?>
</body>
</html>
