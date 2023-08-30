@extends('layouts.site')

@section('content')

<div class="container">
    <section id="contactPage" class="section-theme pb-0 my-4">
        <div class="container">

          <div class="row my-4">
            <div class="col-12 text-center">
              <h1 class="text-dark fw-bold">Mande sua mensagem</h1>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">

              @if($errors->any())
                  <div class="alert alert-danger rounded-3 col-12" id="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                  </div>
              @endif

              @if(session('message'))
                    <div class="alert alert-success rounded-3 col-12" id="alert">
                        {{ session('message') }}
                    </div>
              @endif

                <form action="{{ route('contato-site-post') }}" class="row g-3" method="POST">
                    @csrf
                    <div class="col-12">
                        <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="inNome" placeholder="Nome">
                        <label for="inNome" class="form-label">Nome</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="inEmail" placeholder="E-mail">
                        <label for="inEmail" class="form-label">Email</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                        <input type="text" name="telefone"  id="telefone" class="form-control" placeholder="Telefone">
                        <label for="telefone" class="form-label">Telefone</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                        <textarea class="form-control" name="mensagem" id="inMensagem " style="height: 100px" placeholder="Mensagem"></textarea>
                        <label for="inMensagem">Mensagem</label>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <span class="lgpd-info">
                        <small>
                            Os dados coletados nesse site seguem os padrões de segurança e confidencialidade exigidos por lei. As informações coletadas não serão, em hipótese alguma, comercializadas a terceiros.
                        </small>
                        </span>
                    </div>
                    <div class="col-12">
                        <div class="form-check fw-bold">
                        <input class="form-check-input rounded-pill" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                            Li e estou de acordo com os termos acima descritos.
                        </label>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary text-uppercase mt-4 rounded-2 shadow px-5">ENVIAR</button>

                    </div>
                </form>
            </div>
          </div>
        </div>
      </section>

</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      $('#telefone').on('keypress', function(event) {
        var charCode = (event.which) ? event.which : event.keyCode;
        var phoneNumber = $(this).val();

        if (charCode != 8 && charCode != 0 && (charCode < 48 || charCode > 57)) {
          event.preventDefault();
          return false;
        }

        if (phoneNumber.length == 0) {
          $(this).val('(');
        } else if (phoneNumber.length == 3) {
          $(this).val(phoneNumber + ') ');
        } else if (phoneNumber.length == 10) {
          $(this).val(phoneNumber + '-');
        }
      });
    });
</script>

<script>
    $(document).ready(function() {
        $('#inNome').on('input', function() {
            var inputValue = $(this).val();
            var regex = /^[A-Za-z]+$/;

            if (!regex.test(inputValue)) {
                $(this).val(inputValue.replace(/[^A-Za-z]/g, ''));
            }
        });
    });
</script>

<script>
    setTimeout(function() {
        var alertElement = document.getElementById('alert');
        if (alertElement) {
            alertElement.remove();
        }
    }, 4000);
</script>
