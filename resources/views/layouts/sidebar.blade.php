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
      <li class="nav-item dropdown active">
        <a href="{{route('pembeliDashboard')}}" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          {{-- <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
          <li class="active"><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li> --}}
        </ul>
      </li>
      <li class="menu-header">Starter</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Form Input</span></a>
        <ul class="dropdown-menu">

          @if ( Auth::user()->role === 'seller')
          <li><a class="nav-link" href="{{route('produk.create')}}">Produk</a></li>
          @elseif ( Auth::user()->role === 'buyer')
          <li><a class="nav-link" href="{{route('Transaksi.create')}}">Form Pemesanan</a></li>
          @endif
          {{-- <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> --}}
        </ul> 
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>View Data</span></a>
        <ul class="dropdown-menu">
          {{-- <li><a class="nav-link" href="{{route('produk.index')}}">Produk</a></li> --}}
          
          @if ( Auth::user()->role === 'seller')
          <li><a class="nav-link" href="{{route('produk.index')}}">View Produk</a></li>      
       
          @elseif ( Auth::user()->role === 'buyer')             
          <li><a class="nav-link" href="{{route('Transaksi.index')}}">View Transaksi</a></li>
          @endif
 
          {{-- <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> --}}
        </ul> 
      </li>
      <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
    </ul>


  </aside>
</div>