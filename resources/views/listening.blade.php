@extends('welcome')

@section('content')
<div class="listening-page">
    <div class="content">
        <div class="book-cover">
            <img src="{{ asset('images/' . $book->category_image) }}" alt="Bìa sách">
        </div>
        <div class="book-info">
            <h3>{{ $book->category_name }}</h3>
        </div>
    </div>

    <div class="player">
        <div class="controls">
            <button>⏮</button>
            @if(!empty($book->category_audio))
                <audio id="audioPlayer" preload="metadata" style="display:none;">
                    <source src="{{ asset('audio/' . $book->category_audio) }}" type="audio/mpeg">
                </audio>
                <button id="playPauseBtn">▶️</button>
            @else
                <button disabled>🚫</button>
            @endif
            <button>⏭</button>
        </div>

        <div class="progress">
            <span id="currentTime">00:00</span>
            <input id="progressBar" type="range" min="0" max="100" value="0">
            <span id="duration">00:00</span>
        </div>

        <div class="volume">
            🔊 <input id="volumeControl" type="range" min="0" max="100" value="80">
        </div>
    </div>
</div>

{{-- CSS --}}
<style>
body {
  margin: 0;
  font-family: "Segoe UI", Arial, sans-serif;
  background: radial-gradient(circle at top left, #1e293b, #0f172a);
  color: #f1f5f9;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.listening-page {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-bottom: 80px; /* chừa chỗ cho player cố định */
}

/* Phần nội dung giữa */
.content {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px;
  gap: 50px;
}

.book-cover img {
  width: 240px;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.5);
}

.book-info {
  max-width: 500px;
}

.book-info h3 {
  font-size: 26px;
  color: #facc15;
  margin-bottom: 10px;
}

.book-info p {
  font-size: 15px;
  color: #cbd5e1;
  line-height: 1.6;
}

/* Player bar cố định dưới */
.player {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background: #1e293b;
  padding: 12px 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 -3px 12px rgba(0,0,0,0.3);
  z-index: 1000;
}

.controls {
  display: flex;
  align-items: center;
  gap: 14px;
}

.controls button {
  background: none;
  border: none;
  color: #fff;
  font-size: 22px;
  cursor: pointer;
  transition: 0.2s;
}

.controls button:hover {
  transform: scale(1.1);
  color: #13b2ce;
}

 .progress {
      flex: 1;
      margin: 0 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 12px;
      color: #000000;
    }

.progress input[type="range"] {
  flex: 1;
  accent-color: #13b2ce;
}

.volume {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 14px;
}

.volume input {
  width: 80px;
  accent-color: #13b2ce;
}
</style>

{{-- JS --}}
<script>
const audio = document.getElementById('audioPlayer');
const playBtn = document.getElementById('playPauseBtn');
const progress = document.getElementById('progressBar');
const volume = document.getElementById('volumeControl');
const current = document.getElementById('currentTime');
const duration = document.getElementById('duration');

if (audio) {
  audio.addEventListener('loadedmetadata', () => {
    duration.textContent = formatTime(audio.duration);
  });

  audio.addEventListener('canplay', () => {
    duration.textContent = formatTime(audio.duration);
  });

  audio.addEventListener('timeupdate', () => {
    if (!isNaN(audio.duration)) {
      progress.value = (audio.currentTime / audio.duration) * 100;
      current.textContent = formatTime(audio.currentTime);
    }
  });

  progress.addEventListener('input', () => {
    if (!isNaN(audio.duration)) {
      audio.currentTime = (progress.value / 100) * audio.duration;
    }
  });

  playBtn.addEventListener('click', () => {
    if (audio.paused) {
      audio.play();
      playBtn.textContent = '⏸️';
    } else {
      audio.pause();
      playBtn.textContent = '▶️';
    }
  });

  volume.addEventListener('input', () => {
    audio.volume = volume.value / 100;
  });

  function formatTime(seconds) {
    const m = Math.floor(seconds / 60);
    const s = Math.floor(seconds % 60);
    return `${m < 10 ? '0' + m : m}:${s < 10 ? '0' + s : s}`;
  }
}
</script>

@endsection
