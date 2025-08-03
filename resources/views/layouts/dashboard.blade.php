<div class="main-panel">
    <div class="content-wrapper pb-0">


        <!-- CITY LEVEL starts here -->
        <div class="row">
            <div
                class="max-w-sm col-sm-12 col-lg-4 w-full bg-white rounded-lg mb-4 shadow-sm dark:bg-gray-800 p-4 md:p-6">

                <div class="flex justify-between items-start w-full">
                    <div class="flex-col items-center">
                        <div class="flex items-center mb-1">
                            <h5 class="text-xl font-bold leading-none text-black-900 me-1"> TAXPAYERS MONITORING 
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- pie  Chart -->
                <div class="py-6" id="pie-chart"></div>
            </div>

            {{-- Overall stats start here  --}}
            <div class="col-lg-8">
                <div class="row ">
                    <div class="col-sm-12 stretch-card grid-margin">
                        <div class="card ">
                            <div class="card-body px-3    text-dark">
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted font-13 mb-0">Total Confirmed Taxpayers</p>
                                </div>
                                <h2 class="font-weight-bold">265</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  ">
                    <div class="col-sm-6 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body px-3 text-dark">
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted font-13 mb-0">Total Individuals Present </p>
                                </div>
                                <h2 class="font-weight-semibold"> {{$confirmed}}
                                    <span class="text-info">({{round($confirmed/265 *100)}}%)</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body px-3 text-dark">
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted font-13 mb-0"><span
                                            class="font-weight-bold text-danger">NOT</span> Present yet</p>
                                </div>
                                <h2 class="font-weight-semibold">{{265 - $confirmed}}
                                    <span
                                        class="text-info">({{round((265 - $confirmed)/265 *100)}}%)</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


{{-- 
        <!-- Barangay Level starts here -->
        <div class="row mb-3">
            <div class=" w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-2">
                <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                    <div class="col">
                        <dl>
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">VOTE MONITORING
                            </dt>
                            <dd class="leading-none text-3xl font-bold text-gray-900  ">BARANGAY</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-6">
                <div class="card">
                    <div class="card-body px-3 text-dark">
                        <div class="d-flex justify-content-between">
                            <p class="text-muted font-weight-bold  font-13 mb-0">Updated Precincts</p>
                        </div>
                        <h2 class="font-weight-semibold text-center">{{ $CityCount }}
                            <span class="text-info">({{ round(($CityCount / 258) * 100, 2) }}%)</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body px-3 text-dark">
                        <div class="d-flex justify-content-between">
                            <p class="text-muted font-weight-bold font-13 mb-0">Precincts with <span
                                    class="text-red-600">
                                    NO</span> update</p>
                        </div>
                        <h2 class="font-weight-semibold text-center">{{ 258 - $CityCount }}
                            <span class="text-info">({{ round(((258 - $CityCount) / 258) * 100, 2) }}%)</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($Barangay as $barangays)
                <div class="col-sm-3 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-title"> 
                             
                        </div>
                        <div class="card-body  text-center">
                             <h2 class="text-base text-center   font-medium text-red-700  ">
                                {{ $barangays->brgyName }}
                            </h2>
                            <div class=" text-end mb-1">
                                <h4 class=" ">
                                    {{ $BarangayNum[$barangays->brgy_id] }}/{{ $BarangayReg[$barangays->brgy_id] }}
                                    <span class="text-xl font-bold text-info ">
                                        ({{ $BarangayData[$barangays->brgy_id] }} %)</span>
                                </h4>



                            </div>
                            <div class="h-6 w-full bg-gray-200 rounded-full h-2.5 ">

                                <div class="h-6 bg-red-600 text-large font-medium text-blue-50 text-center p-0.5 leading-none rounded-full"
                                    style="width:  {{ $BarangayData[$barangays->brgy_id] }}%">
                                    <span class=" font-weight-bold "> {{ $BarangayData[$barangays->brgy_id] }}</span>
                                </div>
                            </div>
                            <span class="text-sm  font-medium text-black-700  ">
                                {{ $Barangaycount[$barangays->brgy_id] }} of out {{ $barangays->NumberofPrecinct }}
                                Precincts are updated </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('layouts.partial.footer')
    <!-- partial -->
</div> --}}
