<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body { font-family: 'Inter', sans-serif; background: #f7fafc; color: #2d3748; }
    .btn { padding: 0.75rem 1.5rem; border-radius: 9999px; font-weight: 600; transition: .2s; }
    .btn:hover { transform: translateY(-2px); }
    .btn-primary { background: #6b46c1; color: white; }
    .btn-primary:hover { background: #553c9a; }
    .card { background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 10px 15px rgba(0,0,0,0.05); }
    .input { background: #f7fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 0.75rem 1rem; width: 100%; }
    .input:focus { outline: none; border-color: #6b46c1; box-shadow: 0 0 0 2px rgba(107, 70, 193, 0.2); }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
  <!-- Header -->
  <div class="header-container">
    <?php include __DIR__ . '/../partials/header.php'; ?>
  </div>

  <!-- Main -->
  <main class="flex-grow">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <h1 class="text-4xl font-extrabold text-center mb-4">Get in Touch</h1>
      <p class="text-gray-600 mb-12 text-center max-w-2xl mx-auto">
        We'd love to hear from you! Whether you have a question about our platform, campaigns, or anything else, our team is ready to answer all your questions.
      </p>

      <?php if (flash('contact_success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6" role="alert">
          <p class="font-bold">Success!</p>
          <p><?= flash('contact_success') ?></p>
        </div>
      <?php endif; ?>
      <?php if (flash('contact_error')): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6" role="alert">
          <p class="font-bold">Error</p>
          <p><?= flash('contact_error') ?></p>
        </div>
      <?php endif; ?>

      <div class="grid md:grid-cols-2 gap-12 items-start">
        <!-- Contact Information -->
        <div class="space-y-8">
          <div class="flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-purple-100 rounded-full">
              <i class="fas fa-map-marker-alt text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
              <h3 class="text-xl font-semibold">Our Office</h3>
              <p class="text-gray-600 mt-1">123 Business Avenue, Bengaluru, Karnataka 560001, India</p>
              <a href="https://www.google.com/maps/search/?api=1&query=Bengaluru" target="_blank" class="text-purple-600 hover:underline font-semibold mt-2 inline-block">View on Map</a>
            </div>
          </div>
          <div class="flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-purple-100 rounded-full">
              <i class="fas fa-envelope text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
              <h3 class="text-xl font-semibold">Email Us</h3>
              <p class="text-gray-600 mt-1">Our support team is here to help.</p>
              <a href="mailto:business.ensaio@gmail.com" class="text-purple-600 hover:underline font-semibold mt-2 inline-block">business.ensaio@gmail.com</a>
            </div>
          </div>
          <div class="flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-purple-100 rounded-full">
              <i class="fas fa-phone text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
              <h3 class="text-xl font-semibold">Call Us</h3>
              <p class="text-gray-600 mt-1">Mon-Fri from 9am to 5pm.</p>
              <a href="tel:+919876543210" class="text-purple-600 hover:underline font-semibold mt-2 inline-block">+91-9876543210</a>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="card">
          <form action="<?= base_url('contact/send') ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
            <div class="space-y-6">
              <div>
                <label for="name" class="font-semibold text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" class="input mt-2" required>
              </div>
              <div>
                <label for="email" class="font-semibold text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" class="input mt-2" required>
              </div>
              <div>
                <label for="subject" class="font-semibold text-gray-700">Subject</label>
                <input type="text" id="subject" name="subject" class="input mt-2" required>
              </div>
              <div>
                <label for="message" class="font-semibold text-gray-700">Message</label>
                <textarea id="message" name="message" rows="5" class="input mt-2" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary w-full py-3">Send Message</button>
            </div>
          </form>
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
