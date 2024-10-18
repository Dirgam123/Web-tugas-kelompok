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
        
        header("Location: community.php");
        exit(); 
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

        header("Location: community.php");
        exit(); 
    }
}
$search_query = '';

if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
}

$sql = "SELECT p.id AS post_id, p.title, p.content, p.created_at AS post_created_at, u.username AS post_username,
        c.id AS comment_id, c.comment, c.created_at AS comment_created_at, cu.username AS comment_username
        FROM posts p
        LEFT JOIN comments c ON p.id = c.post_id
        LEFT JOIN users u ON p.user_id = u.id
        LEFT JOIN users cu ON c.user_id = cu.id";

if (!empty($search_query)) {
    $sql .= " WHERE p.title LIKE ? OR p.content LIKE ?";
}

$sql .= " ORDER BY p.created_at DESC, c.created_at ASC";

$stmt = $db->prepare($sql);
if (!empty($search_query)) {
    $like_query = '%' . $search_query . '%';
    $stmt->bind_param('ss', $like_query, $like_query);
}
$stmt->execute();
$result = $stmt->get_result();

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

$stmt->close();
$db->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <?php include "layout/headerlogin.html"; ?>

    <div class="container mx-auto py-12">
        <div class="bg-white p-6 rounded-lg shadow-lg mb-10">
            <h2 class="text-3xl font-bold text-blue-900 mb-6">Create a New Post</h2>
            <form action="community.php" method="POST">
                <input type="text" name="title" placeholder="Post Title" required class="w-full p-4 mb-4 border border-gray-300 rounded-lg">
                <textarea name="content" placeholder="Write something..." required class="w-full p-4 mb-4 border border-gray-300 rounded-lg"></textarea>
                <button type="submit" name="submit_post" class="bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 transition duration-300">
                    Post
                </button>
            </form>
        </div>
<div class="bg-white p-6 rounded-lg shadow-lg mb-10">
    <h2 class="text-2xl font-bold text-blue-900 mb-6">Search Forum</h2>
    <form action="community.php" method="GET" class="flex items-center space-x-4">
        <input type="text" name="search" value="<?= htmlspecialchars($search_query) ?>" placeholder="Search posts..." class="w-full p-4 border border-gray-300 rounded-lg">
        <button type="submit" class="bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 transition duration-300">
            Search
        </button>
    </form>
</div>
        <h2 class="text-4xl font-bold text-blue-900 mb-6 text-center">Community Posts</h2>
        <div class="space-y-8">

            <?php foreach ($posts as $post): ?>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-blue-700 mb-2"><?= htmlspecialchars($post['title']) ?></h3>
                <p class="text-gray-700 mb-4"><?= htmlspecialchars($post['content']) ?></p>
                <p class="text-sm text-gray-500">Posted by <?= htmlspecialchars($post['username']) ?> on <?= $post['created_at'] ?></p>

                <div class="mt-6">
                    <h4 class="text-xl font-bold text-blue-600">Comments:</h4>
                    <div class="space-y-4 mt-4">
                        <?php if (count($post['comments']) > 0): ?>
                            <?php foreach ($post['comments'] as $comment): ?>
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <p><?= htmlspecialchars($comment['comment']) ?></p>
                                <p class="text-sm text-gray-500">Commented by <?= htmlspecialchars($comment['comment_username']) ?> on <?= $comment['comment_created_at'] ?></p>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-gray-500">No comments yet. Be the first to comment!</p>
                        <?php endif; ?>
                    </div>

                    <form action="community.php" method="POST" class="mt-6">
                        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                        <textarea name="comment" placeholder="Add a comment..." required class="w-full p-4 mb-4 border border-gray-300 rounded-lg"></textarea>
                        <button type="submit" name="submit_comment" class="bg-green-500 text-white py-3 px-6 rounded-lg hover:bg-green-600 transition duration-300">
                            Comment
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

    <?php include "layout/footer.html"; ?>

</body>
</html>
