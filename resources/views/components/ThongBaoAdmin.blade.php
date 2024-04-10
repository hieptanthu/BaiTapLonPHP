@props(['Loai',"soluong"])
<div class="col-md-3 col">
    <div class="panel panel-back noti-box">
        
            @switch($Loai)
            @case('Messages')
            <span class="icon-box bg-color-red set-icon">
            <i style="line-height: unset;" class="fa fa-envelope-o"></i>
            </span>
            @break

            @case('Remaining')
            <span class="icon-box bg-color-green set-icon">
            <i style="line-height: unset;" class="fa fa-bars"></i>
            </span>
            @break

            @case('Notifications')
            <span class="icon-box bg-color-blue  set-icon">
            <i style="line-height: unset;" class="fa fa-bell-o"></i>
            </span>
            @break

            @case('Pending')
            <span class="icon-box bg-color-brown set-icon">
            <i style="line-height: unset;" class="fa fa-rocket"></i>
            </span>
            @break

            @default
        @endswitch
    
    <div class="text-box">
        @switch($Loai)
            @case('Messages')
               <p class="main-text">{{$soluong}} New</p> 
            @break

            @case('Remaining')
            <p class="main-text"> {{$soluong}} Task</p> 
          
            @break

            @case('Notifications')
            <p class="main-text">   {{$soluong}} New</p> 
            @break
          
            @case('Pending')
            <p class="main-text">   {{$soluong}} Orders</p> 
            @break

            @default
        @endswitch
        <p class="text-muted">{{$Loai}}</p>
    </div>
</div>
</div>
