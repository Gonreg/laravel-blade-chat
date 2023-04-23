<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="icon" href="./favicon.png">
    <title>Login</title>
</head>
<body>
<section class="flex bg-gray-50 dark:bg-gray-900 h-screen items-center justify-center">
    <form method="post" action="/api/auth/login" class="flex flex-col w-1/4 justify-center gap-y-2">
        @csrf
        <input name="email" type="email" class="flex rounded bg-gray-300/10 cursor-pointer p-2.5 hover:bg-gray-300" placeholder="Введите свою почту">
        <input name="password" type="password" class="flex rounded bg-gray-300/10 cursor-pointer p-2.5 hover:bg-gray-300" placeholder="Введите свой пароль">
        <div class="flex flex-row w-full self-center gap-x-2.5">
            <button class="flex rounded bg-gray-300/50 w-full cursor-pointer p-2.5 hover:bg-gray-300 justify-center">Войти</button>
            <a href="/" class="flex rounded bg-gray-300/50 w-full cursor-pointer p-2.5 hover:bg-gray-300 justify-center">Назад</a>
        </div>

    </form>
</section>
</body>
</html>
