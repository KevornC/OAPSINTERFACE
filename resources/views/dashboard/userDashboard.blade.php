@extends('layouts.user')
@section('title')
Admin Dashboard
@endsection
@section('content')
<!-- component -->
<div id="container" class="w-4/5 mx-auto">
  <!-- Student Cards -->
  <p class="mt-10 flex justify-center uppercase font-bold text-2xl text-blue-700 ">Student & Parent Stats</p>
    <div class="flex justify-center flex-col sm:flex-row">
      <!-- Card 1 -->
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
          {{-- <div class="bg-green-500 rounded-full">
              f
          </div> --}}
          </div>
          <h2 class="text-xl font-medium text-gray-700">Total</h2>
          <span class="text-blue-500 block mb-5">Active Students</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >{{$results['student']}}</a
          >
        </div>
      </div>

      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
          {{-- <div class="bg-green-500 rounded-full">
              f
          </div> --}}
          </div>
          <h2 class="text-xl font-medium text-gray-700">Total</h2>
          <span class="text-blue-500 block mb-5">Parent</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >{{$results['parent']}}</a
          >
        </div>
      </div>
      <!-- Card 2 -->
      {{-- <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-1/2 mx-auto rounded-full"
              src="""
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Total</h2>
          <span class="text-blue-500 block mb-5">Staff</span>
              <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">
              {{$results['activeCSCount']}}
              </a>
          </div>--}}
          </div> 

      
     <!-- Canteen Staff Cards -->
  <p class="mt-10 flex justify-center uppercase font-bold text-2xl text-blue-700 ">Canteen Staff Stats</p>
    <div class="flex justify-center flex-col sm:flex-row">
     
      <!-- Card 1 -->
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-1/2 mx-auto rounded-full"
              {{-- src="{{url('cardImages\chef-5993951_640.jpg')}}" --}}
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Total</h2>
          <span class="text-blue-500 block mb-5">Active Staff</span>

              <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">
              {{$results['activeCSCount']}}
              </a>
         
        </div>
      </div>

      <!-- Card 2 -->
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-1/2 mx-auto rounded-full"
              {{-- src="{{url('cardImages\woman-4685862_1280.jpg')}}" --}}
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Total</h2>
          <span class="text-blue-500 block mb-5">Newly added unactivated</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >{{$results['newCSCount']}}</a
          >
        </div>
      </div>
    </div>
     <!-- Parent Cards -->
  <p class="mt-10 flex justify-center uppercase font-bold text-2xl text-blue-700 ">Pending Verification(s)</p>
    <div class="flex justify-center flex-col sm:flex-row">
      <!-- Card 1 -->
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
          {{-- <div class="bg-green-500 rounded-full">
              f
          </div> --}}
          </div>
          <h2 class="text-xl font-medium text-gray-700">Total</h2>
          <span class="text-blue-500 block mb-5">Accounts</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >{{$results['pendingVer']}}</a
          >
        </div>
      </div>
      
    </div>
  </div>

@endsection