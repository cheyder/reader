@if(Request::is('*read*'))
    <a class="fixed-top w-auto" style="height:48px" href="{{ route('desk') }}"></a>
@else
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0">

        <div class="container">
            
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Reader') }}
            </a>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="btn p-1" href="">
                        <img src="{{ asset('icons/archive-cabinet.png') }}" style="height:24px" alt="">
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="btn p-1" href="">
                        <img src="{{ asset('icons/archive-box.png') }}" style="height:24px" alt="">
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="btn p-1" href="">
                        <img src="{{ asset('icons/folder.png') }}" style="height:24px" alt="">
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="btn p-1" href="">
                        <img src="{{ asset('icons/document.png') }}" style="height:24px" alt="">
                    </a>
                </li>
            </ol>
        </div>
    </nav>
@endif  

            
