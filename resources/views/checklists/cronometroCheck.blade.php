@extends('layouts.main')
@section('title', '- Checklist')
@section('content')

<div class="timer-container">
    <h1>⏳ Cronômetro</h1>
    <h2 id="timer">00:00:00.0</h2>
    <button class="btn btn-success" onclick="startTimer()">Iniciar</button>
    <button class="btn btn-warning" onclick="pauseTimer()">Pausar</button>
    <button class="btn btn-danger" onclick="resetTimer()">Reiniciar</button>
</div>

<script>
    let timer;
    let startTime;
    let elapsedTime = 0;
    let running = false;
    
    // Recupera o tempo salvo ao carregar a página
    if (localStorage.getItem("startTime")) {
        startTime = parseInt(localStorage.getItem("startTime"));
        elapsedTime = Date.now() - startTime;
        document.getElementById("timer").textContent = formatTime(elapsedTime);
    }
    
    function startTimer() {
        if (!running) {
            running = true;
            startTime = Date.now() - elapsedTime;
            localStorage.setItem("startTime", startTime);
            
            timer = setInterval(() => {
                elapsedTime = Date.now() - startTime;
                document.getElementById("timer").textContent = formatTime(elapsedTime);
            }, 100);
        }
    }

    function pauseTimer() {
        running = false;
        clearInterval(timer);
        localStorage.removeItem("startTime");
    }

    function resetTimer() {
        running = false;
        clearInterval(timer);
        elapsedTime = 0;
        localStorage.removeItem("startTime");
        document.getElementById("timer").textContent = "00:00:00.0";
    }

    function formatTime(ms) {
        let h = Math.floor(ms / 3600000).toString().padStart(2, '0');
        let m = Math.floor((ms % 3600000) / 60000).toString().padStart(2, '0');
        let s = Math.floor((ms % 60000) / 1000).toString().padStart(2, '0');
        let msPart = Math.floor((ms % 1000) / 100).toString();
        return `${h}:${m}:${s}.${msPart}`;
    }
</script>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa;
    }
    .timer-container {
        text-align: center;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        font-size: 2rem;
    }
    #timer {
        font-size: 3rem;
        font-weight: bold;
        margin: 20px 0;
    }
    .btn {
        margin: 5px;
    }
</style>

@endsection
