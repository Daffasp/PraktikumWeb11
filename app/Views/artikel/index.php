<?= $this->include('template/header'); ?>

<div class="articles-container">
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-newspaper"></i>
            Artikel Terbaru
        </h1>
        <p class="page-subtitle">Temukan artikel menarik dan informatif</p>
    </div>

    <?php if ($artikel): ?>
        <div class="articles-grid">
            <?php foreach ($artikel as $index => $row): ?>
                <article class="article-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="article-image">
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="<?= base_url('/gambar/' . $row['gambar']); ?>"
                                 alt="<?= esc($row['judul']); ?>"
                                 loading="lazy">
                            <div class="image-overlay">
                                <i class="fas fa-eye"></i>
                            </div>
                        <?php else: ?>
                            <div class="no-image">
                                <i class="fas fa-image"></i>
                                <span>No Image</span>
                            </div>
                        <?php endif; ?>

                        <div class="article-category">
                            <i class="fas fa-tag"></i>
                            <?= esc($row['nama_kategori'] ?? 'Uncategorized') ?>
                        </div>
                    </div>

                    <div class="article-content">
                        <h2 class="article-title">
                            <a href="<?= base_url('/artikel/' . ($row['slug'] ?: 'artikel-' . $row['id'])); ?>">
                                <?= esc($row['judul']); ?>
                            </a>
                        </h2>

                        <div class="article-meta">
                            <span class="meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <?= date('d M Y', strtotime($row['created_at'] ?? date('Y-m-d'))); ?>
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-clock"></i>
                                <?= ceil(str_word_count($row['isi'] ?? '') / 200); ?> min read
                            </span>
                        </div>

                        <p class="article-excerpt">
                            <?= esc(substr(strip_tags($row['isi'] ?? ''), 0, 150)); ?>...
                        </p>

                        <div class="article-footer">
                            <a href="<?= base_url('/artikel/' . ($row['slug'] ?: 'artikel-' . $row['id'])); ?>" class="read-more-btn">
                                <span>Baca Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>

                            <div class="article-actions">
                                <button class="action-btn like-btn" title="Like">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="action-btn share-btn" title="Share">
                                    <i class="fas fa-share-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Load More Button -->
        <div class="load-more-container">
            <button class="load-more-btn">
                <i class="fas fa-plus"></i>
                Load More Articles
            </button>
        </div>

    <?php else: ?>
        <div class="no-articles">
            <div class="no-articles-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h3>Belum Ada Artikel</h3>
            <p>Artikel akan segera hadir. Silakan kembali lagi nanti!</p>
            <a href="<?= base_url('/'); ?>" class="back-home-btn">
                <i class="fas fa-home"></i>
                Kembali ke Beranda
            </a>
        </div>
    <?php endif; ?>
</div>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<style>
/* Articles Container */
.articles-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.page-title i {
    color: var(--primary-color);
}

.page-subtitle {
    font-size: 1.1rem;
    color: #6b7280;
    margin: 0;
}

/* Articles Grid */
.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

/* Article Card */
.article-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
}

.article-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

/* Article Image */
.article-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.article-card:hover .article-image img {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(139, 69, 19, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.article-card:hover .image-overlay {
    opacity: 1;
}

.image-overlay i {
    color: white;
    font-size: 2rem;
}

.no-image {
    height: 100%;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
}

.no-image i {
    font-size: 3rem;
    margin-bottom: 0.5rem;
}

.article-category {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: var(--primary-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Article Content */
.article-content {
    padding: 1.5rem;
}

.article-title {
    margin: 0 0 1rem 0;
    font-size: 1.3rem;
    font-weight: 600;
    line-height: 1.4;
}

.article-title a {
    color: var(--dark-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.article-title a:hover {
    color: var(--primary-color);
}

.article-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.85rem;
    color: #6b7280;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.article-excerpt {
    color: #4b5563;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

/* Article Footer */
.article-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.read-more-btn {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    text-decoration: none;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.read-more-btn:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.4);
}

.article-actions {
    display: flex;
    gap: 0.5rem;
}

.action-btn {
    background: none;
    border: 2px solid #e5e7eb;
    color: #6b7280;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.action-btn:hover {
    border-color: var(--primary-color);
    color: var(--primary-color);
    transform: scale(1.1);
}

/* Load More */
.load-more-container {
    text-align: center;
    margin-top: 3rem;
}

.load-more-btn {
    background: linear-gradient(135deg, var(--success-color), #059669);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.load-more-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
}

/* No Articles */
.no-articles {
    text-align: center;
    padding: 4rem 2rem;
    color: #6b7280;
}

.no-articles-icon i {
    font-size: 4rem;
    color: #d1d5db;
    margin-bottom: 1rem;
}

.no-articles h3 {
    font-size: 1.5rem;
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.back-home-btn {
    background: var(--primary-color);
    color: white;
    text-decoration: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 1rem;
    transition: all 0.3s ease;
}

.back-home-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
}

/* Responsive */
@media (max-width: 768px) {
    .articles-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .page-title {
        font-size: 2rem;
        flex-direction: column;
        gap: 0.5rem;
    }

    .article-footer {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }

    .read-more-btn {
        justify-content: center;
    }

    .article-actions {
        justify-content: center;
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

// Like button functionality
document.querySelectorAll('.like-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        this.classList.toggle('liked');
        const icon = this.querySelector('i');
        if (this.classList.contains('liked')) {
            icon.style.color = '#ef4444';
            this.style.borderColor = '#ef4444';
        } else {
            icon.style.color = '#6b7280';
            this.style.borderColor = '#e5e7eb';
        }
    });
});

// Share button functionality
document.querySelectorAll('.share-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const articleCard = this.closest('.article-card');
        const title = articleCard.querySelector('.article-title a').textContent;
        const url = articleCard.querySelector('.article-title a').href;

        if (navigator.share) {
            navigator.share({
                title: title,
                url: url
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(url).then(() => {
                alert('Link artikel telah disalin!');
            });
        }
    });
});

// Load more functionality (placeholder)
document.querySelector('.load-more-btn')?.addEventListener('click', function() {
    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';

    // Simulate loading
    setTimeout(() => {
        this.innerHTML = '<i class="fas fa-plus"></i> Load More Articles';
        alert('Fitur load more akan segera tersedia!');
    }, 1000);
});
</script>

<?= $this->include('template/footer'); ?>