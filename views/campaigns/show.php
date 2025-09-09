<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($c['title']) ?> – Campaign Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body { 
      font-family: 'Inter', sans-serif; 
      background-color: #f7fafc;
      color: #2d3748;
    }

    .btn {
      padding: 0.5rem 1rem;
      border-radius: 9999px;
      font-weight: 600;
      transition: transform 0.2s, background-color 0.2s;
      display: inline-block;
    }
    .btn:hover { transform: translateY(-2px); }
    .btn-primary { background: #6b46c1; color: white; }
    .btn-primary:hover { background: #553c9a; }
    .btn-alt { background: #edf2f7; color: #2d3748; }
    .btn-alt:hover { background: #e2e8f0; }

    .btn.small { padding: 0.25rem 0.75rem; font-size: 0.875rem; }

    .card {
      background: white;
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.05);
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 15px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
  <!-- Header -->
  <div class="header-container">
    <?php include __DIR__ . '/../partials/header.php'; ?>
  </div>

  <!-- Main content -->
  <main class="flex-grow">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      
      <!-- Campaign Details -->
      <div class="card">
        <h1 class="text-3xl font-extrabold mb-4 text-purple-700"><?= htmlspecialchars($c['title']) ?></h1>
        <p class="mb-2"><strong>Company:</strong> <?= htmlspecialchars($c['company_name']) ?></p>
        <p class="mb-2"><strong>Budget:</strong> $<?= number_format($c['budget'],2) ?> | 
          <strong>Status:</strong> <?= htmlspecialchars($c['status']) ?>
        </p>
        <p class="mb-4"><?= nl2br(htmlspecialchars($c['description'])) ?></p>
        <p><strong>Target Audience:</strong> <?= htmlspecialchars($c['target_audience']) ?></p>
      </div>

      <!-- Bid submission (if influencer) -->
      <?php $u = current_user(); if ($u && $u['role']==='influencer'): ?>
        <div class="card">
          <h2 class="text-2xl font-bold mb-4">Submit a Bid</h2>
          <form method="post" action="<?= base_url('bids/submit') ?>" class="space-y-4">
            <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
            <input type="hidden" name="campaign_id" value="<?= (int)$c['id'] ?>">

            <div>
              <label class="block text-sm font-medium mb-1">Bid Price</label>
              <input name="bid_price" type="number" step="0.01" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-purple-500 focus:border-purple-500">
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">Expected Reach</label>
              <input name="expected_reach" type="number"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-purple-500 focus:border-purple-500">
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">Proposal</label>
              <textarea name="proposal" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-purple-500 focus:border-purple-500"></textarea>
            </div>

            <button class="btn btn-primary w-full" type="submit">Submit Bid</button>
          </form>
        </div>
      <?php endif; ?>

      <!-- Bids -->
      <div class="card">
        <h2 class="text-2xl font-bold mb-4">Bids</h2>
        <?php if (!$bids): ?>
          <p>No bids yet.</p>
        <?php endif; ?>

        <ul class="space-y-4">
        <?php foreach ($bids as $b): ?>
          <li class="p-4 border rounded-lg bg-gray-50">
            <strong><?= htmlspecialchars($b['name']) ?></strong> — 
            $<?= number_format($b['bid_price'],2) ?> — 
            <span class="italic">Status: <?= htmlspecialchars($b['status']) ?></span>

            <div class="mt-2 space-x-2">
              <?php if ($u && $u['role']==='company' && $u['id']==$c['company_id']): ?>
                <form method="post" action="<?= base_url('bids/approve') ?>" class="inline">
                  <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
                  <input type="hidden" name="bid_id" value="<?= (int)$b['id'] ?>">
                  <button class="btn small btn-primary" type="submit">Approve</button>
                </form>

                <form method="post" action="<?= base_url('bids/reject') ?>" class="inline">
                  <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
                  <input type="hidden" name="bid_id" value="<?= (int)$b['id'] ?>">
                  <button class="btn small btn-alt" type="submit">Reject</button>
                </form>

                <a class="btn small btn-primary" 
                  href="<?= base_url('chat') . '?with=' . (int)$b['influencer_id'] . '&campaign_id=' . (int)$c['id'] ?>">
                  Chat
                </a>

              <?php elseif ($u && $u['role']==='influencer' && $u['id']==$b['influencer_id']): ?>
                <a class="btn small btn-primary" 
                  href="<?= base_url('chat') . '?with=' . (int)$c['company_id'] . '&campaign_id=' . (int)$c['id'] ?>">
                  Chat
                </a>
              <?php endif; ?>
            </div>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="mt-auto">
    <?php include __DIR__ . '/../partials/footer.php'; ?>
  </footer>
</body>
</html>
