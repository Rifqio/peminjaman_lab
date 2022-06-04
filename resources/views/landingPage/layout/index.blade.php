<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/3a7766bf6b.js" crossorigin="anonymous"></script>
    <title>Welcome</title>
</head>

<body>
    @yield('content')
<script>        
function toggleMenu(flag) {
    let value = document.getElementById("menu");
    if (flag) {
        value.classList.remove("hidden");
    } else {
        value.classList.add("hidden");
    }
}

    </script>
</body>

</html>
