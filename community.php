<?php
include "service/database.php";
session_start();

if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
    exit();
}

if (isset($_POST['submit_post'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['username'];

    if (!empty($title) && !empty($content)) {
        $stmt = $db->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $title, $content);
        $stmt->execute();
        $stmt->close();
        header("location: community.php");
    }
}

if (isset($_POST['submit_comment'])) {
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['username'];

    if (!empty($comment)) {
        $stmt = $db->prepare("INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $post_id, $user_id, $comment);
        $stmt->execute();
        $stmt->close();
        header("location: community.php");
    }
}

$sql = "SELECT p.id AS post_id, p.title, p.content, p.created_at AS post_created_at, u.username AS post_username,
        c.id AS comment_id, c.comment, c.created_at AS comment_created_at, cu.username AS comment_username
        FROM posts p
        LEFT JOIN comments c ON p.id = c.post_id
        LEFT JOIN users u ON p.user_id = u.id
        LEFT JOIN users cu ON c.user_id = cu.id
        ORDER BY p.created_at DESC, c.created_at ASC";

$result = $db->query($sql);
$posts = [];
while ($row = $result->fetch_assoc()) {
    $post_id = $row['post_id'];
    if (!isset($posts[$post_id])) {
        $posts[$post_id] = [
            'id' => $post_id,
            'title' => $row['title'],
            'content' => $row['content'],
            'created_at' => $row['post_created_at'],
            'username' => $row['post_username'],
            'comments' => []
        ];
    }
    if ($row['comment_id'] != null) {
        $posts[$post_id]['comments'][] = [
            'comment_id' => $row['comment_id'],
            'comment' => $row['comment'],
            'comment_username' => $row['comment_username'],
            'comment_created_at' => $row['comment_created_at']
        ];
    }
}

$db->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Page</title>
<link rel="stylesheet" href="style/com.css">

</head>
<body>
        <?php include "layout/headerlogin.html" ?>
<div class="new-post-form">
    <h2>Create a New Post</h2>
    <form action="community.php" method="POST">
        <input type="text" name="title" placeholder="Post Title" required><br><br>
        <textarea name="content" placeholder="Write something..." required></textarea><br><br>
        <button type="submit" name="submit_post">Post</button>
    </form>
</div>

<hr>

<div class="posts-container">
    <h2>Community Posts</h2>

    <?php foreach ($posts as $post): ?>
        <div class="post-container">
            <h3><?= htmlspecialchars($post['title']) ?></h3>
            <p><?= htmlspecialchars($post['content']) ?></p>
            <p>Posted by <?= htmlspecialchars($post['username']) ?> on <?= $post['created_at'] ?></p>

            <div class="comment-container">
                <h4>Comments:</h4>

                <?php if (count($post['comments']) > 0): ?>
                    <?php foreach ($post['comments'] as $comment): ?>
                        <div class="comment">
                            <p><?= htmlspecialchars($comment['comment']) ?></p>
                            <p>Commented by <?= htmlspecialchars($comment['comment_username']) ?> on <?= $comment['comment_created_at'] ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No comments yet. Be the first to comment!</p>
                <?php endif; ?>
            </div>

            <div class="new-comment-form">
                <form action="community.php" method="POST">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <textarea name="comment" placeholder="Add a comment..." required></textarea><br><br>
                    <button type="submit" name="submit_comment">Comment</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>
