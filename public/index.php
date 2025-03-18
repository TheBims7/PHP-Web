<?php
include '../classes/User.php';
include '../classes/Post.php';
include '../classes/Admin.php';
include '../classes/Guest.php';
include '../classes/ImagePost.php';
include '../classes/VideoPost.php';

$userObj = new User();
$adminObj = new Admin();
$guestObj = new Guest();

$userObj->setUserData(1, 'John Doe', 'john@example.com');
$adminObj->setUserData(2, 'Jane Admin', 'admin@example.com');
$guestObj->setUserData(3, 'Guest User', 'guest@example.com');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna dan Postingan</title>
</head>
<body>
    <h2>Daftar Pengguna dan Postingan</h2>
    <h3>Daftar Pengguna</h3>

    <p><?php echo $userObj->getName(); ?> (<?php echo $userObj->getEmail(); ?>)</p>
    <p><?php echo $adminObj->getName(); ?> (<?php echo $adminObj->getEmail(); ?>)</p>
    <p><?php echo $guestObj->getName(); ?> (<?php echo $guestObj->getEmail(); ?>)</p>

    <?php
    $postObj = new Post();
    $posts = $postObj->getPostsByUser(1);
    while ($postRow = $posts->fetch_assoc()){
        $postObj->setPostData($postRow['id'], $postRow['user_id'], $postRow['title'], $postRow['content']);
        echo "<strong>{$postObj->getTitle()}</strong>: {$postObj->getContent()}<br>";
    }
    ?>

    <h3>Postingan Khusus</h3>
    <?php
    $imagePost = new ImagePost();
    $imagePost->setPostData(1, 1, 'Image Post', '../img/esteh.jpg');
    $videoPost = new VideoPost();
    $videoPost->setPostData(2, 1, 'Video Post', '../video/mokel.mp4');
    ?>

    <p><?php echo $imagePost->getTitle(); ?>: <br><?php echo $imagePost->getContent(); ?></p>
    <p><?php echo $videoPost->getTitle(); ?>: <br><?php echo $videoPost->getContent(); ?></p>
</body>
</html>