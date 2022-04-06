<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <body class="antialiased font-sans bg-gray-200">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Parents</h2>
                </div>    
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Student 
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Student birth Certificate
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Parent
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Relationship
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Submitted Birth Certificate
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th colspan="2"
                                        class="text-center px-5 py-3 border-b-2 border-gray-200 bg-blue-100 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Action
                                    </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($parents as $data )
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                {{$data['student']['firstname'].' '.$data['student']['lastname']}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex justify-center">
                                            <div class="ml-3">
                                                <a class="bg-blue-300 rounded-md text-center text-blue-800 pr-2 pl-2 focus:outline-none" target="_blank" href='{{url('/storage/studentbirthCert/storage/'.$data['student']['birthCertificate'])}}'>View</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$data['parent']['firstname'].' '.$data['parent']['lastname']}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$data['relation']['type']}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex justify-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <a class="bg-blue-300 rounded-md text-center text-blue-800 pr-2 pl-2 focus:outline-none" target="_blank" href='{{url('/storage/parentUploads/storage/'.$data['birthCertificate'])}}'>View</a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                @if($data['status']=='Approved')
                                                <p class="bg-green-200 rounded-md text-green-800 pr-2 pl-2 focus:outline-none">
                                                    {{$data['status']}}
                                                </p>
                                                @elseif($data['status']=='Denied')
                                                <p class="bg-red-200 rounded-md text-red-800 pr-2 pl-2 focus:outline-none">
                                                    {{$data['status']}}
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="bg-green-900 rounded-md text-white pr-2 pl-2 focus:outline-none">
                                            <button wire:click.prevent="approve({{$data['id']}})">Approve</button>  
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="bg-red-900 rounded-md text-white pr-2 pl-2 focus:outline-none">
                                            <button wire:click.prevent="deny({{$data['id']}})">Deny</button>  
                                        </p>
                                    </td>
                                </tr>
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
                            </tbody> 
                        </table>
                    </div>                        
                </div>
            </div>
        </div>
    </body>
    </div>
