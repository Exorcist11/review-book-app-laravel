@extends('layouts.admin')

@section('admin')
    <div>
        <div class="flex items-center gap-4 ">
            <a href={{ url('/admin/author') }} class="hover:opacity-80">Author</a>
            <div class="text-xs">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <a href={{ url('/admin/author/create') }} class="hover:opacity-80">Create</a>
        </div>

        <div class="flex justify-center">
            <div class="border rounded-md mt-3 w-2/3">
                <div class="px-5 py-1 bg-[#f2f3f5] border-b">
                    <p class="uppercase">Create new author</p>
                </div>
                <div class="flex justify-center">
                    <form action="/admin/author/create" method="POST">
                        @csrf
                        <div class="flex gap-3 p-3 items-center">
                            <div class="float-right w-2/5 font-thin">
                                Author Name
                            </div>
                            <div class="border w-[400px]">
                                <input type="text" name="authorName" id=""
                                    class="w-full outline-none px-2 py-0.5">
                            </div>
                        </div>

                        <div class="flex gap-3 p-3 items-center">
                            <div class="float-left w-2/5 font-thin">Description</div>
                            <div class="border w-[400px]">
                                <textarea type="text" name="introduction" id="" class="w-full outline-none px-2 py-0.5 h-32 resize-none"></textarea>
                            </div>
                        </div>

                        <div class="flex gap-3 p-3 items-center">
                            <div class="float-right w-2/5 font-thin">
                                Author Image
                            </div>
                            <div class="w-[400px]">
                                <div class="border h-[150px] w-[150px] p-0.5">
                                    <img id="image-preview" class="w-full h-full bg-no-repeat"
                                        src="https://t3.ftcdn.net/jpg/01/65/63/94/360_F_165639425_kRh61s497pV7IOPAjwjme1btB8ICkV0L.jpg">
                                </div>

                                <div class="border w-fit px-2 py-1 rounded-lg my-2 cursor-pointer hover:opacity-80">
                                    <label htmlFor="previewImg">Choose Img
                                        <input type="file" hidden id="previewImg" class="w-full h-full" name="image_path"
                                            onchange="previewImage(this)" accept="image/*" multiple />
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="flex justify-end p-3 gap-3 items-center">
                            <button type="submit"
                                class="border px-3 py-1 rounded-xl bg-[#0d6efd] text-white hover:opacity-90">Create
                            </button>

                            <div class="border rounded-xl px-2 py-1">
                                <a href={{ url('/admin/author') }}>Back to Menu</a>
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

    <script>
        function previewImage(input) {
            var preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = null;
            }
            
        }
    </script>
@endsection
