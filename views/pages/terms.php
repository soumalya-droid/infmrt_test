<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms of Service</title>
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
      <h1 class="text-4xl font-extrabold text-center mb-8">Terms of Service</h1>
      <p class="text-gray-600 mb-10 text-center max-w-2xl mx-auto">
        Welcome to our platform. By accessing or using our service, you agree to be bound by these Terms of Service. Please read them carefully.
      </p>

      <div class="space-y-8 text-gray-700 leading-relaxed">
        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">1. Acceptance of Terms</h2>
          <p>By using our services, you confirm that you have read, understood, and agree to be bound by these terms. If you do not agree with any part of these terms, you must not use our services.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">2. Description of Service</h2>
          <p>Our platform provides [description of services]. We reserve the right to modify or discontinue the service at any time without notice.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">3. User Responsibilities</h2>
          <p>You are responsible for your use of the service and for any content you provide, including compliance with applicable laws, rules, and regulations. You are responsible for safeguarding your account.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">4. Prohibited Conduct</h2>
          <p>You agree not to misuse the services or help anyone else to do so. This includes, but is not limited to, engaging in illegal activities, uploading malicious content, or infringing on the rights of others.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">5. Intellectual Property</h2>
          <p>All content and materials available on our platform, including but not limited to text, graphics, website name, code, images, and logos are the intellectual property of our company and are protected by applicable copyright and trademark law.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">6. Termination</h2>
          <p>We may terminate or suspend your access to our service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">7. Disclaimer of Warranties</h2>
          <p>The service is provided on an "as is" and "as available" basis. We make no warranties, expressed or implied, and hereby disclaim and negate all other warranties.</p>
        </div>

        <div class="card">
          <h2 class="text-2xl font-semibold mb-3 text-purple-700">8. Contact Us</h2>
          <p>If you have any questions about these Terms of Service, please contact us at <a href="mailto:support@example.com" class="text-purple-600 hover:underline">support@example.com</a>.</p>
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
