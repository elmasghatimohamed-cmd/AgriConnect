class AgriConnect {
    constructor() {
        this.init();
    }

    init() {
        this.setupNavigation();
        this.setupForms();
        this.setupSearch();
        this.setupFilters();
        this.setupCart();
        this.setupFavorites();
        this.setupMessages();
        this.setupDashboard();
    }

    // Navigation
    setupNavigation() {
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // User dropdown
        const userDropdown = document.querySelector('.user-dropdown');
        if (userDropdown) {
            userDropdown.addEventListener('click', (e) => {
                e.stopPropagation();
                const dropdown = userDropdown.querySelector('.dropdown-menu');
                dropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', () => {
                const dropdown = userDropdown.querySelector('.dropdown-menu');
                dropdown.classList.add('hidden');
            });
        }
    }

    // Forms
    setupForms() {
        // Login form
        const loginForm = document.querySelector('#loginForm');
        if (loginForm) {
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleLogin(loginForm);
            });
        }

        // Registration forms
        const farmerForm = document.querySelector('#farmerRegisterForm');
        if (farmerForm) {
            farmerForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleRegistration(farmerForm, 'farmer');
            });
        }

        const buyerForm = document.querySelector('#buyerRegisterForm');
        if (buyerForm) {
            buyerForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleRegistration(buyerForm, 'buyer');
            });
        }

        // Password confirmation
        const passwordInputs = document.querySelectorAll('input[name="password"], input[name="password_confirm"]');
        passwordInputs.forEach(input => {
            input.addEventListener('input', () => {
                this.validatePassword();
            });
        });
    }

    // Search functionality
    setupSearch() {
        const searchInputs = document.querySelectorAll('.search-input');
        searchInputs.forEach(input => {
            let timeout;
            input.addEventListener('input', (e) => {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    this.performSearch(e.target.value, e.target.dataset.searchType);
                }, 300);
            });
        });
    }

    // Filters
    setupFilters() {
        const filterSelects = document.querySelectorAll('.filter-select');
        filterSelects.forEach(select => {
            select.addEventListener('change', () => {
                this.applyFilters();
            });
        });

        const filterInputs = document.querySelectorAll('.filter-input');
        filterInputs.forEach(input => {
            input.addEventListener('input', () => {
                this.applyFilters();
            });
        });
    }

    // Cart functionality
    setupCart() {
        // Add to cart buttons
        const addToCartBtns = document.querySelectorAll('.add-to-cart');
        addToCartBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                this.addToCart(btn.dataset.productId, btn.dataset.productName);
            });
        });

        // Cart toggle
        const cartBtn = document.querySelector('.cart-btn');
        const cartSidebar = document.querySelector('.cart-sidebar');
        if (cartBtn && cartSidebar) {
            cartBtn.addEventListener('click', () => {
                cartSidebar.classList.toggle('open');
            });
        }

        // Close cart
        const closeCartBtn = document.querySelector('.close-cart');
        if (closeCartBtn) {
            closeCartBtn.addEventListener('click', () => {
                cartSidebar.classList.remove('open');
            });
        }
    }

    // Favorites functionality
    setupFavorites() {
        const favoriteBtns = document.querySelectorAll('.favorite-btn');
        favoriteBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                this.toggleFavorite(btn.dataset.productId, btn);
            });
        });
    }

    // Messages
    setupMessages() {
        // Conversation list
        const conversationItems = document.querySelectorAll('.conversation-item');
        conversationItems.forEach(item => {
            item.addEventListener('click', () => {
                this.loadConversation(item.dataset.conversationId);
            });
        });

        // Message input
        const messageInput = document.querySelector('#messageInput');
        const sendBtn = document.querySelector('#sendMessage');
        if (messageInput && sendBtn) {
            const sendMessage = () => {
                const message = messageInput.value.trim();
                if (message) {
                    this.sendMessage(message);
                    messageInput.value = '';
                }
            };

            sendBtn.addEventListener('click', sendMessage);
            messageInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            // Auto-resize textarea
            messageInput.addEventListener('input', () => {
                messageInput.style.height = 'auto';
                messageInput.style.height = messageInput.scrollHeight + 'px';
            });
        }
    }

    // Dashboard
    setupDashboard() {
        // Stats animations
        this.animateStats();

        // Chart initialization
        this.initCharts();

        // Quick actions
        const quickActionBtns = document.querySelectorAll('.quick-action');
        quickActionBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                this.handleQuickAction(btn.dataset.action);
            });
        });
    }

    // Methods
    async handleLogin(form) {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);

        try {
            this.showLoading(form);
            
            // Simulate API call
            await new Promise(resolve => setTimeout(resolve, 1000));
            
            // Store user session
            sessionStorage.setItem('user', JSON.stringify({
                email: data.email,
                type: data.user_type,
                logged_in: true
            }));

            this.showNotification('Connexion réussie!', 'success');
            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 1500);
        } catch (error) {
            this.showNotification('Erreur lors de la connexion', 'error');
        } finally {
            this.hideLoading(form);
        }
    }

    async handleRegistration(form, userType) {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);

        if (!this.validateRegistration(data)) {
            return;
        }

        try {
            this.showLoading(form);
            
            // Simulate API call
            await new Promise(resolve => setTimeout(resolve, 1500));
            
            // Store user session
            sessionStorage.setItem('user', JSON.stringify({
                ...data,
                type: userType,
                logged_in: true
            }));

            this.showNotification('Inscription réussie!', 'success');
            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 1500);
        } catch (error) {
            this.showNotification('Erreur lors de l\'inscription', 'error');
        } finally {
            this.hideLoading(form);
        }
    }

    validatePassword() {
        const password = document.querySelector('input[name="password"]')?.value;
        const confirm = document.querySelector('input[name="password_confirm"]')?.value;
        const confirmInput = document.querySelector('input[name="password_confirm"]');
        
        if (confirmInput && password && confirm) {
            if (password !== confirm) {
                confirmInput.setCustomValidity('Les mots de passe ne correspondent pas');
            } else {
                confirmInput.setCustomValidity('');
            }
        }
    }

    validateRegistration(data) {
        const errors = [];

        if (!data.email || !data.password) {
            errors.push('Email et mot de passe sont requis');
        }

        if (data.password !== data.password_confirm) {
            errors.push('Les mots de passe ne correspondent pas');
        }

        if (errors.length > 0) {
            this.showNotification(errors.join('\n'), 'error');
            return false;
        }

        return true;
    }

    async performSearch(query, type) {
        if (!query) return;

        try {
            let endpoint = '/api/products';
            if (type === 'lands') {
                endpoint = '/api/lands';
            }

            const response = await fetch(`${endpoint}?search=${encodeURIComponent(query)}`);
            const results = await response.json();
            
            this.displaySearchResults(results, type);
        } catch (error) {
            console.error('Search error:', error);
        }
    }

    applyFilters() {
        const filters = this.collectFilters();
        this.updateDisplay(filters);
    }

    collectFilters() {
        const filters = {};
        
        document.querySelectorAll('.filter-select, .filter-input').forEach(input => {
            if (input.value) {
                filters[input.name] = input.value;
            }
        });

        return filters;
    }

    addToCart(productId, productName) {
        let cart = JSON.parse(localStorage.getItem('cart') || '[]');
        
        const existingItem = cart.find(item => item.id === productId);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({
                id: productId,
                name: productName,
                quantity: 1,
                price: 0 // Will be set from API
            });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        this.updateCartDisplay();
        this.showNotification(`${productName} ajouté au panier`, 'success');
    }

    toggleFavorite(productId, btn) {
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        
        if (favorites.includes(productId)) {
            favorites = favorites.filter(id => id !== productId);
            btn.classList.remove('active');
            btn.innerHTML = '<i class="far fa-heart"></i>';
        } else {
            favorites.push(productId);
            btn.classList.add('active');
            btn.innerHTML = '<i class="fas fa-heart"></i>';
        }

        localStorage.setItem('favorites', JSON.stringify(favorites));
    }

    async loadConversation(conversationId) {
        try {
            const response = await fetch(`/api/messages/${conversationId}`);
            const messages = await response.json();
            
            this.displayMessages(messages);
        } catch (error) {
            console.error('Error loading conversation:', error);
        }
    }

    sendMessage(message) {
        // Add message to UI immediately for better UX
        this.addMessageToUI(message, 'sent');
        
        // Simulate sending to server
        setTimeout(() => {
            this.addMessageToUI('Message reçu!', 'received');
        }, 1000);
    }

    addMessageToUI(message, type) {
        const messagesContainer = document.querySelector('.messages-container');
        if (!messagesContainer) return;

        const messageEl = document.createElement('div');
        messageEl.className = `message ${type}`;
        
        const time = new Date().toLocaleTimeString('fr-FR', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });

        messageEl.innerHTML = `
            <div class="message-content">
                <p>${message}</p>
                <span class="message-time">${time}</span>
            </div>
        `;

        messagesContainer.appendChild(messageEl);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    animateStats() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        statNumbers.forEach(stat => {
            const target = parseInt(stat.dataset.target);
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const updateNumber = () => {
                current += step;
                if (current < target) {
                    stat.textContent = Math.floor(current).toLocaleString();
                    requestAnimationFrame(updateNumber);
                } else {
                    stat.textContent = target.toLocaleString();
                }
            };

            updateNumber();
        });
    }

    initCharts() {
        // Simple chart placeholder
        const chartContainers = document.querySelectorAll('.chart-container');
        chartContainers.forEach(container => {
            container.innerHTML = `
                <div class="flex items-center justify-center h-64 bg-gray-100 rounded-lg">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-chart-line text-4xl mb-2"></i>
                        <p>Graphique disponible prochainement</p>
                    </div>
                </div>
            `;
        });
    }

    handleQuickAction(action) {
        switch (action) {
            case 'add-product':
                window.location.href = '/products/add';
                break;
            case 'rent-land':
                window.location.href = '/land-rental/add';
                break;
            case 'view-stats':
                window.location.href = '/analytics';
                break;
            default:
                console.log('Unknown action:', action);
        }
    }

    updateCartDisplay() {
        const cartCount = document.querySelector('.cart-count');
        const cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const count = cart.reduce((sum, item) => sum + item.quantity, 0);
        
        if (cartCount) {
            cartCount.textContent = count;
            cartCount.style.display = count > 0 ? 'block' : 'none';
        }
    }

    displaySearchResults(results, type) {
        // Implementation depends on the page
        console.log('Search results:', results, type);
    }

    updateDisplay(filters) {
        // Implementation depends on the page
        console.log('Applying filters:', filters);
    }

    displayMessages(messages) {
        const container = document.querySelector('.messages-container');
        if (!container) return;

        container.innerHTML = '';
        messages.forEach(message => {
            this.addMessageToUI(message.content, message.type);
        });
    }

    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.classList.add('show');
        }, 100);

        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    showLoading(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Chargement...';
        }
    }

    hideLoading(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = submitBtn.dataset.originalText || 'Envoyer';
        }
    }
}

// Initialize the app
document.addEventListener('DOMContentLoaded', () => {
    window.agriConnect = new AgriConnect();
});

// Utility functions
function formatPrice(price) {
    return new Intl.NumberFormat('fr-MA', {
        style: 'currency',
        currency: 'MAD'
    }).format(price);
}

function formatDate(date) {
    return new Intl.DateTimeFormat('fr-FR', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }).format(new Date(date));
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
