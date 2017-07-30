<div class="c-banner"></div>

<section class="o-section o-section--bottom-border">
    <div class="o-container">
        <h1 class="c-headline">O nas</h1>
        <div class="grid">
            <div class="grid__item desk--one-half">
                <img src="<?= get_template_directory_uri() ?>/dist/images/salon-partnerski.jpg" alt="salon partnerski">
                <figcaption>Salon partnerski</figcaption>
                <a href="" class="c-btn c-btn--primary">Produkty i fotografie</a>
            </div><!--
            --><div class="grid__item desk--one-half">
                <p class="c-paragraph">
                    Istniejemy od 1998 roku. Tworzymy zgrany zespół ambitnych i kreatywnych ludzi z pasją do wykonywanego zawodu. Odnosimy sukcesy w konkursach ogólnopolskich
                    i regionalnych.  Jesteśmy profesjonalistami i stale poszerzamy swoją wiedzę podczas szkoleń u  czołowych stylistów w Polsce i za granicą. Zdobyte doświadczenia wykorzystujemy podczas codziennej pracy dla dobra naszych klientów.  Fryzjerstwo to zawód artystyczny – każdą fryzurę wykonujemy z należytą  pieczołowitością.
                    W naszym salonie tworzymy przyjazną i ciepłą atmosferę. Sprawiamy, że nasi klienci czują się docenieni
                    i zrelaksowani. Serdecznie zapraszamy.
                </p>
                <button class="c-btn c-btn--primary">Osiągniecia</button>
            </div>
        </div>
    </div>
</section>

<section class="o-section">
    <div class="o-container">
        <h2 class="c-headline">Pracownicy</h2>
        <div class="c-employees js-tab">
            <div class="c-employees__head">
                <?php
                    $args = array(
                        'post_type' => 'unikat_employee',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'ASC'
                    );

                    $query = new WP_Query($args);

                    if ( $query->have_posts() ) :
                        $i = 0;
                        while ( $query->have_posts() ) : $query->the_post();
                            $post_id = $post->ID;
                            $title = get_the_title($post_id);
                            $content = get_the_content();
                            $img_url = get_the_post_thumbnail_url();
                ?><!--
                --><div class="c-employee__avatar js-tab-item <?= $i === 0 ? 'active' : '' ?>" data-target="#employee-<?= $i ?>">
                    <div class="c-employee__avatar-img" style="background-image: url('<?= $img_url ?>')"></div>
                    <p><?= $title; ?></p>
                </div><!--
            --><?php $i++; endwhile; endif; ?>
            </div>
            <div class="c-employees__body">
                <?php
                if ( $query->have_posts() ) :
                    $i = 0;
                    while ( $query->have_posts() ) : $query->the_post();
                        $post_id = $post->ID;
                        $content = get_the_content();
                ?>
                <div id="employee-<?= $i ?>" class="c-employee__desc js-tab-target <?= $i === 0 ? 'active' : '' ?>">
                    <?= $content ?>
                </div>
            <?php wp_reset_query(); $i++; endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="o-section o-section--dark">
    <div class="o-container">
        <h2 class="c-headline c-headline--white">Usługi</h2>
        <div class="c-services js-tab">
            <div class="grid">
                <div class="grid__item desk--one-third">
                    <div class="c-services__head">
                        <?php
                            $args = array(
                                'post_type' => 'unikat_services',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'ASC'
                            );
                            $query = new WP_Query($args);
                            if ( $query->have_posts() ) :
                                $i = 0;
                                while ( $query->have_posts() ) : $query->the_post();
                                    $post_id = $post->ID;
                                    $name = get_the_title();
                        ?>
                        <div class="c-service__name js-tab-item <?= $i === 0 ? 'active' : '' ?>" data-target="#service-<?= $i ?>">
                            <span><?= $name; ?></span>
                        </div>
                        <?php $i++; endwhile; endif; ?>
                    </div>

                </div><!--
                --><div class="grid__item desk--two-thirds">
                    <div class="c-services__body">
                        <?php
                        if ( $query->have_posts() ) :
                            $i = 0;
                            while ( $query->have_posts() ) : $query->the_post();
                                $post_id = $post->ID;
                                $content = get_the_content();
                        ?>
                            <div id="service-<?= $i ?>" class="c-service__desc js-tab-target <?= $i === 0 ? 'active' : '' ?>">
                                <?= $content ?>
                            </div>
                        <?php wp_reset_query(); $i++; endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="o-section">
    <div class="o-container">
        <h2 class="c-headline">Galeria</h2>
    </div>
</section>

<!--sekcja inspiracji. inna-->

<section class="o-section o-section--creame">
    <div class="o-container">
        <h2 class="c-headline">Partnerzy</h2>
    </div>
</section>

<section class="o-section o-section--dark">
    <div class="o-container">
        <h2 class="c-headline c-headline--white">Kontakt</h2>
    </div>
</section>

<footer class="c-footer tablet--">

</footer>
