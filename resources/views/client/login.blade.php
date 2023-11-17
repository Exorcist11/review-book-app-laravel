@extends('layouts.index')

@section('content')
    <div class="container pt-3">
        <div class="flex items-center gap-4 ">
            <a href={{ url('/') }} class="hover:opacity-80">Home</a>
            <div class="text-xs">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <a href={{ url('/login') }} class="hover:opacity-80">Login</a>
        </div>

        <div class="flex justify-center">
            <div class="border rounded-md mt-3 w-2/3">
                <div class="px-5 py-1 bg-[#f2f3f5] border-b">
                    Login
                </div>
                <div class="flex justify-center">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="flex gap-3 p-3 items-center">
                            <div class="float-right w-2/5 font-thin">
                                Email Address
                            </div>
                            <div class="border w-[400px]">
                                <input type="text" name="email" id="" class="w-full outline-none px-2 py-0.5">
                            </div>
                        </div>

                        <div class="flex gap-3 p-3 items-center">
                            <div class="float-left w-2/5 font-thin">Password</div>
                            <div class="border w-[400px]">
                                <input type="text" name="password" id=""
                                    class="w-full outline-none px-2 py-0.5">
                            </div>
                        </div>

                        <div class="flex justify-end p-3">
                            <button type="submit"
                                class="border px-3 py-1 rounded-xl bg-[#0d6efd] text-white hover:opacity-90">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection