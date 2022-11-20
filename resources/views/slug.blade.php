@foreach ($slugs as $slug)
    <h1>{{ $slug->title }}</h1>
    <a href="/slug/{{ $slug->id }}/{{ $slug->slug }}">show</a>
  
@endforeach