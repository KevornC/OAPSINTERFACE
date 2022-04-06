<div>
    {{-- The whole world belongs to you. --}}
    @if($view)
<div class="min-w-screen min-h-screen bg-gray-50 py-5">
    <div class="px-5">
        <div class="mb-2">
            {{-- <a href="#" class="focus:outline-none hover:underline text-gray-500 text-sm"><i class="mdi mdi-arrow-left text-gray-400"></i>Back</a> --}}
        </div>
        <div class="mb-2">
            <h1 class="text-3xl md:text-5xl font-bold text-gray-600">Checkout</h1>
        </div>
        <div class="mb-5 text-gray-400">
            {{-- <a href="#" class="focus:outline-none hover:underline text-gray-500">Home</a> / <span class="text-gray-600">Checkout</span> --}}
        </div>
    </div>
    <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-10 text-gray-800">
        <div class="w-full">
            <div class="-mx-3 md:flex items-start">
                <div class="px-3 md:w-7/12 lg:pr-10">
                    <div class="w-full mx-auto text-gray-800 font-light mb-6 pb-6">
                        
                        <div class="w-full flex items-center">
                            <div class="flex-grow pl-3">
                                <h6 class="font-semibold uppercase text-gray-600">Electronic Voucher</h6>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-600 text-xl">${{$details['0']['fixedPrice']}} per day</span><span class="font-semibold text-gray-600 text-sm">.00</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-6 pb-6 border-b border-gray-200   text-gray-800 text-md">
                        <div class="w-full flex items-center">
                            <div class="flex-grow">
                            <select required wire:model="period" class="border-gray-200 border rounded-md p-2 focus:outline-none">
                               <option value="">Select Period</option>
                               <option value="5">1 week (5 days)</option>
                               <option value="10">2 weeks (10 days)</option>
                               <option value="15">3 weeks (15 days)</option>
                               <option value="20">4 weeks (20 days)</option>
                           </select>
                           @error('period')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 pb-6 border-b border-gray-200  text-gray-800 text-xl">
                        <div class="w-full flex items-center">
                            <div class="flex-grow">
                                <span class="text-gray-600">Total</span>
                            </div>
                            <div class="pl-3">
                                <span class="font-semibold text-gray-400 text-sm">JMD</span> <span class="font-semibold">${{number_format($total,2)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3 md:w-5/12">
                    <div class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                        <div class="w-full flex items-center">
                            <div class="w-32">
                                <span class="text-gray-600 font-semibold">Parent's Name:</span>
                            </div>
                            <div class="flex-grow pl-3">
                                <span>{{$students[0]['parent']['firstname'].' '.$students['0']['parent']['lastname']}}</span>
                            </div>
                        </div>
                        <div class="w-full flex mb-3 items-center">
                            <div class="w-32">
                                <span class="text-gray-600 font-semibold">Student's Name:</span>
                            </div>
                            <div class="flex-grow pl-3">
                                <select wire:model="relationshipID" class="border-gray-200 border rounded-md p-2 focus:outline-none">
                                    <option value="">Select Child</option>
                                    @forelse ( $students as $data)
                                    <option value="{{$data['id']}}">{{$data['student']['firstname'].' '.$data['student']['lastname']}}</option>
                                    @empty
                                    <option value="">No Available Child</option>
                                    @endforelse
                                    
                                </select>
                                @error('relationshipID')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="w-full mx-auto rounded-lg bg-white border border-red-200 text-gray-800 font-light mb-6">
                        <div class="w-full p-3 border-b border-gray-200">
                            <div class="mb-5">
                                <label for="type1" class="flex items-center cursor-pointer">
                                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-6 ml-3">
                                </label>
                            </div>
                            <div>
                                <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Name on card</label>
                                <div>
                                    <div class="mb-3 flex justify-left">
                                        <input wire:model="nameOnCard" class="w-1/2 px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Smith" type="text"/>
                                    </div>
                                    @error('nameOnCard')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div >
                                    <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Card number</label>
                                    <div class="mb-3 flex justify-left">
                                        <input wire:model="CardNumber"  class="w-1/2 px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000000000000000" type="number"/>
                                    </div>
                                    @error('CardNumber')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                                </div>
                                <div class="mb-3 -mx-2 flex items-end">
                                    <div class="px-2">
                                        <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Expiration date</label>
                                        <div>
                                            <select wire:model="month" class="form-select py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                                <option value="">Select</option>
                                                <option value="01">01 - January</option>
                                                <option value="02">02 - February</option>
                                                <option value="03">03 - March</option>
                                                <option value="04">04 - April</option>
                                                <option value="05">05 - May</option>
                                                <option value="06">06 - June</option>
                                                <option value="07">07 - July</option>
                                                <option value="08">08 - August</option>
                                                <option value="09">09 - September</option>
                                                <option value="10">10 - October</option>
                                                <option value="11">11 - November</option>
                                                <option value="12">12 - December</option>
                                            </select>
                                        </div>
                                        @error('month')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div  class="">
                                        <select wire:model="year" class="form-select w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                                            <option value="">Select</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                        @error('year')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="px-2 w-1/4">
                                        <label class="text-gray-600 font-semibold text-sm mb-2 ">Security code</label>
                                        <div>
                                            <input wire:model="securityCode" class="w-1/2 px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text"/>
                                        </div>
                                        @error('securityCode')
                                            <p class="text-red-500 text-xs italic mt-4">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div>
                        <button type="submit" wire:click.prevent='payNow()'class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold"><i class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
@else
<!-- component -->
<div class="bg-gray-100 min-h-screen">
    <div class="bg-white p-6  md:mx-auto min-h-screen">
      <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
          <path fill="currentColor"
              d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
          </path>
      </svg>
      <div class="text-center">
          <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Payment Done!</h3>
          <p class="text-gray-600 my-2">Thank you for completing your secure online payment.</p>
          <p> Have a great day!  </p>
          <div class="py-10 text-center">
              <a href="{{route('parentDashboard')}}" class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                  Return To Dashboard
             </a>
          </div>
      </div>
  </div>
</div>
@endif

</div>
