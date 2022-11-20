<div dir="rtl">
    @component('mail::message')
        {{ $maildata['title'] }}
        <h2 dir="rtl">{{ $maildata['workShopTitle'] }}</h2>
        @component('mail::button', ['url' => url(route('public.workshop.show',$maildata['id']))])
           دیدن معلومات
        @endcomponent

        با سپاس مرکز انکشاف مسلکی پوهنتون تعلیم و تربیه کابل
       
    @endcomponent

</div>
