@php
    $categories = App\Models\Category::take(2)->get();
    $recentBlogs = App\Models\Blog::latest()->take(3)->get();
@endphp
<!-- Start Blog Post Siddebar -->
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('subscribe.store') }}" method="post">@csrf
                <div class="form-group mt-30">
                    <div class="col-autos">
                        <input type="text" value="{{ old('email') }}" name="email" class="form-control"
                            id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email'">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="bbtns d-block mt-2 w-100">Subcribe</button>
                </div>
            </form>
        </div>
        @if (count($categories) > 0)

            <div class="single-sidebar-widget post-category-widget">
                <h4 class="single-sidebar-widget__title">Catgory</h4>
                <ul class="cat-list mt-20">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('theme.category', $category->id) }}"
                                class="d-flex justify-content-between">
                                <p>{{ $category->name }}</p>
                                <p>({{ count($category->blogs) }})</p>
                            </a>
                        </li>
                    @endforeach
  
                </ul>
            </div>
        @endif

        @if (count($recentBlogs)>0)
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent blogs</h4>
            <div class="popular-post-list">
        @foreach ($recentBlogs as $blog)

<div class="single-post-list">
    <div class="thumb">
        <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}"
            alt="">
        <ul class="thumb-info">
            <li><a href="#">{{ $blog->user->name }}</a></li>
            <li><a href="#">{{ $blog->created_at->format('d M') }}</a></li>
        </ul>
    </div>
    <div class="details mt-20">
        <a href={{ route('blogs.show',$blog) }}"">
            <h6>{{ $blog->name }}</h6>
        </a>
    </div>
</div>
@endforeach
</div>
</div>
                @endif

    </div>
</div>

<!-- End Blog Post Siddebar -->
