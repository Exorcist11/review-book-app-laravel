@extends('layouts.admin')

@section('admin')
    <div class="flex justify-between items-center">
        <div class="font-bold text-xl">
            Category List
        </div>
        <div class="px-2 py-1 border rounded-lg cursor-pointer hover:bg-[#f3f2f2]">
            <a href={{ url('/admin/category/create') }}>Add new category</a>
        </div>
    </div>
    <div class="w-full pt-5">
        <div class="text-gray-900 ">
            <div class="px-3 py-4 flex justify-center">
                <table class="w-full text-md bg-white shadow-md rounded mb-4 table-fixed">
                    <tr class="border-b">
                        <th class="text-left p-3 px-5 w-2/12">ID</th>
                        <th class="text-left p-3 px-5">Category Name</th>
                        <th class="text-left p-3 px-5">Description</th>
                        <th></th>
                    </tr>
                    @if ($categories)
                        @foreach ($categories as $item)
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">{{ $item->id }}</td>
                                <td class="p-3 px-5">{{ $item->categoryName }}</td>
                                <td class="p-3 px-5 "><span class="text-overflow">{{ $item->description }}</span></td>
                                <td class="p-3 px-5 flex justify-end items-center">
                                    <button type="button"
                                        class="mr-3 text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ url('admin/category', $item->id) }}">Detail</a>

                                    </button>

                                    <button type="button"
                                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ url('admin/category/edit', ['id' => $item->id]) }}">Edit</a>
                                    </button>

                                    <form action="{{ route('admin.categories.destroy', ['id' => $item->id]) }}"
                                        method="POST" class="mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="mr-3 text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                            onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection

<style>
    .text-overflow {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>
