<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @if($viewMode==false)
    <!-- component -->
<body class="antialiased font-sans bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Canteen Staff</h2>
            </div>
            <form >
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <p
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        {{$canteenCount['csActiveCount']}}
                        </p>
                    </div>
                    <div class="relative">
                        <select
                            wire:model="dropdownFilter" class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                            <option value="active">Active</option>
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
                        <button wire:click.prevent="addMode" type="button" class='appearance-none h-full  sm:rounded-md rounded-md block w-full border-gray-400 text-white ml-2 py-2 px-4  leading-tight focus:outline-none hover:bg-blue-800 bg-blue-900 focus:border-gray-500'>Canteen Staff +</button>
                     </div>
                </div>
            </div>
        </form>

                   
<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
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
                    Gender
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                    Email
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                    Status
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @forelse ($results['csActive'] as $data )
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <div class="flex items-center">
                        <div class="ml-3">
                        {{ucfirst($data['firstname'])}}
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
                    <div class="flex items-center">
                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ucfirst($data['gender'])}}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{$data['email']}}
                    </p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                   @if($data['status']=='active')
                    <p class="bg-green-200 rounded-md text-center text-green-800 pr-2 pl-2 focus:outline-none">
                        {{ucfirst($data['status'])}}
                    </p>
                    @elseif($data['status']=='Newly Opened')
                    <p class="text-orange-800 pr-2 pl-2 focus:outline-none">
                        {{ucfirst($data['status'])}}
                    </p>
                    @endif
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                     <button class="bg-blue-900 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="showEdit({{$data['id']}})">Edit</button>  
                   
                </td>
            </tr>   
                
            @empty
            <td colspan="7" class="text-center  px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <div>
                    <div class="ml-3">
                     <p class="text-center ">No records found.</p>
                    </div>
                </div>
            </td>  
            @endforelse                      
        </tbody>
    </table>
            </div>
        </div>
</div>
</div>
</body>
@elseif($addMode==true)

<div class="flex  bg-gray-200 items-center justify-center   mb-32">
    
    <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
<button type="button" wire:click.prevent="show()" class='mt-4 w-auto hover:bg-blue-800 bg-blue-900 rounded-md shadow-xl font-medium text-white px-4 py-2 border-gray-400 focus:outline-none  focus:border-gray-500'>View staff listing</button>
<form wire:submit.prevent="onSubmit">
<div class="flex justify-center py-4">
        <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
        </div>
        </div>
    
        <div class="flex justify-center">
        <div class="flex">
            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Add Form</h1>
        </div>
        </div>
    
    
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1"> 
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
            <select wire:model="gender" class="@error('gender')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
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
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Firstname</label>
            <input wire:model="firstname" class="@error('firstname')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:border-transparent" type="text" placeholder="Enter student's firstname" />
            @error('firstname')
            <p class="text-red-500 text-xs italic mt-4">
                {{ "*required" }}
            </p>
            @enderror
        </div>
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Lastname</label>
            <input wire:model="lastname" class="@error('lastname')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Enter student's lastname" />
            @error('lastname')
            <p class="text-red-500 text-xs italic mt-4">
                {{ "*required" }}
            </p>
            @enderror
        </div>
        </div>
    
        <div class="hidden grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
        <div class="grid grid-cols-1"> 
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
        <input type="text" readonly wire:model="email" class="@error('Email')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"/>
        @error('email')
        <p class="text-red-500 text-xs italic mt-4">
            {{ "*required" }}
        </p>
        @enderror
    </div>
    <div class="grid grid-cols-1"> 
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password</label>
        <input type="text" readonly wire:model="password" class="@error('password')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"/>
        @error('password')
        <p class="text-red-500 text-xs italic mt-4">
            {{ "*required" }}
        </p>
        @enderror
    </div>
        
        </div>
        <div class="grid grid-cols-1 mt-5 mx-7">
        
        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button type="button" wire:click.prevent='show()' class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
            <button type="submit" wire:click.prevent="onSubmit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
        </div>
    </form>
    
    </div>
    </div>

@elseif ($editMode)

    <div class="flex h-screen bg-gray-200 items-center justify-center   mb-32">
     
    <div class=" grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
    <button type="button" wire:click.prevent="show()" class='  w-auto hover:bg-blue-800 bg-blue-900 rounded-md shadow-xl font-medium text-white px-4 py-2 border-gray-400 focus:outline-none  focus:border-gray-500'>View staff listing</button>
    <form wire:submit.prevent="showEdit">
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
        
        
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1"> 
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender</label>
                <select wire:model="gender" class="@error('gender')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
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
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                <select wire:model="status" class="@error('status')  border-red-500 @enderror text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <option value="">Select employment status</option>
                <option value="inactive">Inactive</option>
                </select>
                @error('status')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ "*required" }}
                </p>
                @enderror
            </div>
            </div>
    
    
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Firstname</label>
                <input wire:model="firstname" class="@error('firstname')  border-red-500 @enderror text-gray-500 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:border-transparent" type="text" placeholder="Enter student's firstname" />
                @error('firstname')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ "*required" }}
                </p>
                @enderror
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Lastname</label>
                <input wire:model="lastname" class="@error('lastname')  border-red-500 @enderror text-gray-500 py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Enter student's lastname" />
                @error('lastname')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ "*required" }}
                </p>
                @enderror
            </div>
            </div>
         
            <div class="grid grid-cols-1 mt-5 mx-7">
            
            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button type="button" wire:click.prevent='show()' class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                <button type="submit" wire:click.prevent="editStaff" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Update</button>
            </div>
        </form>
        
        </div>
        </div>
    
    @endif




</div>
