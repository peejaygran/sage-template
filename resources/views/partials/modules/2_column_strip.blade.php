
<div class="two_column_strip container-fluid block_container p-4 p-lg-5">
    <div id="{!! $this_module['2_column_strip_id'] !!}">
        <div class="row">
            <div class="col-md-7 col-lg-8">
                <h3> {!! $this_module['2_column_strip_heading'] !!}</h3>

                {!! $this_module['2_column_strip_content'] !!}
            </div>
            <div class="col-md-5 col-lg-4">

                @php
                    
                    $images = $this_module['2_column_strip_image'];
                    
                    if ($images):
                        echo wp_get_attachment_image($images['ID'], '', '', ['class' => 'w-100']);
                    endif;
                    
                @endphp

            </div>
        </div>
    </div>
</div>

<style>
    .two_column_strip img{
        height: auto;
    }
</style>
