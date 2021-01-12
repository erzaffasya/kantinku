<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/">Kantinku</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown">
        <a href="{{route('dashboard')}}" class="nav-link">
          <i class="fas fa-fire"></i>
          <span>Dashboard</span>
        </a>
        <ul class="dropdown-menu">
          {{-- <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
          <li class="active"><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li> --}}
        </ul>
      </li>
      <li class="menu-header">Starter</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Tambah Data</span></a>
        <ul class="dropdown-menu">

          @if ( Auth::user()->role === 'buyer')
          <li><a class="nav-link" href="/">Form Pemesanan</a></li>

          @elseif ( Auth::user()->role === 'seller')
          <li><a class="nav-link" href="{{route('seller.produk.create',Auth::user()->id)}}">Form Produk</a></li>

          @elseif ( Auth::user()->role === 'admin')
          <li><a class="nav-link" href="{{route('Seller.create')}}">Form Penjual</a></li>
          <li><a class="nav-link" href="{{route('Carousel.create')}}">Form Carousel</a></li>
          @endif
          {{-- <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> --}}
        </ul> 
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>View Data</span></a>
        <ul class="dropdown-menu">
          {{-- <li><a class="nav-link" href="{{route('produk.index')}}">Produk</a></li> --}}
          
          @if ( Auth::user()->role === 'buyer')
          <li><a class="nav-link" href="{{route('Transaksi.index')}}">View Transaksi</a></li>

          @elseif ( Auth::user()->role === 'seller')             
          <li><a class="nav-link" href="{{route('seller.produk.index',Auth::user()->id)}}">View Produk</a></li>   

          @elseif ( Auth::user()->role === 'admin') 
          <li><a class="nav-link" href="{{route('Transaksi.index')}}">Konfirmasi Pembayaran</a></li>
          <li><a class="nav-link" href="{{route('Seller.index')}}">View Seller</a></li> 
          <li><a class="nav-link" href="{{route('User.index')}}">View User</a></li>      
          <li><a class="nav-link" href="{{route('Carousel.index')}}">View Carousel</a></li>          
          @endif
 
          {{-- <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> --}}
        </ul> 
      </li>
      <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
    </ul>


  </aside>
</div>