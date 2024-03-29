<?php

class CompteCourant {
    private $id;
    private $accountId;

    // Constructor
    public function __construct($id, $accountId) {
        $this->id = $id;
        $this->accountId = $accountId;
    }

    // Getters and setters for properties

    public function getId() {
        return $this->id;
    }

    public function getAccountId() {
        return $this->accountId;
    }

    // Methods for CRUD operations

    // Create
    public static function create($accountId) {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("INSERT INTO compte_courant (account_id) VALUES (:accountId)");
        $stmt->bindParam(':accountId', $accountId);

        return $stmt->execute();
    }

    // Read
    public static function getById($id) {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("SELECT * FROM compte_courant WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function update() {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("UPDATE compte_courant SET account_id = :accountId WHERE id = :id");
        $stmt->bindParam(':accountId', $this->accountId);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    // Delete
    public function delete() {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("DELETE FROM compte_courant WHERE id = :id");
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
}

?>
