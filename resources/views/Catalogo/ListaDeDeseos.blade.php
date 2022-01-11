@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => '', 'title' => __('AgroShop')])

@section('content')
<div class="container mt-5 ctl-bg dtl">
    <livewire:lista-deseos-estado />
</div>
@endsection