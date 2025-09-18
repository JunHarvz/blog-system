<?php

class Post {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Get data from database
    public function getAll() {
        
        $stmt = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Insert data to database
    public function create($title, $body) {
        //Input Validation via backend for security
        if (empty($title)) {
            throw new Exception("Title is required");
        }
        if (strlen($body) < 100 || empty($body)) {
            throw new Exception("Body must have 100 or more characters");
        }

        $sql = "INSERT INTO posts (title, body) VALUES (:title, :body)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":title" => $title,
            ":body"  => $body
        ]);
        
        return $this->pdo->lastInsertId();
    }

    //Delete a data from database
    public function delete($id) {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":id" => $id]);

        if ($stmt->rowCount() === 0) {
            throw new Exception("Post not found");
        }
    }
}
