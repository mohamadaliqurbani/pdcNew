<tr>
<td class="header" dir="rtl">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('img/dpc.jpeg') }}" class="logo" alt="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
