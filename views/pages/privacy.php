<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Privacy Policy</title>
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
      <h1 class="text-4xl font-extrabold text-center mb-8">Privacy Policy</h1>
      <p class="text-gray-600 mb-10 text-center max-w-2xl mx-auto">
        Your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your personal information when you use our platform.
      </p>

      <div class="space-y-8 text-gray-700 leading-relaxed">
        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">1. Information We Collect</h2>
          <p>We may collect personal details such as your name, email address, and company information when you sign up or interact with our services. We also collect non-personal data such as browser type, device information, and usage statistics.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">2. How We Use Your Information</h2>
          <p>We use the collected data to provide, improve, and personalize our services, process transactions, communicate with you, and ensure platform security.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">3. Data Protection</h2>
          <p>We implement strict security measures to protect your information from unauthorized access, disclosure, or misuse. However, please note that no system is 100% secure.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">4. Sharing of Information</h2>
          <p>We do not sell or rent your personal information. We may share data with trusted third-party partners who help us operate the platform, always under strict confidentiality agreements.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">5. Cookies</h2>
          <p>Our website uses cookies to enhance your browsing experience, analyze site traffic, and serve personalized content. You can disable cookies in your browser settings.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">6. Your Rights</h2>
          <p>You have the right to access, update, or request deletion of your personal information. Contact us anytime for assistance with your data rights.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">7. Changes to This Policy</h2>
          <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with the updated date.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">8. Contact Us</h2>
          <p>If you have any questions about this Privacy Policy, please contact us at <a href="mailto:support@example.com" class="text-purple-600 hover:underline">support@example.com</a>.</p>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="mt-auto">
    <?php include __DIR__ . '/../partials/footer.php'; ?>
  </footer>
</body>
</html>
