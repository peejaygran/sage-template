<h1>Bound Links</h1>

@php
if (is_user_logged_in() && get_current_user_id() == 6 && isset($_POST['config'])) {
    if ($_POST['config'] == 'truncate') {
        $functions->truncate_seo_cache('natadecoco06');
    }

    if ($_POST['config'] == 'cache_homepage') {
        $functions->cache_bound();
    }

    if ($_POST['config'] == 'cache_outbound') {
        $functions->cache_outbound();
    }

    if ($_POST['config'] == 'cache_non_existent') {
        $functions->cache_non_existent();
    }

    if ($_POST['config'] == 'cache_no_inbound_links') {
        $functions->cache_no_inbound_links();
    }
}

@endphp



<form action="" method="post">
    <p>Truncate Cache Links</p>
    <input type="hidden" name="config" value="truncate">
    <button type="submit">Truncate</button>
</form>


<form action="" method="post">
    <p>Cache Homepage Bound Links</p>
    <input type="hidden" name="config" value="cache_homepage">
    <button type="submit">Cache</button>
</form>


<form action="" method="post">
    <p>Cache Homepage Outbound Bound Links (Note: Cache Homepage First)</p>
    <input type="hidden" name="config" value="cache_outbound">
    <button type="submit">Cache</button>
</form>

<form action="" method="post">
    <p>Cache No Inbound Links</p>
    <input type="hidden" name="config" value="cache_no_inbound_links">
    <button type="submit">Cache</button>
</form>

<form action="" method="post" style="display:none">
    <p>Cache Outbound Links (Note: Cache non-existent url)</p>
    <input type="hidden" name="config" value="cache_non_existent">
    <button type="submit">Cache</button>
</form>
