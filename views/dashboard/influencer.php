<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Influencer Dashboard</title>
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
            padding: 0.5rem 1.25rem; 
            border-radius: 9999px; 
            font-weight: 600; 
            transition: transform 0.2s, background-color 0.2s; 
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary { background-color: #6b46c1; color: white; }
        .btn-primary:hover { background-color: #553c9a; }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1),
                        0 2px 4px -1px rgba(0,0,0,0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 12px -3px rgba(0,0,0,0.1),
                        0 4px 6px -2px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Header -->
    <div class="header-container">
        <?php include __DIR__ . '/../partials/header.php'; ?>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-4xl font-extrabold text-purple-700 mb-6 text-center">Influencer Dashboard</h1>
            
            <div class="bg-white p-6 rounded-lg shadow-md mb-8 text-center">
                <p class="text-lg font-medium">Welcome, <?= htmlspecialchars($u['name']) ?>!</p>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-4">Your Bids</h2>

            <?php if (!$bids): ?>
                <p class="text-gray-600">No bids yet.</p>
            <?php else: ?>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach ($bids as $b): ?>
                        <div class="card">
                            <h3 class="text-xl font-semibold text-purple-700 mb-2">
                                <?= htmlspecialchars($b['title']) ?>
                            </h3>
                            <p class="text-gray-600 mb-2">
                                Bid Price: 
                                <span class="font-medium">₹/ $<?= number_format($b['bid_price'],2) ?></span>
                            </p>
                            <p class="text-gray-600 mb-4">
                                Status: 
                                <span class="font-medium"><?= htmlspecialchars($b['status']) ?></span>
                            </p>
                            <a href="<?= base_url('campaigns/show') . '?id=' . (int)$b['campaign_id'] ?>" class="btn btn-primary w-full">
                                View Campaign
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-auto">
        <?php include __DIR__ . '/../partials/footer.php'; ?>
    </footer>
</body>
</html>
