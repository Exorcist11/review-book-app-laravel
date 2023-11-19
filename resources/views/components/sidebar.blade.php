<div class="flex flex-col gap-5">
    <a href="/admin">
        <div
            class="hover:border hover:bg-slate-200 px-4 py-2 rounded-r-full w-4/5 {{ request()->is('admin/') ? 'bg-slate-200' : '' }}">
            <span>Admin</span>
        </div>
    </a>

    <a href="/admin/author">
        <div
            class="hover:border hover:bg-slate-200 px-4 py-2 rounded-r-full w-4/5 {{ request()->is('admin/author*') ? 'bg-slate-200' : '' }}">
            Author
        </div>
    </a>

    <a href="">
        <div
            class="hover:border hover:bg-slate-200 px-4 py-2 rounded-r-full w-4/5 {{ request()->is('admin/book*') ? 'bg-slate-200' : '' }}">
            Book
        </div>
    </a>

    <a href="/admin/category {{ request()->is('admin/category') ? 'bg-slate-200' : '' }}">
        <div
            class="hover:border hover:bg-slate-200 px-4 py-2 rounded-r-full w-4/5 {{ request()->is('admin/category*') ? 'bg-slate-200' : '' }}">
            Category
        </div>
    </a>

    <a href="">
        <div
            class="hover:border hover:bg-slate-200 px-4 py-2 rounded-r-full w-4/5 {{ request()->is('admin/publisher*') ? 'bg-slate-200' : '' }}">
            Publisher
        </div>
    </a>

    <a href="">
        <div
            class="hover:border hover:bg-slate-200 px-4 py-2 rounded-r-full w-4/5 {{ request()->is('admin/user*') ? 'bg-slate-200' : '' }}">
            User
        </div>
    </a>
</div>
