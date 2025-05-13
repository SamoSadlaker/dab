<?php
require_once '_includes/_first.php';
$ac = new ArticlesController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'] ?? '';
  $image = $_POST['image'] ?? '';
  $text = $_POST['text'] ?? '';

  if (!empty($title) && !empty($text)) {
    $ac->addArticle($title, $image, $text);
    header('Location: index.php');
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

  <!-- Formulár -->
  <main class="flex-grow">
    <div class="max-w-4xl mx-auto px-4 py-10">
      <div class="bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Vytvoriť nový článok</h2>
        <form method="POST" action="" class="space-y-5">

          <!-- Titulok -->
          <div>
            <label for="title" class="block text-sm font-medium mb-1">Titulok článku</label>
            <input type="text" id="title" name="title" required
              class="w-full border border-gray-300 rounded-md px-3 py-2">
          </div>

          <!-- Obrázok URL -->
          <div>
            <label for="obrazok" class="block text-sm font-medium mb-1">URL obrázka</label>
            <input type="url" id="image" name="image" class="w-full border border-gray-300 rounded-md px-3 py-2">
          </div>

          <!-- Text článku -->
          <div>
            <label for="text" class="block text-sm font-medium mb-1">Text článku</label>
            <textarea id="text" name="text" rows="8" required
              class="w-full border border-gray-300 rounded-md px-3 py-2"></textarea>
          </div>

          <!-- Tlačidlo -->
          <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700">
            Pridať článok
          </button>
        </form>
      </div>
    </div>
  </main>

  <!-- Päta -->
  <?php require_once '_includes/footer.php'; ?>

</body>

</html>