@php
// session_start();

// if (!isset($_SESSION['cue']) && $_SESSION['cue'] != 'eulapuspos@gmail.com') {
//     header('Location: ' . home_url('login'));
// }

if (isset($_POST['user'])) {
    $user = get_user_by('id', $_POST['user']);
    if ($user) {
        wp_set_current_user($_POST['user'], $user->user_login);
        wp_set_auth_cookie($_POST['user']);
        do_action('wp_login', $user->user_login, $user);
    }
}

$current_user = wp_get_current_user();

// if ($current_user->ID == 6) {
//     $_SESSION['cue'] = $current_user->user_email;
// }

@endphp

<link rel="stylesheet" href="{{ home_url('_assets/dist/css/main.css') }}">

<div class="m-5">

    <p>
        <strong class="text-danger">CURRENT USER LOGGED IN:</strong>
        {{ $current_user->user_firstname . ' ' . $current_user->user_lastname }}
    </p>

    <p>
        <strong class="text-danger">CURRENT USER ROLE:</strong>
        {{ implode(',', $current_user->roles) }}
    </p>

    <div class="card col-4">
        <div class="card-body">

            <p class="text-center">Change Current User</p>

            <form action="" method="post">

                <div class="form-group">
                    <select name="user" id="user" class="form-control">

                        @foreach (get_users() as $user)
                            <option value="{{ $user->ID }}" @if ($current_user->user_email == $user->user_email) selected @endif>
                                {{ $user->user_email }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Change User Logged In</button>
                </div>

            </form>

        </div>
    </div>

</div>
