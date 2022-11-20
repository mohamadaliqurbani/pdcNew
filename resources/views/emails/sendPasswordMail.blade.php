@component('mail::message')
    <h3>{{ $maildata['title'] }} </h3>
    <h4>{{ $maildata['info'] }} </h4>
    <h5>{{ $maildata['password'] }}</h5>
    @component('mail::button', ['url' => url('login')])
        ورود به سیستم
    @endcomponent
    <h2> با سپاس مرکز انکشاف مسلکی پوهنتون تعلیم و تربیه کابل</h2>
@endcomponent