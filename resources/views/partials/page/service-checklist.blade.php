<div class="container">


    <h1>POST ID: {{ get_the_ID() }}</h1>
    <p>This is our reference where we get all the service fields. This is only visible when you are logged in.</p>
    <p>Here's the code:</p>

    <code> $available_services = get_field("static_services"); </code>
    
    <p>Below is the result:</p>


    @php
        
        $available_services = get_field("static_services");

        echo '<pre>';
        print_r($available_services);
        echo '</pre>';
        

    @endphp
</div>

