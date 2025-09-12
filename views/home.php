<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Influencer Marketing Platform</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS (Animate on Scroll) Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        /* Custom Styles to match the theme */
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Inter', sans-serif;
            color: #1a202c; /* --text-dark */
        }

        :root {
            --primary-color: #6b46c1;
            --secondary-color: #4299e1;
            --text-dark: #1a202c;
            --text-light: #f7fafc;
            --bg-light: #f8f9fa;
        }

        /* Hero Section Video Background */
        .hero-section {
            position: relative;
            overflow: hidden;
        }
        #hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 0;
            transform: translateX(-50%) translateY(-50%);
            background-size: cover;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(107, 70, 193, 0.7), rgba(66, 153, 225, 0.7));
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }
        
        /* Hero text animation */
        @keyframes slideUpFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .hero-headline {
            animation: slideUpFadeIn 0.8s ease-out forwards;
        }
        .hero-subtext {
            animation: slideUpFadeIn 0.8s ease-out 0.2s forwards;
            opacity: 0; /* Start hidden */
        }
        .hero-buttons {
            animation: slideUpFadeIn 0.8s ease-out 0.4s forwards;
            opacity: 0; /* Start hidden */
        }

        /* Feature Card Hover Effect */
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .feature-card .feature-icon {
            transition: transform 0.3s ease;
        }
        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }

        /* Influencer Card Hover Effect */
        .influencer-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .influencer-card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        /* Campaign Card Hover Effect */
        .campaign-card {
             border-left: 4px solid var(--primary-color);
             transition: all 0.3s ease;
        }
        .campaign-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-color: var(--secondary-color);
        }
        
        /* Testimonial Card Styling */
        .testimonial-card {
            position: relative;
            overflow: hidden;
        }
        .testimonial-card::before {
            content: '“';
            position: absolute;
            top: -10px;
            left: 15px;
            font-size: 6rem;
            font-weight: 800;
            color: rgba(107, 70, 193, 0.1);
            z-index: 0;
            line-height: 1;
        }
        .testimonial-card p, .testimonial-card h6 {
            position: relative;
            z-index: 1;
        }

        /* Call to Action Section Styling */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        /* General Button Styles */
        .btn {
            border-radius: 9999px; /* pill shape */
            font-weight: 600;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        .btn-primary:hover {
            background-color: #553c9a; /* Darker purple */
        }
        .btn-light {
            background-color: white;
            color: var(--primary-color);
        }
        .btn-light:hover {
            background-color: #f0e6ff; /* Lighter purple tint */
        }
        .btn-outline-light {
            border: 2px solid white;
            color: white;
        }
        .btn-outline-light:hover {
            background-color: white;
            color: var(--primary-color);
        }
        .btn-outline-primary {
             border: 2px solid var(--primary-color);
             color: var(--primary-color);
             padding: 0.5rem 1.5rem;
        }
        .btn-outline-primary:hover {
             background-color: var(--primary-color);
             color: white;
        }

        /* Section Heading */
        .section-heading {
            font-size: 2.5rem;
            font-weight: 800;
        }
        
    .search-form { display: flex; gap: 0.5rem; margin-bottom: 2rem; }
    .search-input { flex: 1; padding: 0.75rem 1.25rem; border-radius: 9999px; border: 2px solid #e2e8f0; }
    .search-input:focus { border-color: #6b46c1; outline: none; }
    </style>
</head>
<body class="bg-white">

<?php include __DIR__ . '/partials/header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="hero-section text-white py-24 md:py-32">
            <video autoplay loop muted playsinline id="hero-video">
                <source src="https://videos.pexels.com/video-files/3209828/3209828-hd_1280_720_25fps.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="container mx-auto px-6 text-center">
                <div class="max-w-3xl mx-auto">
                    <h1 class="text-4xl md:text-6xl font-extrabold mb-4 leading-tight hero-headline">The Spark of Connection</h1>
                    <p class="text-lg md:text-xl mb-8 text-gray-200 hero-subtext">Connect brands with the right influencers, manage bids, and collaborate seamlessly.</p>
                    <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4 hero-buttons">
                        <a href="#campaigns" class="btn btn-light shadow-xl text-lg">Find Campaigns</a>
                        <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-light shadow-xl text-lg">Join as Influencer</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-12 text-center">
                    <div class="feature-card p-8 bg-gray-50 rounded-xl" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-bullseye fa-3x mb-4 text-purple-600 feature-icon"></i>
                        <h4 class="text-xl font-bold mb-3">Targeted Campaigns</h4>
                        <p class="text-gray-500">Reach the right audience with precise influencer matches for your brand campaigns.</p>
                    </div>
                    <div class="feature-card p-8 bg-gray-50 rounded-xl" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-handshake fa-3x mb-4 text-purple-600 feature-icon"></i>
                        <h4 class="text-xl font-bold mb-3">Seamless Collaboration</h4>
                        <p class="text-gray-500">Communicate, approve, and manage influencer bids all in one platform.</p>
                    </div>
                    <div class="feature-card p-8 bg-gray-50 rounded-xl" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-chart-line fa-3x mb-4 text-purple-600 feature-icon"></i>
                        <h4 class="text-xl font-bold mb-3">Track Performance</h4>
                        <p class="text-gray-500">Monitor campaign progress, payments, and reviews with detailed analytics.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Campaigns Section -->
        <section id="campaigns" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="section-heading text-center mb-6">Browse Campaigns</h2>
        
<?php /*
                <!-- Search Form -->
                <form method="get" class="search-form max-w-2xl mx-auto mb-12 flex gap-2">
                    <input name="q" placeholder="Search campaigns by title..." value="<?= htmlspecialchars($q) ?>" class="search-input flex-1 px-5 py-3 rounded-full border-2 border-gray-300 focus:outline-none focus:border-purple-500">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form> 
*/ ?>
        
                <!-- Campaign Grid -->
                <div id="campaigns-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($campaigns as $c): ?>
                        <div class="campaign-card-wrapper" data-aos="fade-up">
                            <a href="<?= base_url('campaigns/show') . '?id=' . (int)$c['id'] ?>" class="campaign-card bg-white rounded-lg shadow-sm p-6 flex flex-col justify-between h-full block">
                                <div>
                                    <h3 class="text-xl font-bold mb-3 campaign-title"><?= htmlspecialchars($c['title']) ?></h3>
                                    <p class="text-gray-500 mb-2">By: <span class="font-semibold text-gray-700"><?= htmlspecialchars($c['company_name']) ?></span></p>
                                    <p class="text-gray-500">Budget: <span class="font-semibold text-green-600">$<?= number_format($c['budget'],2) ?></span></p>
                                </div>
                                <span class="btn btn-primary mt-6 self-start">View Campaign</span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- All Campaigns Button -->
                <div class="text-center mt-12">
                    <a href="<?= base_url('campaigns') ?>" 
                       class="btn btn-primary px-8 py-3 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition transform duration-300 ease-in-out">
                        ALL CAMPAIGNS
                    </a>
                </div>
            </div>
        </section>

    
        <!-- Top Influencers Section -->
        <section id="influencers" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="section-heading text-center mb-12">Our Top Influencers</h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                  <!-- Influencer Card -->
                  <div class="influencer-card card" data-aos="fade-up" data-name="Olivia Chen" data-handle="@livchen" data-category="Fashion" data-bio="Olivia is a fashion icon known for her elegant style and trend-setting looks. She has collaborated with top luxury brands." data-image="https://i.pravatar.cc/300?u=olivia">
                    <img class="w-full h-48 object-cover" src="https://i.pravatar.cc/300?u=olivia" alt="Olivia Chen">
                    <div class="p-4 text-center">
                      <h3 class="text-xl font-bold">Olivia Chen</h3>
                      <p class="text-gray-500">@livchen</p>
                      <p class="mt-2 text-purple-600 font-semibold">Fashion</p>
                    </div>
                  </div>
                  <!-- Influencer Card -->
                  <div class="influencer-card card" data-aos="fade-up" data-aos-delay="100" data-name="Marko Djuric" data-handle="@markofit" data-category="Fitness" data-bio="Marko is a certified fitness trainer and nutritionist who inspires millions to lead a healthier lifestyle through his workout programs and diet plans." data-image="https://i.pravatar.cc/300?u=marko">
                    <img class="w-full h-48 object-cover" src="https://i.pravatar.cc/300?u=marko" alt="Marko Djuric">
                    <div class="p-4 text-center">
                      <h3 class="text-xl font-bold">Marko Djuric</h3>
                      <p class="text-gray-500">@markofit</p>
                      <p class="mt-2 text-purple-600 font-semibold">Fitness</p>
                    </div>
                  </div>
                  <!-- Influencer Card -->
                  <div class="influencer-card card" data-aos="fade-up" data-aos-delay="200" data-name="Aisha Khan" data-handle="@techbyaisha" data-category="Tech" data-bio="Aisha makes technology accessible and fun. Her in-depth reviews and tutorials on the latest gadgets have made her a trusted voice in the tech community." data-image="https://i.pravatar.cc/300?u=aisha">
                    <img class="w-full h-48 object-cover" src="https://i.pravatar.cc/300?u=aisha" alt="Aisha Khan">
                    <div class="p-4 text-center">
                      <h3 class="text-xl font-bold">Aisha Khan</h3>
                      <p class="text-gray-500">@techbyaisha</p>
                      <p class="mt-2 text-purple-600 font-semibold">Tech</p>
                    </div>
                  </div>
                  <!-- Influencer Card -->
                  <div class="influencer-card card" data-aos="fade-up" data-aos-delay="300" data-name="Leo Grant" data-handle="@leoslife" data-category="Lifestyle" data-bio="Leo shares his daily adventures, from travel and food to home decor. His authentic content and engaging personality have built a loyal following." data-image="https://i.pravatar.cc/300?u=leo">
                    <img class="w-full h-48 object-cover" src="https://i.pravatar.cc/300?u=leo" alt="Leo Grant">
                    <div class="p-4 text-center">
                      <h3 class="text-xl font-bold">Leo Grant</h3>
                      <p class="text-gray-500">@leoslife</p>
                      <p class="mt-2 text-purple-600 font-semibold">Lifestyle</p>
                    </div>
                  </div>
                </div>
                 <div class="text-center mt-12">
                    <a href="<?= base_url('influencers') ?>"
                       class="btn btn-primary px-8 py-3 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition transform duration-300 ease-in-out">
                        Meet All Influencers
                    </a>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="section-heading text-center mb-12">What Our Users Say</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="testimonial-card bg-white rounded-lg shadow-sm p-8" data-aos="fade-right">
                        <p class="text-gray-600 mb-6">"This platform revolutionized our marketing strategy. Finding the perfect influencers was never this easy!"</p>
                        <h6 class="font-bold text-purple-700">- Marketing Director, Shaajbari Brand</h6>
                    </div>
                    <div class="testimonial-card bg-white rounded-lg shadow-sm p-8" data-aos="fade-up">
                        <p class="text-gray-600 mb-6">"As an influencer, the collaboration process is incredibly smooth. Clear communication and timely payments."</p>
                        <h6 class="font-bold text-purple-700">- Jane Doe, Lifestyle Influencer</h6>
                    </div>
                    <div class="testimonial-card bg-white rounded-lg shadow-sm p-8" data-aos="fade-left">
                        <p class="text-gray-600 mb-6">"The analytics are a game-changer. We can finally track our ROI from influencer campaigns accurately."</p>
                        <h6 class="font-bold text-purple-700">- CEO, Tech Startup</h6>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="cta-section text-white text-center py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4" data-aos="zoom-in">Ready to Launch Your Campaign?</h2>
                <p class="text-lg md:text-xl text-purple-200 mb-8 max-w-2xl mx-auto" data-aos="zoom-in" data-aos-delay="100">Sign up today and connect with top influencers in your niche.</p>
                <a href="<?= base_url('auth/register') ?>" class="btn btn-light shadow-2xl text-lg" data-aos="zoom-in" data-aos-delay="200">Sign Up Now</a>
            </div>
        </section>
    </main>

    <!-- Influencer Modal -->
    <div id="influencerModal" class="modal-overlay hidden fixed top-0 left-0 right-0 bottom-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="modal-content bg-white p-8 rounded-lg max-w-md w-11/12 relative">
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

    <!-- Footer -->
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });

        document.addEventListener('DOMContentLoaded', () => {
            // Live search for campaigns
            const searchInput = document.getElementById('campaignSearch');
            if (searchInput) {
                const campaignCards = document.querySelectorAll('.campaign-card-wrapper');
                searchInput.addEventListener('keyup', (e) => {
                    const searchTerm = e.target.value.toLowerCase();
                    campaignCards.forEach(cardWrapper => {
                        const title = cardWrapper.querySelector('.campaign-title').textContent.toLowerCase();
                        if (title.includes(searchTerm)) {
                            cardWrapper.style.display = 'block';
                        } else {
                            cardWrapper.style.display = 'none';
                        }
                    });
                });
            }

            // Influencer Modal Logic
            const influencerCards = document.querySelectorAll('#influencers .influencer-card');
            const modal = document.getElementById('influencerModal');
            const closeModal = document.getElementById('closeModal');
            const modalOverlay = document.querySelector('.modal-overlay');

            if (modal) {
                influencerCards.forEach(card => {
                    card.addEventListener('click', () => {
                        const name = card.dataset.name;
                        const handle = card.dataset.handle;
                        const category = card.dataset.category;
                        const bio = card.dataset.bio;
                        const image = card.dataset.image;

                        modal.querySelector('#modalName').textContent = name;
                        modal.querySelector('#modalHandle').textContent = handle;
                        modal.querySelector('#modalCategory').textContent = category;
                        modal.querySelector('#modalBio').textContent = bio;
                        modal.querySelector('#modalImage').src = image;

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
            }
        });
    </script>
</body>
</html>

