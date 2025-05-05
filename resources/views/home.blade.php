@extends('layouts.app')

@section('title', 'Financial Calculator Hub - ViGamer.com')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold mb-4">Financial Calculator Hub</h1>
        <p class="text-xl text-gray-600">Free online financial calculators to help you make informed decisions</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($calculators as $calculator)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $calculator->name }}</h2>
                <p class="text-gray-600 mb-4 h-24 overflow-hidden">{{ $calculator->purpose }}</p>
                <div class="text-center">
                    <a href="{{ route('calculator.show', $calculator->slug) }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md inline-block transition duration-300">
                        Use Calculator
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection