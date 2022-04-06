<div>
    @if($status)
    <script>
        alert('Registration Successful');

    </script>
    @endif
    <main class="mx-10 mt-5">
    
  <div class="mt-10 sm:mt-0">
      <div class="mt-5 md:mt-0 flex justify-center">
        <form action="" wire:submit.prevent="onSubmit">
            <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                  <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                  <select id="gender" wire:model="gender" class="@error('gender')  border-red-500 @enderror mt-1  mb-5 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                  @error('gender')
                  <p class="text-red-500 text-xs italic mt-4">
                      {{ $message }}
                  </p>
                  @enderror  
              </div>
              </div>

              <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                  <label for="firstname" class="block text-sm font-medium text-gray-700">First name</label>
                  <input type="text" wire:model="firstname"  class="@error('firstname')  border-red-500 @enderror mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                  @error('firstname')
                  <p class="text-red-500 text-xs italic mt-4">
                      {{ $message }}
                  </p>
                  @enderror
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                  <label for="lastname" class="block text-sm font-medium text-gray-700">Last name</label>
                  <input type="text" wire:model="lastname" class=" @error('lastname')  border-red-500 @enderror mt-1 p-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                  @error('lastname')
                  <p class="text-red-500 text-xs italic mt-4">
                      {{ $message }}
                  </p>
                  @enderror
                </div>
  
                

                <div class="col-span-6 sm:col-span-4">
                  <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                  <input type="text" wire:model="address"  class="@error('address')  border-red-500 @enderror mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                  @error('address')
                  <p class="text-red-500 text-xs italic mt-4">
                      {{ $message }}
                  </p>
                  @enderror
                </div>
  
             
                <div class="col-span-6 sm:col-span-3"">
                    <label class="block text-sm font-medium text-gray-700">Identification Card</label>
                    <input type="file" wire:model="idenCard" accept=".png,.pdf," class="@error('idenCard')  border-red-500 @enderror mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    @error('idenCard')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
  
                <div class="col-span-6 sm:col-span-3"">
                    <label class="block text-sm font-medium text-gray-700">Tax Registration Number</label>
                    <input type="file" wire:model="trn" accept=".png,.pdf," class="@error('trn')  border-red-500 @enderror mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    @error('trn')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" wire:model="email" class="@error('email')  border-red-500 @enderror mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    @error('email')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror  
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" wire:model="password" class="@error('password')  border-red-500 @enderror mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    @error('password')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror 
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" class="@error('retypepassword')  border-red-500 @enderror mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-md sm:text-sm border-gray-300 rounded-md">
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
              </div>
            </div>

 
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
  </div>
   </main>
</div>
  
         