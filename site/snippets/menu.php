<ul class="menu cf">

    <?php foreach($pages->visible() as $p): ?>
    <li <?php e($p->isOpen(), ' active') ?>>
        <a class="al <?php e($p->isOpen(), ' active') ?>" href="<?= $p->url() ?>">
            <?= $p->title()->html() ?>
        </a>

        <?php if( $p->hasVisibleChildren() && $p->togglesubnav()->bool() ): ?>
            <span class="submenu-indicator fa"></span>
        <?php endif; ?>

        <?php
        // Submenu
        // ---------------------------------------------------------------- ?>
        <?php if( $p->hasVisibleChildren() && $p->togglesubnav()->bool() ): ?>
            <ul class="submenu">
            <?php foreach($p->children()->visible() as $ps): ?>
                <li>
                    <a href="<?= $ps->url() ?>" class="al<?php e($ps->isOpen(), ' active') ?>">
                        <?= $ps->title()->html() ?>
                    </a>
                </li>
            <?php endforeach ?>
            </ul>
        <?php endif ?>

    </li>
    <?php endforeach ?>

</ul>
