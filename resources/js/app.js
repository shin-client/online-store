import { createIcons, icons } from 'lucide';

// Initialize Lucide icons
createIcons({ icons });

// Mobile menu toggle logic
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
            
            // Toggle visibility
            mobileMenu.classList.toggle('hidden');
            mobileMenuBtn.setAttribute('aria-expanded', String(!isExpanded));
            
            // Toggle icon
            const icon = mobileMenuBtn.querySelector('[data-lucide]');
            if (icon) {
                if (isExpanded) {
                    icon.setAttribute('data-lucide', 'menu');
                } else {
                    icon.setAttribute('data-lucide', 'x');
                }
                createIcons({ icons });
            }
        });
    }
});
