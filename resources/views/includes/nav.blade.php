@if(Request::is('*read*'))
    <a class="fixed-top w-auto" style="height:48px" href="{{ route('desk') }}"></a>
@else
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

        <div class="container">
            
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Reader') }}
            </a>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="badge badge-pill badge-primary" href="#">.</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="badge badge-pill badge-primary" href="#">.</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="badge badge-pill badge-primary">.</a>
                </li>
            </ol>
        </div>
    </nav>
@endif  

            
