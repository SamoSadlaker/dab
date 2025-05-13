<?php
require_once '_includes/_first.php';
$ac = new ArticlesController();

?>
<!DOCTYPE html>
<html lang="sk">

<head>
  <?php require_once '_includes/head.php'; ?>
</head>

<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">

  <!-- Navigácia -->
  <?php require_once '_includes/navbar.php'; ?>

  <!-- Zoznam článkov -->
  <main class="flex-grow max-w-6xl mx-auto px-4 py-8 space-y-6">

    <!-- Ukážkový článok -->
    <?php foreach ($ac->getAllArticles() as $article): ?>
      <article class="bg-white shadow-md rounded-xl p-5 flex gap-4">
        <img src="<?= $article->image ?>" alt="Obrázok článku" class="w-24 h-24 object-cover rounded-md">
        <div>
          <h2 class="text-xl font-semibold mb-1"><?= $article->title ?></h2>
          <p class="text-gray-700">
            <?= substr($article->text, 0, 100) ?>...
            <a href="article.php?id=<?= $article->id ?>" class="text-blue-600 hover:underline">čítať viac ...</a>
          </p>
        </div>
      </article>
    <?php endforeach; ?>



    <!-- Môžeš pridať ďalšie články rovnakým štýlom -->

  </main>

  <!-- Päta -->
  <?php require_once '_includes/footer.php'; ?>

</body>

</html>