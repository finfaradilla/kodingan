<div>
  <div wire:loading>
    <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
      <span class="sr-only">Loading...</span>
    </div>
    Processing..</div>
    <!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-10 bg-white border my-2  shadow-md">
   <!-- Grid -->
  <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-12">
    <div class="text-center">
      <livewire:profile-image :user_id="$doctor_details->doctorUser->id"/>
      <div class="mt-2 sm:mt-4">
        <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg dark:text-neutral-200">
          {{$doctor_details->doctorUser->name}}
        </h3>
        <p class="text-xs text-gray-600 sm:text-sm lg:text-base dark:text-neutral-400">
          {{$doctor_details->speciality->speciality_name}} / {{$doctor_details->hospital_name}}
        </p>
      </div>
    </div>
    <!-- End Col -->
    <div class="text-center">
            <h3>Select an Available Date</h3>
    <input type="text" id="datepicker" autocomplete="off" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-gray-100 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Select Available date">
    @if($selectedDate)
        <div>
            <h4>Selected Date: {{ $selectedDate }}</h4>
        </div>
    @endif
        <h2 class="text-xl font-bold mb-2">Available Time Slots</h2>
       

      <div class="flex flex-wrap">
        @foreach ($timeSlots as $startTime)
            <div class="m-2">
                <button class="m-2 p-2 bg-blue-500 text-white rounded hover:bg-blue-700"
                        type="button"
                        wire:click="selectStartTime('{{ $startTime }}')"
                        wire:loading.attr="disabled">
                    Start: {{ date('H:i', strtotime($startTime)) }}
                </button>
            </div>
        @endforeach
    </div>
    
    <div class="flex flex-wrap">
      @foreach ($timeSlots as $endTime)
          <div class="m-2">
              <button class="m-2 p-2 bg-blue-500 text-white rounded hover:bg-blue-700"
                      type="button"
                      wire:click="selectEndTime('{{ $endTime }}')"
                      wire:loading.attr="disabled">
                  End: {{ date('H:i', strtotime($endTime)) }}
              </button>
          </div>
      @endforeach
  </div>

  <div class="mt-4">
    <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700"
            wire:click="bookAppointment"
            wire:loading.attr="disabled">
        Book Appointment
    </button>
</div>

  {{-- @if ($selectedStartTime && $selectedEndTime)
  <div class="mt-4">
      <button class="p-2 bg-green-500 text-white rounded hover:bg-green-700"
              type="button"
              wire:click="bookAppointment('{{ $selectedStartTime }}', '{{ $selectedEndTime }}')"
              wire:confirm="Are you sure you want to book appointments from {{ $selectedStartTime }} to {{ $selectedEndTime }} on {{ $selectedDate }}?">
          Book Appointment: {{ date('H:i', strtotime($selectedStartTime)) }} to {{ date('H:i', strtotime($selectedEndTime)) }}
      </button>
  </div>
@endif --}}

</div>
    </div>
    </div>
    <!-- End Col -->
  </div>
  <!-- End Grid -->
</div>
<!-- End Card Blog -->
<script src="pikaday.js"></script>
    <script>
        // Inject available dates from Livewire
            var availableDates = @json($availableDates); 

            var picker = new Pikaday({
                field: document.getElementById('datepicker'),
                format: 'YYYY-MM-DD',
                onSelect: function(date) {
                    var selectedDate = picker.toString();
                    @this.call('selectDate', selectedDate);
                },
                disableDayFn: function(date) {
                    // Disable all dates not in the availableDates array
                    var formattedDate = moment(date).format('YYYY-MM-DD');
                    return !availableDates.includes(formattedDate);
                }
            });
    </script>
    
</div>