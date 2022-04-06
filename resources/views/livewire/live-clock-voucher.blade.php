<div>
       @if($searchMode==false)
       <main class="mx-10 mt-5">
    
       <div class="mt-10 sm:mt-0">
         <div class="md:grid md:grid-cols-3 md:gap-6">
           <div class="md:col-span-1">
             <div class="px-4 sm:px-0">
               <h3 class="text-lg font-medium leading-6 text-gray-900">Find Voucher</h3>
               <p class="mt-1 text-sm text-gray-600">
                 Enter the voucher number to start.
               </p>
             </div>
           </div>
           <div class="mt-5 md:mt-0 md:col-span-2">
             <form action="" wire:submit.prevent="onSubmit">
                 <div class="shadow overflow-hidden sm:rounded-md">
                 <div class="px-4 py-5 bg-white sm:p-6">
                   <div class="grid grid-cols-6 gap-6">
                
                     <div class="col-span-6 sm:col-span-3">
                         <label class="block text-sm font-medium text-gray-700">Voucher's Number</label>
                         <input  type="text" wire:model="voucherNumber" class="@error('voucherNumber')  border-red-500 @enderror mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                         @error('voucherNumber')
                         <p class="text-red-500 text-xs italic mt-4">
                             {{ "*required" }}
                         </p>
                         @enderror  
                     </div>
                   </div>
                 </div>
     
                 <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                   <button type="submit" wire:click.prevent="onSubmit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    search
                   </button>
                 </div>
               </div>
             </form>
             
       @if (session()->has('message'))
       <div class="bg-red-100 mt-2 rounded-md px-4 py-3">  
           <strong class="font-bold text-red-500">Whoops!</strong>
           <p class="text-red-500">{{session()->get('message')}}</p>
       </div>
        @endif
       @if (session()->has('success'))
       <div class="bg-green-100 mt-2 rounded-md px-4 py-3">  
           <strong class="font-bold text-green-500">Success!</strong>
           <p class="text-green-500">{{session()->get('success')}}</p>
       </div>
        @endif
           </div>
         </div>
       </div>
       </main>

    @elseif($viewResult==true)
       <div class="flex  bg-gray-200 items-center justify-center h-screen   mb-32">
        
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
       <div class="flex justify-center py-4">
            <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
          </div>
      
          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">E-Voucher Usage Clocker</h1>
            </div>
          </div>
      
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
              <div class="grid grid-cols-1">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Voucher's Number</label>
                </div>
                <p class="text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">{{$vNum}}</p>
              <div class="grid grid-cols-1">
              </div>
            
        </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
              <div class="grid grid-cols-1">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Remaining Usage</label>
                </div>
                <p class="text-gray-400 py-2 px-3 rounded-lg border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">{{$rUsage}}</p>
              <div class="grid grid-cols-1">
              </div>
            
        </div>
      
            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                @if($status!='Active')
                @if (session()->has('error'))
              <div class="bg-red-100 mt-2 rounded-md px-4 py-3">  
                  <strong class="font-bold text-red-500">Whoops!</strong>
                  <p class="text-red-500">{{session()->get('error')}}</p>
              </div>
              <button type="button" wire:click.prevent='show()' class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
              @endif
               @else
              <button type="submit" wire:click.prevent="onClock" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Clock</button>
              @endif
            </div>

        </div>
      </div>
             @endif
      
       
    
    

</div>
