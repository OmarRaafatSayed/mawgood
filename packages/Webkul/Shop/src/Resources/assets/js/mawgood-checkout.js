/**
 * Mawgood Modern Checkout - Enhanced Interactions
 * Based on stitch_splash_screen design pattern
 */

class MawgoodCheckout {
    constructor() {
        this.init();
    }

    init() {
        this.setupSmoothScroll();
        this.setupStepAnimations();
        this.setupQuantityChanger();
        this.setupFormValidation();
        this.setupLoadingStates();
        this.setupSuccessAnimations();
    }

    /**
     * Smooth scroll behavior for step navigation
     */
    setupSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * Animate checkout steps on transition
     */
    setupStepAnimations() {
        const steps = document.querySelectorAll('.mawgood-step');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        entry.target.style.transition = 'all 0.5s ease-out';
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, 100);
                }
            });
        }, { threshold: 0.1 });

        steps.forEach(step => observer.observe(step));
    }

    /**
     * Enhanced quantity changer with animations
     */
    setupQuantityChanger() {
        document.addEventListener('click', (e) => {
            if (e.target.closest('.mawgood-qty-btn')) {
                const button = e.target.closest('.mawgood-qty-btn');
                
                // Add pulse animation
                button.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    button.style.transform = 'scale(1)';
                }, 150);
            }
        });

        // Prevent invalid input in quantity fields
        document.querySelectorAll('.mawgood-qty-input').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value < 1) this.value = 1;
                if (this.value > 999) this.value = 999;
            });
        });
    }

    /**
     * Real-time form validation with visual feedback
     */
    setupFormValidation() {
        const inputs = document.querySelectorAll('.mawgood-input');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                this.classList.remove('border-red-500', 'border-green-500');
                
                if (this.value.trim() === '' && this.required) {
                    this.classList.add('border-red-500');
                    this.style.animation = 'shake 0.5s';
                } else if (this.value.trim() !== '') {
                    this.classList.add('border-green-500');
                }
            });

            input.addEventListener('animationend', function() {
                this.style.animation = '';
            });
        });
    }

    /**
     * Loading states for buttons
     */
    setupLoadingStates() {
        document.addEventListener('click', (e) => {
            const button = e.target.closest('.mawgood-btn-primary, .mawgood-btn-accent');
            
            if (button && button.type === 'submit') {
                const originalContent = button.innerHTML;
                
                button.disabled = true;
                button.innerHTML = `
                    <span class="mawgood-spinner inline-block"></span>
                    <span class="mr-2">جاري المعالجة...</span>
                `;

                // Reset after 5 seconds if no response
                setTimeout(() => {
                    if (button.disabled) {
                        button.disabled = false;
                        button.innerHTML = originalContent;
                    }
                }, 5000);
            }
        });
    }

    /**
     * Success page animations
     */
    setupSuccessAnimations() {
        if (document.querySelector('.mawgood-success-icon')) {
            this.triggerConfetti();
            this.animateOrderDetails();
        }
    }

    /**
     * Confetti animation for success page
     */
    triggerConfetti() {
        const colors = ['#FF6D00', '#003366', '#D4A017', '#4CAF50'];
        const confettiCount = 50;
        
        for (let i = 0; i < confettiCount; i++) {
            setTimeout(() => {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.cssText = `
                    position: fixed;
                    width: ${Math.random() * 10 + 5}px;
                    height: ${Math.random() * 10 + 5}px;
                    background: ${colors[Math.floor(Math.random() * colors.length)]};
                    left: ${Math.random() * 100}%;
                    top: -20px;
                    border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
                    animation: confetti-fall ${Math.random() * 2 + 2}s linear;
                    pointer-events: none;
                    z-index: 9999;
                `;
                
                document.body.appendChild(confetti);
                
                setTimeout(() => confetti.remove(), 4000);
            }, i * 30);
        }
    }

    /**
     * Animate order details on success page
     */
    animateOrderDetails() {
        const details = document.querySelectorAll('.mawgood-card > div');
        
        details.forEach((detail, index) => {
            detail.style.opacity = '0';
            detail.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                detail.style.transition = 'all 0.5s ease-out';
                detail.style.opacity = '1';
                detail.style.transform = 'translateY(0)';
            }, 300 + (index * 100));
        });
    }

    /**
     * Update cart summary in real-time
     */
    updateCartSummary(data) {
        const summary = document.querySelector('.mawgood-summary');
        if (!summary) return;

        // Animate the update
        summary.style.transition = 'opacity 0.3s';
        summary.style.opacity = '0.5';

        setTimeout(() => {
            // Update content here
            summary.style.opacity = '1';
        }, 300);
    }

    /**
     * Show notification toast
     */
    showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-xl shadow-lg transform transition-all duration-300 ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        } text-white font-semibold`;
        toast.textContent = message;
        toast.style.transform = 'translateX(400px)';
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.transform = 'translateX(0)';
        }, 100);

        setTimeout(() => {
            toast.style.transform = 'translateX(400px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    /**
     * Validate checkout step before proceeding
     */
    validateStep(stepName) {
        const step = document.querySelector(`[data-step="${stepName}"]`);
        if (!step) return true;

        const inputs = step.querySelectorAll('input[required], select[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('border-red-500');
                input.style.animation = 'shake 0.5s';
            }
        });

        return isValid;
    }

    /**
     * Save form data to localStorage for recovery
     */
    saveFormData() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('input', () => {
                const formData = new FormData(form);
                const data = Object.fromEntries(formData);
                localStorage.setItem('mawgood_checkout_data', JSON.stringify(data));
            });
        });
    }

    /**
     * Restore form data from localStorage
     */
    restoreFormData() {
        const savedData = localStorage.getItem('mawgood_checkout_data');
        
        if (savedData) {
            const data = JSON.parse(savedData);
            
            Object.keys(data).forEach(key => {
                const input = document.querySelector(`[name="${key}"]`);
                if (input) {
                    input.value = data[key];
                }
            });
        }
    }
}

// Add shake animation
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        75% { transform: translateX(10px); }
    }

    @keyframes confetti-fall {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
        100% {
            transform: translateY(100vh) rotate(720deg);
            opacity: 0;
        }
    }

    .mawgood-transition {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
`;
document.head.appendChild(style);

// Initialize on DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.mawgoodCheckout = new MawgoodCheckout();
    });
} else {
    window.mawgoodCheckout = new MawgoodCheckout();
}

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = MawgoodCheckout;
}
