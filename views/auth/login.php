<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
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

        .form-input {
            width: 100%;
            padding: 0.75rem 1.25rem;
            border-radius: 9999px;
            border: 2px solid #e2e8f0;
            outline: none;
            transition: border-color 0.2s;
        }
        .form-input:focus {
            border-color: #6b46c1;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Header -->
    <div class="header-container">
        <?php require_once __DIR__ . '/../partials/header.php'; ?>
    </div>

    <!-- Main container -->
    <main class="flex-grow">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white p-8 shadow-md rounded-lg">
                <h2 class="text-3xl font-extrabold text-center mb-6 text-purple-700">
                    Sign in to your account
                </h2>
                
                <form class="space-y-6" action="<?= base_url('auth/login') ?>" method="POST">
                    <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="form-input mt-2">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="form-input mt-2">
                    </div>

                    <div>
                        <button type="submit" class="w-full btn btn-primary">
                            Sign in
                        </button>
                    </div>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">Or log in as a demo user:</p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-4">
                        <button id="demoBrand" type="button" class="w-full btn bg-gray-200 text-gray-700 hover:bg-gray-300">Brand</button>
                        <button id="demoInfluencer" type="button" class="w-full btn bg-gray-200 text-gray-700 hover:bg-gray-300">Influencer</button>
                    </div>
                </div>

                <p class="mt-6 text-center text-sm text-gray-600">
                    No account? 
                    <a href="<?= base_url('auth/register') ?>" class="font-medium text-purple-600 hover:text-purple-500">
                        Create one here
                    </a>
                </p>
            </div>
        </div>
    </main>

    <!-- Footer pinned at bottom -->
    <footer class="mt-auto">
        <?php require_once __DIR__ . '/../partials/footer.php'; ?>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            const demoBrandBtn = document.getElementById('demoBrand');
            const demoInfluencerBtn = document.getElementById('demoInfluencer');

            demoBrandBtn.addEventListener('click', () => {
                emailInput.value = 'brand@demo.com';
                passwordInput.value = 'brand123';
            });

            demoInfluencerBtn.addEventListener('click', () => {
                emailInput.value = 'influencer@demo.com';
                passwordInput.value = 'influencer123';
            });
        });
    </script>
</body>
</html>
