@extends('layaouts.admin')
@section('contenido')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <center><h1>
                ACCESO DENEGADO
            </h1></center>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="error-page">
                <h2  class="headline text-red">500</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-red"></i> Oops! Necesita cuenta de administrador.</h3>

                    <p>
                        SOLICITE ACCESO AL ADMINISTRADOR .
                        Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
                    </p>

                </div>
            </div>
            <!-- /.error-page -->
        </section>
    </div>

    @endsection