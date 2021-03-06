<div id="start" class="c-anchor"></div>
<div class="c-banner"></div>

<div id="about" class="c-anchor"></div>
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

<div id="employes" class="c-anchor"></div>
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

<div id="services" class="c-anchor"></div>
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

<div id="gallery" class="c-anchor"></div>
<section class="o-section">
    <div class="o-container">
        <h2 class="c-headline">Galeria</h2>

        <div class="c-gallery js-gallery owl-carousel owl-theme">
            <?php if (have_rows('us_galeries')): ?>
                <?php while(have_rows('us_galeries')):
                    the_row();
                    $title = get_sub_field('us_single_galery_title');
                    $images = get_sub_field('us_single_galery');
                    $url = $images[0]['url'];
                ?>
                    <div class="js-lightgallery">
                        <?php foreach ($images as $index => $image): ?>
                            <?php if ($index === 0): ?>
                                <a href="<?= $image['url'] ?>" class="c-gallery__item">
                                    <div class="c-gallery__item-img" style="background-image: url('<?= $image['url'] ?>')"></div>
                                    <p class="c-gallery__item-title"><?= $title ?></p>
                                </a>
                            <?php else: ?>
                                <a href="<?= $image['url'] ?>" style="display: none">
                                    <img src="<?= $image['url'] ?>" alt="">
                                </a>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<!--sekcja inspiracji. inna-->
<div id="inspirations" class="c-anchor"></div>
<section class="c-inspirations">
    <div class="c-inspirations__title">Inspiracje</div>
    <?php $inspirations = get_field('us_inspirations'); ?>

    <div class="js-inspirations owl-carousel owl-theme">
        <?php if( $inspirations ): ?>
            <?php foreach( $inspirations as $inspiration ): ?>
                <div class="c-inspiration">
                    <img src="<?= $inspiration['url'] ?>" alt="">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<div id="certificates" class="c-anchor"></div>
<section class="o-section">
    <div class="o-container">
        <h2 class="c-headline">Certyfikaty</h2>
        <?php $certificates = get_field('us_certificates'); ?>


        <div class="c-certificates js-certificates owl-carousel owl-theme owl-lazy">
            <?php if( $certificates ): ?>
                <?php foreach( $certificates as $certificate ): ?>
                    <img data-src="<?= $certificate['url'] ?>" alt="certyfikat" class="owl-lazy js-certificate-img">
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
</section>

<div id="partners" class="c-anchor"></div>
<section class="o-section o-section--creame">
    <div class="o-container">
        <h2 class="c-headline">Partnerzy</h2>
        <div class="grid grid--middle">
            <div class="grid__item tab--one-third">
                <img src="<?= get_template_directory_uri() ?>/dist/images/logo-goldwell.png" alt="goldwell">
            </div><!--
            --><div class="grid__item tab--one-third">
                <img src="<?= get_template_directory_uri() ?>/dist/images/logo-nahh.jpg" alt="nah">
            </div><!--
            --><div class="grid__item tab--one-third">
                <img src="<?= get_template_directory_uri() ?>/dist/images/logo-ka.png" alt="ka">
            </div>
        </div>
    </div>
</section>

<div id="contact" class="c-anchor"></div>
<section class="o-section o-section--dark">
    <div class="o-container">
        <h2 class="c-headline c-headline--white">Kontakt</h2>

        <div class="grid">
            <div class="grid__item desk--one-quarter">
                <div class="c-contact__info">
                    <div class="c-contact__info-head">Adres</div>
                    <div class="c-contact__info-text">
                        40-224 Katowice<br>
                        ul. Krzyżowa 9
                    </div>
                    <div class="c-contact__info-head">Kontakt</div>
                    <div class="c-contact__info-text">
                        <a href="tel:322043291">32 204 32 91</a><br>
                        <a href="tel:601510272">601 510 272</a><br>
                        <a href="email:bmdbro@wp.pl" class="u--text-secondary">bmdbro@wp.pl</a>
                    </div>
                    <div class="c-contact__info-head">Godziny otwarcia</div>
                    <div class="c-contact__info-text">
                        wtorek - czwartek 10.00-18.00<br>
                        piątki 10.00-20.00<br>
                        soboty 8.00-15.00<br>
                        w poniedziałki nieczynne.
                    </div>
                </div>
            </div><!--
            --><div class="grid__item desk--three-quarters">
                <div id="map" class="c-map"></div>
            </div>
        </div>
    </div>
</section>

<footer class="c-footer tablet--">

</footer>
