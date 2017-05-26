<?php

class comment extends activeRecord {

    private $userId;
    private $postId;
    private $text;
    private $creationDate;

    public function __construct() {
        parent::__construct();
        $this->id = -1;
        $this->userId = '';
        $this->postId = '';
        $this->text = '';
        $this->creationDate = '';
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getPostId() {
        return $this->postId;
    }

    public function getText() {
        return $this->text;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
        return $this;
    }

    public function setPostId($postId) {
        $this->postId = $postId;
        return $this;
    }

    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function save() {
        self::connect();
        if (self::$db->conn != null) {
            if ($this->id == -1) {
                $sql = "INSERT INTO comments (userId, postId, text) values (:userId, :postId, :text)";
                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'userId' => $this->userId,
                    'postId' => $this->postId,
                    'text' => $this->text,
                ]);
                if ($result == true) {
                    $this->id = self::$db->conn->lastInsertId();
                    return true;
                } else {
                    echo self::$db->conn->error;
                }
            } else {
                $sql = "UPDATE tweets SET userId = :userId, postId =: postId, text = :text where id = :id";
                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'id' => $this->id,
                    'userId' => $this->userId,
                    'posId' => $this->postId,
                    'text' => $this->text,
                ]);
                if ($result == true) {
                    return true;
                }
            }
        } else {
            echo "Brak polaczenia\n";
        }
        return false;
    }

    static public function loadById($id) {
        self::connect();
        $sql = "SELECT * FROM comments WHERE id=:id";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result && $stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $loadedComment = new comment();
            $loadedComment->id = $row['id'];
            $loadedComment->userId = $row['userId'];
            $loadedComment->postId = $row['postId'];
            $loadedComment->text = $row['text'];
            $loadedComment->creationDate = $row['creationDate'];
            return $loadedComment;
        }
        return null;
    }

    static public function loadAll() {
        self::connect();
        $sql = "SELECT * FROM comments ORDER BY creationDate DESC";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedComment = new tweet();
                $loadedComment->id = $row['id'];
                $loadedComment->userId = $row['userId'];
                $loadedComment->postId = $row['postId'];
                $loadedComment->text = $row['text'];
                $loadedComment->creationDate = $row['creationDate'];
                $returnTable[] = $loadedComment;
            }
        }
        return $returnTable;
    }

    static public function loadAllByPostId($id) {
        self::connect();
        $sql = "SELECT * FROM comments WHERE postId=:id ORDER BY creationDate DESC";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        $returnTable = [];
        if ($result !== false && $stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $loadedComment = new comment();
                $loadedComment->id = $row['id'];
                $loadedComment->userId = $row['userId'];
                $loadedComment->postId = $row['postId'];
                $loadedComment->text = $row['text'];
                $loadedComment->creationDate = $row['creationDate'];
                $returnTable[] = $loadedComment;
            }
            return $returnTable;
        }
    }

    public function delete() {
        if ($this->id != -1) {
            $sql = "DELETE FROM comments WHERE id=:id";
            $stmt = self::$db->conn->prepare($sql);
            $result = $stmt->execute(['id' => $this->id]);
            if ($result == true) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }

}
