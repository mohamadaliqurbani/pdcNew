<div>
    <div class="section-title">
      <h2>گزارش ورکشاپ به اساس ماه در سال فعلی</h2>

    </div>
    <h4 class="text-indigo-500 mb-2">نوت: اگر گرافی قابل نمایش نیست لطفا به انترنت وصل شوید و صفحه را refersh نماید</h4>
    <div id="chart"></div>
</div>
@push('scripts')
<script>
        var options = {
            chart: {
              type: 'area',
              height: '250px'
            },
            series: [{
              name: 'workshop',
              data: @json($workshops)
            }],
            xaxis: {
              categories:@json($fullyears)
            }
          }
          
          var chart = new ApexCharts(document.querySelector("#chart"), options);
          
          chart.render();

    </script>
@endpush
