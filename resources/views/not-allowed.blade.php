@php
if (!is_user_logged_in()) {
    header('Location: ' . home_url('login'));
}
@endphp
{{-- @php
$random = bin2hex(random_bytes(4));
$redirecting = home_url();
@endphp

<div style="height: 100vh; width: 100%; display: flex; align-items: center; justify-content: center;">
    <h1 style="text-align: center; color:#6c757d;">You're not allowed to access this page, will redirect to homepage
        in
        <span id="timer">5</span> seconds
    </h1>
</div>

<script>
    let n = 5;
    setInterval(function() {
        document.querySelector('#timer').innerText = n;
        if (n == 0) {
            window.location.href = "{{ $redirecting }}";
        }
        if (n > 0) {
            n--;
        }
    }, 1000);
</script>

@php die(); @endphp --}}
