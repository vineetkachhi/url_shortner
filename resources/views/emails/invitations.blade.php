<!DOCTYPE html>
<html>

<head>
    <title>Admin Invitation</title>
</head>

<body>

    <h2>Hello {{ $user->name ?: 'Admin' }}</h2>

    <p>You have been invited as an Admin.</p>

    <p>
        Click the link below to accept the invitation:
    </p>

    <p>
        <a href="{{ url('/invitation/' . $user->invite_token) }}">
            Accept Invitation
        </a>
    </p>

    <p>This link is unique to your account.</p>

</body>

</html>
