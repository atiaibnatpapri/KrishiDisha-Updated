<?php
require_once __DIR__ . '/includes/auth_check.php';
require_once __DIR__ . '/config/db.php';
$page_title = 'KrishiDisha';
$cropCount = $pdo->query("SELECT COUNT(*) FROM CROP")->fetchColumn();
$diseaseCount = $pdo->query("SELECT COUNT(*) FROM DISEASE")->fetchColumn();
$vitaminCount = $pdo->query("SELECT COUNT(*) FROM VITAMIN")->fetchColumn();
$loggedIn = isLoggedIn();
$page_has_auth_modal = true;
?>
<?php include __DIR__ . '/includes/header.php'; ?>

<main class="reference-home">
    <header class="ref-header">
        <div class="ref-container ref-header-inner">
            <a href="/KrishiDisha/index.php" class="ref-brand">
                <span class="ref-brand-mark"><i class="fa-solid fa-seedling"></i></span>
                <span>
                    <strong>KrishiDisha</strong>
                    <small>Your partner in smart farming</small>
                </span>
            </a>
            <div class="ref-actions">
                <span class="ref-hotline"><i class="fa-solid fa-phone-volume"></i> Hotline: 16123</span>
                <span class="ref-lang"><b>English</b></span>
                <?php if ($loggedIn): ?>
                    <a href="/KrishiDisha/user/marketplace.php" class="ref-icon-btn"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
                <?php else: ?>
                    <button type="button" class="ref-icon-btn ref-cart-toast-btn" id="guestCartButton"><i class="fa-solid fa-cart-shopping"></i> Cart</button>
                <?php endif; ?>
                <button type="button" class="ref-menu" id="openHomeMenu"><i class="fa-solid fa-bars"></i> Menu</button>
            </div>
        </div>
    </header>

    <div class="ref-drawer-backdrop" id="homeMenuBackdrop" hidden></div>
    <aside class="ref-drawer" id="homeMenuDrawer" aria-hidden="true">
        <div class="ref-drawer-head">
            <div class="ref-drawer-brand">
                <span>🌾</span>
                <div>
                    <strong>KrishiDisha</strong>
                    <small>Smart farming partner</small>
                </div>
            </div>
            <button type="button" id="closeHomeMenu" class="ref-drawer-close" aria-label="Close menu"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="ref-drawer-auth">
            <?php if ($loggedIn): ?>
                <p>Welcome back, <?= htmlspecialchars($_SESSION['name'] ?? 'User') ?>. Continue to your workspace.</p>
                <a href="/KrishiDisha/<?= currentRole() ?>/dashboard.php" class="primary">Dashboard</a>
            <?php else: ?>
                <p>Log in or sign up to access agricultural tools & expert advisory.</p>
                <div>
                    <button type="button" class="js-auth-open" data-tab="login">🔑 Log In</button>
                    <button type="button" class="primary js-auth-open" data-tab="signup">🚀 Sign Up</button>
                </div>
            <?php endif; ?>
        </div>
        <nav class="ref-drawer-nav">
            <span>Platform Categories</span>
            <a class="active" href="/KrishiDisha/index.php">🏠 Home Landing <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/recommend.php">🌾 Crop Recommendation & Vitamin Finder <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/disease.php">🩺 Plant AI Clinic <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/calculator.php">🧮 Profit & Cost Calculator <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/marketplace.php">🛍️ Dealer Marketplace <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/nutrition.php">🍲 Organic Food Recipes <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/tourism.php">🏡 Agro Tourism & Spots <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/consultation.php">💬 Farmers & Experts Forum <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/book_consultation.php">🎓 Agriculture Experts Consultancy <i class="fa-solid fa-chevron-right"></i></a>
            <a href="/KrishiDisha/modules/weather.php">🌦️ Live Weather Forecast <i class="fa-solid fa-chevron-right"></i></a>
        </nav>
        <div class="ref-drawer-footer">
            <span>KrishiDisha Ecosystem v2.0</span>
            <b><i class="fa-solid fa-phone-volume"></i> 16123 Helpline</b>
        </div>
    </aside>

    <div class="ref-container">
        <div class="ref-live-notice">
            <span>LIVE NOTICE</span>
            <p>Bangladesh Krishi Bank loan schemes are now available for farmers in all districts.</p>
            <b><i class="fa-solid fa-map-pin"></i> BKB Partner Helpdesk</b>
        </div>

        <section class="ref-preview">
            <div>
                <span class="ref-eyebrow">PUBLIC VISITOR GUEST PREVIEW</span>
                <h1><span>🌾</span> KrishiDisha</h1>
                <p>Explore crop guidance, disease support, market listings, agri-tourism services, and expert consultation from one unified agricultural platform.</p>
            </div>
            <button type="button" class="ref-cream-btn js-auth-open" data-tab="signup">🚀 Create Partner Account</button>
        </section>

        <section class="ref-hero-panel">
            <div class="ref-hero-copy">
                <span class="ref-pill">SMART DYNAMIC ECOSYSTEM</span>
                <h2>Sustainable Farming<br>Powered by Smart Technology</h2>
                <p>A coordinated digital platform for farmers, researchers, seed suppliers, cooks, dealers, tourists, and agricultural experts.</p>
                <a href="/KrishiDisha/modules/encyclopedia.php" class="ref-outline-btn">🧮 Crop & Soil Guidance</a>
            </div>
            <div class="ref-floating-stats">
                <span>Platform Focus</span>
                <div>
                    <strong>10+</strong>
                    <small>Crop types</small>
                </div>
                <div>
                    <strong>8</strong>
                    <small>User roles</small>
                </div>
                <div>
                    <strong>26</strong>
                    <small>Data tables</small>
                </div>
            </div>
        </section>

        <section class="ref-stat-strip">
            <div><strong><?= (int)$cropCount ?></strong><span>Crop species</span></div>
            <div><strong><?= (int)$diseaseCount ?></strong><span>Tracked diseases</span></div>
            <div><strong><?= (int)$vitaminCount ?></strong><span>Vitamins & nutrients</span></div>
            <div><strong>26</strong><span>Database tables</span></div>
        </section>

        <section class="ref-market-head">
            <div>
                <span class="ref-mini-label">Dealer Marketplace Products</span>
                <h3>Improved Seeds, Balanced Fertilizer, and Agri Solution Shop</h3>
                <p>Order agricultural supplies from approved dealers and add trusted products directly to your cart.</p>
            </div>
            <a href="/KrishiDisha/modules/marketplace.php">View Full Market →</a>
        </section>
        <div class="ref-empty-market">No marketplace listings are available right now.</div>

        <section class="ref-roles">
            <span class="ref-mini-label">WHO'S IT FOR</span>
            <h3>8 Roles, One Ecosystem</h3>
            <p>Every participant in the agricultural value chain has a dedicated, personalized dashboard.</p>
            <div class="ref-role-grid">
                <?php
                $roles = [
                    ['admin','👨‍💼','Admin','Platform oversight, approvals & commissions'],
                    ['farmer','🌾','Farmer','List produce, manage farmlands & consultations'],
                    ['dealer','🏪','Dealer','Buy from farmers, sell to consumers'],
                    ['tourist','🧳','Tourist','Book farm visits & order authentic food'],
                    ['cook','👨‍🍳','Cook','Create recipes & fulfill food orders'],
                    ['expert','🔬','Expert','Provide paid advisory to farmers'],
                    ['guide','🗺️','Guide','Lead farm visits for a daily rate'],
                    ['general','👤','General User','Browse marketplace & nutrition tools'],
                ];
                foreach ($roles as $role): ?>
                <?php if (!$loggedIn): ?>
                <button type="button" class="ref-role-card ref-role-link js-auth-open" data-tab="login" data-role="<?= $role[0] ?>">
                    <div><?= $role[1] ?></div>
                    <strong><?= $role[2] ?></strong>
                    <span><?= $role[3] ?></span>
                </button>
                <?php else: ?>
                <div class="ref-role-card">
                    <div><?= $role[1] ?></div>
                    <strong><?= $role[2] ?></strong>
                    <span><?= $role[3] ?></span>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="ref-help">
            <div>
                <span class="ref-mini-label">Live Desk Support</span>
                <h3>Contact the Agriculture Helpdesk</h3>
                <p>Reach our support team for platform issues, account approval questions, and agricultural service assistance.</p>
            </div>
            <div class="ref-phone"><i class="fa-solid fa-phone"></i><span>Official Helpline</span><strong>16123</strong></div>
            <div class="ref-help-actions">
                <small>Need account access?</small>
                <button type="button" class="js-auth-open" data-tab="login">Login</button>
                <button type="button" class="primary js-auth-open" data-tab="signup">Sign Up</button>
            </div>
        </section>
    </div>

    <footer class="ref-footer">
        <div class="ref-container ref-footer-inner">
            <div><span>🌾 KRISHIDISHA</span> © <?= date('Y') ?>. KrishiDisha. All Rights Reserved.</div>
            <p>Advancing sustainable agriculture through smart technology.</p>
        </div>
    </footer>
</main>

<div class="ref-auth-modal-backdrop" id="authModalBackdrop" hidden></div>
<section class="ref-auth-modal" id="authModal" aria-hidden="true">
    <div class="ref-auth-box">
        <div class="ref-auth-head">
            <button type="button" class="ref-auth-close" id="closeAuthModal" aria-label="Close authentication modal"><i class="fa-solid fa-xmark"></i></button>
            <span>Authentication Portal Gate</span>
            <h2>🌾 KrishiDisha</h2>
            <p>Your partner in smart farming</p>
        </div>
        <div class="ref-auth-tabs">
            <button type="button" id="authLoginTab" class="active">Login</button>
            <button type="button" id="authSignupTab">Sign Up</button>
        </div>

        <form method="POST" action="/KrishiDisha/auth/login.php" class="ref-auth-form active" id="authLoginForm">
            <div class="ref-auth-error" id="authLoginError" hidden></div>
            <input type="hidden" name="ajax_login" value="1">
            <label>Email Address</label>
            <input type="email" name="email" class="ref-auth-input" placeholder="admin@krishidisha.com" required>
            <label>Password</label>
            <input type="password" name="password" class="ref-auth-input" placeholder="Enter password" required>
            <button class="ref-auth-submit">🚀 Sign In & Open Workspace</button>
            <div class="ref-auth-credentials">
                <b>Test Credentials:</b><br>
                Admin: <code>admin@krishidisha.com</code> / <code>Admin@1234</code><br>
                Farmer: <code>karim@farmer.com</code> / <code>Test@1234</code><br>
                Tourist: <code>john@tourist.com</code> / <code>Test@1234</code>
            </div>
        </form>

        <form method="POST" action="/KrishiDisha/auth/register.php" class="ref-auth-form" id="authSignupForm">
            <div class="ref-auth-error" id="authSignupError" hidden></div>
            <div class="ref-auth-success" id="authSignupSuccess" hidden></div>
            <input type="hidden" name="ajax_register" value="1">
            <label>Select Account Role</label>
            <select name="role" class="ref-auth-input" required>
                <option value="">Select your role</option>
                <option value="farmer">Farmer</option>
                <option value="dealer">Dealer</option>
                <option value="tourist">Tourist</option>
                <option value="cook">Cook</option>
                <option value="expert">Expert</option>
                <option value="guide">Guide</option>
                <option value="general">General User</option>
            </select>
            <label>Full Name</label>
            <input type="text" name="name" class="ref-auth-input" placeholder="Your full name" required>
            <div class="ref-auth-grid">
                <div>
                    <label>Email Address</label>
                    <input type="email" name="email" class="ref-auth-input" placeholder="you@example.com" required>
                </div>
                <div>
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="ref-auth-input" placeholder="01XXXXXXXXX">
                </div>
            </div>
            <label>District Location</label>
            <input type="text" name="district" class="ref-auth-input" placeholder="Example: Rajshahi">
            <label>Bio / Farming Interest</label>
            <textarea name="bio" class="ref-auth-input" rows="2" placeholder="Tell us about your farm, business, cooking, tourism, or advisory interests"></textarea>
            <div class="ref-auth-grid">
                <div>
                    <label>Password</label>
                    <input type="password" name="password" class="ref-auth-input" placeholder="Minimum 6 characters" required>
                </div>
                <div>
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="ref-auth-input" placeholder="Repeat password" required>
                </div>
            </div>
            <div class="ref-auth-note">Farmer, Dealer, Cook, Expert, and Guide accounts require admin approval before login.</div>
            <button class="ref-auth-submit">📝 Submit Registration</button>
        </form>
    </div>
</section>

<div class="kd-toast" id="guestCartToast" role="status" aria-live="polite" hidden>
    <i class="fa-solid fa-circle-info"></i>
    <span>Please log in first to view your cart and manage orders.</span>
</div>

<script>
(() => {
    const drawer = document.getElementById('homeMenuDrawer');
    const backdrop = document.getElementById('homeMenuBackdrop');
    const open = document.getElementById('openHomeMenu');
    const close = document.getElementById('closeHomeMenu');
    if (!drawer || !backdrop || !open || !close) return;
    const setOpen = (value) => {
        drawer.classList.toggle('open', value);
        drawer.setAttribute('aria-hidden', value ? 'false' : 'true');
        backdrop.hidden = !value;
        document.body.classList.toggle('drawer-open', value);
    };
    open.addEventListener('click', () => setOpen(true));
    close.addEventListener('click', () => setOpen(false));
    backdrop.addEventListener('click', () => setOpen(false));
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') setOpen(false);
    });
})();

(() => {
    const cartButton = document.getElementById('guestCartButton');
    const toast = document.getElementById('guestCartToast');
    if (!cartButton || !toast) return;
    let timer = null;
    cartButton.addEventListener('click', () => {
        toast.hidden = false;
        window.requestAnimationFrame(() => toast.classList.add('show'));
        clearTimeout(timer);
        timer = setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => { toast.hidden = true; }, 220);
        }, 3600);
    });
})();

(() => {
    const modal = document.getElementById('authModal');
    const backdrop = document.getElementById('authModalBackdrop');
    const close = document.getElementById('closeAuthModal');
    const loginTab = document.getElementById('authLoginTab');
    const signupTab = document.getElementById('authSignupTab');
    const loginForm = document.getElementById('authLoginForm');
    const signupForm = document.getElementById('authSignupForm');
    const loginError = document.getElementById('authLoginError');
    const signupError = document.getElementById('authSignupError');
    const signupSuccess = document.getElementById('authSignupSuccess');
    if (!modal || !backdrop || !close || !loginTab || !signupTab || !loginForm || !signupForm) return;

    const setTab = (tab) => {
        const login = tab !== 'signup';
        loginTab.classList.toggle('active', login);
        signupTab.classList.toggle('active', !login);
        loginForm.classList.toggle('active', login);
        signupForm.classList.toggle('active', !login);
    };
    const setOpen = (value, tab = 'login') => {
        setTab(tab);
        modal.classList.toggle('open', value);
        modal.setAttribute('aria-hidden', value ? 'false' : 'true');
        backdrop.hidden = !value;
        document.body.classList.toggle('drawer-open', value);
    };
    document.querySelectorAll('.js-auth-open').forEach((button) => {
        button.addEventListener('click', () => setOpen(true, button.dataset.tab || 'login'));
    });
    close.addEventListener('click', () => setOpen(false));
    backdrop.addEventListener('click', () => setOpen(false));
    loginTab.addEventListener('click', () => setTab('login'));
    signupTab.addEventListener('click', () => setTab('signup'));
    loginForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        if (loginError) {
            loginError.hidden = true;
            loginError.textContent = '';
        }
        const submit = loginForm.querySelector('.ref-auth-submit');
        if (submit) {
            submit.disabled = true;
            submit.textContent = 'Signing in...';
        }
        try {
            const response = await fetch(loginForm.action, {
                method: 'POST',
                body: new FormData(loginForm),
                headers: { 'Accept': 'application/json' },
            });
            const data = await response.json();
            if (data.ok && data.redirect) {
                window.location.href = data.redirect;
                return;
            }
            if (loginError) {
                loginError.textContent = data.message || 'Login failed. Please check your credentials.';
                loginError.hidden = false;
            }
        } catch (error) {
            if (loginError) {
                loginError.textContent = 'Login failed. Please try again.';
                loginError.hidden = false;
            }
        } finally {
            if (submit) {
                submit.disabled = false;
                submit.textContent = '🚀 Sign In & Open Workspace';
            }
        }
    });
    signupForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        if (signupError) {
            signupError.hidden = true;
            signupError.textContent = '';
        }
        if (signupSuccess) {
            signupSuccess.hidden = true;
            signupSuccess.textContent = '';
        }
        const submit = signupForm.querySelector('.ref-auth-submit');
        if (submit) {
            submit.disabled = true;
            submit.textContent = 'Creating account...';
        }
        try {
            const response = await fetch(signupForm.action, {
                method: 'POST',
                body: new FormData(signupForm),
                headers: { 'Accept': 'application/json' },
            });
            const data = await response.json();
            if (data.ok) {
                if (signupSuccess) {
                    signupSuccess.textContent = data.message || 'Registration successful. You can now log in.';
                    signupSuccess.hidden = false;
                }
                signupForm.reset();
                return;
            }
            if (signupError) {
                signupError.textContent = data.message || 'Registration failed. Please check the form.';
                signupError.hidden = false;
            }
        } catch (error) {
            if (signupError) {
                signupError.textContent = 'Registration failed. Please try again.';
                signupError.hidden = false;
            }
        } finally {
            if (submit) {
                submit.disabled = false;
                submit.textContent = 'Submit Registration';
            }
        }
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') setOpen(false);
    });
    const params = new URLSearchParams(window.location.search);
    if (params.get('auth') === 'login' || params.get('auth') === 'signup') {
        setOpen(true, params.get('auth'));
        if (loginError && params.get('error') === 'session') {
            loginError.textContent = 'Please log in first to continue.';
            loginError.hidden = false;
        }
        if (loginError && params.get('error') === 'pending') {
            loginError.textContent = 'Your account is pending admin approval. Please wait.';
            loginError.hidden = false;
        }
    }
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
