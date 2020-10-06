@component('mail::message')
# Novo Pedido

## Pedido #{{$order->id}} - Total de R$ {{$order->total}}

## Itens do Pedido

@component('mail::table')
| Produto       | Quantidade    | Valor    | Subtotal |
| :-------------: |:---------------:| :--------:|:----------:|
@php
    foreach($order->products as $product):
@endphp
| {{$product->name}}    | {{$product->pivot->quantity}}      | R$ {{$product->pivot->value}}      | R$ {{$product->pivot->sub_total}}       | \n
@php
    endforeach
@endphp


@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Atenciosamente!<br>
{{ config('app.name') }}
@endcomponent
