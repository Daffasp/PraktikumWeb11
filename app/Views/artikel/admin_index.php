<?= $this->include('template/header'); ?>

<div class="container-fluid px-0">
    <div class="page-title text-center">
        <i class="fas fa-newspaper"></i>
        <?= esc($title); ?>
    </div>

<?php if (isset($error) && $error): ?>
<div class="card">
    <div class="card-body">
        <div class="alert alert-warning">
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                <h4 class="mb-0"><?= esc($error); ?></h4>
            </div>
            <p class="mb-3"><?= esc($message); ?></p>
            <div class="mb-3">
                <strong>Langkah-langkah perbaikan:</strong>
                <ol class="mt-2">
                    <?php foreach ($troubleshoot as $step): ?>
                        <li><?= esc($step); ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <button onclick="location.reload()" class="btn btn-primary">
                <i class="fas fa-sync-alt"></i> Refresh Halaman
            </button>
        </div>
    </div>
</div>
<?php else: ?>

    <!-- Stats Cards -->
    <div class="row justify-content-center mb-4" id="stats-container">
        <div class="col-lg-2 col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-number" id="total-articles">-</div>
                <div class="stats-label">Total Artikel</div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-number" id="published-articles">-</div>
                <div class="stats-label">Published</div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-number" id="draft-articles">-</div>
                <div class="stats-label">Draft</div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-number" id="with-images">-</div>
                <div class="stats-label">Dengan Gambar</div>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-10 col-xl-8">
            <div class="search-box">
                <form id="search-form" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="search-box" class="form-label">
                            <i class="fas fa-search"></i> Cari Artikel
                        </label>
                        <input type="text" name="q" id="search-box" value="<?= esc($q); ?>"
                               placeholder="Masukkan judul artikel..." class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label for="category-filter" class="form-label">
                            <i class="fas fa-filter"></i> Kategori
                        </label>
                        <select name="kategori_id" id="category-filter" class="form-select">
                            <option value="">Semua Kategori</option>
                            <?php if (isset($kategori) && is_array($kategori)): ?>
                                <?php foreach ($kategori as $k): ?>
                                    <option value="<?= esc($k['id_kategori']); ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                                        <?= esc($k['nama_kategori']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        <button type="button" onclick="resetSearch()" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i> Reset
                        </button>
                    </div>

                    <div class="col-md-2 text-center">
                        <a href="<?= base_url('/admin/artikel/add'); ?>" class="btn btn-success">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Articles Table -->
    <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-10">
            <div class="card">
                <div class="card-header text-center">
                    <i class="fas fa-table"></i> Daftar Artikel
                </div>
                <div class="card-body p-0">
                    <div id="article-container">
                        <!-- Loading indicator -->
                        <div id="loading" class="text-center">
                            <div class="loading-spinner"></div>
                            <p><i class="fas fa-sync-alt fa-spin"></i> Memuat data artikel...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="row justify-content-center mt-4">
        <div class="col-lg-11 col-xl-10">
            <div id="pagination-container"></div>
        </div>
    </div>
</div>

<?php endif; ?>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');
    const searchBox = $('#search-box');
    const categoryFilter = $('#category-filter');

    const fetchData = (url) => {
        $('#loading').show();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (data) {
                $('#loading').hide();

                if (data.error) {
                    // Handle database error
                    let errorHtml = `
                        <div class="alert alert-warning">
                            <h4>⚠️ ${data.error}</h4>
                            <p>${data.message}</p>
                            <ul>`;

                    data.troubleshoot.forEach(step => {
                        errorHtml += `<li>${step}</li>`;
                    });

                    errorHtml += `
                            </ul>
                            <button onclick="location.reload()" class="btn btn-primary">🔄 Refresh Halaman</button>
                        </div>`;

                    articleContainer.html(errorHtml);
                    paginationContainer.html('');
                } else {
                    renderArticles(data.artikel);
                    renderPagination(data.pager, data.q, data.kategori_id);
                }
            },
            error: function(xhr, status, error) {
                $('#loading').hide();
                let errorHtml = `
                    <div class="alert alert-danger">
                        <h4>❌ Error Loading Data</h4>
                        <p>Status: ${status}</p>
                        <p>Error: ${error}</p>
                        <button onclick="location.reload()" class="btn btn-primary">🔄 Refresh Halaman</button>
                    </div>`;
                articleContainer.html(errorHtml);
            }
        });
    };

    const updateStats = (articles) => {
        const total = articles.length;
        const published = articles.filter(a => a.status == 1).length;
        const draft = articles.filter(a => a.status == 0).length;
        const withImages = articles.filter(a => a.gambar).length;

        $('#total-articles').text(total);
        $('#published-articles').text(published);
        $('#draft-articles').text(draft);
        $('#with-images').text(withImages);
    };

    const renderArticles = (articles) => {
        // Update statistics
        updateStats(articles || []);

        let html = `
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th width="80">Gambar</th>
                            <th>Judul & Konten</th>
                            <th width="120">Kategori</th>
                            <th width="100">Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>`;

        if (articles && articles.length > 0) {
            articles.forEach((article, index) => {
                const statusText = article.status == 1 ? 'Published' : 'Draft';
                const statusClass = article.status == 1 ? 'bg-success' : 'bg-secondary';
                const gambarHtml = article.gambar ?
                    `<img src="/ci4/public/gambar/${article.gambar}" alt="Gambar artikel" class="rounded shadow-sm"
                         style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"
                         onclick="showImageModal('${article.gambar}', '${article.judul}')">` :
                    '<div class="d-flex align-items-center justify-content-center bg-light rounded" style="width: 60px; height: 60px;"><i class="fas fa-image text-muted"></i></div>';

                const truncatedContent = article.isi ?
                    (article.isi.length > 100 ? article.isi.substring(0, 100) + '...' : article.isi) :
                    'Tidak ada konten';

                html += `
                <tr class="align-middle">
                    <td class="text-center">
                        <span class="badge bg-primary rounded-pill">${article.id}</span>
                    </td>
                    <td class="text-center">${gambarHtml}</td>
                    <td>
                        <div class="mb-1">
                            <strong class="text-dark">${article.judul}</strong>
                        </div>
                        <small class="text-muted">${truncatedContent}</small>
                    </td>
                    <td>
                        <span class="badge bg-info text-dark rounded-pill">
                            ${article.nama_kategori || 'Uncategorized'}
                        </span>
                    </td>
                    <td>
                        <span class="badge ${statusClass} rounded-pill">
                            <i class="fas ${article.status == 1 ? 'fa-eye' : 'fa-eye-slash'}"></i>
                            ${statusText}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="/admin/artikel/edit/${article.id}" class="btn btn-sm btn-info" title="Edit artikel">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteArticle(${article.id}, '${article.judul}')" class="btn btn-sm btn-danger" title="Hapus artikel">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                `;
            });
        } else {
            html += `
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-newspaper fa-3x mb-3"></i>
                            <h5>Belum ada artikel</h5>
                            <p>Mulai dengan menambahkan artikel pertama Anda</p>
                            <a href="/admin/artikel/add" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah Artikel Pertama
                            </a>
                        </div>
                    </td>
                </tr>`;
        }

        html += '</tbody></table></div>';
        articleContainer.html(html);
    };

    const renderPagination = (pager, q, kategori_id) => {
        let html = '<nav><ul class="pagination">';
        pager.links.forEach(link => {
            let url = link.url ? `${link.url}&q=${q}&kategori_id=${kategori_id}` : '#';
            html += `<li class="page-item ${link.active ? 'active' : ''}"><a class="page-link" href="${url}">${link.title}</a></li>`;
        });
        html += '</ul></nav>';
        paginationContainer.html(html);
    };

    searchForm.on('submit', function (e) {
        e.preventDefault();
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        fetchData(`/admin/artikel?q=${q}&kategori_id=${kategori_id}`);
    });

    categoryFilter.on('change', function () {
        searchForm.trigger('submit');
    });

    // Load awal
    fetchData('/admin/artikel');

    // Auto-refresh every 30 seconds
    setInterval(() => {
        if (!$('#search-box').is(':focus') && !$('#category-filter').is(':focus')) {
            fetchData('/admin/artikel?' + $('#search-form').serialize());
        }
    }, 30000);
});

// Additional functions
function resetSearch() {
    $('#search-box').val('');
    $('#category-filter').val('');
    fetchData('/admin/artikel');
}

function deleteArticle(id, title) {
    if (confirm(`Yakin ingin menghapus artikel "${title}"?\n\nTindakan ini tidak dapat dibatalkan.`)) {
        window.location.href = `/admin/artikel/delete/${id}`;
    }
}

function showImageModal(imageName, title) {
    const modal = `
        <div class="modal fade" id="imageModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">${title}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="/ci4/public/gambar/${imageName}" alt="${title}" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    `;

    // Remove existing modal if any
    $('#imageModal').remove();

    // Add new modal
    $('body').append(modal);

    // Show modal
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
    imageModal.show();

    // Remove modal from DOM when hidden
    $('#imageModal').on('hidden.bs.modal', function () {
        $(this).remove();
    });
}

// Add some nice animations
$(document).ready(function() {
    // Animate stats cards
    $('.stats-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
        $(this).addClass('animate__animated animate__fadeInUp');
    });

    // Add loading state to buttons
    $('form').on('submit', function() {
        $(this).find('button[type="submit"]').html('<i class="fas fa-spinner fa-spin"></i> Mencari...');
    });
});
</script>

<!-- Add some CSS animations -->
<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate__animated {
    animation-duration: 0.6s;
    animation-fill-mode: both;
}

.animate__fadeInUp {
    animation-name: fadeInUp;
}

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.btn-group .btn {
    transition: all 0.3s ease;
}

.btn-group .btn:hover {
    transform: scale(1.1);
}

.stats-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.stats-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.search-box {
    transition: all 0.3s ease;
}

.search-box:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.card {
    transition: all 0.3s ease;
}

.loading-spinner {
    margin: 0 auto;
}

/* Custom scrollbar */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: var(--primary-color);
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: var(--secondary-color);
}
</style>

<?= $this->include('template/footer'); ?>
