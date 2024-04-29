@extends('theme.master')
@section('title', 'my blogs')
@section('content')
    @include('theme.partials.hero', ['title' => 'my blogs'])
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('successDelete'))
                        <div class="alert alert-success">
                            {{ session('successDelete') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col">title</th>
                                <th scope="col" width="15%">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($blogs) > 0)
                                @for ($i = 0; $i < count($blogs); $i++)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>
                                            <a href="{{ route('blogs.show',$blogs[$i]) }}" target="_blank">

                                                {{ $blogs[$i]->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('blogs.edit',$blogs[$i]) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                            <form method="POST" action="{{ route('blogs.destroy',$blogs[$i]) }}" id="delete_form" class="d-inline">
@method('delete')
@csrf
                                                <a  href="javascript:$('form#delete_form').submit();" class="btn btn-sm btn-danger mr-2">delete</a>
                                            </form>

                                        </td>
                                    </tr>
                                @endfor
                            @endif

                        </tbody>
                    </table>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
