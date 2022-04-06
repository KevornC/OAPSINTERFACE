<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    
    @if(!$viewMode)
<!-- ====== Table Section Start -->
<section class="h-screen bg-white py-20 lg:py-[120px]">
   <div class="container">
      <div class="flex flex-wrap -mx-4">
         <div class="w-full px-4">
           <header class="w-full px-4 bg-primary text-center text-white font-bold">Child/ren</header>
            <div class="max-w-full overflow-x-auto">
               <table class="table-auto w-full">
                  <thead>
                     <tr class="bg-primary text-center">
                        <th
                           class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           border-l border-transparent
                           "
                           >
                          Student ID
                        </th>
                        <th
                           class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           "
                           >
                           Name
                        </th>
                        <th
                           class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           "
                           >
                           Grade
                        </th>
                        <th
                           class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           "
                           >
                           Class
                        </th>
                        <th
                           class="
                           w-1/6
                           min-w-[160px]
                           text-lg
                           font-semibold
                           text-white
                           py-4
                           lg:py-7
                           px-3
                           lg:px-4
                           "
                           >
                           Action
                        </th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     @forelse ($students as $data)
                     <tr>
                        <td
                           class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-[#E8E8E8]
                           "
                           >
                           {{$data['student']['idenNumber']}}
                        </td>
                        <td
                           class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-[#F3F6FF]
                           border-b border-l border-[#E8E8E8]
                           "
                           >
                           {{$data['student']['firstname'].' '.$data['student']['lastname']}}
                        </td>
                        <td
                           class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-[#F3F6FF]
                           border-b border-[#E8E8E8]
                           "
                           >
                           {{$data['student']['grade']}}
                        </td>
                        <td
                           class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-[#E8E8E8]
                           "
                           >
                           {{$data['student']['class']}}
                        </td>
                        <td
                           class="
                           text-center text-dark
                           font-medium
                           text-base
                           py-5
                           px-2
                           bg-white
                           border-b border-r border-[#E8E8E8]
                           "
                           >
                           <a
                              href=""
                              wire:click.prevent='viewVoucher({{$data['id']}})'
                              class="
                              border border-primary
                              py-2
                              px-6
                              text-primary
                              inline-block
                              rounded
                              hover:bg-primary hover:text-white
                              "
                              >
                           View E-Vouchers
                    </a>
                        </td>       
                     </tr>
                     @empty
                     <tr>
                       <td colspan="5"
                          class="
                          text-center text-dark
                          font-medium
                          text-base
                          py-5
                          px-2
                          bg-[#F3F6FF]
                          border-b border-l border-[#E8E8E8]
                          "
                          >
                          No Available Records
                       </td>
                     </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section> 
@else
 
<section class="h-screen bg-white py-20 lg:py-[120px]">
   <div class="container">
       <a href="" wire:click.prevent='switch' class="border border-primary py-2 px-6 text-primary inline-block rounded hover:bg-primary hover:text-white">
          Return Back
       </a>
       <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <header class="w-full px-4 bg-primary text-center text-white font-bold">E-Voucher</header>
             <div class="max-w-full overflow-x-auto">
                <table class="table-auto w-full">
                   <thead>
                      <tr class="bg-primary text-center">
                         <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                           E-Voucher Number
                         </th>
                         <th
                            class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                            Total Allotment
                         </th>
                         <th
                            class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4">
                            Remaining Usage
                         </th>
                         <th
                            class="w-1/6 min-w-[160px] text-lg font-semiboldtext-white py-4 lg:py-7 px-3 lg:px-4">
                            Status
                         </th>
                      </tr>
                   </thead>
                   <tbody>
                      @forelse ($EV as $data)
                      <tr>
                         <td
                            class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                            {{$data['voucherNumber']}}
                         </td>
                         <td
                            class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                            {{$data['totalAllotment']}}
                         </td>
                         <td
                            class=" text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">"
                            {{$data['track_vouchers']['0']['RemainingUsage']}}
                         </td>
                         <td
                            class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8] " >
                            {{$data['track_vouchers']['0']['status']}}
                         </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5" class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-l border-[#E8E8E8] ">
                           No Available Records
                        </td>
                      </tr>
                      @endforelse
                   </tbody>
                </table>
             </div>
          </div>
       </div>
    </div>
 </section>
 @endif
</div>
