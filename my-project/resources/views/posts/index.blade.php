@extends('layouts.app')

@section('content')

<style>
    .blog-cover-image {
        background-image: url('./images/blog003.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
{{-- <div class="blog-cover-image w-full h-[45rem] flex items-center justify-center text-center">
    <h2 class="text-4xl font-bold text-white bg-black bg-opacity-50 p-4 rounded">Blog</h2>
</div> --}}
<div class="container my-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        @foreach($posts as $post)
        <div
            class="bg-slate-300 text-slate-900 dark:bg-slate-700 dark:text-slate-100 rounded-md p-2 m-2 flex flex-row gap-4">
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post image"
                class="w-2/4 h-60 object-cover rounded-lg">
            @endif
            <div class="flex-1">
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p>
                    {{ Str::limit($post->content, 100) }}
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">Read more</a>
                </p>
                <p class="text-xs text-gray-500">{{ $post->author }}</p>
                <p class="text-xs text-gray-500">{{ $post->created_at->format('Y-m-d') }}</p>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

{{-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus accusamus assumenda dolorem recusandae
    possimus et,
    delectus totam aut ullam doloribus rerum in quos mollitia exercitationem veniam. Veniam debitis sint quia omnis
    aliquid iusto facilis provident. Commodi dolorem voluptatum voluptates asperiores amet eaque ipsa officia odio,
    necessitatibus ratione natus totam tempora molestias fuga nisi consequuntur perferendis at debitis cumque neque
    inventore voluptatem aspernatur? Velit quasi placeat enim rem beatae sed est delectus voluptas fugiat eligendi
    accusantium, illum explicabo recusandae maiores. A deleniti modi, atque laboriosam, tempora esse maiores doloribus
    vitae et voluptate facilis facere ullam distinctio expedita nobis corrupti iure qui iste. Vero amet praesentium
    nihil illum sequi neque, odio in placeat hic esse harum, voluptate atque eveniet non error fugiat exercitationem
    dolor expedita magnam corporis. Assumenda dolores ipsa asperiores sed id distinctio nostrum, enim hic unde, mollitia
    minus aliquid, laudantium obcaecati iure quo! Expedita itaque velit labore sit, maxime praesentium excepturi
    corporis libero! Laborum optio nihil pariatur suscipit ad reprehenderit voluptates. Deleniti tempore, animi,
    inventore numquam fuga, ea delectus velit autem similique neque error. Saepe ipsa consequatur numquam voluptatibus
    neque, repudiandae excepturi tempore impedit nam reprehenderit fugit omnis fuga eaque minus commodi. Voluptate
    corporis nobis delectus ipsum reprehenderit, architecto optio.</p> --}}















{{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 mt-4">
    @foreach($posts as $post)
    <div class="bg-slate-300 text-slate-900 dark:bg-slate-700 dark:text-slate-100 rounded-md p-2 m-2">
        <img src="{{ $post['image'] }}" alt="image">
        <div class="flex-1">
            <h2 class="text-xl font-semibold">{{ $post['title'] }}</h2>
            <p>{{ $post['content'] }}</p>
            <p class="text-xs my-1">{{ $post['author'] }}</p>
            <p class="text-xs opacity-40">Published at: {{ $post['created_at'] }}</p>
        </div>
    </div>
    @endforeach
</div> --}}