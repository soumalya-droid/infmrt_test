<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Influencers</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body { font-family: 'Inter', sans-serif; background: #f7fafc; color: #2d3748; }
    .btn { padding: 0.5rem 1rem; border-radius: 9999px; font-weight: 600; transition: .2s; }
    .btn-primary { background: #6b46c1; color: white; }
    .btn-primary:hover { background: #553c9a; }
    .card { background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: all .3s ease; overflow: hidden; }
    .card:hover { transform: translateY(-5px); box-shadow: 0 10px 15px rgba(0,0,0,0.1); }
    .influencer-card { cursor: pointer; }
    .modal-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.6); display: flex; align-items: center; justify-content: center; z-index: 100; transition: opacity 0.3s ease; }
    .modal-content { background: white; padding: 2rem; border-radius: 12px; max-width: 500px; width: 90%; position: relative; transform: scale(0.95); transition: transform 0.3s ease; }
    .filter-btn { border: 1px solid #e2e8f0; }
    .filter-btn.active { background-color: #6b46c1; color: white; border-color: #6b46c1; }
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
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight">Our Influencers</h1>
        <p class="mt-6 max-w-2xl mx-auto text-xl text-purple-100">
          Meet the creative minds and trendsetters who bring campaigns to life.
        </p>
      </div>
    </div>

    <!-- Filters and Grid Section -->
    <div class="py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Buttons -->
        <div id="filter-container" class="flex justify-center flex-wrap gap-4 mb-12">
          <button class="filter-btn btn active" data-filter="all">All</button>
          <button class="filter-btn btn" data-filter="Fashion">Fashion</button>
          <button class="filter-btn btn" data-filter="Fitness">Fitness</button>
          <button class="filter-btn btn" data-filter="Tech">Tech</button>
          <button class="filter-btn btn" data-filter="Lifestyle">Lifestyle</button>
        </div>

        <!-- Influencers Grid -->
        <div id="influencers-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
          <!-- Influencer Card -->
          <div class="influencer-card card" data-category="Fashion" data-name="Olivia Chen" data-handle="@livchen" data-bio="Olivia is a fashion icon known for her elegant style and trend-setting looks. She has collaborated with top luxury brands." data-image="https://i.pravatar.cc/300?u=olivia">
            <img class="w-full h-48 object-cover" src="https://i.pravatar.cc/300?u=olivia" alt="Olivia Chen">
            <div class="p-4">
              <h3 class="text-xl font-bold">Olivia Chen</h3>
              <p class="text-gray-500">@livchen</p>
              <p class="mt-2 text-purple-600 font-semibold">Fashion</p>
              <button class="btn btn-primary mt-4 w-full view-profile-btn">View Profile</button>
            </div>
          </div>
          <!-- Influencer Card -->
          <div class="influencer-card card" data-category="Fitness" data-name="Marko Djuric" data-handle="@markofit" data-bio="Marko is a certified fitness trainer and nutritionist who inspires millions to lead a healthier lifestyle through his workout programs and diet plans." data-image="https://i.pravatar.cc/300?u=marko">
            <img class="w-full h-48 object-cover" src="https://i.pravatar.cc/300?u=marko" alt="Marko Djuric">
            <div class="p-4">
              <h3 class="text-xl font-bold">Marko Djuric</h3>
              <p class="text-gray-500">@markofit</p>
              <p class="mt-2 text-purple-600 font-semibold">Fitness</p>
              <button class="btn btn-primary mt-4 w-full view-profile-btn">View Profile</button>
            </div>
          </div>
          <!-- Influencer Card -->
          <div class="influencer-card card" data-category="Tech" data-name="Aisha Khan" data-handle="@techbyaisha" data-bio="Aisha makes technology accessible and fun. Her in-depth reviews and tutorials on the latest gadgets have made her a trusted voice in the tech community." data-image="https://i.pravatar.cc/300?u=aisha">
            <img class="w-full h-48 object-cover" src="https://i.pravatar.cc/300?u=aisha" alt="Aisha Khan">
            <div class="p-4">
              <h3 class="text-xl font-bold">Aisha Khan</h3>
              <p class="text-gray-500">@techbyaisha</p>
              <p class="mt-2 text-purple-600 font-semibold">Tech</p>
              <button class="btn btn-primary mt-4 w-full view-profile-btn">View Profile</button>
            </div>
          </div>
          <!-- Influencer Card -->
          <div class="influencer-card card" data-category="Lifestyle" data-name="Leo Grant" data-handle="@leoslife" data-bio="Leo shares his daily adventures, from travel and food to home decor. His authentic content and engaging personality have built a loyal following." data-image="https://i.pravatar.cc/300?u=leo">
            <img class="w-full h-48 object-cover" src="https://i.pravatar.cc/300?u=leo" alt="Leo Grant">
            <div class="p-4">
              <h3 class="text-xl font-bold">Leo Grant</h3>
              <p class="text-gray-500">@leoslife</p>
              <p class="mt-2 text-purple-600 font-semibold">Lifestyle</p>
              <button class="btn btn-primary mt-4 w-full view-profile-btn">View Profile</button>
            </div>
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
  <div id="influencerModal" class="modal-overlay hidden">
    <div class="modal-content">
      <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
        <i class="fas fa-times text-2xl"></i>
      </button>
      <div class="text-center">
        <img id="modalImage" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover" src="" alt="">
        <h3 id="modalName" class="text-2xl font-bold"></h3>
        <p id="modalHandle" class="text-gray-500 text-lg"></p>
        <p id="modalCategory" class="mt-2 text-purple-600 font-semibold"></p>
        <p id="modalBio" class="mt-4 text-gray-600"></p>
        <div class="mt-6 flex justify-center space-x-4 text-2xl">
            <a href="#" class="text-gray-500 hover:text-purple-700"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-500 hover:text-purple-700"><i class="fab fa-youtube"></i></a>
            <a href="#" class="text-gray-500 hover:text-purple-700"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const filterButtons = document.querySelectorAll('.filter-btn');
      const influencerCards = document.querySelectorAll('.influencer-card');
      const modal = document.getElementById('influencerModal');
      const closeModal = document.getElementById('closeModal');
      const modalOverlay = document.querySelector('.modal-overlay');

      // Filter logic
      filterButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Update active button style
          filterButtons.forEach(btn => btn.classList.remove('active'));
          button.classList.add('active');

          const filter = button.dataset.filter;

          influencerCards.forEach(card => {
            if (filter === 'all' || card.dataset.category === filter) {
              card.style.display = 'block';
            } else {
              card.style.display = 'none';
            }
          });
        });
      });

      // Modal logic
      influencerCards.forEach(card => {
        card.addEventListener('click', (e) => {
            // only open modal if not clicking a button inside card
            if(e.target.tagName.toLowerCase() === 'button') {
                 e.stopPropagation();
                 // could link button to a full profile page in future
                 return;
            }

          const name = card.dataset.name;
          const handle = card.dataset.handle;
          const category = card.dataset.category;
          const bio = card.dataset.bio;
          const image = card.dataset.image;

          document.getElementById('modalName').textContent = name;
          document.getElementById('modalHandle').textContent = handle;
          document.getElementById('modalCategory').textContent = category;
          document.getElementById('modalBio').textContent = bio;
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
