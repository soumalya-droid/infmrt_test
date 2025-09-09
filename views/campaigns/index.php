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
        /* General page styling */
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f7fafc; 
            color: #2d3748; 
        }


        /* Button styling */
        .btn { 
            padding: 0.75rem 1.5rem; 
            border-radius: 9999px; 
            font-weight: 600; 
            transition: transform 0.2s, background-color 0.2s; 
        }
        .btn:hover { 
            transform: translateY(-2px); 
        }
        .btn-primary { 
            background-color: #6b46c1; 
            color: white; 
        }
        .btn-primary:hover { 
            background-color: #553c9a; 
        }

        /* Card and input styling */
        .cards {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }
        .card { 
            transition: transform 0.2s, box-shadow 0.2s; 
            border-radius: 12px;
            background-color: #ffffff;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); 
        }
        .card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #6b46c1;
            margin-bottom: 0.5rem;
        }
        .card p {
            font-size: 1rem;
            color: #4a5568;
            margin-bottom: 1rem;
        }
        .card .btn {
            display: inline-block;
        }
        
        /* Form styling */
        .search-form {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }
        .search-input {
            flex-grow: 1;
            padding: 0.75rem 1.25rem;
            border-radius: 9999px;
            border: 2px solid #e2e8f0;
            outline: none;
            transition: border-color 0.2s;
        }
        .search-input:focus {
            border-color: #6b46c1;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header Container for full-width header -->
    <div class="header-container">
        <?php include __DIR__ . '/../partials/header.php'; ?>
    </div>
    
    <!-- Main content container with consistent spacing -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-extrabold text-center mb-8">Browse Campaigns</h1>
        <form method="get" class="search-form">
            <input name="q" placeholder="Search campaigns..." value="<?= htmlspecialchars($q) ?>" class="search-input">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        <div class="cards">
        <?php foreach ($campaigns as $c): ?>
            <div class="card">
                <h3><?= htmlspecialchars($c['title']) ?></h3>
                <p>By <?= htmlspecialchars($c['company_name']) ?> — Budget: $<?= number_format($c['budget'],2) ?></p>
                <a class="btn btn-primary" href="<?= base_url('campaigns/show') . '?id=' . (int)$c['id'] ?>">View</a>
            </div>
        <?php endforeach; ?>
        </div>
        <?php include __DIR__ . '/../partials/footer.php'; ?>
    </div>
</body>
</html>
