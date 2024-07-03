<!-- Team -->
<div class="max-w-[85rem] px-4 py-5 sm:px-6 lg:px-8 lg:py-7 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-5 lg:mb-7">
    <h2 class="text-1xl font-bold md:text-2xl md:leading-tight dark:text-white">Available Rooms</h2>
  </div>
  <!-- End Title -->
  <!-- Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    
      @if (count($all_doctors) > 0)
      @foreach ($all_doctors as $item)
          <div class="flex flex-col rounded-xl p-4 md:p-6 bg-white border border-gray-200 dark:bg-neutral-900 dark:border-neutral-700">
          <div class="flex items-center gap-x-4">
            <livewire:profile-image :user_id="$item->doctorUser->id"/>

            <div class="grow">
              <h3 class="font-medium text-gray-800 dark:text-neutral-200">
                Dr. {{$item->doctorUser->name}}
              </h3>
              <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                {{$item->speciality->speciality_name}} / {{$item->hospital_name}}
              </p>
            </div>
          </div>
            <div class="mb-3">
              @if ($item->is_featured)
                <p class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-blue-200 text-gray-800 dark:bg-neutral-800 dark:text-neutral-200">
                    Featured
                </p>
              @endif
            
          </div>
          <p class="mt-3 text-gray-500 dark:text-neutral-500">
            {{$item->bio}}
          </p>
          
            <div class="flex justify-between mt-5">
            @if (auth()->user() != null)
                <a href="/booking/page/{{$item->id}}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                  Book Room
                </a>
            @else
                <a href="/login" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                  Book Room
                </a>
            @endif
            
            </div>
          
        </div>
        <!-- End Col -->
      @endforeach
      @else
          
      @endif
    
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Team -->