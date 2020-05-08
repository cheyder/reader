<footer class="bg-white fixed-bottom shadow">
        <div class="row justify-content-center py-2">
            <div class="">
            @if(Request::is('*desk'))
            <a href="{{ route('desk.contents') }}" class="btn btn-primary">•</a>
            @endif

            @if(Request::is('*desk/contents'))
            <a href="{{ route('desk') }}" class="btn btn-primary">•</a>
            @endif
            
            @if(Request::is('*text'))
            <a href="{{ route('text.contents') }}" class="btn btn-primary">•</a>
            @endif

            @if(Request::is('*text/contents'))
            <a href="{{ route('text') }}" class="btn btn-primary">•</a>
            @endif
            </div>
        </div>
        
</footer>