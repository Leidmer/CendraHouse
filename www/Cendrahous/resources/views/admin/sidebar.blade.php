<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/images/logo.png') }}" class="img-fluid">
        </div>
        
        <div class="user">
            <span class="subtitle">Hola: </span>
            <div class="name">
                {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Sortir">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div class="email">{{ Auth::user()->email }}</div>
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ url('/admin/properties') }}"><i class="fas fa-building"></i> Propietats</a>
            </li>
            <li>
                <a href="{{ url('/admin/types/0') }}"><i class="far fa-folder-open"></i> Tipus de propietats</a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}"><i class="fas fa-user-friends"></i> Usuaris</a>
            </li>
        </ul>
    </div>
</div>