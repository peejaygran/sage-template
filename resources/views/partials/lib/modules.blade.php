<?php

defined('ABSPATH') or die("");

  $module_array = [
     '2_column_strip',
     'local_information',
     'dynamic_faq',
      '1_column_block'
  ];




  ?>
  @if (isset($fields["modules"]) && $modules = $fields["modules"])


    @foreach ( $modules as $module_number => $module  )

      @if( in_array ( $module["acf_fc_layout"] , $module_array ))
        
       @php
          $this_module = $module
        @endphp
        @include('partials/modules/'.$module["acf_fc_layout"])


      @endif
      
      
       
    @endforeach
    
  @endif
  @if (isset($fields["landing_pages"]) && $modules = $fields["landing_pages"])
   

    @foreach ( $modules as $module_number => $module  )




        @include('partials/modules/'.$modules[0]["acf_fc_layout"])

      
      
       
    @endforeach
    
  @endif




