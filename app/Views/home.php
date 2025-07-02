<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-star"></i>
            <span>Selamat Datang</span>
        </div>
        <h1 class="hero-title">
            <span class="gradient-text">Modern</span> Content Management
            <br>
            <span class="highlight-text">Dashboard</span>
        </h1>
        <p class="hero-description">
            Platform terpadu untuk mengelola artikel, konten, dan informasi dengan antarmuka yang modern dan user-friendly.
            Nikmati pengalaman pengelolaan konten yang efisien dan menyenangkan.
        </p>
        <div class="hero-buttons">
            <a href="<?= base_url('/artikel'); ?>" class="btn btn-primary">
                <i class="fas fa-newspaper"></i>
                Lihat Artikel
            </a>
            <a href="<?= base_url('/admin/artikel'); ?>" class="btn btn-secondary">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard Admin
            </a>
        </div>
    </div>
    <div class="hero-visual">
        <div class="floating-card card-1">
            <i class="fas fa-newspaper"></i>
            <span>Artikel</span>
        </div>
        <div class="floating-card card-2">
            <i class="fas fa-chart-line"></i>
            <span>Analytics</span>
        </div>
        <div class="floating-card card-3">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </div>
        <div class="hero-shape"></div>
    </div>
</div>

<!-- Features Section -->
<div class="features-section">
    <div class="section-header">
        <h2 class="section-title">
            <i class="fas fa-magic"></i>
            Fitur Unggulan
        </h2>
        <p class="section-subtitle">Kelola konten dengan mudah menggunakan fitur-fitur canggih kami</p>
    </div>

    <div class="features-grid">
        <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-icon">
                <i class="fas fa-edit"></i>
            </div>
            <h3>Editor Modern</h3>
            <p>Interface yang intuitif untuk membuat dan mengedit artikel dengan mudah</p>
            <a href="<?= base_url('/admin/artikel/add'); ?>" class="feature-link">
                Coba Sekarang <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-icon">
                <i class="fas fa-images"></i>
            </div>
            <h3>Media Manager</h3>
            <p>Upload dan kelola gambar dengan sistem yang responsive dan modern</p>
            <a href="<?= base_url('/admin/artikel'); ?>" class="feature-link">
                Kelola Media <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-icon">
                <i class="fas fa-mobile-alt"></i>
            </div>
            <h3>Responsive Design</h3>
            <p>Tampilan yang optimal di semua perangkat, dari desktop hingga mobile</p>
            <a href="<?= base_url('/artikel'); ?>" class="feature-link">
                Lihat Demo <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h3>Keamanan Tinggi</h3>
            <p>Sistem autentikasi dan otorisasi yang aman untuk melindungi data</p>
            <a href="<?= base_url('/user/login'); ?>" class="feature-link">
                Login Aman <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="stats-section">
    <div class="stats-container">
        <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
            <div class="stat-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-number" id="articles-count">0</div>
            <div class="stat-label">Total Artikel</div>
        </div>

        <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
            <div class="stat-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div class="stat-number" id="views-count">0</div>
            <div class="stat-label">Total Views</div>
        </div>

        <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number" id="users-count">0</div>
            <div class="stat-label">Active Users</div>
        </div>

        <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-number" id="uptime-count">0</div>
            <div class="stat-label">Uptime Days</div>
        </div>
    </div>
</div>

<!-- Recent Articles Section -->
<div class="recent-articles-section">
    <div class="section-header">
        <h2 class="section-title">
            <i class="fas fa-fire"></i>
            Artikel Terbaru
        </h2>
        <p class="section-subtitle">Temukan artikel-artikel menarik yang baru saja dipublikasikan</p>
    </div>

    <div class="articles-preview" id="recent-articles">
        <!-- Articles will be loaded here via JavaScript -->
        <div class="loading-articles">
            <i class="fas fa-spinner fa-spin"></i>
            <p>Memuat artikel terbaru...</p>
        </div>
    </div>

    <div class="view-all-container">
        <a href="<?= base_url('/artikel'); ?>" class="btn btn-outline">
            <i class="fas fa-th-large"></i>
            Lihat Semua Artikel
        </a>
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section">
    <div class="cta-content">
        <h2>Siap Memulai?</h2>
        <p>Bergabunglah dengan platform modern untuk mengelola konten dengan mudah dan efisien</p>
        <div class="cta-buttons">
            <a href="<?= base_url('/user/login'); ?>" class="btn btn-primary">
                <i class="fas fa-rocket"></i>
                Mulai Sekarang
            </a>
            <a href="<?= base_url('/about'); ?>" class="btn btn-outline">
                <i class="fas fa-info-circle"></i>
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</div>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<style>
/* Home Page Styles */
.hero-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: center;
    padding: 3rem 0;
    min-height: 70vh;
}

.hero-content {
    animation: slideInLeft 0.8s ease-out;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 1.5rem;
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    color: var(--dark-color);
}

.gradient-text {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.highlight-text {
    color: var(--warning-color);
    position: relative;
}

.highlight-text::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 8px;
    background: linear-gradient(135deg, var(--warning-color), #fbbf24);
    opacity: 0.3;
    border-radius: 4px;
}

.hero-description {
    font-size: 1.2rem;
    line-height: 1.6;
    color: #6b7280;
    margin-bottom: 2rem;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.4);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(139, 69, 19, 0.6);
}

.btn-secondary {
    background: var(--primary-color);
    color: white;
    border: 2px solid var(--primary-color);
}

.btn-secondary:hover {
    background: var(--secondary-color);
    color: white;
    transform: translateY(-3px);
}

.btn-outline {
    background: transparent;
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
}

.btn-outline:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-3px);
}

/* Hero Visual */
.hero-visual {
    position: relative;
    height: 500px;
    animation: slideInRight 0.8s ease-out;
}

.floating-card {
    position: absolute;
    background: white;
    padding: 1.5rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    animation: float 6s ease-in-out infinite;
}

.floating-card i {
    font-size: 2rem;
    color: var(--primary-color);
}

.floating-card span {
    font-weight: 600;
    color: var(--dark-color);
}

.card-1 {
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.card-2 {
    top: 10%;
    right: 20%;
    animation-delay: 2s;
}

.card-3 {
    bottom: 30%;
    right: 10%;
    animation-delay: 4s;
}

.hero-shape {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    height: 300px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    opacity: 0.1;
    animation: rotate 20s linear infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes rotate {
    from { transform: translate(-50%, -50%) rotate(0deg); }
    to { transform: translate(-50%, -50%) rotate(360deg); }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Features Section */
.features-section {
    padding: 4rem 0;
    background: linear-gradient(135deg, #FFF8DC, #F5E6D3);
    border-radius: 30px;
    margin: 3rem 0;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.section-title i {
    color: var(--primary-color);
}

.section-subtitle {
    font-size: 1.1rem;
    color: #6b7280;
    max-width: 600px;
    margin: 0 auto;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    padding: 0 2rem;
}

.feature-card {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid rgba(139, 69, 19, 0.1);
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    border-color: var(--primary-color);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    box-shadow: 0 10px 30px rgba(139, 69, 19, 0.3);
}

.feature-icon i {
    font-size: 2rem;
    color: white;
}

.feature-card h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.feature-card p {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.feature-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.feature-link:hover {
    color: var(--secondary-color);
    transform: translateX(5px);
}

/* Stats Section */
.stats-section {
    padding: 3rem 0;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 30px;
    margin: 3rem 0;
    color: white;
}

.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    padding: 0 2rem;
}

.stat-item {
    text-align: center;
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}

.stat-icon i {
    font-size: 1.5rem;
    color: white;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 1rem;
    opacity: 0.9;
}

/* Recent Articles Section */
.recent-articles-section {
    padding: 4rem 0;
}

.articles-preview {
    margin-bottom: 3rem;
}

.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.article-preview-card {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid rgba(99, 102, 241, 0.1);
}

.article-preview-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.article-preview-header {
    margin-bottom: 1rem;
}

.article-preview-header h4 {
    margin: 0 0 0.5rem 0;
    font-size: 1.3rem;
    font-weight: 600;
}

.article-preview-header h4 a {
    color: var(--dark-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.article-preview-header h4 a:hover {
    color: var(--primary-color);
}

.article-date {
    color: #6b7280;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.article-excerpt {
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.read-more {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: var(--secondary-color);
    transform: translateX(5px);
}

.loading-articles {
    text-align: center;
    padding: 3rem;
    color: #6b7280;
}

.loading-articles i {
    font-size: 2rem;
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.no-articles {
    text-align: center;
    padding: 3rem;
    color: #6b7280;
}

.no-articles i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #d1d5db;
}

.no-articles h4 {
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.error-loading {
    text-align: center;
    padding: 3rem;
    color: #ef4444;
}

.error-loading i {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.view-all-container {
    text-align: center;
}

/* CTA Section */
.cta-section {
    padding: 4rem 0;
    background: linear-gradient(135deg, #1f2937, #374151);
    border-radius: 30px;
    margin: 3rem 0;
    color: white;
    text-align: center;
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: white;
}

.cta-content p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }

    .hero-title {
        font-size: 2.5rem;
    }

    .hero-visual {
        height: 300px;
    }

    .floating-card {
        padding: 1rem;
    }

    .features-grid {
        grid-template-columns: 1fr;
        padding: 0 1rem;
    }

    .stats-container {
        grid-template-columns: repeat(2, 1fr);
        padding: 0 1rem;
    }

    .articles-grid {
        grid-template-columns: 1fr;
    }

    .section-title {
        font-size: 2rem;
        flex-direction: column;
        gap: 0.5rem;
    }

    .hero-buttons {
        justify-content: center;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 2rem;
    }

    .stats-container {
        grid-template-columns: 1fr;
    }

    .btn {
        padding: 0.8rem 1.5rem;
        font-size: 0.9rem;
    }
}
</style>

<script>
// Initialize AOS
AOS.init({
    duration: 600,
    easing: 'ease-in-out',
    once: true
});

// Counter Animation
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);

    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start);
        }
    }, 16);
}

// Load stats when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Animate counters
    setTimeout(() => {
        animateCounter(document.getElementById('articles-count'), 25);
        animateCounter(document.getElementById('views-count'), 1250);
        animateCounter(document.getElementById('users-count'), 150);
        animateCounter(document.getElementById('uptime-count'), 365);
    }, 500);

    // Load recent articles
    loadRecentArticles();
});

// Load recent articles
function loadRecentArticles() {
    fetch('<?= base_url('/post'); ?>')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('recent-articles');

            if (data.artikel && data.artikel.length > 0) {
                const articles = data.artikel.slice(0, 3); // Get first 3 articles
                let html = '<div class="articles-grid">';

                articles.forEach((article, index) => {
                    const slug = article.slug || `artikel-${article.id}`;
                    const excerpt = article.isi ? article.isi.substring(0, 100) + '...' : 'No content available';

                    html += `
                        <div class="article-preview-card" data-aos="fade-up" data-aos-delay="${index * 100}">
                            <div class="article-preview-header">
                                <h4><a href="<?= base_url('/artikel/'); ?>${slug}">${article.judul}</a></h4>
                                <span class="article-date">
                                    <i class="fas fa-calendar-alt"></i>
                                    ${new Date(article.created_at || Date.now()).toLocaleDateString('id-ID')}
                                </span>
                            </div>
                            <p class="article-excerpt">${excerpt}</p>
                            <a href="<?= base_url('/artikel/'); ?>${slug}" class="read-more">
                                Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    `;
                });

                html += '</div>';
                container.innerHTML = html;

                // Re-initialize AOS for new elements
                AOS.refresh();
            } else {
                container.innerHTML = `
                    <div class="no-articles">
                        <i class="fas fa-newspaper"></i>
                        <h4>Belum Ada Artikel</h4>
                        <p>Artikel akan segera hadir. Silakan kembali lagi nanti!</p>
                        <a href="<?= base_url('/admin/artikel/add'); ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Tambah Artikel Pertama
                        </a>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error loading articles:', error);
            document.getElementById('recent-articles').innerHTML = `
                <div class="error-loading">
                    <i class="fas fa-exclamation-triangle"></i>
                    <p>Gagal memuat artikel. Silakan refresh halaman.</p>
                </div>
            `;
        });
}
</script>

<?= $this->endSection() ?>
