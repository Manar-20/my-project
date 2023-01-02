@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3>كل الكتب</h3>
                </div>
                
                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $post->title }}</h3>
                            </div>
                            <div class="card-body">
                                <p>{{ $post->description }}</p>
                                <img src="{{ asset('images/'). "/".$post->image }}" alt="" width="20%">
                            </div>
                            
                        </div>
                        <a href="{{ route('show-post', $post->id)}}">عرض المزيد</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
