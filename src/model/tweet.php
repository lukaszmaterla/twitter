<?php

class tweet extends activeRecord
{

    private $userId;
    private $text;
    private $creationDate;

    public function __construct()
    {
        parent::__construct();

        $this->id = -1;
        $this->userId = '';
        $this->text = '';
        $this->creationDate = '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function save()
    {
        self::connect();
        if (self::$db->conn != null) {
            if ($this->id == -1) {
                $sql = "INSERT INTO tweets (userId, text) values (:userId, :text)";
                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'userId' => $this->userId,
                    'text' => $this->text,
                    //'creationDate' => $this->creationDate
                ]);
                if ($result == true) {
                    $this->id = self::$db->conn->lastInsertId();
                    return true;
                } else {
                    echo self::$db->conn->error;
                }
            } else {
                $sql = "UPDATE tweets SET userId = :userId, text = :text where id = :id"; //creationDate = :creationDate
                $stmt = self::$db->conn->prepare($sql);
                $result = $stmt->execute([
                    'id' => $this->id,
                    'userId' => $this->userId,
                    'text' => $this->text,
                    //'creationDate' => $this->creationDate
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

    static public function loadById($id)
    {
        self::connect();
        $sql = "SELECT * FROM tweets WHERE id=:id";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result && $stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $loadedTweet = new tweet();
            $loadedTweet->id = $row['id'];
            $loadedTweet->userId = $row['userId'];
            $loadedTweet->text = $row['text'];
            $loadedTweet->creationDate = $row['creationDate'];
            return $loadedTweet;
        }
        return null;
    }

    static public function loadAll()
    {
        self::connect();
        $sql = "SELECT * FROM tweets ORDER BY creationDate DESC";
        $returnTable = [];
        if ($result = self::$db->conn->query($sql)) {
            foreach ($result as $row) {
                $loadedTweet = new tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $returnTable[] = $loadedTweet;
            }
        }
        return $returnTable;
    }

    static public function loadAllByUserId($id)
    {
        self::connect();
        $sql = "SELECT * FROM tweets WHERE userId=:id ORDER BY creationDate DESC";
        $stmt = self::$db->conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        $returnTable = [];
        if ($result !== null && $stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $loadedTweet = new tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $returnTable[] = $loadedTweet;
            }
        }
        return $returnTable;
    }

    public function delete()
    {
        if ($this->id != -1) {
            $sql = "DELETE FROM tweets WHERE id=:id";
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
