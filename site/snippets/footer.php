        <div class="cf"></div>

        <div class="footer" role="contentinfo">
            <div class="wrap">

                <div class="cta">
                    <?= $site->footer()->kirbytext() ?>
                </div>

                <div class="cf"></div><br />

                <div class="colophon">
                    <div class="col-6 nopadding">
                        <?= $site->copyright()->kirbytext()?>
                    </div>
                    <div class="col-6 nopadding">
                        <?php snippet('social') ?>
                    </div>
                </div>

                <div class="cf"></div>

            </div>
        </div>

    </div><!-- #container -->
</div><!-- #canvas -->

<div id="isMobile"></div>

<?= $site->googleanalytics()->html() ?>

<!-- <?= js('assets/scripts/scrolltofixed.min.js') ?> -->
<?= js('assets/scripts/main.js') ?>

<noscript>
    <style>
        .animsition-overlay-slide {
            display: none !important;
        }
    </style>
</noscript>

</body>
</html>
