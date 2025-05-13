<?php

class CommentsController extends DatabaseController
{
  public function getAllComments($articleId)
  {
    $query = "SELECT * FROM comments WHERE article_id = :article_id ORDER BY created_at DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':article_id', $articleId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function addComment($articleId, $author, $comment)
  {
    $query = "INSERT INTO comments (article_id, author, comment) VALUES (:article_id, :author, :comment)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':article_id', $articleId, PDO::PARAM_INT);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':comment', $comment);
    return $stmt->execute();
  }
}
?>