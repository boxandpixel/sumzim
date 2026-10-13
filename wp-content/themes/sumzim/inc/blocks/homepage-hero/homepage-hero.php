<?php
/**
 * Homepage Hero Block
 * 
 * Full-width hero with background video (desktop) / image (mobile).
 * The optional mobile image swaps in below 768px via <picture>, matching the
 * breakpoint where the video is hidden.
 */

$hero = get_field('homepage_hero');

if (empty($hero)) {
    return;
}

$video = !empty($hero['video']) ? $hero['video'] : null;
$image = !empty($hero['image']) ? $hero['image'] : null;
$mobile_image = !empty($hero['mobile_image']) ? $hero['mobile_image'] : null;
$headline = !empty($hero['headline']) ? $hero['headline'] : '';
$button_type = !empty($hero['button_type']) ? $hero['button_type'] : '';
$page_link = !empty($hero['page_link']) ? $hero['page_link'] : null;
$book_now_title = !empty($hero['book_now_link_title']) ? $hero['book_now_link_title'] : '';

// With only a mobile image set, use it everywhere rather than show nothing.
if (!$image && $mobile_image) {
    $image = $mobile_image;
    $mobile_image = null;
}

if (!$video && !$image && !$headline) {
    return;
}

// Responsive image setup. wp_get_attachment_image_srcset() lists every
// generated size with the same aspect ratio as the original, up to full.
$image_url = $image['url'] ?? '';
$image_alt = $image['alt'] ?? $headline;
$image_srcset = $image ? wp_get_attachment_image_srcset($image['ID'], 'full') : '';
$mobile_srcset = $mobile_image ? wp_get_attachment_image_srcset($mobile_image['ID'], 'full') : '';
if ($mobile_image && !$mobile_srcset) {
    $mobile_srcset = $mobile_image['url'];
}
?>

<section class="homepage-hero">
    <div class="homepage-hero__media">
        <?php if ($image): ?>
            <picture>
                <?php if ($mobile_image): ?>
                    <source
                        media="(max-width: 767px)"
                        srcset="<?php echo esc_attr($mobile_srcset); ?>"
                        sizes="100vw"
                        width="<?php echo esc_attr($mobile_image['width']); ?>"
                        height="<?php echo esc_attr($mobile_image['height']); ?>"
                    />
                <?php endif; ?>
                <img 
                    class="homepage-hero__image<?php echo $video ? ' homepage-hero__image--fallback' : ''; ?>"
                    src="<?php echo esc_url($image_url); ?>"
                    <?php if ($image_srcset): ?>
                        srcset="<?php echo esc_attr($image_srcset); ?>"
                        sizes="100vw"
                    <?php endif; ?>
                    width="<?php echo esc_attr($image['width']); ?>"
                    height="<?php echo esc_attr($image['height']); ?>"
                    alt="<?php echo esc_attr($image_alt); ?>"
                    loading="eager"
                    fetchpriority="high"
                    decoding="async"
                />
            </picture>
        <?php endif; ?>

        <?php if ($video): ?>
            <?php // No poster: browsers download it even while the video is hidden on mobile.
                  // The <picture> above sits underneath and shows until the first frame plays. ?>
            <video
                class="homepage-hero__video"
                muted
                loop
                playsinline
                preload="none"
            >
                <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4">
            </video>
            <script>
            (function(){
              var v=document.querySelector('.homepage-hero__video');
              // The video is hidden below 768px; calling play() there would still download it.
              if(!v||!window.matchMedia('(min-width: 768px)').matches)return;
              if(window.PerformanceObserver){
                new PerformanceObserver(function(list,obs){obs.disconnect();v.play().catch(function(){});}).observe({type:'largest-contentful-paint',buffered:true});
              } else {
                window.addEventListener('load',function(){v.play().catch(function(){});});
              }
            })();
            </script>
        <?php endif; ?>

        <div class="homepage-hero__gradient"></div>
    </div>

    <?php if ($headline || $button_type): ?>
        <div class="homepage-hero__content">
            <?php if ($headline): ?>
                <h1 class="homepage-hero__headline"><?php echo esc_html($headline); ?></h1>
            <?php endif; ?>

            <?php if ($button_type === 'Link' && $page_link && !empty($page_link['url'])): ?>
                <div class="homepage-hero__button">
                    <a href="<?php echo esc_url($page_link['url']); ?>" 
                       class="button button--large button--primary"
                       <?php echo !empty($page_link['target']) ? 'target="' . esc_attr($page_link['target']) . '"' : ''; ?>
                    >
                        <?php echo esc_html($page_link['title']); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($button_type === 'Book Now'): ?>
                <?php
                $global_phone     = get_field( 'phone_number', 'options' );
                $global_phone_tel = preg_replace( '/[^0-9]/', '', $global_phone );
                ?>
                <div class="homepage-hero__book-now">

                    <div class="homepage-hero__mobile">
                        <?php if ( $global_phone ) : ?>
                        <a href="tel:<?= esc_attr( $global_phone_tel ); ?>" class="button button-cta button--schedule button--large">
                            Call <?= esc_html( $global_phone ); ?>
                        </a>
                        <?php endif; ?>
                        <button class="homepage-hero__book-now-text" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button">or Book Now <span class="material-symbols-outlined" aria-hidden="true">&#xe5c8;</span></button>
                    </div>

                    <div class="homepage-hero__desktop">
                        <button class="button button-cta button--schedule button--large" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button"><?= esc_html( $book_now_title ); ?></button>
                    </div>

                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>