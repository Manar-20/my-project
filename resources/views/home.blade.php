@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('allposts') }}">كل الكتب</a>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('save-post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title">عنوان الكتاب</label>
                <input class="form-control" type="text" name="title">

                <label for="description">نبذة عن الكتاب</label>
                <textarea class="form-control" name="description" cols="30" rows="10"></textarea>

                <label for="image">صورة الكتاب</label>
                <input class="form-control" type="file" name="image">

                <button class="form-control" type="submit">حفظ </button>
            </form>
        </div>
    </div>

</div>

@endsection
