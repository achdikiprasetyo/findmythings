@extends('layouts.app')

@section('content')
    <h1>My Posts</h1>
    @if(count($posts) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a href="{{ route('items.show', $post->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('items.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('items.destroy', $post->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You have not posted anything yet.</p>
    @endif
@endsection
