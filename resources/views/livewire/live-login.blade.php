<div>
    {{-- In work, do what you enjoy. --}}
   
    <main class="h-screen bg-cover">
            <div class="flex justify-center">
   <div class="mt-10 sm:mt-0">
     <div class="md:grid md:grid-cols-1 md:gap-6 md:w-full sm:w-1/2">
       <div class="md:col-span-1">
         
       <div class="mt-5 md:mt-0 md:col-span-2">
           
         <form action="" wire:submit.prevent="onSubmit">
             <div class="md:mt-10 sm:mt-10 shadow overflow-hidden sm:rounded-md md:rounded-md">
             <div class="px-4 py-5 bg-white sm:p-20">
               <div class="grid grid-cols-1">
                <div class="mb-4">
                    <h3 class="mb-4 flex justify-center text-3xl font-medium leading-6 text-blue-600">Login</h3>
                </div>
 
               
                 <div class="md:mt-5 sm:mt-5 col-span-2 sm:col-span-3">
                    @if (session()->has('message'))
                    <div class="bg-red-100 mb-4 rounded-md px-4 py-3">  
                        <strong class="font-bold text-red-500">Error!</strong>
                        <p class="text-red-500">{{session()->get('message')}}</p>
                    </div>
                    @endif      
               
                    <label class="block text-sm font-medium text-gray-600">Email</label>
                     <input type="email" wire:model="email" class="@error('email')  border-red-500 @enderror text-gray-500 mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                     @error('email')
                     <p class="text-red-500 text-xs italic mt-4">
                         {{ "required" }}
                     </p>
                     @enderror  
                <label class="block text-sm font-medium text-gray-600 mt-5">Password</label>
                     <input type="password" wire:model="password" class="@error('password')  border-red-500 @enderror text-gray-500 mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                     @error('password')
                     <p class="text-red-500 text-xs italic mt-4">
                         {{ "required" }}
                     </p>
                     @enderror 
                 </div>
               </div>
             
             </div>
           
             <div class="flex justify-center px-4 py-3 bg-gray-50 text-right sm:px-6">
               <button type="submit" class=" py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Login
               </button>
             </div>
           </div>
         </form>
         
       </div>
     </div>
   </div>
            </div>
     </main>
</div>
