{{-- @php
    $headerComposer = new \App\View\Components\HeaderComposer();
    $headerComposer->compose($this);
@endphp --}}


<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#women">block</a></li>
                        
                        <li class="submenu">
                            <a href="javascript:;">Category</a>
                            <ul>
                                @foreach ($headerData as $item)
                                                    
                              
                                <li><a href="about.html">{{$item->name}}</a></li>
                               
                                @endforeach
                               
                            </ul>
                        </li>
                        <li class="scroll-to-section"><a href="#kids">Contact Us<</a></li>
                        <li class="scroll-to-section"><a href="#explore">About Us</a></li>
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>