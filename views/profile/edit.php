<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
        .btn:hover { transform: translateY(-2px); }
        .btn-primary { background-color: #6b46c1; color: white; }
        .btn-primary:hover { background-color: #553c9a; }

        .form-input, textarea {
            width: 100%;
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            outline: none;
            transition: border-color 0.2s;
        }
        .form-input:focus, textarea:focus {
            border-color: #6b46c1;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1),
                        0 2px 4px -1px rgba(0,0,0,0.06);
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
            <h1 class="text-4xl font-extrabold text-purple-700 mb-8 text-center">Edit Profile</h1>
            
            <div class="card">
                <?php if ($u['role']==='company'): ?>
                    <form method="post" class="space-y-6">
                        <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                            <input name="company_name" class="form-input" 
                                   value="<?= htmlspecialchars($profile['company_name'] ?? '') ?>">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contact Info</label>
                            <input name="contact_info" class="form-input" 
                                   value="<?= htmlspecialchars($profile['contact_info'] ?? '') ?>">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">About</label>
                            <textarea name="bio" rows="4" class="form-input"><?= htmlspecialchars($profile['bio'] ?? '') ?></textarea>
                        </div>

                        <button class="btn btn-primary w-full" type="submit">Save</button>
                    </form>
                <?php else: ?>
                    <form method="post" class="space-y-6">
                        <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                            <textarea name="bio" rows="4" class="form-input"><?= htmlspecialchars($profile['bio'] ?? '') ?></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Niche</label>
                            <input name="niche" class="form-input" 
                                   value="<?= htmlspecialchars($profile['niche'] ?? '') ?>">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pricing Range</label>
                            <input name="pricing_range" class="form-input" 
                                   value="<?= htmlspecialchars($profile['pricing_range'] ?? '') ?>">
                        </div>

                        <button class="btn btn-primary w-full" type="submit">Save</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-auto">
        <?php include __DIR__ . '/../partials/footer.php'; ?>
    </footer>
</body>
</html>
