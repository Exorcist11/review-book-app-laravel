<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:wght@500&display=swap"
        rel="stylesheet">
    <title>Admin Review book app</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
</head>

<body>
    <div class="flex">
        <div class="w-1/5  flex flex-col gap-3 border-r h-screen">
            <div class="font-bold text-xl p-4">
                Ouroboros
            </div>
            <x-sidebar></x-sidebar>
        </div>
        

        <div class="flex flex-col gap-3 p-4 w-4/5">
            <div class="flex justify-between items-center p-1">
                <div class="border rounded-xl flex items-center gap-2 px-3 py-1">
                    <div class="text-sm text-gray-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="flex items-center text-sm">
                        <input type="text" class="outline-none" placeholder="Search">
                    </div>
                </div>
                <div class="flex gap-3 items-center">
                    <div>
                        Nguyen Xuan Dung
                    </div>
                    <div class="cursor-pointer border rounded-lg py-1 px-2 hover:opacity-60 flex items-center gap-2">
                        <h1>Log out</h1>  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </div>
                </div>
            </div>

            <div>
                @yield('admin')
            </div>
        </div>
    </div>

</body>



</html>
