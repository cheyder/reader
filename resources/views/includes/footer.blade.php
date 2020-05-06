<footer class="bg-white fixed-bottom shadow">
        <div class="row justify-content-center">
            <div class="">
            @if($source === 'desk')
            <a href="{{ route('desk.index') }}" class="btn btn-primary">•</a>
            @endif
            @if($source === 'deskIndex')
            <a href="{{ route('desk') }}" class="btn btn-primary">•</a>
            @endif
            @if($source === 'read')
            <a href="{{ route('read.index') }}" class="btn btn-primary">•</a>
            @endif
            @if($source === 'readIndex')
            <a href="{{ route('read') }}" class="btn btn-primary">•</a>
            @endif
            </div>
        </div>
        
</footer>