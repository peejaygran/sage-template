@php
$_seo = new _Seo();

$descriptions = [
    1543 => 'Looking for cheap home cleaning in [Location]? Our Sydney home cleaning service is guaranteed to handle all of your household chores. Book a quote today!',
    1772 => 'Receive a professional house painting service in [Location] from Sidepost. We offer affordable interior and exterior painting for your [Location] home.',
    1657 => 'Sidepost offers fencing installation in [Location] for all your fencing needs. Our [Location] fencing contractors can help with all fencing services.',
    1670 => 'Find the best carpet cleaners in [Location] with Sidepost. We provide cheap and professional carpet cleaning services in [Location]. Book today!',
    1675 => 'Sidepost provides an air conditioning service in [Location] to keep you cool all summer long. Book your [Location] air conditioner service online today!',
    1770 => 'Looking for a building and pest inspection in [Location]? Sidepost offers affordable building inspections to property buyers, sellers and investors.',
    1705 => 'Looking for a mobile car detailing service in [Location]? Sidepost offers a complete range of car detailing services in [Location] to suit your needs. Get in touch today!',
    2264 => "Looking for a reliable pool cleaning in [Location]? Sidepost's pool cleaners in [Location] can help you keep your swimming pool clean and well-maintained all year.",
    1746 => 'Have pests overran your home? We offer pest control in [Location] to get rid of your home’s pests. Book our affordable [Location] pest control services today!',
    2305 => 'Get perfectly installed carpets in [Location] with Sidepost. We provide top-notch carpet installation in [Location] at affordable prices. Book today and get a free quote!',
    1669 => "Sidepost provides an affordable and reliable mobile car wash service in [Location]. We'll come to you and wash your car while you're at work or at home.",
    2322 => 'Looking for cheap dry cleaning in [Location]? We offer dry cleaners in [Location] at affordable prices, and will collect and drop off your clothes right at your doorstep!',
    1741 => 'Looking for cheap dry cleaning in [Location]? We offer dry cleaners in [Location] at affordable prices, and will collect and drop off your clothes right at your doorstep!',
    1571 => "Need pressure cleaning in [Location] for your home's exterior? Our [Location] pressure cleaning service is affordable and can help keep your home looking its best.",
    1551 => 'Looking for the best lawn mowing services near you in [Location]? Our affordable lawn service ensures your lawn is well-maintained and healthy all year-round. Contact us today!',
    1714 => 'Need blinds installed in your [Location] home? Contact the [Location] blinds experts at Sidepost for a blinds installation quote today!',
];

$locations = get_posts([
    'numberposts' => -1,
    'post_type' => 'location',
]);

foreach ($locations as $location_page) {
    $service_id = get_field('main_service', $location_page->ID)['service'][0]->ID;
    $location = get_field('location', $location_page->ID)['location'];
    $meta_description = str_replace('[Location]', $location, $descriptions[$service_id]);

    $_seo->updateMetaDescription($location_page->ID, $meta_description);
}

@endphp
