<?php $u = current_user(); ?>
<header class="bg-white/80 backdrop-blur-lg shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Brand -->
        <a href="<?= base_url('') ?>" class="text-2xl font-bold text-gray-800">
            <span class="text-purple-700">In</span>fluence
        </a>

        <!-- Desktop Links -->
        <div class="hidden lg:flex items-center space-x-6">
            <a href="<?= base_url('') ?>" class="text-gray-600 hover:text-purple-700 font-medium transition-colors duration-300">Home</a>
            <a href="<?= base_url('campaigns') ?>" class="text-gray-600 hover:text-purple-700 font-medium transition-colors duration-300">Campaigns</a>
            <a href="<?= base_url('influencers') ?>" class="text-gray-600 hover:text-purple-700 font-medium transition-colors duration-300">Influencers</a>
            <a href="<?= base_url('contact') ?>" class="text-gray-600 hover:text-purple-700 font-medium transition-colors duration-300">Contact</a>
            <a href="<?= base_url('about') ?>" class="text-gray-600 hover:text-purple-700 font-medium transition-colors duration-300">About Us</a>
        </div>

        <!-- Right Side Buttons -->
        <div class="hidden lg:flex items-center space-x-4">
            <?php if ($u): ?>
                <a href="<?= base_url('dashboard') ?>" class="text-gray-600 hover:text-purple-700 font-medium transition-colors duration-300">Dashboard</a>
                <a href="<?= base_url('profile/edit') ?>" class="text-gray-600 hover:text-purple-700 font-medium transition-colors duration-300">Profile</a>
                <form action="<?= base_url('auth/logout') ?>" method="post" class="inline">
                    <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
                    <button type="submit" class="text-gray-600 hover:text-purple-700 font-medium transition-colors duration-300">Logout (<?= htmlspecialchars($u['name']) ?>)</button>
                </form>
            <?php else: ?>
                <!-- Login Button (Preferred Style) -->
                <a href="<?= base_url('auth/login') ?>" class="px-5 py-2 border-2 border-purple-600 text-purple-600 font-medium rounded-full hover:bg-purple-50 hover:text-purple-700 transition-all duration-300">Login</a>
                
                <!-- Register Button with Gradient and Hover Animation -->
                <a href="<?= base_url('auth/register') ?>" class="px-5 py-2 font-medium text-white rounded-full bg-gradient-to-r from-purple-600 to-indigo-500 shadow-lg hover:scale-105 hover:shadow-xl transition-transform duration-300">
                    Register
                </a>
            <?php endif; ?>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuButton" class="lg:hidden flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-800 hover:border-gray-800">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="lg:hidden hidden bg-white border-t border-gray-200">
        <a href="<?= base_url('') ?>" class="block px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-purple-700 transition-colors duration-300">Home</a>
        <a href="<?= base_url('campaigns') ?>" class="block px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-purple-700 transition-colors duration-300">Campaigns</a>
        <a href="<?= base_url('influencers') ?>" class="block px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-purple-700 transition-colors duration-300">Influencers</a>
        <a href="<?= base_url('contact') ?>" class="block px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-purple-700 transition-colors duration-300">Contact</a>
        <a href="<?= base_url('about') ?>" class="block px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-purple-700 transition-colors duration-300">About Us</a>

        <?php if ($u): ?>
            <a href="<?= base_url('dashboard') ?>" class="block px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-purple-700 transition-colors duration-300">Dashboard</a>
            <a href="<?= base_url('profile/edit') ?>" class="block px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-purple-700 transition-colors duration-300">Profile</a>
            <form action="<?= base_url('auth/logout') ?>" method="post" class="block px-6 py-3">
                <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
                <button type="submit" class="w-full text-left text-gray-600 hover:text-purple-700 transition-colors duration-300">Logout (<?= htmlspecialchars($u['name']) ?>)</button>
            </form>
        <?php else: ?>
            <!-- Mobile Login Button -->
            <a href="<?= base_url('auth/login') ?>" class="block px-6 py-3 border-2 border-purple-600 text-purple-600 font-medium rounded-full hover:bg-purple-50 hover:text-purple-700 transition-all duration-300 mb-2 text-center">Login</a>
            <!-- Mobile Register Button -->
            <a href="<?= base_url('auth/register') ?>" class="block px-6 py-3 font-medium text-white rounded-full bg-gradient-to-r from-purple-600 to-indigo-500 shadow-lg hover:scale-105 hover:shadow-xl transition-transform duration-300 text-center">Register</a>
        <?php endif; ?>
    </div>

    <script>
        const mobileButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        mobileButton.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    </script>
</header>
