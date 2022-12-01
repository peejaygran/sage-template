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
            "name": "{{ get_field('service_name') }}",
            "item": "{{ get_permalink(get_the_ID()) }}"
        }]
    }
</script>

@php
$get_post = get_post(get_the_ID());
$meta_description = aioseo()->meta->description->getPostDescription($get_post);
@endphp

<script type="application/ld+json" data-script-src="true">
    {
        "@context": "https://schema.org",
        "@type": "Service",
        "serviceType": "{{ get_field('service_name') }}",
        "name": "{{ get_field('service_name') }}",
        "providerMobility": "dynamic",
        "areaServed": {
            "@type": "Place",
            "name": "Australia"
        },
        "image": "https://sidepost.com.au/home-services.jpeg",
        "sameAs": [],
        "url": "{{ get_permalink(get_the_ID()) }}",
        "description": "{{ $meta_description }}",
        "category": "{{ get_field('service_name') }}",
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
            "founders": [{
                "@type": "Person",
                "name": "Phi Dang"
            }, {
                "@type": "Person",
                "name": "Rocky Vuong"
            }],
            "areaServed": {
                "@type": "AdministrativeArea",
                "name": "Australia"
            },
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
