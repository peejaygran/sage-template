<div class="container mt-5">

    <h4>{{ the_title() }}</h4>
    <p>This is the location of all variables used across the site.</p>
    <p><strong>1400</strong> is the static ID</p>
    @php
        
        $post_id = 1400;
        
        echo '<p>Website Logo </p>';
        $website_logo = get_field('website_logo', $post_id);
        
        echo '<img src="'. $website_logo . '" style="margin-bottom: 20px;"/>';
        
        echo '<p> Sample Usage:</p>';
        echo '<code> $website_logo = get_field("website_logo", 1400); </code>';
        echo '<br> <hr> <br><br>';
        
        echo '<p>Website Favicon </p>';
        $website_favicon = get_field('website_favicon', $post_id);
        
        echo '<img src="' . $website_favicon . '" style="margin-bottom: 20px; width: 100px;"/>';
        
        echo '<p> Sample Usage:</p>';
        echo '<code> $website_favicon = get_field("website_favicon", 1400 ); </code>';
        echo '<br> <hr> <br><br>';
        
        echo '<p>Phone </p>';
        $phone = get_field('phone', $post_id);
        
        echo '<pre>';
        print_r( $phone  );
        echo '</pre>';
        
        echo '<p> Sample Usage:</p>';
        echo '<code> $phone = get_field("phone", 1400 ); </code>';
        echo '<br> <hr> <br><br>';
        
        echo '<p>Email </p>';
        $email = get_field('email', $post_id);
        
        echo '<pre>';
        print_r( $email  );
        echo '</pre>';
        
        echo '<p> Sample Usage:</p>';
        echo '<code> $email = get_field("email", 1400 ); </code>';
        echo '<br> <hr> <br><br>';
        
        echo '<p>Address </p>';
        $address = get_field('address', $post_id);
        
        echo '<pre>';
        print_r( $address  );
        echo '</pre>';
        
        echo '<p> Sample Usage:</p>';
        echo '<code> $address = get_field("address", 1400 ); </code>';
        echo '<br> <hr> <br><br>';
        
        echo '<p>Social Media </p>';
        $social_media_links = get_field('social_media_links', $post_id);
        
        echo '<pre>';
        print_r( $social_media_links  );
        echo '</pre>';
        
        echo '<p> Sample Usage:</p>';
        echo '<code> $address = get_field("social_media_links", 1400 ); </code>';
        echo '<br> <hr> <br><br>';
        
        echo '<p>Working Hours </p>';
        $working_hours = get_field('working_hours', $post_id);
        
        echo '<pre>';
        print_r( $working_hours  );
        echo '</pre>';
        
        echo '<p> Sample Usage:</p>';
        echo '<code> $working_hours = get_field("working_hours", 1400); </code>';
        echo '<br> <hr> <br><br>';
        
    @endphp
    <div>
