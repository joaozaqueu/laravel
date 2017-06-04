@extends('admin.layouts.app')

@section('body')
<div id="wrapper">  <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('vendas.index') }}"><i class="fa fa-coffee fa-lg"></i> Chef Manager</a>
        </div><!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right"><!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('login') }}">
                            <i class="fa fa-sign-out fa-fw"></i> Sair
                        </a>
                    </li>
                </ul><!-- /.dropdown-user -->
            </li><!-- /.dropdown -->
        </ul><!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu"> 
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ route('vendas.index') }}"><i class="fa fa-cutlery fa-fw"></i> Vendas</a>
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ route('clientes.index') }}"><i class="fa fa-users fa-fw"></i> Clientes</a>
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ route('produtos.index') }}"><i class="fa fa-shopping-cart fa-fw"></i> Produtos</a>
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ route('relatorios.index') }}"><i class="fa fa-clipboard fa-fw"></i> Relatórios</a>
                        </li>
                    </ul>
                </div><!-- /.sidebar-collapse -->
            </div><!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <br>
            <div class="row">
                @yield('section')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
    @endsection
