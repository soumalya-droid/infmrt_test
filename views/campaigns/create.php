<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Campaign</title>
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

        .form-input, textarea {
            width: 100%;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            outline: none;
            transition: border-color 0.2s;
        }
        .form-input:focus, textarea:focus {
            border-color: #6b46c1;
        }

        label {
            display: block;
            margin-bottom: 1rem;
            font-weight: 500;
            color: #4a5568;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
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
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white p-8 shadow-md rounded-lg">
                <h1 class="text-3xl font-extrabold text-center mb-6 text-purple-700">Post a New Campaign</h1>
                
                <form method="post" class="space-y-6">
                    <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">

                    <div>
                        <label for="title">Title</label>
                        <input id="title" name="title" required class="form-input">
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>

                    <div>
                        <label for="target_audience">Target Audience</label>
                        <input id="target_audience" name="target_audience" placeholder="e.g., 18-30, US, tech-savvy" class="form-input">
                    </div>

                    <div>
                        <label for="budget">Budget</label>
                        <input id="budget" name="budget" type="number" step="0.01" required class="form-input">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date">Start Date</label>
                            <input id="start_date" name="start_date" type="date" required class="form-input">
                        </div>
                        <div>
                            <label for="end_date">End Date</label>
                            <input id="end_date" name="end_date" type="date" required class="form-input">
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary w-full md:w-auto" type="submit">Create Campaign</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer pinned at bottom -->
    <footer class="mt-auto">
        <?php include __DIR__ . '/../partials/footer.php'; ?>
    </footer>
</body>
</html>
