<div class="shadow-sm flex justify-center">
    <div class="container h-16 flex items-center justify-between">
        <!-- Content left nav bar-->
        <div class="flex items-center gap-5">
            <!--Logo-->
            <div class="font-semibold text-2xl">
                <a href="/">
                    Ouroboros
                </a>
            </div>
            <!--End Logo-->
            <div class="font-light flex items-center gap-4">
                <div class="rounded-lg hover:text-blue-800">
                    <a href="">Author</a>
                </div>

                <div class="rounded-lg hover:text-blue-800">
                    <a href="">Publisher</a>
                </div>

                <div class="flex gap-1 items-center rounded-lg group">
                    <div class="inline-flex items-center gap-1 hover:text-blue-800">
                        <div class="text-xs items-center flex">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <a href="">Category</a>
                    </div>
                    {{-- <ul class="absolute hidden text-gray-700 group-hover:block">
                        <li class="">
                            <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                href="#">One</a>
                        </li>
                        <li class="">
                            <a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                href="#">Two</a>
                        </li>
                        <li class="">
                            <a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                href="#">Three is the magic number</a>
                        </li>
                    </ul> --}}
                </div>

                <div class="rounded-lg hover:text-blue-800">
                    <a href="">Articles</a>
                </div>

            </div>
        </div>
        <!-- End Content left nav bar-->

        <!-- Content right nav bar-->
        <div class="flex gap-4 text-gray-600 text-sm items-center ">
            <div class="border rounded-lg py-1 px-2 flex items-center cursor-pointer">
                <input placeholder="Search" class="w-full outline-none" />
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="cursor-pointer rounded-lg hover:text-blue-800">
                <a href={{ url('/login') }}>Login</a>
            </div>
            <div class="cursor-pointer  rounded-lg hover:text-blue-800">
                <a href={{ url('/register') }}>Register</a>
            </div>
        </div>
        <!-- End Content right nav bar-->
    </div>
</div>
