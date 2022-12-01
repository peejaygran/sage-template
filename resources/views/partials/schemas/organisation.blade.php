
@php

$schema =  array (
                    '@context' => 'http://www.schema.org',
                    "@type"         => "Organization", 
                    "name"          => "Sidepost", 
                    "legalName"     => "Sidepost", 
                    "url"           => "https://sidepost.com.au/", 
                    "Logo"          => "https://sidepost.com.au/wp-content/uploads/2022/06/sidepost_full_logo_black-nobg-small.png", 
                    "image"         => "https://sidepost.com.au/home-services.jpeg", 
                    "contactPoint"  => [
                                        "@type"             => "ContactPoint", 
                                        "contactType"       => "Customer Service", 
                                        "telephone"         => "+61300991368", 
                                        "email"             => "support@sidepost.com.au", 
                                        "areaServed"        => "AU", 
                                        "availableLanguage" => "en" 
                                    ], 

                    "sameAs"        => [ 
                                        "https://www.facebook.com/sidepostservices",
                                        "https://www.linkedin.com/company/sidepost-services/",
                                        "https://twitter.com/sidepostau",
                                        "https://www.pinterest.com.au/sidepostservices",
                                        "https://www.trustpilot.com/review/sidepost.com.au",
                                        "https://www.youtube.com/channel/UCEmwzzJLcnFAscXVo310Oxw",
                                        "https://www.quora.com/profile/Sidepost" 
                                    ], 

                    "foundingDate"=> "2022", 
                    "foundingLocation"=> "Melbourne", 

                    "founders"  => array(
                                    [
                                        "@type"  => "Person", 
                                        "name"=> "Phi Dang" 
                                    ],
                                    [
                                        "@type"  => "Person", 
                                        "name"=> "Rocky Vuong" 
                                    ]
                    ),
                    'address' =>  array (
                                            '@type'             => 'PostalAddress'
                                            ,"streetAddress"     => "20 Hardner Street"
                                            ,"addressLocality"   => "Melbourne"
                                            ,"addressRegion"     => "VIC" 
                                            ,"postalCode"        => "3149"
                                            ,"addressCountry"    => "Australia"
                                        ),  
                    
                    "memberOf" => [ "https://www.aepma.com.au/","https://www.ndis.gov.au/" ] 
                );

@endphp

<script type="application/ld+json" data-script-src="true" class="d-none" style="display:none;">
    {!!  json_encode($schema); !!}
</script> 
    