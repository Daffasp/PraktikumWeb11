<?= $this->include("template/header") ?>

<div class="article-detail-container">
    <!-- Article Header -->
    <div class="article-header">
        <div class="breadcrumb">
            <a href="<?= base_url('/'); ?>">
                <i class="fas fa-home"></i> Beranda
            </a>
            <span class="separator">/</span>
            <a href="<?= base_url('/artikel'); ?>">
                <i class="fas fa-newspaper"></i> Artikel
            </a>
            <span class="separator">/</span>
            <span class="current"><?= esc($artikel["judul"] ?? $artikel["title"] ?? 'Untitled'); ?></span>
        </div>

        <h1 class="article-title"><?= esc($artikel["judul"] ?? $artikel["title"] ?? 'Untitled'); ?></h1>

        <div class="article-meta">
            <div class="meta-item">
                <i class="fas fa-calendar-alt"></i>
                <span><?= date('d F Y', strtotime($artikel['created_at'] ?? date('Y-m-d'))); ?></span>
            </div>
            <div class="meta-item">
                <i class="fas fa-clock"></i>
                <span><?= ceil(str_word_count($artikel["isi"] ?? '') / 200); ?> menit baca</span>
            </div>
            <div class="meta-item">
                <i class="fas fa-tag"></i>
                <span><?= esc($artikel['nama_kategori'] ?? 'Uncategorized'); ?></span>
            </div>
        </div>
    </div>

    <!-- Article Image -->
    <?php if (!empty($artikel['gambar'])): ?>
        <div class="article-image-container">
            <img src="<?= base_url("/gambar/" . $artikel["gambar"]) ?>"
                 alt="<?= esc($artikel["judul"] ?? $artikel["title"]); ?>"
                 class="article-image">
            <div class="image-caption">
                <?= esc($artikel["judul"] ?? $artikel["title"]); ?>
            </div>
        </div>
    <?php elseif (!empty($artikel['image'])): ?>
        <div class="article-image-container">
            <img src="<?= base_url("/image/" . $artikel["image"]) ?>"
                 alt="<?= esc($artikel["slug"]); ?>"
                 class="article-image">
        </div>
    <?php endif; ?>

    <!-- Article Content -->
    <article class="article-content">
        <div class="content-body">
            <?= nl2br(esc($artikel["isi"] ?? $artikel["content"] ?? 'Konten tidak tersedia.')); ?>
        </div>

        <!-- Article Actions -->
        <div class="article-actions">
            <div class="action-buttons">
                <button class="action-btn like-btn" title="Like artikel ini">
                    <i class="fas fa-heart"></i>
                    <span>Like</span>
                </button>
                <button class="action-btn share-btn" title="Bagikan artikel">
                    <i class="fas fa-share-alt"></i>
                    <span>Share</span>
                </button>
                <button class="action-btn bookmark-btn" title="Simpan artikel">
                    <i class="fas fa-bookmark"></i>
                    <span>Save</span>
                </button>
            </div>

            <div class="social-share">
                <span class="share-label">Bagikan:</span>
                <a href="#" class="social-btn facebook" onclick="shareToFacebook()">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-btn twitter" onclick="shareToTwitter()">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-btn whatsapp" onclick="shareToWhatsApp()">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#" class="social-btn telegram" onclick="shareToTelegram()">
                    <i class="fab fa-telegram-plane"></i>
                </a>
            </div>
        </div>

        <!-- Navigation -->
        <div class="article-navigation">
            <a href="<?= base_url('/artikel'); ?>" class="nav-btn back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Artikel</span>
            </a>

            <div class="nav-actions">
                <button class="nav-btn print-btn" onclick="window.print()">
                    <i class="fas fa-print"></i>
                    <span>Print</span>
                </button>
                <button class="nav-btn top-btn" onclick="scrollToTop()">
                    <i class="fas fa-arrow-up"></i>
                    <span>Ke Atas</span>
                </button>
            </div>
        </div>
    </article>

    <!-- Related Articles Section -->
    <div class="related-articles">
        <h3 class="section-title">
            <i class="fas fa-newspaper"></i>
            Artikel Terkait
        </h3>
        <div class="related-grid">
            <!-- Placeholder for related articles -->
            <div class="related-item">
                <div class="related-image">
                    <i class="fas fa-image"></i>
                </div>
                <div class="related-content">
                    <h4>Artikel Terkait 1</h4>
                    <p>Deskripsi singkat artikel terkait...</p>
                    <a href="#" class="related-link">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="related-item">
                <div class="related-image">
                    <i class="fas fa-image"></i>
                </div>
                <div class="related-content">
                    <h4>Artikel Terkait 2</h4>
                    <p>Deskripsi singkat artikel terkait...</p>
                    <a href="#" class="related-link">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="related-item">
                <div class="related-image">
                    <i class="fas fa-image"></i>
                </div>
                <div class="related-content">
                    <h4>Artikel Terkait 3</h4>
                    <p>Deskripsi singkat artikel terkait...</p>
                    <a href="#" class="related-link">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Article Detail Container */
.article-detail-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem 1rem;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    margin-top: 2rem;
    margin-bottom: 2rem;
}

/* Breadcrumb */
.breadcrumb {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 2rem;
    font-size: 0.9rem;
    color: #6b7280;
}

.breadcrumb a {
    color: var(--primary-color);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: color 0.3s ease;
}

.breadcrumb a:hover {
    color: var(--secondary-color);
}

.separator {
    color: #d1d5db;
}

.current {
    color: var(--dark-color);
    font-weight: 500;
}

/* Article Header */
.article-header {
    text-align: center;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #f3f4f6;
}

.article-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark-color);
    line-height: 1.2;
    margin: 1rem 0;
}

.article-meta {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
    margin-top: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
    font-size: 0.9rem;
}

.meta-item i {
    color: var(--primary-color);
}

/* Article Image */
.article-image-container {
    margin: 2rem 0;
    text-align: center;
}

.article-image {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.image-caption {
    margin-top: 1rem;
    font-style: italic;
    color: #6b7280;
    font-size: 0.9rem;
}

/* Article Content */
.article-content {
    margin-top: 2rem;
}

.content-body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #374151;
    margin-bottom: 3rem;
}

.content-body p {
    margin-bottom: 1.5rem;
}

/* Article Actions */
.article-actions {
    background: #f8fafc;
    padding: 2rem;
    border-radius: 15px;
    margin: 2rem 0;
}

.action-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.action-btn {
    background: white;
    border: 2px solid #e5e7eb;
    color: #6b7280;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
}

.action-btn:hover {
    border-color: var(--primary-color);
    color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(99, 102, 241, 0.2);
}

.action-btn.liked {
    border-color: #ef4444;
    color: #ef4444;
}

/* Social Share */
.social-share {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.share-label {
    font-weight: 500;
    color: var(--dark-color);
}

.social-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-btn:hover {
    transform: scale(1.1);
}

.social-btn.facebook { background: #1877f2; }
.social-btn.twitter { background: #1da1f2; }
.social-btn.whatsapp { background: #25d366; }
.social-btn.telegram { background: #0088cc; }

/* Article Navigation */
.article-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 3rem 0;
    padding: 1.5rem;
    background: #f8fafc;
    border-radius: 15px;
    flex-wrap: wrap;
    gap: 1rem;
}

.nav-btn {
    background: var(--primary-color);
    color: white;
    text-decoration: none;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.nav-btn:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3);
}

.nav-actions {
    display: flex;
    gap: 1rem;
}

/* Related Articles */
.related-articles {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 2px solid #f3f4f6;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.section-title i {
    color: var(--primary-color);
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.related-item {
    background: #f8fafc;
    border-radius: 15px;
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.related-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.related-image {
    width: 60px;
    height: 60px;
    background: #e5e7eb;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    color: #9ca3af;
}

.related-content h4 {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
}

.related-content p {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.related-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9rem;
}

.related-link:hover {
    color: var(--secondary-color);
}

/* Responsive */
@media (max-width: 768px) {
    .article-detail-container {
        margin: 1rem;
        padding: 1.5rem;
    }

    .article-title {
        font-size: 2rem;
    }

    .article-meta {
        flex-direction: column;
        gap: 1rem;
    }

    .breadcrumb {
        flex-wrap: wrap;
    }

    .article-navigation {
        flex-direction: column;
        text-align: center;
    }

    .nav-actions {
        justify-content: center;
    }

    .action-buttons {
        flex-direction: column;
        align-items: center;
    }

    .social-share {
        flex-direction: column;
        gap: 1rem;
    }

    .related-grid {
        grid-template-columns: 1fr;
    }
}

/* Print Styles */
@media print {
    .article-actions,
    .article-navigation,
    .related-articles {
        display: none;
    }

    .article-detail-container {
        box-shadow: none;
        margin: 0;
        padding: 1rem;
    }
}
</style>

<script>
// Like button functionality
document.querySelector('.like-btn')?.addEventListener('click', function() {
    this.classList.toggle('liked');
    const icon = this.querySelector('i');
    const text = this.querySelector('span');

    if (this.classList.contains('liked')) {
        icon.className = 'fas fa-heart';
        text.textContent = 'Liked';
        this.style.borderColor = '#ef4444';
        this.style.color = '#ef4444';
    } else {
        icon.className = 'far fa-heart';
        text.textContent = 'Like';
        this.style.borderColor = '#e5e7eb';
        this.style.color = '#6b7280';
    }
});

// Share functions
function shareToFacebook() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.querySelector('.article-title').textContent);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
}

function shareToTwitter() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.querySelector('.article-title').textContent);
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${title}`, '_blank', 'width=600,height=400');
}

function shareToWhatsApp() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.querySelector('.article-title').textContent);
    window.open(`https://wa.me/?text=${title} ${url}`, '_blank');
}

function shareToTelegram() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.querySelector('.article-title').textContent);
    window.open(`https://t.me/share/url?url=${url}&text=${title}`, '_blank');
}

// Scroll to top
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Share button functionality
document.querySelector('.share-btn')?.addEventListener('click', function() {
    const title = document.querySelector('.article-title').textContent;
    const url = window.location.href;

    if (navigator.share) {
        navigator.share({
            title: title,
            url: url
        });
    } else {
        navigator.clipboard.writeText(url).then(() => {
            alert('Link artikel telah disalin ke clipboard!');
        });
    }
});

// Bookmark functionality
document.querySelector('.bookmark-btn')?.addEventListener('click', function() {
    this.classList.toggle('bookmarked');
    const icon = this.querySelector('i');
    const text = this.querySelector('span');

    if (this.classList.contains('bookmarked')) {
        icon.className = 'fas fa-bookmark';
        text.textContent = 'Saved';
        this.style.borderColor = '#f59e0b';
        this.style.color = '#f59e0b';
    } else {
        icon.className = 'far fa-bookmark';
        text.textContent = 'Save';
        this.style.borderColor = '#e5e7eb';
        this.style.color = '#6b7280';
    }
});
</script>

<?= $this->include("template/footer") ?>
