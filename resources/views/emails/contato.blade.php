<x-mail::message>
# {{ $data->assunto }}

<br>

<strong>Nome:</strong> {{ $data->from_nome }}<br>
<strong>Email:</strong> {{ $data->from_email }}<br>
<strong>Telefone:</strong> {{ $data->from_phone }}<br>
<strong>Mensagem:</strong> {{ $data->from_message }}<br><br>


Obrigado,<br>
Youtube Filmes Piccinini
</x-mail::message>
