<div class="col-xl-3 col-md-4">
    <aside class="axil-dashboard-aside">
        <nav class="axil-dashboard-nav">
            <div class="nav nav-tabs" role="tablist"> 
                <a class="nav-item nav-link {{ request()->is('client/orders') ? 'active' : '' }}" href="{{route('client.order')}}"><i class="fas fa-shopping-basket"></i>Orders</a>
                <a class="nav-item nav-link {{ request()->is('client/address') ? 'active' : '' }}" href="{{ route('client.address') }}" role="tab" aria-selected="false"><i class="fas fa-home"></i>Addresses</a>
                <a class="nav-item nav-link {{ request()->is('client/profile') ? 'active' : '' }}" href="{{ route('client.profile.edit') }}" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                <a class="nav-item nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fal fa-sign-out"></i>Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </nav>
    </aside>
</div>