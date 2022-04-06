<div>
    @if($changePass==false)

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<div class="container max-w-full mx-auto md:py-24 px-6">
<div class="max-w-sm mx-auto px-6">
     <div class="relative flex flex-wrap">
         <div class="w-full relative">
             <div class="md:mt-6">
                 <form class="mt-8" action="" wire:submit.prevent='modifyPassword' >
                     <div class="mx-auto max-w-lg ">
                         
                         <div class="py-1">
                             <span class="px-1 text-sm text-gray-600">New Password</span>
                             <input placeholder="" type="password" wire:model="password"
                                    class="text-md block px-3 py-2 rounded-lg w-full
             bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                         </div>
                         <div class="py-1">
                             <span class="px-1 text-sm text-gray-600">Password Confirm</span>
                             <input placeholder="" type="password" wire:model="confirm"
                                    class="text-md block px-3 py-2 rounded-lg w-full
             bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                         </div>
                         @if(session()->has('noMatch'))
                         <div class="flex items-center py-1">
                           <div class="rounded-full p-1 fill-current bg-red-200 text-red-700">
                               <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path x-show="" stroke-linecap="round"
                                     stroke-linejoin="round" stroke-width="2"
                                     d="M6 18L18 6M6 6l12 12"/>
                                     {{-- d="M5 13l4 4L19 7"/> --}}
                               </svg>
                           </div>
                           <p class="ml-2 text-red-700">{{session()->get('noMatch')}}</p> {{-- </div> --}}
                         </div>
                         @endif
                         @if(session()->has('pLen'))
                         <div class="flex items-center py-1">
                           <div class="rounded-full p-1 fill-current bg-red-200 text-red-700">
                               <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path x-show="" stroke-linecap="round"
                                     stroke-linejoin="round" stroke-width="2"
                                     d="M6 18L18 6M6 6l12 12"/>
                               </svg>
                           </div>
                           <p class="ml-2 text-red-700">{{session()->get('pLen')}}</p> {{-- </div> --}}
                         </div>
                         @endif
                         <button type="submit" class="mt-3 text-lg font-semibold
         bg-gray-800 w-full text-white rounded-lg
         px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                             Change Password
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
</div>
@endif
</div>
