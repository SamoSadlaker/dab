<?php
require_once '_includes/_first.php';
$ac = new ArticlesController();
$cc = new CommentsController();

if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit;
}
$articleId = $_GET['id'];
$article = $ac->getArticleById($articleId);
$comments = $cc->getAllComments($articleId);

if (!$article) {
  header('Location: index.php');
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['author'] ?? '';
  $comment = $_POST['comment'] ?? '';

  if (!empty($name) && !empty($comment)) {
    $cc->addComment($articleId, $name, $comment);
    header("Location: article.php?id=$articleId");
    exit;
  }
}

?>
<!DOCTYPE html>
<html lang="sk">

<head>
  <?php require_once '_includes/head.php'; ?>
</head>

<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">

  <!-- Navigácia -->
  <?php require_once '_includes/navbar.php'; ?>

  <!-- Obsah článku -->
  <main class="flex-grow">
    <div class="max-w-4xl mx-auto px-4 py-10">

      <!-- Článok -->
      <article class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-3xl font-bold mb-4"><?= $article->title ?></h2>
        <img src="<?= $article->image ?>" alt="Obrázok článku" class="w-full h-auto rounded-lg mb-4">
        <p class="text-gray-700 leading-relaxed">
          <?= nl2br(htmlspecialchars($article->text)) ?>
        </p>
      </article>

      <!-- Formulár na komentár -->
      <section class="bg-white p-6 rounded-xl shadow-md mt-6">
        <h3 class="text-2xl font-semibold mb-4">Pridaj komentár</h3>
        <form method="post" action="" class="space-y-4">
          <div>
            <label for="author" class="block text-sm font-medium">Tvoje meno</label>
            <input type="text" id="author" name="author" class="w-full border border-gray-300 rounded-md px-3 py-2">
          </div>
          <div>
            <label for="comment" class="block text-sm font-medium">Komentár</label>
            <textarea id="comment" name="comment" rows="4"
              class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>
          </div>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Odoslať
          </button>
        </form>
      </section>

      <!-- Komentáre -->
      <section class="bg-white p-6 rounded-xl shadow-md mt-6">
        <h3 class="text-2xl font-semibold mb-4">Komentáre</h3>

        <?php if (empty($comments)): ?>
          <p class="text-gray-500">Žiadne komentáre zatiaľ.</p>
        <?php else: ?>
          <?php foreach ($comments as $comment): ?>
            <div class="mb-4 border-b border-gray-200 pb-4">
              <p class="font-semibold"><?= htmlspecialchars($comment->author) ?></p>
              <p class="text-gray-700"><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </section>
    </div>

  </main>

  <!-- Päta -->
  <?php require_once '_includes/footer.php'; ?>

</body>

</html>