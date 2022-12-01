

@php
  $faq_items = false;
  if( isset($custom_post_id) ){
    $faq_items = get_field('faq', $custom_post_id);  
  }
   
@endphp



  

  
    @if ($faq_items)

      <div id="accordion" class="faq-card mb-5">
        <h4>Frequently Asked Questions</h4>


          
          @foreach ( $faq_items as $key => $_faq_item)


          <div class="card">
            <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapse{{ $key }}">
                {{  $_faq_item["question"] }}
                <span class="float-right"><i class="fa-solid fa-angle-down"></i></span>
              </a>
            </div>
            
            <div id="collapse{{ $key}}" class="collapse" data-parent="#accordion">
              <div class="card-body">
                {{  $_faq_item["answer"] }}
              </div>
            </div>
          </div>
              
          @endforeach

      </div>

    @endif






<style>

  .faq-card{
    padding: 1.5rem !important;
    background-color: #f1f6fd;
    border: none !important;
    border-radius: 0% !important;
  }

  .faq-card .card .card-header{
    background-color: #f1f6fc;
    border-top: 1px solid rgba(0,0,0,.125);
    border-bottom: none;
  }


  

  .faq-card .card {
    background-color: #f1f6fd;
    border: none !important;
    border-radius: 0% !important;
    
  }

  .faq-card .accordion {
    border-top: 1px solid #e6ebed;
    padding: 15px 0;
  }

  .faq-card .accordion-heading span {
    float: right;
  }

  .faq-card .accordion-heading span, a {
    color:#183B56;
    font-size: 16px;
  }
  
  .faq-card .card .card-header i{
    margin-right: -10px;
  }

  </style>
