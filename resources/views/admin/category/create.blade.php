@extends('layouts.admin')

@section('admin')
    <div>
        <div class="flex items-center gap-4 ">
            <a href={{ url('/admin/category') }} class="hover:opacity-80">Category</a>
            <div class="text-xs">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <a href={{ url('/admin/category/create') }} class="hover:opacity-80">Create</a>
        </div>

        <div class="flex justify-center">
            <div class="border rounded-md mt-3 w-2/3">
                <div class="px-5 py-1 bg-[#f2f3f5] border-b">
                    <p class="uppercase">Create new category</p>
                </div>
                <div class="flex justify-center">
                    <form action="/admin/category/create" method="POST">
                        @csrf
                        <div class="flex gap-3 p-3 items-center">
                            <div class="float-right w-2/5 font-thin">
                                Category Name
                            </div>
                            <div class="border w-[400px]">
                                <input type="text" name="categoryName" id=""
                                    class="w-full outline-none px-2 py-0.5">
                            </div>
                        </div>

                        <div class="flex gap-3 p-3 items-center">
                            <div class="float-left w-2/5 font-thin">Description</div>
                            <div class="border w-[400px]">
                                <textarea type="text" name="description" id="" class="w-full outline-none px-2 py-0.5 h-32 resize-none">
                                </textarea>

                            </div>
                        </div>

                        <div class="flex justify-end p-3 gap-3 items-center">
                            <button type="submit"
                                class="border px-3 py-1 rounded-xl bg-[#0d6efd] text-white hover:opacity-90">Create
                            </button>

                            <div class="border rounded-xl px-2 py-1">
                                <a href={{ url('/admin/category') }}>Back to Menu</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
