<?php
/**
 * Half Split – Google Map layout
 */

$map = get_query_var('google_map_data') ?: [];

if (empty($map) || (empty($map['lat']) && empty($map['address']))) {
    return;
}

$query     = !empty($map['address']) ? urlencode($map['address']) : $map['lat'] . ',' . $map['lng'];
$zoom      = !empty($map['zoom']) ? (int) $map['zoom'] : 15;
$embed_url = 'https://www.google.com/maps/embed/v1/place?key=' . GOOGLE_MAPS_API_KEY . '&q=' . $query . '&zoom=' . $zoom;
?>

<div class="half-split__map">
    <iframe
        src="<?php echo esc_url($embed_url); ?>"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
</div>
