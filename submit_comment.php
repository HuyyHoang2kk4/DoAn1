<?php
session_start();
require "config/db.php";


if (isset($_POST['comment_text']) && isset($_POST['news_id']) && isset($_SESSION['user_id'])) {
    $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);
    $news_id = $_POST['news_id'];
    $user_id = $_SESSION['user_id'];
    

    $sql = "INSERT INTO tbl_comments (News_ID, User_ID, Comment_Text, Comment_Date,Comment_ID) 
    VALUES ($news_id, $user_id, '$comment_text', NOW())";
    if (mysqli_query($conn, $sql)) {
        header("Location: read.php?news_id=$news_id");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Dữ liệu không hợp lệ.";
}
?>  