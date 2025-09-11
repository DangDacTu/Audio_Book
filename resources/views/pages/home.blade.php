@extends('welcome')
    @section('content')
    
    
        <div>
            <div>
                <img src="{{('images/xucat.png')}}" alt=""><br>
                <span>Xu Cat</span><br>
                <span>500.000 VND</span><br>
                <audio controls>
                    <source src="audio/media.mp3" type="audio/mpeg">
                </audio><br>
                <button><a href ="http://127.0.0.1:8000/admin"> Mua Ngay</a></button>
            </div>
            <hr>
            <div>
                <img src="{{('images/giongto.png')}}" alt=""><br>
                <span>Xu Cat</span><br>
                <span>500.000 VND</span><br>
                <audio controls>
                    <source src="audio/media.mp3" type="audio/mpeg">
                </audio><br>
                    <button><a href ="http://127.0.0.1:8000/pay"> Mua Ngay</a></button>	
        </div>
            <hr>
            <div>
                <img src="{{('images/vieclang.png')}}" alt=""><br>
                <span>Xu Cat</span><br>
                <span>500.000 VND</span><br>
                <audio controls>
                    <source src="audio/media.mp3" type="audio/mpeg">
                </audio><br>
                    <button><a href ="http://127.0.0.1:8000/pay"> Mua Ngay</a></button>	
        </div>
            <hr>
            <div>
                <img src="{{('images/bonmua.png')}}" alt=""><br>
                <span>Xu Cat</span><br>
                <span>500.000 VND</span><br>
                <audio controls>
                    <source src="audio/media.mp3" type="audio/mpeg">
                </audio><br>
                    <button><a href ="http://127.0.0.1:8000/pay"> Mua Ngay</a></button>		
        </div>
            <hr>
            <div>
                <img src="{{('images/giohu.png')}}" alt=""><br>
                <span>Xu Cat</span><br>
                <span>500.000 VND</span><br>
                <audio controls>
                    <source src="audio/media.mp3" type="audio/mpeg">
                </audio><br>
                    <button><a href ="http://127.0.0.1:8000/pay"> Mua Ngay</a></button>
            </div>
            <hr>
        </div>

    @endsection