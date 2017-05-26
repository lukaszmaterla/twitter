<?php

class message extends activeRecord {

    private $senderId;
    private $receiverId;
    private $status;
    private $textMessage;
    private $creationDate;

    public function __construct() {
        parent::__construct();
        $this->id = -1;
        $this->senderId = '';
        $this->receiverId = '';
        $this->textMessage = '';
        $this->status = '';
        $this->creationDate = '';
    }

    public function getId() {
        return $this->id;
    }

    public function getSenderId() {
        return $this->senderId;
    }

    public function getReceiverId() {
        return $this->receiverId;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTextMessage() {
        return $this->textMessage;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setSenderId($senderId) {
        $this->senderId = $senderId;
        return $this;
    }

    public function setReceiverId($receiverId) {
        $this->receiverId = $receiverId;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setTextMessage($textMessage) {
        $this->textMessage = $textMessage;
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
                $sql = "INSERT INTO messages (senderId, receiverId, textMessage) values (:senderId, :receiverId, :textMessage)";
                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'senderId' => $this->senderId,
                    'receiverId' => $this->receiverId,
                    'textMessage' => $this->textMessage,
                ]);
                if ($result == true) {
                    $this->id = self::$db->conn->lastInsertId();
                    return true;
                } else {
                    echo self::$db->conn->error;
                }
            } else {
                $sql = "UPDATE messages SET senderId=:senderId, receiverId=:receiverId, textMessage=:textMessage, `status`=:status, creationDate=:creationDate WHERE id = :id";
                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'id' => $this->getId(),
                    'senderId' => $this->senderId,
                    'receiverId' => $this->receiverId,
                    'textMessage' => $this->textMessage,
                    'status' => $this->getStatus(),
                    'creationDate' => $this->creationDate,
                ]);
                
                if ($result === true) {
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
        $sql = "SELECT * FROM messages WHERE id=:id";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result && $stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $loadedMessage = new message();
            $loadedMessage->id = $row['id'];
            $loadedMessage->senderId = $row['senderId'];
            $loadedMessage->receiverId = $row['receiverId'];
            $loadedMessage->textMessage = $row['textMessage'];
            $loadedMessage->status = $row['status'];
            $loadedMessage->creationDate = $row['creationDate'];
            return $loadedMessage;
        }
        return null;
    }

    static public function loadAll() {
        self::connect();
        $sql = "SELECT * FROM messages ORDER BY creationDate DESC";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedMessage = new message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['receiverId'];
                $loadedMessage->receiverId = $row['senderId'];
                $loadedMessage->textMessage = $row['textMessage'];
                $loadedMessage->status = $row['status'];
                $loadedMessage->creationDate = $row['creationDate'];
                $returnTable[] = $loadedMessage;
            }
        }
        return $returnTable;
    }

    static public function loadAllBySenderId($id) {
        self::connect();
        $sql = "SELECT * FROM messages WHERE senderId=:id ORDER BY creationDate DESC";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        $returnTable = [];
        if ($result !== false && $stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $loadedMessage = new message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['receiverId'];
                $loadedMessage->receiverId = $row['senderId'];
                $loadedMessage->textMessage = $row['textMessage'];
                $loadedMessage->status = $row['status'];
                $loadedMessage->creationDate = $row['creationDate'];
                $returnTable[] = $loadedMessage;
            }
            return $returnTable;
        }
    }
    static public function loadAllByReceiverId($id) {
        self::connect();
        $sql = "SELECT * FROM messages WHERE receiverId=:id ORDER BY creationDate DESC";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        $returnTable = [];
        if ($result !== false && $stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $loadedMessage = new message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['receiverId'];
                $loadedMessage->receiverId = $row['senderId'];
                $loadedMessage->textMessage = $row['textMessage'];
                $loadedMessage->status = $row['status'];
                $loadedMessage->creationDate = $row['creationDate'];
                $returnTable[] = $loadedMessage;
            }
            return $returnTable;
        }
    }

    public function delete() {
        if ($this->id != -1) {
            $sql = "DELETE FROM messages WHERE id=:id";
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
