<div class="block-locations-FAQ container-fluid">
    <div class="container mt-3">
        <h2 class="mb-5"> {!! $this_module['title'] !!}</h2>

        <div id="removals-locations" class="row pt-1 removals-locations">

            <div class="col-12 col-md-6 pt-0 pt-lg-5 pr-0 pr-lg-5">
                {!! $this_module['description'] !!}
            </div>

            <div class="about col-12 col-md-6">

                <link rel="stylesheet" href="https://whatstorage.co.uk/css/hover-min.css" type="text/css" media="all" />

                <?php $faq_items = $this_module['faq_items']; ?>

                <?php foreach ($faq_items as $key => $item): ?>

                
                {{-- <div class="card faq-cards p-3">
                            <a href="{{ $item["faq_answer"] }}">{{ $item["faq_question"] }}</a>
                        </div> --}}

                <div class="card faq-cards p-3">
                    <a href="#answer" class="text-left" data-toggle="collapse">{{ $item["faq_question"] }}</a>
                    <div id="answer" class="collapse">
                        {{ $item['faq_answer_text'] }}
                    </div>
                </div>

                <?php endforeach; ?>




                <style>
                    html {
                        scroll-behavior: smooth;
                    }

                    [id] {
                        scroll-margin-top: 120px;
                    }

                </style>





                @php
                    
                    $schema_items = [];
                    foreach ($faq_items as $key => $item):
                        $schema_items[] =
                            '{
                                                                                    "@type": "Question",
                                                                                    "name": "' .
                            $item['faq_question'] .
                            '",
                                                                                    "acceptedAnswer": {
                                                                                        "@type": "Answer",
                                                                                        "text": "' .
                            $item['faq_answer_text'] .
                            '" 
                                                                                    }
                                                                                }';
                    endforeach;
                    
                @endphp

                {{-- <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "FAQPage",
                        "mainEntity": [
                            {!! implode( "," ,$schema_items) !!}
                        ]
                      }
                </script> --}}

            </div>
        </div>
    </div>
</div>
