<?php
class ArticlesController extends DatabaseController
{
  public function getAllArticles()
  {
    $query = "SELECT * FROM articles ORDER BY created_at DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function getArticleById($id)
  {
    $query = "SELECT * FROM articles WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
  }

  public function addArticle($title, $image, $text)
  {
    $query = "INSERT INTO articles (title, image, text) VALUES (:title, :image, :text)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':text', $text);
    return $stmt->execute();
  }
}
?>