<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Browse Campaigns</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body { font-family: 'Inter', sans-serif; background: #f7fafc; color: #2d3748; }
    .btn { padding: 0.75rem 1.5rem; border-radius: 9999px; font-weight: 600; transition: .2s; }
    .btn:hover { transform: translateY(-2px); }
    .btn-primary { background: #6b46c1; color: white; }
    .btn-primary:hover { background: #553c9a; }
    .cards { display: grid; gap: 1.5rem; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); }
    .card { background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: .2s; }
    .card:hover { transform: translateY(-5px); box-shadow: 0 10px 15px rgba(0,0,0,0.1); }
    .search-form { display: flex; gap: 0.5rem; margin-bottom: 2rem; }
    .search-input { flex: 1; padding: 0.75rem 1.25rem; border-radius: 9999px; border: 2px solid #e2e8f0; }
    .search-input:focus { border-color: #6b46c1; outline: none; }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
  <!-- Header -->
  <div class="header-container">
    <?php include __DIR__ . '/../partials/header.php'; ?>
  </div>

  <!-- Main -->
  <main class="flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <h1 class="text-4xl font-extrabold text-center mb-8">Browse Campaigns</h1>
      <form method="get" class="search-form">
        <input name="q" placeholder="Search campaigns..." value="<?= htmlspecialchars($q) ?>" class="search-input">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
      <div class="cards">
        <?php foreach ($campaigns as $c): ?>
          <div class="card">
            <h3 class="text-xl font-bold text-purple-700 mb-2"><?= htmlspecialchars($c['title']) ?></h3>
            <p class="mb-4">By <?= htmlspecialchars($c['company_name']) ?> — Budget: $<?= number_format($c['budget'],2) ?></p>
            <a class="btn btn-primary" href="<?= base_url('campaigns/show') . '?id=' . (int)$c['id'] ?>">View</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="mt-auto">
    <?php include __DIR__ . '/../partials/footer.php'; ?>
  </footer>
</body>
</html>
