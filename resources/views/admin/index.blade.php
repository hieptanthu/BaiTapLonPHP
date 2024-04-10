<x-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Admin Dashboard</h2>
                    <h5>Welcome Jhon Deo , Love to see you back. </h5>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr>
            <?php  $Loai="Notifications"; $soluong =1;?>
           
            <div class="row">
                <x-ThongBaoAdmin :Loai="'Pending'" :soluong="$oders"/>
                <x-ThongBaoAdmin :Loai="'Remaining'" :soluong="$soluong"/>
                <x-ThongBaoAdmin :Loai="'Notifications'" :soluong="$soluong"/>
                <x-ThongBaoAdmin :Loai="'Messages'" :soluong="$soluong"/>
                
            </div>
            <div style="width: 800px;">  <canvas id="myChart" style="width: 800px; height: 400px;"></canvas>
                <!-- /. ROW  --> </div>
          
            
           
         
      
        </div>
        <!-- /. PAGE INNER  -->
    </div>
{{-- {{$table}} --}}

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
       
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March','April', 'May', 'June', 'July','August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'bán hàng',
                    data: [{{$table["January"]}},{{$table["February"]}}, {{$table["March"]}}, {{$table["April"]}}, {{$table["May"]}}, {{$table["June"]}},{{$table["July"]}}, {{$table["August"]}}, {{$table["September"]}}, {{$table["October"]}}, {{$table["November"]}}, {{$table["December"]}}],
                    backgroundColor: [
                        'rgba(255, 99, 132 )',
                        'rgba(54, 162, 235 )',
                        'rgba(255, 206, 86 )',
                        'rgba(75, 192, 192 )',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        console.log("myChart");
    </script>
</x-layout>
