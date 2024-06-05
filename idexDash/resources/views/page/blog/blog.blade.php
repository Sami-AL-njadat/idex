@extends('dashboard.layout.master')

@section('content')
    <div class="content-start transition">
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Blog</h1>
                </div>

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-header">

                                    <sapn>All Blog</sapn>
                                    <a class="btn btn-success float-right" href="{{ route('page.add') }}">New Blog </a>

                                </div>
                                <div class="card-body p-0">

                                    <table class="table table-hover table-light">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Image</th>
                                                <th scope="col" class="float-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blogs as $blog)
                                                <tr>
                                                    <th scope="row">{{ $blogs->firstItem() + $loop->index }}</th>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->description }}</td>
                                                    <td><img src="{{ asset($blog->image) }}" alt="Blog Image" height="100"
                                                            width="100"></td>
                                                    </td>
                                                    <td style="width: 80px">
                                                        <a href="{{ route('page.edit', $blog->id) }}"
                                                            style="height: 35px ;width:74px"
                                                            class="btn btn-primary">Edit</a>

                                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="height: 35px ;width:74px" type="button"
                                                                class="btn btn-danger"
                                                                onclick="deleteBlog()">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination">
                                    {{ $blogs->links() }}
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteBlog() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this blog post!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('form').submit();
                }
            });
        }
    </script>
@endsection
