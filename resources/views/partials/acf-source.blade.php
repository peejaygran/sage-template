
@if (isset($custom_post_id)) 
    @if (   is_user_logged_in()    )
        <hr>
        <p class="acf-parent-source text-muted font-italic small mb-5"> *The block below uses contents from  <a target="_blank" href="{{ get_permalink(   $custom_post_id    ) }}"> {{ get_the_title( $custom_post_id )}} </a> and can be edited <a target="_blank" href="{{ site_url() . "/wp-admin/post.php?post=" . $custom_post_id . "&action=edit" }}"> here </a></p>
    @endif
@endif