@extends('layouts.main')

@section('content')
    @php /** @var \App\Models\BlogPost $item */ @endphp
    <div class="container">
        @include('blog.admin.posts.includes.result_messages')

        @if ($item->exists)
            <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}">
                @method('PATCH')
                @else
                    <form method="POST" action="{{ route('blog.admin.posts.store') }}">
                        @endif
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <a href="{{ route('blog.admin.posts.index') }}" class="btn btn-secondary">
                                    Повернутися до списку
                                </a>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('blog.admin.posts.includes.post_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.admin.posts.includes.post_edit_add_col')
                            </div>
                        </div>
                    </form>
                    @if ($item->exists)
                        <br>
                        <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Видалити</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    @endif
    </div>
@endsection
