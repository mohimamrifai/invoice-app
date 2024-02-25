<div class="w-8/12 mx-auto mt-3 flex items-center justify-between">
    <h1 class="text-2xl font-extrabold">Dashboard</h1>
    <div class="flex items-center gap-4">
        <a href="/" class="{{ (request()->is('dashboard')) ? 'text-blue-500 font-bold' : '' }}">Home</a>
        <a href="/about">About</a>
        <a href="/logout">Logout</a>
    </div>
</div>
