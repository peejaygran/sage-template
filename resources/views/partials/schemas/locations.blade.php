@php
$_reviews = new _reviews();
$tp_reviews = $_reviews->get_tp_reviews();
$total_rate = 0;
foreach ($tp_reviews as $tp_review) {
    $total_rate += $tp_review->customer_review_rate;
}

$total_rate /= count($tp_reviews);
$review_counts = count($tp_reviews);
@endphp

<script type="application/ld+json" data-script-src="true">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ home_url() }}"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "Services",
            "item": "{{ home_url('services/') }}"
        }, {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $service[0]->post_title }}",
            "item": "{{ get_permalink($service[0]->ID) }}"
        }, {
            "@type": "ListItem",
            "position": 4,
            "name": "{{ $locations['location'] }}",
            "item": "{{ get_permalink(get_the_ID()) }}"
        }]
    }
</script>




@php
$get_post = get_post($service[0]->ID);
$service_description = aioseo()->meta->description->getPostDescription($get_post);
@endphp
<script type="application/ld+json" data-script-src="true">
    {
        "@context": "http://schema.org/",
        "@type": "Product",
        "name": "{{ $service[0]->post_title . ' ' . $locations['location'] }}",
        "category": "{{ $service[0]->post_title }}",
        "description": "{{ $service_description }}",
        "url": "{{ get_permalink($service[0]->ID) }}",
        "image": "{{ home_url('home-services.jpeg') }}",
        "brand": {
            "@type": "Brand",
            "name": "Sidepost"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": {{ $total_rate }},
            "ratingCount": {{ $review_counts }},
            "bestRating": "5",
            "worstRating": "1"
        }
    }
</script>








@php
$get_post = get_post(get_the_ID());
$location_description = aioseo()->meta->description->getPostDescription($get_post);
@endphp

<script type="application/ld+json" data-script-src="true">
    {
        "@context": "https://schema.org",
        "@type": "Service",
        "serviceType": "{{ $service[0]->post_title }}",
        "name": "{{ $service[0]->post_title }}",
        "providerMobility": "dynamic",
        "areaServed": {
            "@type": "Place",
            "name": "{{ $locations['location'] }}",
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "{{ $locations['lat'] }}",
                "longitude": "{{ $locations['lng'] }}"
            },
            "url": "{{ get_permalink(get_the_ID()) }}",
            "description": "{{ $location_description }}"
        },
        "image": "https://sidepost.com.au/home-services.jpeg",
        "sameAs": [],
        "url": "{{ get_permalink($service[0]->ID) }}",
        "description": "{{ $service_description }}",
        "category": "{{ $service[0]->post_title }}",
        "provider": {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Sidepost",
            "legalName": "Sidepost",
            "url": "https://sidepost.com.au/",
            "Logo": "{{ home_url('sidepost_full_logo_black.png') }}",
            "image": "https://sidepost.com.au/home-services.jpeg",
            "contactPoint": {
                "@type": "ContactPoint",
                "contactType": "Customer Service",
                "telephone": "+61300991368",
                "email": "support@sidepost.com.au",
                "areaServed": "AU",
                "availableLanguage": "en"
            },
            "sameAs": ["https://www.facebook.com/sidepostservices",
                "https://www.linkedin.com/company/sidepost-services/",
                "https://twitter.com/sidepostau",
                "https://www.pinterest.com.au/sidepostservices",
                "https://www.trustpilot.com/review/sidepost.com.au",
                "https://www.youtube.com/channel/UCEmwzzJLcnFAscXVo310Oxw",
                "https://www.quora.com/profile/Sidepost"
            ],
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "20 Hardner Street",
                "addressLocality": "Melbourne",
                "addressRegion": "VIC",
                "postalCode": "3149",
                "addressCountry": "Australia"
            },
            "memberOf": ["https://www.aepma.com.au/",
                "https://www.ndis.gov.au/"
            ]
        }
    }
</script>

@if (get_field('faq'))
    @php
        $faq_counter = 0;
        $faq_count = 0;
        if (is_array(get_field('faq'))) {
            $faq_count = count(get_field('faq'));
        }
        $faq_schemas = [];
        foreach (get_field('faq') as $faq) {
            if ($faq['question'] != '' && $faq['answer'] != '') {
                $faq_schemas[] =
                    '{
            "@type": "Question",
            "name": "' .
            $faq['question'] .
            '",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "' .
            $faq['answer'] .
            '"}
            }';
            } else {
                $faq_counter++;
            }
        }
        $faq_schemas = implode(', ', $faq_schemas);
    @endphp

    @if ($faq_counter < $faq_count)
        <script type="application/ld+json" data-script-src="true">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {!! $faq_schemas !!}
                ]
            }
        </script>
    @endif
@endif
