<!DOCTYPE html>
<html lang="en">
<body>
    <p>
        Hello {{ $user->name }},
        You have been registered to our site.
    </p>
    <p>
        Your login details are as below:<br />
        Username: {{ $user->name }}<br />
        Email: {{ $user->email }}
    </p>
</body>
</html>