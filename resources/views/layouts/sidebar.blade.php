<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ url('/clientes') }}" class="nav-link">
            <i class="nav-icon fas fa-list orange"></i>
                <p>
                    Cliente
                </p>
            </a>

        </li>
        <li class="nav-item">
            <a href="{{ url('/empleados') }}" class="nav-link">
            <i class="nav-icon fas fa-list orange"></i>
                <p>
                    Empleado
                </p>
            </a>

        </li>
        <li class="nav-item">
            <a href="{{ url('/categorias') }}" class="nav-link">
            <i class="nav-icon fas fa-list orange"></i>
                <p>
                    Categoria
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/horarios') }}" class="nav-link">
            <i class="nav-icon fas fa-list orange"></i>
                <p>
                    Horario
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/motos') }}" class="nav-link">
            <i class="nav-icon fas fa-list orange"></i>
                <p>
                    Motos
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/citas') }}" class="nav-link">
            <i class="nav-icon fas fa-list orange"></i>
                <p>
                    Citas
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-list orange"></i>
                <p>
                    Salir
                </p>
            </a>

        </li>


    </ul>
</nav>
