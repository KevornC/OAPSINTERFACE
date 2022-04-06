@extends('layouts.parent')
@section('title')
Dashboard
@endsection
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<livewire:parent-dashboard />
<!-- component -->
@endsection