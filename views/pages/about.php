<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body { font-family: 'Inter', sans-serif; background: #f7fafc; color: #2d3748; }
    .card { background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: all .3s ease; }
    .card:hover { transform: translateY(-5px); box-shadow: 0 10px 15px rgba(0,0,0,0.1); }
    .team-card { cursor: pointer; }
    .modal-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center; z-index: 100; }
    .modal-content { background: white; padding: 2rem; border-radius: 12px; max-width: 500px; width: 90%; position: relative; }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
  <!-- Header -->
  <div class="header-container">
    <?php include __DIR__ . '/../partials/header.php'; ?>
  </div>

  <!-- Main -->
  <main class="flex-grow">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-purple-600 to-indigo-500 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight">About InfluenceHub</h1>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-purple-100">
          We are the bridge between visionary brands and creative influencers, dedicated to forging authentic connections that inspire.
        </p>
      </div>
    </div>

    <!-- Our Mission Section -->
    <div class="py-16 bg-white">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-base font-semibold text-purple-600 tracking-wide uppercase">Our Mission</h2>
          <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
            Empowering Authentic Collaboration
          </p>
          <p class="mt-5 max-w-prose mx-auto text-xl text-gray-500">
            At InfluenceHub, our mission is simple: to create a transparent, efficient, and powerful platform where brands can discover and collaborate with the perfect influencers for their campaigns. We believe in the power of authentic storytelling to build communities and drive meaningful engagement. Our goal is to make influencer marketing accessible and effective for everyone.
          </p>
        </div>
      </div>
    </div>

    <!-- Team Section -->
    <div class="py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">Meet Our Team</h2>
          <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
            The passionate individuals driving our mission forward.
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Team Member Card -->
          <div class="team-card card text-center" data-name="Alex Doe" data-designation="Founder & CEO" data-bio="Alex is the visionary behind InfluenceHub, with over a decade of experience in digital marketing and tech startups. He is passionate about building platforms that solve real-world problems." data-linkedin="#" data-image="https://i.pravatar.cc/150?u=alex">
            <img class="w-32 h-32 rounded-full mx-auto mb-4" src="https://i.pravatar.cc/150?u=alex" alt="Alex Doe">
            <h3 class="text-xl font-bold">Alex Doe</h3>
            <p class="text-purple-600 font-semibold">Founder & CEO</p>
          </div>
          <!-- Team Member Card -->
          <div class="team-card card text-center" data-name="Jane Smith" data-designation="Head of Product" data-bio="Jane leads the product team, ensuring that InfluenceHub is intuitive, powerful, and always evolving. She has a keen eye for user experience and a passion for data-driven design." data-linkedin="#" data-image="https://i.pravatar.cc/150?u=jane">
            <img class="w-32 h-32 rounded-full mx-auto mb-4" src="https://i.pravatar.cc/150?u=jane" alt="Jane Smith">
            <h3 class="text-xl font-bold">Jane Smith</h3>
            <p class="text-purple-600 font-semibold">Head of Product</p>
          </div>
          <!-- Team Member Card -->
          <div class="team-card card text-center" data-name="Sam Wilson" data-designation="Lead Engineer" data-bio="Sam is the architectural mastermind behind our platform's robust and scalable infrastructure. With expertise in full-stack development, he turns complex ideas into reality." data-linkedin="#" data-image="https://i.pravatar.cc/150?u=sam">
            <img class="w-32 h-32 rounded-full mx-auto mb-4" src="https://i.pravatar.cc/150?u=sam" alt="Sam Wilson">
            <h3 class="text-xl font-bold">Sam Wilson</h3>
            <p class="text-purple-600 font-semibold">Lead Engineer</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="mt-auto">
    <?php include __DIR__ . '/../partials/footer.php'; ?>
  </footer>

  <!-- Modal -->
  <div id="teamModal" class="modal-overlay hidden">
    <div class="modal-content">
      <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
        <i class="fas fa-times text-2xl"></i>
      </button>
      <div class="text-center">
        <img id="modalImage" class="w-32 h-32 rounded-full mx-auto mb-4" src="" alt="">
        <h3 id="modalName" class="text-2xl font-bold"></h3>
        <p id="modalDesignation" class="text-purple-600 font-semibold text-lg"></p>
        <p id="modalBio" class="mt-4 text-gray-600"></p>
        <a id="modalLinkedin" href="#" target="_blank" class="mt-4 inline-block text-purple-600 hover:underline">
          <i class="fab fa-linkedin"></i> View LinkedIn
        </a>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const teamCards = document.querySelectorAll('.team-card');
      const modal = document.getElementById('teamModal');
      const closeModal = document.getElementById('closeModal');
      const modalOverlay = document.querySelector('.modal-overlay');

      teamCards.forEach(card => {
        card.addEventListener('click', () => {
          const name = card.dataset.name;
          const designation = card.dataset.designation;
          const bio = card.dataset.bio;
          const linkedin = card.dataset.linkedin;
          const image = card.dataset.image;

          document.getElementById('modalName').textContent = name;
          document.getElementById('modalDesignation').textContent = designation;
          document.getElementById('modalBio').textContent = bio;
          document.getElementById('modalLinkedin').href = linkedin;
          document.getElementById('modalImage').src = image;

          modal.classList.remove('hidden');
        });
      });

      const hideModal = () => {
        modal.classList.add('hidden');
      };

      closeModal.addEventListener('click', hideModal);
      modalOverlay.addEventListener('click', (event) => {
        if (event.target === modalOverlay) {
          hideModal();
        }
      });
    });
  </script>

</body>
</html>
