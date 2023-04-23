<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
            integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="icon" href="./favicon.png">
    <title>Chat</title>
    @vite('resources/js/app.js')

</head>
<body>
<section class="relative flex flex-row bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div id="userList" class="fixed flex flex-col w-1/4 h-full bg-slate-200 p-2.5 gap-y-2.5">
        <div class="flex bg-white justify-center p-1 rounded-lg">Пользователи</div>
    </div>
    <div class="flex flex-col ml-[25%] w-3/4 min-h-screen bg-slate-100 w-2/3">
        <div id="messages" class="flex flex-col h-8/10 gap-y-2 p-5 pb-[100px]">
        </div>
        <form class="fixed bottom-0 flex flex-row align-self-end p-2.5 bg-slate-200 w-4/5 gap-x-2.5">
            <textarea id="message" class="rounded-lg w-3/4" placeholder="Введите свое сообщение"></textarea>
            <button type="submit" class="rounded-lg w-1/4 bg-gray-300/50 hover:bg-gray-300">Отправить</button>
        </form>
    </div>
</section>
</body>
<script>
    let messages = {{\Illuminate\Support\Js::from($messages)}};
    messages.forEach((message) => {
        if (message.user_id === {{Auth::id()}}) {
            $("#messages").append('<div class="flex w-full justify-end">' +
                '<div class="p-4 bg-cyan-500 rounded-l-xl rounded-tr-xl">' +
                message.message_text +
                '</div>' +
                '</div>')
        } else {
            $("#messages").append('<div class="flex w-full justify-start">' +
                '<div class="p-4 bg-cyan-600 rounded-l-xl rounded-tr-xl">' +
                message.message_text +
                '</div>' +
                '</div>')
        }
    })

</script>
<script>
    let usersList;
    $.get("api/users", function (data) {
        usersList = data
        usersList.forEach(function (user) {
            $('#userList').append(`<a href="/chat/${user.id}"><div class="flex rounded-lg p-2.5 bg-slate-400 cursor-pointer">${user.name}</div></a>`)
        })
    });

    setTimeout(function () {
        window.scrollTo(0, document.body.scrollHeight);
    }, 10);

</script>
<script type="module">
    channel.listen('.NewMessage', function (event) {
        $("#messages").append('<div class="flex w-full justify-end">' +
            '<div class="p-4 bg-cyan-500 rounded-l-xl rounded-tr-xl">' +
            event.message +
            '</div>' +
            '</div>')
    })
</script>

<script>
    $("form").submit(function (event) {
        let formData = {
            message_text: $("#message").val(),
            chat_room_id: {{$room_id}}
        };

        $.ajax({
            type: "POST",
            url: "/api/chat/send",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            console.log(data);
        });

        event.preventDefault();
    })
</script>

</html>
