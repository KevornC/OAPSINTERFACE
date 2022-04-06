<div class="h-screen">
@if($viewMode==false)
<body class="antialiased font-sans bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Students</h2>
            </div>
            <form >
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <p
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        {{$studentCount['studentCount']}}
                        </p>
                    </div>
                    <div class="relative">
                        <select
                            wire:model="dropdownFilter" class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                            <option value="active">Active</option>
                            <option value="suspended">Suspended</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
            
                    <div class="relative">
                        <button wire:click.prevent="add" type="button" class='appearance-none h-full  sm:rounded-md rounded-md block w-full border-gray-400 text-white ml-2 py-2 px-4  leading-tight focus:outline-none hover:bg-blue-800 bg-blue-900 focus:border-gray-500'>Student +</button>
    
                    </div>
                </div>
              
            </div>
        </form>


                   
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            @if($hiddenDetail==true)
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Student
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Gender
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    D.O.B
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Address
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Birth Certificate
                                </th>
                               
                            </tr>
                            @else
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                   More info
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    ID#
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Firstname
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Lastname
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Grade
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Class
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                            @endif
                        </thead>
                        <tbody>
                                                @if($dropdownFilter=="active")
                                                @forelse ($studentActive['studentActive'] as $data )
                                                @if($hiddenDetail==false)
                                                <tr>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="ml-3">
                                                                <button type="submit" wire:click.prevent="showHiddenDetail({{$data['id']}})" class="bg-blue-900 focus:outline-none rounded-md text-white pr-2 pl-2 text-2xl">
                                                                +
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="ml-3">
                                                                {{$data['idenNumber']}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="ml-3">
                                                                <p class="text-gray-900 whitespace-no-wrap">
                                                                    {{ucfirst($data['firstname'])}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="ml-3">
                                                                <p class="text-gray-900 whitespace-no-wrap">
                                                                    {{ucfirst($data['lastname'])}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ucfirst($data['grade'])}} 
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{strToUpper($data['class'])}} 
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                         
                                                            <button class="bg-blue-900 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="showEdit({{$data['id']}})">Edit</button>  
                                                        
                                                    </td>
                                                </tr>
                                             @endif
                                                @empty
                                                <tr>
                                                    <td colspan="7" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="ml-3">
                                                                <p class="text-gray-900 whitespace-no-wrap">
                                                                       No Available Data                                                  
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforelse
                                                @if($hiddenDetail==true)
                                                <tr>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="ml-3">
                                                                <button type="submit" wire:click.prevent="noShowHiddenDetail" class="bg-red-900 rounded-md text-white pr-2 pl-2 focus:outline-none">
                                                                return
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="ml-3">
                                                                <p class="text-gray-900 whitespace-no-wrap">
                                                                   {{ucfirst($moreInfo['fn'])." ".ucfirst($moreInfo['ln'])}}
                                                                    {{-- {{$studentActive['studentActive'][$stdID]['firstname']." ".$studentActive['studentActive'][$stdID]['lastname']}} --}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ucfirst($moreInfo['gen'])}}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{$moreInfo['dob']}}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ucfirst($moreInfo['addr'])}}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <button class="bg-blue-300 rounded-md text-center text-blue-800 pr-2 pl-2 focus:outline-none whitespace-no-wrap">
                                                            <a target="_blank" href='{{url('/storage/studentbirthCert/storage/'.$moreInfo['bC'])}}'>View</a>
                                                        </button>
                                                    </td>
                                                  </tr>
                                                @endif

                                            @endif

                                @if($dropdownFilter=="inactive")
                                    @forelse ($studentNotActive['studentNotActive'] as $data )
                                    @if($hiddenDetail==false)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <button type="submit" wire:click.prevent="showHiddenDetail({{$data['id']}})" class="bg-blue-900 focus:outline-none rounded-md text-white pr-2 pl-2 text-2xl">
                                                    +
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    {{$data['idenNumber']}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ucfirst($data['firstname'])}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ucfirst($data['lastname'])}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ucfirst($data['gender'])}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ucfirst($data['grade'])}} 
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{strToUpper($data['class'])}} 
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <button wire:click.prevent="showEdit({{$data['id']}})">Edit</button> 
                                            </p>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td colspan="7" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                           No Available Data                                                  
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                    @if($hiddenDetail==true)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <button type="submit" wire:click.prevent="noShowHiddenDetail" class="bg-red-900 rounded-md focus:outline-none text-white pr-2 pl-2">
                                                    return
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                       {{ucfirst($moreInfo['fn'])." ".ucfirst($moreInfo['ln'])}}
                                                        {{-- {{$studentActive['studentActive'][$stdID]['firstname']." ".$studentActive['studentActive'][$stdID]['lastname']}} --}}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ucfirst($moreInfo['gen'])}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$moreInfo['dob']}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ucfirst($moreInfo['addr'])}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                           <a class="bg-blue-900 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" target="_blank" href='{{url('/storage/studentbirthCert/storage/'.$moreInfo['bC'])}}'>View</a>
                                            
                                        </td>
                                      </tr>
                                    @endif
                            @endif


                            @if($dropdownFilter=="suspended")
                                @forelse ($studentSuspended['studentSuspended'] as $data )
                                @if($hiddenDetail==false)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <button type="submit" wire:click.prevent="showHiddenDetail({{$data['id']}})" class="bg-blue-900 focus:outline-none rounded-md text-white pr-2 pl-2 text-2xl">
                                                +
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                {{$data['idenNumber']}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ucfirst($data['firstname'])}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ucfirst($data['lastname'])}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ucfirst($data['gender'])}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ucfirst($data['grade'])}} 
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{strToUpper($data['class'])}} 
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <button wire:click.prevent="showEdit({{$data['id']}})">Edit</button>  
                                        </p>
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="7" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center text-center" >
                                            <div class="ml-3" >
                                                <p class="text-center text-gray-900 whitespace-no-wrap">
                                                    No Available Data                                                  
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                                @if($hiddenDetail==true)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <button type="submit" wire:click.prevent="noShowHiddenDetail" class="bg-red-900 focus:outline-none rounded-md text-white pr-2 pl-2">
                                                return
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                   {{$moreInfo['fn']." ".$moreInfo['ln']}}
                                                    {{-- {{$studentActive['studentActive'][$stdID]['firstname']." ".$studentActive['studentActive'][$stdID]['lastname']}} --}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$moreInfo['gen']}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$moreInfo['dob']}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$moreInfo['addr']}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <a target="_blank" href='{{url('/storage/studentbirthCert/storage/'.$moreInfo['bC'])}}'>View</a>
                                        </p>
                                    </td>
                                  </tr>
                                @endif
                        @endif                         
                        </tbody>
                    </table>

                    {{-- <div
                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                        <span class="text-xs xs:text-sm text-gray-900">
                            Showing 1 to 4 of {{$studentCount['studentCount']}} Entries
                        </span>
                        <div class="inline-flex mt-2 xs:mt-0">
                            <button
                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
                            <button
                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                Next
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
</div>
    </div>
</body>

@elseif($addMode==true)
    
<button type="button" wire:click.prevent="show()" class='mt-4 w-auto hover:bg-blue-800 bg-blue-900 rounded-md shadow-xl font-medium text-white px-4 py-2 border-gray-400 focus:outline-none  focus:border-gray-500'>View student listing</button>
<div class="flex items-center justify-center   mb-32">
    
    <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
<form wire:submit.prevent="onSubmit">

  
      <div class="flex justify-center">
        <div class="flex">
          <h1 class="text-gray-600 mt-5 mb-5 font-bold md:text-2xl text-xl">Student Form</h1>
        </div>
      </div>
  
      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Student Identification Number</label>
        <input wire:model="studentIDN" class="@error('studentIDN')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none" type="text" placeholder="" />
        @error('studentIDN')
        <p class="text-red-500 text-xs italic mt-4">
            {{ "*required" }}
        </p>
        @enderror
    </div>
  
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
        <div class="grid grid-cols-1">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Firstname</label>
          <input wire:model="fname" class="@error('fname')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:border-transparent" type="text" placeholder="" />
          @error('fname')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror
        </div>
        <div class="grid grid-cols-1">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Lastname</label>
          <input wire:model="lname" class="@error('lname')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" placeholder="" />
          @error('lname')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror
        </div>
      </div>

     <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
       <div class="grid grid-cols-1"> 
           <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Grade</label>
        <select wire:model="grade" class="@error('grade')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
          <option value="">Select grade</option>
          <option value="grade1">Grade 1</option>
          <option value="grade2">Grade 2</option>
          <option value="grade3">Grade 3</option>
          <option value="grade4">Grade 4</option>
          <option value="grade5">Grade 5</option>
          <option value="grade6">Grade 6</option>
        </select>
        @error('grade')
        <p class="text-red-500 text-xs italic mt-4">
            {{ "*required" }}
        </p>
        @enderror
    </div>
        <div class="grid grid-cols-1"> 
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Class</label>
         <select wire:model="class" class="@error('class')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
           <option value="">Select class</option>
           <option value="1KC">1KC</option>
           <option value="2EL">2EL</option>
           <option value="3XY">3XY</option>
           <option value="4AE">4AE</option>
           <option value="5WL">5WL</option>
           <option value="6JK">6JK</option>
         </select>
         @error('class')
         <p class="text-red-500 text-xs italic mt-4">
             {{ "*required" }}
         </p>
         @enderror
         </div>
      </div>
  
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
       <div class="grid grid-cols-1"> 
           <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
        <select wire:model="gender" class="@error('gender')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
          <option value="">Select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
        @error('gender')
        <p class="text-red-500 text-xs italic mt-4">
            {{ "*required" }}
        </p>
        @enderror
    </div>
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Date of birth</label>
            <input wire:model="dob" class="@error('dob')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="date" placeholder="" />
            @error('dob')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror
        </div>
      </div>
  
      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Address</label>
        <input wire:model="address" class="@error('address')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" placeholder="" />
        @error('address')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror
        </div>
  
      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Birth Certificate</label>
          <div class='flex items-center justify-center w-full'>
              <label class=' flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-gray-200 group'>
                  <div class='flex flex-col items-center justify-center pt-7'>
                      <svg class="w-10 h-10 text-blue-400 group-hover:text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                   @if($birthCert== '') 
                   <p class='lowercase text-sm text-gray-400 group-hover:text-blue-800 pt-1 tracking-wider'>upload either JPG, JPEG, PDF file</p>
                   @else
                   <p class='lowercase text-sm text-blue-800 pt-1 tracking-wider'>{{$birthCert->getClientOriginalName()}}</p>
                   @endif
                  </div>
                  <input wire:model="birthCert" type='file' class="hidden" />
                </label>  
           
          </div>
          @error('birthCert')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror 
          {{$bCert}}
      </div>
        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
          <button type="button" wire:click.prevent='show()' class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
          <button type="submit" class='w-auto bg-green-500 hover:bg-green-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
        </div>
    </form>
  
    </div>
  </div>

  @elseif ($editMode)

  <div class="flex  bg-gray-200 items-center justify-center   mb-32">
    
    <div class="mt-5 grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
<button type="button" wire:click.prevent="show()" class=' w-auto hover:bg-blue-800 bg-blue-900 rounded-md shadow-xl font-medium text-white px-4 py-2 border-gray-400 focus:outline-none  focus:border-gray-500'>View student listing</button>
<form wire:submit.prevent="onEdit">
<div class="flex justify-center py-4">
        <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
        </div>
      </div>
  
      <div class="flex justify-center">
        <div class="flex">
          <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Update Form</h1>
        </div>
      </div>
  
      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Identification Number</label>
        <input wire:model="studentIDN" class="@error('studentIDN')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none" type="text" placeholder="Enter student identification number" />
        @error('studentIDN')
        <p class="text-red-500 text-xs italic mt-4">
            {{ "*required" }}
        </p>
        @enderror
    </div>
  
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
        <div class="grid grid-cols-1">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Firstname</label>
          <input wire:model="fname" class="@error('fname')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 text-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:border-transparent" type="text" placeholder="Enter student's firstname" />
          @error('fname')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror
        </div>
        <div class="grid grid-cols-1">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Lastname</label>
          <input wire:model="lname" class="@error('lname')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 text-gray-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" placeholder="Enter student's lastname" />
          @error('lname')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror
        </div>
      </div>

     <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
       <div class="grid grid-cols-1"> 
           <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Grade</label>
        <select wire:model="grade" class="@error('grade')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
          <option value="">Select grade</option>
          <option value="grade1">Grade 1</option>
          <option value="grade2">Grade 2</option>
          <option value="grade3">Grade 3</option>
          <option value="grade4">Grade 4</option>
          <option value="grade5">Grade 5</option>
          <option value="grade6">Grade 6</option>
        </select>
        @error('grade')
        <p class="text-red-500 text-xs italic mt-4">
            {{ "*required" }}
        </p>
        @enderror
    </div>
        <div class="grid grid-cols-1"> 
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Class</label>
         <select wire:model="class" class="@error('class')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
           <option value="">Select class</option>
           <option value="1KC">1KC</option>
           <option value="2EL">2EL</option>
           <option value="2AE">2EL</option>
           <option value="3XY">3XY</option>
           <option value="4AE">4AE</option>
           <option value="5WL">5WL</option>
           <option value="6JK">6JK</option>
         </select>
         @error('class')
         <p class="text-red-500 text-xs italic mt-4">
             {{ "*required" }}
         </p>
         @enderror
         </div>
      </div>
  
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
       <div class="grid grid-cols-1"> 
           <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
        <select wire:model="gender" class="@error('gender')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
          <option value="">Select gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
        @error('gender')
        <p class="text-red-500 text-xs italic mt-4">
            {{ "*required" }}
        </p>
        @enderror
    </div>
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Date of birth</label>
            <input wire:model="dob" class="@error('dob')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="date" placeholder="Enter student's lastname" />
            @error('dob')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror
        </div>
      </div>
  
      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Address</label>
        <input wire:model="address" class="@error('address')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent" type="text" placeholder="Enter your address" />
        @error('address')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror
        </div>
  
      <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Birth Certificate</label>
          <div class='flex items-center justify-center w-full'>
              <label class=' flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-gray-200 group'>
                  <div class='flex flex-col items-center justify-center pt-7'>
                      <svg class="w-10 h-10 text-purple-400 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                   @if($birthCert== '') 
                   <p class='lowercase text-sm text-gray-400 group-hover:text-green-600 pt-1 tracking-wider'>upload either JPG, JPEG, PDF file</p>
                   @elseif($birthCert == $oldbirthCert)
                   <p class='lowercase text-sm text-green-600 pt-1 tracking-wider'>{{$birthCert}}</p>
                   @else
                   <p class='lowercase text-sm text-green-600 pt-1 tracking-wider'>{{$birthCert->getClientOriginalName()}}</p>
                   @endif
                  </div>
                  <input wire:model="birthCert" type='file' class="hidden" />
                </label>  
           
          </div>
          @error('birthCert')
          <p class="text-red-500 text-xs italic mt-4">
              {{ "*required" }}
          </p>
          @enderror 
          {{$bCert}}
      </div>
        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
          <button type="button" wire:click.prevent='show()' class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
          <button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Update</button>
        </div>
    </form>
  
    </div>
  </div>
  @endif

</div>


