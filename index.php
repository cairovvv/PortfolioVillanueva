<?php
require __DIR__ . '/data.php';

/** Shortcut for safe HTML output. */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/* ---------- Read modal state from the URL (whitelisted) ---------- */
$activeProject = (isset($_GET['project']) && isset($projects[$_GET['project']])) ? $_GET['project'] : null;
$activeTab     = (isset($_GET['tab']) && isset($tabs[$_GET['tab']])) ? $_GET['tab'] : 'screen';
$modalOpen     = $activeProject !== null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($profile['name']) ?> — IT Student Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400;500;600&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="<?= $modalOpen ? 'modal-open' : '' ?>">

    <!-- NAVIGATION BAR -->
    <header class="site-header">
        <input type="checkbox" id="navToggle" class="nav-toggle" hidden>
        <div class="header-inner">
            <nav class="nav-links">
                <a href="#home" class="active">Home</a>
                <a href="#about">About</a>
                <a href="#portfolio">Portfolio</a>
            </nav>

            <a href="#home" class="brand"><?= e($profile['brand']) ?><span>.</span></a>

            <div class="header-spacer"></div>

            <label for="navToggle" class="nav-burger" aria-label="Toggle menu">
                <i class="fa-solid fa-bars"></i>
            </label>
        </div>

        <div class="mobile-menu">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#portfolio">Portfolio</a>
        </div>
    </header>

    <main>
        <!-- HERO -->
        <section id="home" class="hero">
            <div class="sticker sticker-yellow float-a"><i class="fa-regular fa-face-smile"></i></div>
            <div class="sticker sticker-purple float-b"><i class="fa-regular fa-face-smile-wink"></i></div>
            <div class="sticker sticker-mint float-a"><i class="fa-regular fa-face-smile"></i></div>
            <div class="sticker-star float-b"><i class="fa-solid fa-star"></i></div>

            <div class="hero-inner">
                <div class="headline-wrap">
                    <div class="headline-cloud"></div>
                    <h1><?= e($profile['name']) ?></h1>
                </div>

                <p class="tagline"><?= e($profile['tagline']) ?></p>

                <a href="#portfolio" class="btn-oval">View my Work</a>
            </div>

            <div class="portrait-row">
                <div class="scallop-frame">
                    <img src="<?= e($profile['photo']) ?>" alt="<?= e($profile['name']) ?> Portrait">
                </div>
            </div>
        </section>

        <!-- CREATIVE WORKS VIDEOS -->
        <section id="creative-works" class="creative-works">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow eyebrow-royal">[ VIDEO SHOWCASE ]</span>
                    <h2>Creative <em>Works</em></h2>
                    <p>Sample edits</p>
                </div>

                <div class="video-showcase-grid">
                    <?php foreach ($videos as $v): ?>
                        <article class="video-showcase-card">
                            <div class="video-showcase-frame">
                                <video controls preload="metadata" playsinline aria-label="Sample edit">
                                    <source src="<?= e($v['src']) ?>" type="video/mp4">
                                    Your browser does not support embedded videos.
                                </video>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- PORTFOLIO STAMPS -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow">[ PROJECTS ]</span>
                    <h2>Interactive <em>Project Showcase</em></h2>
                    <p>Click any project card to view its screenshots, code, and output.</p>
                </div>

                <div class="stamp-grid">
                    <?php foreach ($stamps as $s): ?>
                        <a href="<?= e($s['href']) ?>" class="stamp-card">
                            <span class="badge <?= e($s['badge_class']) ?>"><?= e($s['badge']) ?></span>

                            <?php if (!empty($s['mock'])): ?>
                                <div class="stamp-thumb stamp-mock">
                                    <div class="mock-box">
                                        <div class="mock-top"><?= e($s['mock_top'] ?? 'Java Swing GUI') ?></div>
                                        <div class="mock-title"><?= e($s['mock_title'] ?? 'Tuition Scholar System') ?></div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="stamp-thumb">
                                    <img src="<?= e($s['img']) ?>" alt="<?= e($s['title']) ?>">
                                </div>
                            <?php endif; ?>

                            <div class="stamp-foot">
                                <div>
                                    <h3><?= e($s['title']) ?></h3>
                                    <p><?= e($s['sub']) ?></p>
                                </div>
                                <span class="stamp-num"><?= e($s['num']) ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ABOUT -->
        <section id="about" class="about">
            <div class="about-inner">
                <span class="eyebrow eyebrow-royal">ABOUT <?= e(strtoupper(explode(' ', $profile['name'])[0])) ?></span>
                <h2><?= e($profile['about_h']) ?></h2>
                <p><?= e($profile['about_p']) ?></p>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="footer-inner">
            <div>
                <span class="footer-name"><?= e($profile['name']) ?></span>
                <p>© <?= date('Y') ?> <?= e($profile['name']) ?>. All rights reserved.</p>
            </div>
            <div class="footer-tag">IT STUDENT PORTFOLIO</div>
        </div>
    </footer>

    <?php require __DIR__ . '/modals.php'; ?>

</body>
</html>
