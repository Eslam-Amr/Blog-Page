@extends('theme.master')
@section('title', 'edit blog')
@section('content')
    @include('theme.partials.hero', ['title' => $blog->name])
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('successUpdate'))
                        <div class="alert alert-success">
                            {{ session('successUpdate') }}
                        </div>
                    @endif
                    <form class="form-contact contact_form" action="{{ route('blogs.update', $blog) }}" method="post"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <input class="form-control border" name="name" type="text" value="{{ $blog->name }}"
                                placeholder="Enter your blog title">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="image" type="file">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <select class="form-control border" name="category_id">
                                <option selected disabled>select category</option>

                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <textarea placeholder="enter blog description" class="w-100 border" rows="10" name="description">{{ $blog->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
