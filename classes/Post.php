<?php
include_once '../config/Database.php';

class Post {
    private $db;
    private $id;
    private $user_id;
    private $title;
    private $content;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    // Setter dan Getter untuk mengatur data post
    public function setPostData($id, $user_id, $title, $content) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getPostsByUser($user_id) {
        $sql = "SELECT * FROM posts WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>