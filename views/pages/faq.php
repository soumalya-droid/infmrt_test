<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frequently Asked Questions (FAQ)</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body { font-family: 'Inter', sans-serif; background: #f7fafc; color: #2d3748; }
    .btn { padding: 0.75rem 1.5rem; border-radius: 9999px; font-weight: 600; transition: .2s; }
    .btn:hover { transform: translateY(-2px); }
    .btn-primary { background: #6b46c1; color: white; }
    .btn-primary:hover { background: #553c9a; }
    .card { background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: .2s; }
    .card:hover { transform: translateY(-5px); box-shadow: 0 10px 15px rgba(0,0,0,0.1); }
    details > summary { list-style: none; }
    details > summary::-webkit-details-marker { display: none; }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
  <!-- Header -->
  <div class="header-container">
    <?php include __DIR__ . '/../partials/header.php'; ?>
  </div>

  <!-- Main -->
  <main class="flex-grow">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <h1 class="text-4xl font-extrabold text-center mb-8">Frequently Asked Questions</h1>
      <p class="text-gray-600 mb-10 text-center max-w-2xl mx-auto">
        Have questions? We've got answers. If you can't find what you're looking for, feel free to contact us.
      </p>

      <div class="space-y-6">
        <!-- General Questions -->
        <h2 class="text-3xl font-bold text-purple-700 mt-10 mb-4">General Questions</h2>
        <div class="card">
            <details>
                <summary class="text-xl font-semibold cursor-pointer flex justify-between items-center">
                    What is InfluenceHub?
                    <i class="fas fa-chevron-down transform transition-transform"></i>
                </summary>
                <p class="mt-4 text-gray-700 leading-relaxed">InfluenceHub is a premier platform designed to connect innovative brands with creative influencers. We streamline the process of collaboration, making it easier for brands to launch effective marketing campaigns and for influencers to monetize their content.</p>
            </details>
        </div>
        <div class="card">
            <details>
                <summary class="text-xl font-semibold cursor-pointer flex justify-between items-center">
                    Is it free to join?
                    <i class="fas fa-chevron-down transform transition-transform"></i>
                </summary>
                <p class="mt-4 text-gray-700 leading-relaxed">Yes! It is completely free for both brands and influencers to sign up and create a profile on InfluenceHub. Brands only pay when they launch a campaign, and our fees are transparently included in the campaign budget.</p>
            </details>
        </div>

        <!-- For Brands -->
        <h2 class="text-3xl font-bold text-purple-700 mt-10 mb-4">For Brands</h2>
        <div class="card">
            <details>
                <summary class="text-xl font-semibold cursor-pointer flex justify-between items-center">
                    How do I create a campaign?
                    <i class="fas fa-chevron-down transform transition-transform"></i>
                </summary>
                <p class="mt-4 text-gray-700 leading-relaxed">Once you've signed up as a brand, you can create a new campaign from your dashboard. You'll be guided through a simple process to define your campaign goals, target audience, budget, and content requirements. Once submitted, influencers can start applying.</p>
            </details>
        </div>
        <div class="card">
            <details>
                <summary class="text-xl font-semibold cursor-pointer flex justify-between items-center">
                    How does payment work for campaigns?
                    <i class="fas fa-chevron-down transform transition-transform"></i>
                </summary>
                <p class="mt-4 text-gray-700 leading-relaxed">When you create a campaign, you set a budget. Payments to influencers are held securely in escrow and are only released once you approve the content they have delivered. This ensures a secure and fair process for both parties.</p>
            </details>
        </div>

        <!-- For Influencers -->
        <h2 class="text-3xl font-bold text-purple-700 mt-10 mb-4">For Influencers</h2>
        <div class="card">
            <details>
                <summary class="text-xl font-semibold cursor-pointer flex justify-between items-center">
                    How do I find campaigns to apply for?
                    <i class="fas fa-chevron-down transform transition-transform"></i>
                </summary>
                <p class="mt-4 text-gray-700 leading-relaxed">After creating your influencer profile, you can browse all available campaigns on our platform. You can filter by category, budget, and platform to find the perfect fit for your audience. Simply submit your bid and a short proposal to apply.</p>
            </details>
        </div>
        <div class="card">
            <details>
                <summary class="text-xl font-semibold cursor-pointer flex justify-between items-center">
                    How do I get paid?
                    <i class="fas fa-chevron-down transform transition-transform"></i>
                </summary>
                <p class="mt-4 text-gray-700 leading-relaxed">Once a brand approves your submitted content for a campaign, the payment is released from escrow directly to your InfluenceHub account. You can then withdraw your earnings via our supported payment methods.</p>
            </details>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="mt-auto">
    <?php include __DIR__ . '/../partials/footer.php'; ?>
  </footer>

  <script>
    document.querySelectorAll('details').forEach((detail) => {
        detail.addEventListener('toggle', (event) => {
            const icon = detail.querySelector('i');
            if (detail.open) {
                icon.classList.add('rotate-180');
            } else {
                icon.classList.remove('rotate-180');
            }
        });
    });
  </script>
</body>
</html>
