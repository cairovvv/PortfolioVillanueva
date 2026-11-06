<?php
/**
 * modals.php — project modal + creative-works modal.
 * Fully server-driven: project state comes from the URL (?project=…&tab=…).
 * Expects $projects, $tabs, $activeProject, $activeTab from index.php.
 */
?>

<?php if ($activeProject !== null): $p = $projects[$activeProject]; ?>
<div class="modal-backdrop" id="projectModal">
    <a class="modal-dismiss" href="index.php#portfolio" aria-label="Close"></a>
    <div class="modal">

        <div class="modal-head">
            <div>
                <span class="modal-num"><?= e($p['num']) ?></span>
                <h3><?= e($p['title']) ?></h3>
            </div>
            <a class="modal-x" href="index.php#portfolio" aria-label="Close"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <nav class="modal-tabs">
            <?php foreach ($tabs as $key => $t): ?>
                <a href="?project=<?= e($activeProject) ?>&amp;tab=<?= e($key) ?>#portfolio"
                   class="tab-btn <?= $key === $activeTab ? 'active' : '' ?>">
                    <i class="fa-solid <?= e($t['icon']) ?>"></i> <?= e($t['label']) ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="modal-body">
            <p class="modal-desc"><?= e($p['desc']) ?></p>

            <?php if ($activeTab === 'screen'): ?>
                <h4 class="modal-label"><?= e($p['screen_label'] ?? 'IDE & Terminal Screenshot') ?></h4>
                <?php if (!empty($p['screenshots'])): ?>
                    <div class="project-screenshots">
                        <?php foreach ($p['screenshots'] as $screenshot): ?>
                            <div class="ide-frame">
                                <div class="ide-bar">
                                    <span><?= e($screenshot['label']) ?></span>
                                    <div class="dots"><i class="d-red"></i><i class="d-amber"></i><i class="d-green"></i></div>
                                </div>
                                <div class="auth-screen">
                                    <img src="<?= e($screenshot['img']) ?>" alt="<?= e($screenshot['label']) ?>">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="ide-frame">
                        <div class="ide-bar">
                            <span><?= e($p['file']) ?> — IDE Console Execution Output</span>
                            <div class="dots"><i class="d-red"></i><i class="d-amber"></i><i class="d-green"></i></div>
                        </div>
                        <div class="ide-screen <?= !empty($p['wide_screen']) ? 'ide-screen-wide' : '' ?>">
                            <img src="<?= e($p['img']) ?>" alt="<?= e($p['title']) ?> screenshot">
                        </div>
                    </div>
                <?php endif; ?>

            <?php elseif ($activeTab === 'code'): ?>
                <h4 class="modal-label"><?= e($p['code_label'] ?? 'Java Source Code Snippet') ?></h4>
                <?php if (!empty($p['prototype_url'])): ?>
                    <a class="prototype-link" href="<?= e($p['prototype_url']) ?>" target="_blank" rel="noopener noreferrer">
                        Open Screen Time Prototype
                    </a>
                <?php elseif (!empty($p['code_image'])): ?>
                    <div class="code-image-frame">
                        <img src="<?= e($p['code_image']) ?>" alt="<?= e($p['code_label'] ?? $p['file']) ?>">
                    </div>
                <?php else: ?>
                    <pre class="code-block"><?= e($p['code']) ?></pre>
                <?php endif; ?>

            <?php else: ?>
                <h4 class="modal-label"><?= e($p['output_label'] ?? 'Simulated Terminal Console Output') ?></h4>
                <div class="terminal">
                    <div class="terminal-cmd"><?= e($p['output_command'] ?? '$ java ' . str_replace('.java', '', $p['file'])) ?></div>
                    <pre><?= e($p['output']) ?></pre>
                </div>
            <?php endif; ?>

            <div>
                <h4 class="modal-label">Technologies &amp; Keywords</h4>
                <div class="tags">
                    <?php foreach ($p['tags'] as $tag): ?>
                        <span class="tag"><?= e($tag) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="modal-foot">
            <a class="btn-close btn-close-royal" href="index.php#portfolio">Close Window</a>
        </div>
    </div>
</div>
<?php endif; ?>
