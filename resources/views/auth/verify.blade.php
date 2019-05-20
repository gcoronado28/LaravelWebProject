@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verificar tu email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                          Un link de verificación ha sido enviado a tu email
                        </div>
                    @endif
                  
                    Antes de proceder, por favor revisa en tu email el link de verificación.
                    Si no recibiste el link, <a href="{{ route('verification.resend') }}">solicita otro</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
