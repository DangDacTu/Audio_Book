<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\listening.blade.php -->
@extends('welcome')

@section('content')
    <div class="content"
        style="flex:1; display:flex; align-items:center; justify-content:center; padding:30px; gap:40px; background:radial-gradient(circle at top left, #1e293b, #0f172a);">
        <div class="book-cover">
            <img src="{{ asset('images/' . $book->category_image) }}" alt="Bìa sách"
                style="width:220px; border-radius:8px; box-shadow:0 6px 16px rgba(0,0,0,0.4);">
        </div>
        <div class="book-info" style="min-width:320px;">
            <h3 style="color:#facc15;">{{ $book->category_name }}</h3>
            <p style="color:#cbd5e1;">{{ $book->category_desc ?? '' }}</p>
            @if(!empty($book->category_audio))
                <audio controls style="width:100%;margin-top:18px;">
                    <source src="{{ asset('audio/' . $book->category_audio) }}" type="audio/mpeg">
                    Trình duyệt của bạn không hỗ trợ audio.
                </audio>
            @else
                <p style="color:#f87171;">Không có file audio cho sách này.</p>
            @endif
        </div>
    </div>
@endsection